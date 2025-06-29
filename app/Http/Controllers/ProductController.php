<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Product::with('photos');

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('subjudul', 'like', '%' . $search . '%');
        }
        $query->orderBy('created_at', 'desc');

        $data = $query->paginate(10);

        return view('pages.product.index', [
            'data' => $data,
            'search' => $search,
        ]);
    }

    public function create(): View
    {
        // Ambil data kategori untuk ditampilkan di select
        $kategoris = \App\Models\Categoris::all();
        return view('pages.product.add', compact('kategoris'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id_category',
            'nama'        => 'required|string|max:255',
            'harga'       => 'required|numeric|min:0',
            'subjudul'    => 'nullable|string|max:255',
            'deskripsi'   => 'nullable|string',
            'berat'       => 'nullable|numeric|min:0',
            'dimensi'     => 'nullable|string|max:255',
            'material'    => 'nullable|string|max:255',
            'color'       => 'nullable|string|max:255',
            'size'        => 'nullable|string|max:255',
         
            // Validasi array foto
            'fotos.*'     => 'nullable|file|mimes:jpg,jpeg,png|max:10048'
        ]);

        DB::beginTransaction();
        try {
            // Simpan data produk ke tabel product
            $product = new Product();
            $product->kategori_id = $request->kategori_id;
            $product->nama        = $request->nama;
            $product->harga       = $request->harga;
            $product->subjudul    = $request->subjudul;
            $product->deskripsi   = $request->deskripsi;
            $product->berat       = $request->berat;
            $product->dimensi     = $request->dimensi;
            $product->material    = $request->material;
            $product->color       = $request->color;
            $product->size        = $request->size;

            // Generate slug unik tanpa id
            $slug = Str::slug($request->nama);
            $count = Product::where('slug', $slug)->count();

            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }

            $product->slug = $slug;

            $product->save();


            // Simpan foto-foto produk ke tabel product_photos
            if ($request->hasFile('fotos')) {
                foreach ($request->file('fotos') as $file) {
                    $path = $file->store('products', 'public');
                    // Buat record di tabel product_photos
                    $product->photos()->create([
                        'foto' => $path
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('product.index')
                ->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    // Method show untuk menampilkan detail produk
    // Method show untuk menampilkan detail produk
public function show($id): View
{
    $product = Product::with('photos')->findOrFail($id);
    return view('pages.product.show', compact('product'));
}

// Method edit untuk menampilkan form edit produk
public function edit($id): View
{
    $product = Product::with('photos')->findOrFail($id);
    $kategoris = \App\Models\Categoris::all();
    return view('pages.product.edit', compact('product', 'kategoris'));
}

public function update(Request $request, $id): RedirectResponse
{
    $product = Product::findOrFail($id);

    $request->validate([
        'kategori_id' => 'required|exists:kategoris,id_category',
        'nama'        => 'required|string|max:255',
        'harga'       => 'required|numeric|min:0',
        'subjudul'    => 'nullable|string|max:255',
        'deskripsi'   => 'nullable|string',
        'berat'       => 'nullable|numeric|min:0',
        'dimensi'     => 'nullable|string|max:255',
        'material'    => 'nullable|string|max:255',
        'color'       => 'nullable|string|max:255',
        'size'        => 'nullable|string|max:255',
        'harga_diskon' => 'nullable|numeric|min:0',
        'status'       => 'required|in:active,inactive',
        'fotos.*'      => 'nullable|file|mimes:jpg,jpeg,png|max:2048'
    ]);

    DB::beginTransaction();
    try {
        $product->kategori_id = $request->kategori_id;
        $product->nama        = $request->nama;
        $product->harga       = $request->harga;
        $product->subjudul    = $request->subjudul;
        $product->deskripsi   = $request->deskripsi;
        $product->berat       = $request->berat;
        $product->dimensi     = $request->dimensi;
        $product->material    = $request->material;
        $product->color       = $request->color;
        $product->size        = $request->size;
        $product->harga_diskon = $request->filled('harga_diskon') ? $request->harga_diskon : null;
        $product->status = $request->status ?? 'inactive';

        // Generate slug dari nama baru
        $slug = Str::slug($request->nama);

        $existingCount = Product::where('slug', $slug)
            ->where('id_produk', '!=', $product->id_produk)
            ->count();

        if ($existingCount > 0) {
            $slug .= '-' . ($existingCount + 1);
        }

        $product->slug = $slug;

        // Simpan semua perubahan
        $product->save();

        // Upload foto jika ada
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $file) {
                $path = $file->store('products', 'public');
                $product->photos()->create([
                    'foto' => $path
                ]);
            }
        }

        DB::commit();
        return redirect()->route('product.index')
            ->with('success', 'Produk berhasil diupdate');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()
            ->with('error', 'Gagal mengupdate: ' . $e->getMessage());
    }
}


// Method destroy untuk menghapus produk
public function destroy($id): RedirectResponse
{
    $product = Product::findOrFail($id);

    try {
        // Jika ingin menghapus file foto dari storage, lakukan di sini
        foreach ($product->photos as $photo) {
            Storage::disk('public')->delete($photo->foto);
        }
        $product->delete();
        return redirect()->route('product.index')
            ->with('success', 'Produk berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Gagal menghapus: ' . $e->getMessage());
    }
}
// Contoh method di ProductController
public function deletePhoto($productId, $photoId)
{
    // Temukan product (opsional, jika mau validasi product)
    $product = Product::findOrFail($productId);

    // Temukan photo berdasarkan ID
    $photo = ProductPhoto::where('id', $photoId)
                         ->where('product_id', $productId)
                         ->firstOrFail();

    // Hapus file dari storage jika perlu
    Storage::disk('public')->delete($photo->foto);

    // Hapus record dari database
    $photo->delete();

    return redirect()->route('product.edit', $productId)
                     ->with('success', 'Foto berhasil dihapus');
}


}
