<?php

namespace App\Providers;

use App\Http\ViewComposers\MetaTags;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MetaTagsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('monolit.layouts.app',
            MetaTags::class
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
