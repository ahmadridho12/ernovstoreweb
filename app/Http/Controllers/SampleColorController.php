<?php

namespace App\Http\Controllers;

use App\Models\SampleColor;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SampleColorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = SampleColor::query();

        if ($search) {
            $query->where('kode_sample', 'like', '%' . $search . '%');
        }

        $query->orderBy('created_at', 'desc');

        $data = $query->paginate(10);

        return view('pages.sample.index', [
            'data' => $data,
            'search' => $search,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode_sample' => 'required|string|max:255',
            'status' => ['required', Rule::in(['Available', 'Unavailable'])],
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $sample = new SampleColor();
            $sample->kode_sample = $request->kode_sample;
            $sample->status = $request->status;

            // Upload foto jika ada
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto')->store('sample_colors', 'public');
                $sample->foto = $foto;
            }

            $sample->save();

            DB::commit();
            return redirect()->route('sample.colors.index')
                ->with('success', 'Sample color berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id_sample_color): RedirectResponse
    {
        $request->validate([
            'kode_sample' => 'required|string|max:255',
            'status' => ['required', Rule::in(['Available', 'Unavailable'])],
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $sample = SampleColor::findOrFail($id_sample_color);
            $sample->kode_sample = $request->kode_sample;
            $sample->status = $request->status;

            // Upload foto baru jika ada
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($sample->foto && Storage::disk('public')->exists($sample->foto)) {
                    Storage::disk('public')->delete($sample->foto);
                }

                $foto = $request->file('foto')->store('sample_colors', 'public');
                $sample->foto = $foto;
            }

            $sample->save();

            DB::commit();
            return redirect()->route('sample.colors.index')
                ->with('success', 'Sample color berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui: ' . $e->getMessage() . ' - Line: ' . $e->getLine());
        }
    }

    public function destroy($id_sample_color)
    {
        try {
            $sample = SampleColor::findOrFail($id_sample_color);

            // Hapus foto jika ada
            if ($sample->foto && Storage::disk('public')->exists($sample->foto)) {
                Storage::disk('public')->delete($sample->foto);
            }

            $sample->delete();

            return redirect()->route('sample.colors.index')
                ->with('success', 'Sample color berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('sample.colors.index')
                ->with('error', 'Gagal menghapus: ' . $e->getMessage());
        }
    }
public function userIndex()
{
    $samples = SampleColor::orderBy('created_at', 'desc')->paginate(20);
    return view('home.samplecolor', compact('samples'));
}


}
