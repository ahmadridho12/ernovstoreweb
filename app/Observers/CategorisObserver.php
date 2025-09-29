<?php

namespace App\Observers;

use App\Models\Categoris;
use Illuminate\Support\Facades\Cache;

class CategorisObserver
{
    /**
     * Event: saat kategori baru dibuat
     */
    public function created(Categoris $kategori): void
    {
        $this->clearCaches();
    }

    /**
     * Event: saat kategori diupdate
     */
    public function updated(Categoris $kategori): void
    {
        $this->clearCaches();
        Cache::forget("category_detail_{$kategori->id_category}");
    }

    /**
     * Event: saat kategori dihapus
     */
    public function deleted(Categoris $kategori): void
    {
        $this->clearCaches();
        Cache::forget("category_detail_{$kategori->id_category}");
    }

    /**
     * Bersihkan semua cache terkait kategori
     */
    private function clearCaches(): void
    {
        Cache::forget('kategoris_with_products'); // cache kategori + produk
        Cache::forget('active_categories');       // cache kategori aktif
    }
}
