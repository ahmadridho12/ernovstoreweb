<?php

if (!function_exists('storage_url')) {
    /**
     * Generate URL untuk file di storage
     *
     * @param string $folder  Nama folder (products/photos/categories)
     * @param string $filename Nama file (misalnya: gambar.jpg)
     * @return string
     */
    function storage_url($folder, $filename)
    {
        if (empty($filename)) {
            return asset('images/default.jpg');
        }

        // Ambil hanya nama file (kalau input ada path lengkap)
        $filename = basename($filename);

        // ✅ Kalau di lokal (ada symlink public/storage)
        if (file_exists(public_path('storage'))) {
            return asset("storage/{$folder}/{$filename}");
        }

        // ✅ Kalau di hosting (langsung folder photos/products/categories di root domain/subdomain)
        return asset("{$folder}/{$filename}");
    }
}

if (!function_exists('product_image_url')) {
    function product_image_url($imagePath)
    {
        if (empty($imagePath)) {
            return asset('images/no-image.jpg');
        }

        // Produk → folder products
        return storage_url('products', $imagePath);
    }
}

if (!function_exists('slider_image_url')) {
    function slider_image_url($imagePath)
    {
        if (empty($imagePath)) {
            return asset('images/no-slider.jpg');
        }

        // Slider → folder photos
        return storage_url('photos', $imagePath);
    }
}

if (!function_exists('category_image_url')) {
    function category_image_url($imagePath)
    {
        if (empty($imagePath)) {
            return asset('images/no-category.jpg');
        }

        // Kategori → folder photos
        return storage_url('photos', $imagePath);
    }
}
