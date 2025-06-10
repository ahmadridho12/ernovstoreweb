<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasFileUpload
{
    public function uploadFile($file, $folder = 'uploads')
    {
        $filename = uniqid() . '.' . $file->extension();
        return $file->storeAs($folder, $filename, 'public');
    }

    public function deleteFile($path)
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    public function updateFile($newFile, $oldPath, $folder = 'uploads')
    {
        $this->deleteFile($oldPath);
        return $this->uploadFile($newFile, $folder);
    }
}
