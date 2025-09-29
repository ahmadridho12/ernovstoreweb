<?php

namespace App\Providers;
use App\Models\Product;
use App\Models\Categoris;
use App\Models\Slider;
use Illuminate\Support\Facades\View;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Services\MonitoringPakanGeneratorService;
use App\Observers\ProductObserver;
use App\Observers\CategorisObserver;
use App\Observers\SliderObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(MonitoringPakanGeneratorService::class);

        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
{
Product::observe(ProductObserver::class);
    Categoris::observe(CategorisObserver::class);
    Slider::observe(SliderObserver::class);
    Paginator::useBootstrapFive();

    // Share data kategori ke semua view
    View::composer('*', function ($view) {
        $kategoriFooter = Categoris::orderBy('created_at', 'desc')->get();
        $view->with('kategoriFooter', $kategoriFooter);
    });
}
}
