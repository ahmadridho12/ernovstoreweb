<?php

namespace App\Observers;

use App\Models\Slider;
use Illuminate\Support\Facades\Cache;

class SliderObserver
{
    /**
     * Event: saat slider baru dibuat
     */
    public function created(Slider $slider): void
    {
        $this->clearCaches();
    }

    /**
     * Event: saat slider diupdate
     */
    public function updated(Slider $slider): void
    {
        $this->clearCaches();
        Cache::forget("slider_detail_{$slider->id_slider}");
    }

    /**
     * Event: saat slider dihapus
     */
    public function deleted(Slider $slider): void
    {
        $this->clearCaches();
        Cache::forget("slider_detail_{$slider->id_slider}");
    }

    /**
     * Bersihkan semua cache terkait slider
     */
    private function clearCaches(): void
    {
        Cache::forget('active_sliders'); // slider aktif
        Cache::forget('home_sliders');   // slider di homepage (opsional)
    }
}
