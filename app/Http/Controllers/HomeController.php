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

        // Cek apakah ada cache, jika ada langsung return
        if (Cache::has($cacheKey)) {
            $cachedData = Cache::get($cacheKey);

            // Set SEO untuk cached data
            $seoImage = !empty($cachedData['sliders']) && $cachedData['sliders']->first()
                ? $cachedData['sliders']->first()->foto_url
                : null;
            SeoHelper::homepage($seoImage);

            return view('home.index', $cachedData);
        }

        // Query products dengan filter
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

        // Filter Kategori
        if ($request->has('kategori') && $request->kategori != 'all') {
            $query->whereHas('kategori', function($q) use ($request) {
                $q->where('nama', $request->kategori);
            });
        }

        // Sort By
        switch($request->sort) {
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

        // Filter Warna
        if ($request->has('color') && $request->color != 'all') {
            $query->where('color', $request->color);
        }

        $products = $query->paginate(20);
        $products->appends(request()->query());

        // Cache data yang jarang berubah - load accessor sekaligus
        $kategoris = Cache::remember('kategoris_with_products', 1440, function () {
            return Categoris::with('products.photos')->get()->map(function($kategori) {
                // Load accessor untuk cache
                $kategori->foto_url_cache = $kategori->foto_url;
                return $kategori;
            });
        });

        $sliders = Cache::remember('active_sliders', 720, function () {
            return Slider::active()->get()->map(function($slider) {
                // Load accessor untuk cache
                $slider->foto_url_cache = $slider->foto_url;
                return $slider;
            });
        });

        // Cache daftar warna unik
        $colors = Cache::remember('product_colors', 1440, function () {
            return Product::distinct()->pluck('color')->filter();
        });

        // Siapkan data untuk di-cache
        $dataToCache = compact('sliders', 'kategoris', 'products', 'colors');

        // Cache data hasil query
        $cacheMinutes = $this->getCacheMinutes($request);
        Cache::put($cacheKey, $dataToCache, $cacheMinutes);

        // Set SEO
        $seoImage = $sliders->first() ? $sliders->first()->foto_url_cache : null;
        SeoHelper::homepage($seoImage);

        return view('home.index', $dataToCache);
    }

    public function detail($slug)
    {
        // Cache key untuk detail produk
        $cacheKey = "product_detail_{$slug}";

        // Cek cache terlebih dahulu
        if (Cache::has($cacheKey)) {
            $cachedData = Cache::get($cacheKey);

            // Set SEO untuk cached data
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

        // Jika tidak ada cache, proses normal
        $product = Product::with('photos', 'kategori')->where('slug', $slug)->firstOrFail();
        $photos = $product->photos;

        // Cache related products berdasarkan kategori
        $relatedCacheKey = "related_products_cat_{$product->kategori_id}_except_{$product->id}";
        $relatedProducts = Cache::remember($relatedCacheKey, 720, function () use ($product) {
            return Product::with('photos')
                ->where('kategori_id', $product->kategori_id)
                ->where('slug', '!=', $product->slug)
                ->take(10)
                ->get();
        });

        // Set SEO
        $image = $photos->first() ? $product->image_url : null;

        SeoHelper::productDetail(
            $product->nama,
            $product->deskripsi ?? 'Temukan produk eksklusif dari Ernov.',
            $image,
            url()->current()
        );

        // Siapkan data untuk cache
        $dataToCache = compact('product', 'photos', 'relatedProducts');

        // Cache detail produk selama 6 jam
        Cache::put($cacheKey, $dataToCache, 360);

        return view('home.detail', $dataToCache);
    }

    /**
     * Generate cache key berdasarkan request parameters
     */
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

    /**
     * Tentukan durasi cache berdasarkan jenis request
     */
    private function getCacheMinutes(Request $request)
    {
        // Jika ada search atau filter, cache lebih singkat
        if ($request->filled('search') ||
            ($request->has('kategori') && $request->kategori != 'all') ||
            ($request->has('color') && $request->color != 'all')) {
            return 15; // 15 menit untuk hasil pencarian/filter
        }

        // Untuk halaman utama tanpa filter, cache lebih lama
        return 60; // 1 jam
    }

    /**
     * Clear cache ketika ada perubahan data
     */
    public static function clearProductCaches()
    {
        Cache::forget('kategoris_with_products');
        Cache::forget('product_colors');

        // Clear home page cache dengan pattern
        $cacheFiles = glob(storage_path('framework/cache/data/*'));
        if ($cacheFiles) {
            foreach ($cacheFiles as $file) {
                if (is_file($file)) {
                    $content = @file_get_contents($file);
                    if ($content && (
                        strpos($content, 'home_page_') !== false ||
                        strpos($content, 'related_products_cat_') !== false
                    )) {
                        unlink($file);
                    }
                }
            }
        }
    }

    /**
     * Clear cache untuk slider
     */
    public static function clearSliderCache()
    {
        Cache::forget('active_sliders');
    }
}
