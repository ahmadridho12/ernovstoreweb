<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasFileUpload
{
    public function uploadFile($file, $folder = 'photos')
    {
        $filename = uniqid() . '.' . $file->extension();

        if (app()->environment('production')) {
            // 🚀 Simpan langsung ke public_html (hosting)
            $destination = '/home/zrnn6322/public_html/katalog.zrnfarm.com/' . $folder;

            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);

            return $folder . '/' . $filename;
        } else {
            // 🚀 Simpan ke storage Laravel (local)
            return $file->storeAs($folder, $filename, 'public');
        }
    }

    public function deleteFile($path)
    {
        if (!$path) return;

        if (app()->environment('production')) {
            $fullPath = '/home/zrnn6322/public_html/katalog.zrnfarm.com/' . $path;

            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        } else {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }
    }

    public function updateFile($newFile, $oldPath, $folder = 'photos')
    {
        $this->deleteFile($oldPath);
        return $this->uploadFile($newFile, $folder);
    }
}
