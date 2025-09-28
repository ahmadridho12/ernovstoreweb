<?php
namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductObserver
{
    public function created(Product $product): void
    {
        $this->clearCaches();
    }

    public function updated(Product $product): void
    {
        $this->clearCaches();
        Cache::forget("product_detail_{$product->slug}");
    }

    public function deleted(Product $product): void
    {
        $this->clearCaches();
        Cache::forget("product_detail_{$product->slug}");
    }

    private function clearCaches()
    {
        Cache::forget('kategoris_with_products');
        Cache::forget('product_colors');
        Cache::forget('active_sliders');
    }
}
