<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Traits\HasFileUpload; // ✅ Tambahkan trait

class ProductController extends Controller
{
    use HasFileUpload; // ✅ Gunakan trait

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
        $kategoris = \App\Models\Categoris::all();
        return view('pages.product.add', compact('kategoris'));
    }

    public function store(Request $request): RedirectResponse
    {
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
            'fotos.*'     => 'nullable|file|mimes:jpg,jpeg,png|max:10048'
        ]);

        DB::beginTransaction();
        try {
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

            // Upload foto produk langsung ke public
            if ($request->hasFile('fotos')) {
                foreach ($request->file('fotos') as $file) {
                    $path = $this->uploadFile($file, 'products');
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

    public function show($id): View
    {
        $product = Product::with('photos')->findOrFail($id);
        return view('pages.product.show', compact('product'));
    }

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
            'kategori_id'  => 'required|exists:kategoris,id_category',
            'nama'         => 'required|string|max:255',
            'harga'        => 'required|numeric|min:0',
            'subjudul'     => 'nullable|string|max:255',
            'deskripsi'    => 'nullable|string',
            'berat'        => 'nullable|numeric|min:0',
            'dimensi'      => 'nullable|string|max:255',
            'material'     => 'nullable|string|max:255',
            'color'        => 'nullable|string|max:255',
            'size'         => 'nullable|string|max:255',
            'harga_diskon' => 'nullable|numeric|min:0',
            'status'       => 'required|in:active,inactive',
            'fotos.*'      => 'nullable|file|mimes:jpg,jpeg,png|max:2048'
        ]);

        DB::beginTransaction();
        try {
            $product->kategori_id  = $request->kategori_id;
            $product->nama         = $request->nama;
            $product->harga        = $request->harga;
            $product->subjudul     = $request->subjudul;
            $product->deskripsi    = $request->deskripsi;
            $product->berat        = $request->berat;
            $product->dimensi      = $request->dimensi;
            $product->material     = $request->material;
            $product->color        = $request->color;
            $product->size         = $request->size;
            $product->harga_diskon = $request->filled('harga_diskon') ? $request->harga_diskon : null;
            $product->status       = $request->status ?? 'inactive';

            // Generate slug unik
            $slug = Str::slug($request->nama);
            $existingCount = Product::where('slug', $slug)
                ->where('id_produk', '!=', $product->id_produk)
                ->count();

            if ($existingCount > 0) {
                $slug .= '-' . ($existingCount + 1);
            }
            $product->slug = $slug;

            $product->save();

            // Upload foto baru jika ada
            if ($request->hasFile('fotos')) {
                foreach ($request->file('fotos') as $file) {
                    $path = $this->uploadFile($file, 'products');
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

    public function destroy($id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        try {
            foreach ($product->photos as $photo) {
                $this->deleteFile($photo->foto);
            }
            $product->delete();
            return redirect()->route('product.index')
                ->with('success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }

    public function deletePhoto($productId, $photoId)
    {
        $product = Product::findOrFail($productId);
        $photo = ProductPhoto::where('id', $photoId)
                             ->where('product_id', $productId)
                             ->firstOrFail();

        $this->deleteFile($photo->foto);

        $photo->delete();

        return redirect()->route('product.edit', $productId)
                         ->with('success', 'Foto berhasil dihapus');
    }
}
