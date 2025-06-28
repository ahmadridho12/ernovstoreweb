<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Categoris;
use Illuminate\Http\Request;
use App\Helpers\SeoHelper;
use Artesaos\SEOTools\Facades\SEOMeta;

class ProductsController extends Controller
{
    //
    public function index(Request $request)
{
    // 1. Validasi input
    $request->validate([
        'search' => 'nullable|string|max:100',
        'kategori' => 'nullable|string|max:50',
        'sort' => 'nullable|in:price_low,price_high,newest',
        'color' => 'nullable|string|max:30',
    ]);

    // 2. Mulai query
    $query = Product::with('photos', 'kategori');

    // 3. Filter pencarian
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

    // 4. Filter kategori
    if ($request->filled('kategori') && $request->kategori !== 'all') {
        $query->whereHas('kategori', function($q) use ($request) {
            $q->where('nama', $request->kategori);
        });
    }

    // 5. Sort produk
    $sortOptions = [
        'price_low' => ['harga', 'asc'],
        'price_high' => ['harga', 'desc'],
        'newest' => ['created_at', 'desc'],
    ];

    [$column, $direction] = $sortOptions[$request->sort] ?? ['id_produk', 'desc'];
    $query->orderBy($column, $direction);

    // 6. Filter warna
    if ($request->filled('color') && $request->color !== 'all') {
        $query->where('color', $request->color);
    }

    // 7. Ambil data
    $products = $query->paginate(20)->appends($request->query());
    $kategoris = Categoris::with('products.photos')->get();
    $colors = Product::distinct()->pluck('color')->filter();

    // 8. Ambil produk dan gambar pertama
    $firstProduct = $products->items()[0] ?? null;
    $firstPhoto = $firstProduct?->photos->first();
    $seoImage = $firstPhoto ? asset('storage/' . $firstPhoto->url) : null;

    // 9. Judul & Deskripsi SEO dinamis
    if ($request->filled('search')) {
    $title = "Search Results: " . $request->search;
    $desc  = "View search results for '" . $request->search . "' in Ernov's product catalog.";
    } elseif ($request->filled('kategori')) {
        $title = "Category " . ucfirst($request->kategori);
        $desc  = "Browse products under the '" . ucfirst($request->kategori) . "' category from Ernov's exclusive collection.";
    } else {
        $title = "Latest Products";
        $desc  = "Discover the latest collection of exclusive leather fashion products only at Ernov.";
    }


    // Pasang SEO
    SeoHelper::product($title, $desc, $seoImage);
  return view('home.productss', compact('products', 'kategoris', 'colors'))
        ->with('search', $request->input('search'));
}

public function detail($slug)
{
    $product = Product::with(['photos', 'kategori'])->where('slug', $slug)->firstOrFail();

    $image = $product->photos->first()?->url
        ? asset('storage/' . $product->photos->first()->url)
        : null;

    SeoHelper::productDetail(
        $product->nama,
        $product->deskripsi ?? 'Temukan produk eksklusif dari Ernov.',
        $image,
        url()->current()
    );
dd(SEOMeta::getTitle());

    return view('home.detail', compact('product'));
}

    
}
