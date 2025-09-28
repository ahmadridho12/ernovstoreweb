<?php

namespace App\Http\Controllers;

use App\Models\Categoris;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use App\Traits\HasFileUpload; // ⬅️ tambahkan ini

class CategorisController extends Controller
{
    use HasFileUpload; // ⬅️ aktifkan trait

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
                $category->foto = $this->uploadFile($request->file('foto'), 'photos');
            }

            // Upload Foto Sampul
            if ($request->hasFile('foto_sampul')) {
                $category->foto_sampul = $this->uploadFile($request->file('foto_sampul'), 'photos');
            }

            $category->save();
            DB::commit();

            return redirect()->route('master.category.index')
                ->with('success', 'Category berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
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

            // Foto baru
            if ($request->hasFile('foto')) {
                $category->foto = $this->updateFile($request->file('foto'), $category->foto, 'photos');
            }

            // Foto sampul baru
            if ($request->hasFile('foto_sampul')) {
                $category->foto_sampul = $this->updateFile($request->file('foto_sampul'), $category->foto_sampul, 'photos');
            }

            $category->save();
            DB::commit();

            return redirect()->route('master.category.index')
                ->with('success', 'Category berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui: ' . $e->getMessage());
        }
    }

    public function destroy(Categoris $category)
    {
        try {
            $this->deleteFile($category->foto);
            $this->deleteFile($category->foto_sampul);

            $category->delete();

            return redirect()->route('master.category.index')
                ->with('success', 'Category berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('master.category.index')
                ->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
}
