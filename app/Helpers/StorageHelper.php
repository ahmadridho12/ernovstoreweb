<?php

use Illuminate\Support\Facades\App;

if (!function_exists('storage_url')) {
    function storage_url($folder, $filename)
    {
        // Jika folder public/storage ada (berarti symlink aktif), pakai asset()
        if (file_exists(public_path('storage'))) {
            return asset("storage/{$folder}/{$filename}");
        }

        // Kalau tidak ada (di hosting), pakai route custom
        return url("/storage/{$folder}/{$filename}");
    }
}
