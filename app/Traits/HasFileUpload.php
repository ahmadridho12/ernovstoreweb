<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasFileUpload
{
    /**
     * Upload file ke storage (local) atau public_html (hosting/production)
     */
    public function uploadFile($file, $folder = 'photos')
    {
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        if (file_exists(public_path('storage'))) {
            // 🚀 Local (pakai symlink storage)
            return $file->storeAs($folder, $filename, 'public');
            // hasil: photos/nama.jpg atau products/nama.jpg
        } else {
            // 🚀 Hosting (tanpa symlink → langsung ke public_html/folder)
            $destination = public_path($folder);
            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);

            return $folder . '/' . $filename;
        }
    }

    /**
     * Hapus file dari storage atau public_html
     */
    public function deleteFile($path)
    {
        if (!$path) return;

        if (file_exists(public_path('storage'))) {
            // 🚀 Local
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        } else {
            // 🚀 Hosting
            $fullPath = public_path($path);
            if (file_exists($fullPath)) {
                unlink($fullPath);
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

    /**
     * Shortcut khusus untuk produk (folder: products)
     */
    public function uploadProductFile($file)
    {
        return $this->uploadFile($file, 'products');
    }

    public function updateProductFile($newFile, $oldPath)
    {
        return $this->updateFile($newFile, $oldPath, 'products');
    }

    /**
     * Shortcut khusus untuk foto umum (folder: photos)
     */
    public function uploadPhotoFile($file)
    {
        return $this->uploadFile($file, 'photos');
    }

    public function updatePhotoFile($newFile, $oldPath)
    {
        return $this->updateFile($newFile, $oldPath, 'photos');
    }
}
