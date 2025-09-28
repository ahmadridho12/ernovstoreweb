<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasFileUpload
{
    /**
     * Upload file ke storage (local) atau public_html (production)
     */
    public function uploadFile($file, $folder = 'photos')
    {
        $filename = uniqid() . '.' . $file->extension();

        if (app()->environment('production')) {
            // 🚀 Hosting: simpan ke public_html langsung
            $destination = public_path($folder);

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);

            // Path yang disimpan di DB → relative
            return $folder . '/' . $filename;
        } else {
            // 🚀 Local: simpan ke storage/app/public
            return $file->storeAs($folder, $filename, 'public');
        }
    }

    /**
     * Hapus file dari storage atau public_html
     */
    public function deleteFile($path)
    {
        if (!$path) return;

        if (app()->environment('production')) {
            $fullPath = public_path($path);

            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        } else {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }
    }

    /**
     * Update file → hapus lama, upload baru
     */
    public function updateFile($newFile, $oldPath, $folder = 'photos')
    {
        $this->deleteFile($oldPath);
        return $this->uploadFile($newFile, $folder);
    }
}
