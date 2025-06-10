<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HasFileUpload;
use Illuminate\Http\RedirectResponse; // Pastikan ini ditambahkan
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

use App\Models\Slider;

class SliderController extends Controller
{
      use HasFileUpload;
    //
    public function index(Request $request)
    {
        $search = $request->input('search'); // Jika ada pencarian

        $query = Slider::query();

        if ($search) {
            $query->where('periode', 'like', '%' . $search . '%');
            // Ganti 'nama_kategori' dengan nama kolom yang sesuai di tabel Anda
        }
        $query->orderBy('created_at', 'desc');

    
        // Menggunakan paginate untuk mendapatkan instance Paginator
        $data = $query->paginate(10); // 10 item per halaman        return view('ayam.index', compact('ayam'));

        return view('pages.master.slider', [
            'data' => $data,
            'search' => $search,
            // 'sekats' => Sekat::all(),
            // 'kandangs' => Kandang::all(),
            // 'docs' => HargaDoc::all(),
        ]);
    }

    // public function create()
    // {
       
    //     return view('pages.home.index', [
          
    //     ]);
    // }

    public function store(Request $request): RedirectResponse 
    {
        $request->validate([
            // 'nama'      => 'required|string|max:255',
            'status'    => 'required|in:active,inactive',
            // 'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:10240', // 10 MB
                function ($attribute, $value, $fail) {
                    if ($value && !in_array($value->getMimeType(), ['image/jpeg', 'image/png', 'application/pdf'])) {
                        $fail('Tipe file tidak valid.');
                    }
                },
            ],    
            ]);
        
        DB::beginTransaction();
        try {
            $slider = new Slider();
            $slider->nama      = $request->nama;
            $slider->status    = $request->status;
            $slider->judul     = $request->judul;
            $slider->deskripsi = $request->deskripsi;
    
            
           
    
            // 🔥 Upload Foto
           // 🔒 Upload Foto (lebih aman)
            if ($request->hasFile('foto')) {
                $slider->foto = $this->uploadFile($request->file('foto'), 'photos');
            }
            $slider->save();
           
            DB::commit();
            return redirect()->route('master.slider.index')->with('success', 'Slider berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }
    
    public function edit($id): View
{
    $slider = Slider::findOrFail($id);
    return view('slider.edit', compact('slider'));
}
public function update(Request $request, $id): RedirectResponse
{
    $request->validate([
        // 'nama'      => 'required|string|max:255',
        'status'    => 'required|in:active,inactive',
        // 'judul'     => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'foto'      => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10048',
    ]);
    
    DB::beginTransaction();
    try {
        $slider = Slider::findOrFail($id);
        $slider->nama      = $request->nama;
        $slider->status    = $request->status;
        $slider->judul     = $request->judul;
        $slider->deskripsi = $request->deskripsi;
        
        // 🔥 Upload Foto Baru (opsional: hapus foto lama jika perlu)
        if ($request->hasFile('foto')) {
            $slider->foto = $this->updateFile($request->file('foto'), $slider->foto, 'photos');
        }

        
        $slider->save();
        DB::commit();
        
        return redirect()->route('master.slider.index')
            ->with('success', 'Slider berhasil diperbarui');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()
            ->with('error', 'Gagal memperbarui: ' . $e->getMessage());
    }
}
public function destroy(Slider $slider)
{
    try {
        // Hapus foto jika ada
        $this->deleteFile($slider->foto);
    $slider->delete();
    return redirect()->route('master.slider.index')->with('success', 'Slider berhasil dihapus.');
}catch (\Exception $e) {
    return redirect()->route('master.category.index')
        ->with('error', 'Gagal menghapus: ' . $e->getMessage());
}
}

}
