<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasFileUpload
{
    /**
     * Upload file langsung ke folder public tertentu di hosting
     */
    public function uploadFile($file, $folder = 'photos')
    {
        $filename = uniqid() . '.' . $file->extension();
        $destination = '/home/username/public_html/katalog.zrnfarm.com/' . $folder;

        // Pastikan folder ada
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        $file->move($destination, $filename);

        // Return relative path untuk disimpan di DB
        return $folder . '/' . $filename;
    }

    /**
     * Delete file dari folder public
     */
    public function deleteFile($path)
    {
        $fullPath = '/home/username/public_html/katalog.zrnfarm.com/' . $path;

        if ($path && file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    /**
     * Update file (delete old, upload new)
     */
    public function updateFile($newFile, $oldPath, $folder = 'photos')
    {
        $this->deleteFile($oldPath);
        return $this->uploadFile($newFile, $folder);
    }
}
