<?php

namespace App\Http\Controllers;

use App\Models\Categoris;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class CategorisController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Categoris::query();

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('judul', 'like', '%' . $search . '%');
        }
        $query->orderBy('created_at', 'desc');

        $data = $query->paginate(10);

        return view('pages.master.category', [
            'data'   => $data,
            'search' => $search,
        ]);
    }

    public function store(Request $request): RedirectResponse 
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'foto'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10048',
            'foto_sampul'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10048',
        ]);
        
        DB::beginTransaction();
        try {
            $category = new Categoris();
            $category->nama  = $request->nama;
            $category->judul = $request->judul;
            
            // Upload Foto
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move('/home/zrnn6322/public_html/katalog.zrnfarm.com/photos', $filename);
                $category->foto = 'photos/'.$filename;
            }
            
            // Upload Foto Sampul
            if ($request->hasFile('foto_sampul')) {
                $fileSampul = $request->file('foto_sampul');
                $filenameSampul = time().'_'.$fileSampul->getClientOriginalName();
                $fileSampul->move('/home/zrnn6322/public_html/katalog.zrnfarm.com/photos', $filenameSampul);
                $category->foto_sampul = 'photos/'.$filenameSampul;
            }

            $category->save();
        
            DB::commit();
            return redirect()->route('master.category.index')
                ->with('success', 'Category berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    
    public function edit($id): View
    {
        $category = Categoris::findOrFail($id);
        return view('category.edit', compact('category'));
    }

   public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'foto'         => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10048',
            'foto_sampul'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10048',
        ]);
        
        DB::beginTransaction();
        try {
            $category = Categoris::findOrFail($id);
            $category->nama  = $request->nama;
            $category->judul = $request->judul;
            
            // Upload Foto Baru jika ada
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                $oldPath = '/home/zrnn6322/public_html/katalog.zrnfarm.com/'.$category->foto;
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }

                $file = $request->file('foto');
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move('/home/zrnn6322/public_html/katalog.zrnfarm.com/photos', $filename);
                $category->foto = 'photos/'.$filename;
            }
            
            // Upload Foto Sampul Baru jika ada
            if ($request->hasFile('foto_sampul')) {
                // Hapus foto sampul lama jika ada
                $oldPathSampul = '/home/zrnn6322/public_html/katalog.zrnfarm.com/'.$category->foto_sampul;
                if (file_exists($oldPathSampul)) {
                    unlink($oldPathSampul);
                }

                $fileSampul = $request->file('foto_sampul');
                $filenameSampul = time().'_'.$fileSampul->getClientOriginalName();
                $fileSampul->move('/home/zrnn6322/public_html/katalog.zrnfarm.com/photos', $filenameSampul);
                $category->foto_sampul = 'photos/'.$filenameSampul;
            }
            
            $category->save();
            DB::commit();
            
            return redirect()->route('master.category.index')
                ->with('success', 'Category berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui: ' . $e->getMessage());
        }
    }


    public function destroy(Categoris $category)
    {
        try {
            // Hapus foto jika ada
            $fotoPath = '/home/zrnn6322/public_html/katalog.zrnfarm.com/'.$category->foto;
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }

            // Hapus foto sampul jika ada
            $fotoSampulPath = '/home/zrnn6322/public_html/katalog.zrnfarm.com/'.$category->foto_sampul;
            if (file_exists($fotoSampulPath)) {
                unlink($fotoSampulPath);
            }
            
            $category->delete();
            return redirect()->route('master.category.index')
                ->with('success', 'Category berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('master.category.index')
                ->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }

}
