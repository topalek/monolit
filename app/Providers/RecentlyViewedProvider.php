<?php

namespace App\Providers;

use App\Http\ViewComposers\RecentlyViewedProductsViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class RecentlyViewedProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['monolit.pages.main', 'monolit.pages.object'],
            RecentlyViewedProductsViewComposer::class
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
