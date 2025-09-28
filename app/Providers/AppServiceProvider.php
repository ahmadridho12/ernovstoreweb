<?php

namespace App\Providers;
use App\Models\Categoris;
use Illuminate\Support\Facades\View;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Services\MonitoringPakanGeneratorService;


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
    \App\Models\Product::observe(\App\Observers\ProductObserver::class);

    Paginator::useBootstrapFive();

    // Share data kategori ke semua view
    View::composer('*', function ($view) {
        $kategoriFooter = Categoris::orderBy('created_at', 'desc')->get();
        $view->with('kategoriFooter', $kategoriFooter);
    });
}
}
