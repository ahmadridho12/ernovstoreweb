<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Categoris;
use App\Helpers\SeoHelper;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Buat cache key berdasarkan parameter request
        $cacheKey = $this->generateCacheKey($request);

        // Jika sudah ada cache, langsung gunakan
        if (Cache::has($cacheKey)) {
            $cachedData = Cache::get($cacheKey);

            $seoImage = !empty($cachedData['sliders']) && $cachedData['sliders']->first()
                ? $cachedData['sliders']->first()->foto_url
                : null;
            SeoHelper::homepage($seoImage);

            return view('home.index', $cachedData);
        }

        // Query produk dengan filter
        $query = Product::with('photos', 'kategori');

        // Filter pencarian
        if ($request->filled('search')) {
            $keyword = $request->input('search');
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                  ->orWhereHas('kategori', function ($q2) use ($keyword) {
                      $q2->where('nama', 'like', "%{$keyword}%")
                         ->orWhere('judul', 'like', "%{$keyword}%");
                  });
            });
        }

        // Filter kategori
        if ($request->has('kategori') && $request->kategori != 'all') {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('nama', $request->kategori);
            });
        }

        // Sorting
        switch ($request->sort) {
            case 'price_low':
                $query->orderBy('harga', 'asc');
                break;
            case 'price_high':
                $query->orderBy('harga', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('id_produk', 'desc');
        }

        // Filter warna
        if ($request->has('color') && $request->color != 'all') {
            $query->where('color', $request->color);
        }

        $products = $query->paginate(20);
        $products->appends(request()->query());

        // Ambil dari cache (atau buat baru)
        $kategoris = Cache::remember('kategoris_with_products', 1440, function () {
            return Categoris::with('products.photos')->get()->map(function ($kategori) {
                $kategori->foto_url_cache = $kategori->foto_url;
                return $kategori;
            });
        });

        $sliders = Cache::remember('active_sliders', 720, function () {
            return Slider::active()->get()->map(function ($slider) {
                $slider->foto_url_cache = $slider->foto_url;
                return $slider;
            });
        });

        $colors = Cache::remember('product_colors', 1440, function () {
            return Product::distinct()->pluck('color')->filter();
        });

        $dataToCache = compact('sliders', 'kategoris', 'products', 'colors');

        // Simpan ke cache
        Cache::put($cacheKey, $dataToCache, $this->getCacheMinutes($request));

        // SEO
        $seoImage = $sliders->first() ? $sliders->first()->foto_url_cache : null;
        SeoHelper::homepage($seoImage);

        return view('home.index', $dataToCache);
    }

    public function detail($slug)
    {
        $cacheKey = "product_detail_{$slug}";

        if (Cache::has($cacheKey)) {
            $cachedData = Cache::get($cacheKey);

            $image = !empty($cachedData['photos']) && $cachedData['photos']->first()
                ? $cachedData['photos']->first()->image_url_cache ?? $cachedData['product']->image_url
                : null;

            SeoHelper::productDetail(
                $cachedData['product']->nama,
                $cachedData['product']->deskripsi ?? 'Temukan produk eksklusif dari Ernov.',
                $image,
                url()->current()
            );

            return view('home.detail', $cachedData);
        }

        $product = Product::with('photos', 'kategori')->where('slug', $slug)->firstOrFail();
        $photos = $product->photos;

        $relatedCacheKey = "related_products_cat_{$product->kategori_id}_except_{$product->id}";
        $relatedProducts = Cache::remember($relatedCacheKey, 720, function () use ($product) {
            return Product::with('photos')
                ->where('kategori_id', $product->kategori_id)
                ->where('slug', '!=', $product->slug)
                ->take(10)
                ->get();
        });

        $image = $photos->first() ? $product->image_url : null;

        SeoHelper::productDetail(
            $product->nama,
            $product->deskripsi ?? 'Temukan produk eksklusif dari Ernov.',
            $image,
            url()->current()
        );

        $dataToCache = compact('product', 'photos', 'relatedProducts');
        Cache::put($cacheKey, $dataToCache, 360);

        return view('home.detail', $dataToCache);
    }

    private function generateCacheKey(Request $request)
    {
        $params = [
            'search' => $request->input('search'),
            'kategori' => $request->input('kategori', 'all'),
            'sort' => $request->input('sort'),
            'color' => $request->input('color', 'all'),
            'page' => $request->input('page', 1)
        ];

        return 'home_page_' . md5(serialize($params));
    }

    private function getCacheMinutes(Request $request)
    {
        if ($request->filled('search') ||
            ($request->has('kategori') && $request->kategori != 'all') ||
            ($request->has('color') && $request->color != 'all')) {
            return 15;
        }

        return 60;
    }
}
