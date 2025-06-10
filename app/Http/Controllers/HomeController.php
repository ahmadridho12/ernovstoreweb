<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Categoris;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use App\Helpers\SeoHelper;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Product::with('photos', 'kategori');

           // 2. Filter pencarian: kalau ada ?search=...
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
        $kategoris = Categoris::with('products.photos')->get();
        $sliders = Slider::where('status', 'active')->get();

        // Ambil daftar warna unik
        $colors = Product::distinct()->pluck('color')->filter();

         // ✅ Tambahkan konfigurasi SEO di sini
        $seoImage = $sliders->first() ? asset('storage/' . $sliders->first()->foto) : null;
        SeoHelper::homepage($seoImage);
        return view('home.index', compact('sliders', 'kategoris', 'products', 'colors'));
    }
    public function detail($slug)
{
    // 1. Ambil produk berdasarkan slug beserta relasi
    $product = \App\Models\Product::with('photos', 'kategori')->where('slug', $slug)->firstOrFail();

    // 2. Ambil semua foto produk
    $photos = $product->photos;

    // 3. Ambil produk terkait berdasarkan kategori (kecuali produk yang sedang ditampilkan)
    $relatedProducts = Product::with('photos')
        ->where('kategori_id', $product->kategori_id)
        ->where('slug', '!=', $product->slug)
        ->take(10)
        ->get();

    // 4. Ambil URL gambar pertama untuk SEO (jika ada)
    $image = $photos->first()?->url
        ? asset('storage/' . $photos->first()->url)
        : null;

    // 5. Set SEO meta data untuk produk
    \App\Helpers\SeoHelper::productDetail(
        $product->nama,
        $product->deskripsi ?? 'Temukan produk eksklusif dari Ernov.',
        $image,
        url()->current()
    );

    // 6. Return ke view detail produk
    return view('home.detail', compact('product', 'photos', 'relatedProducts'));
}

    
    

}
