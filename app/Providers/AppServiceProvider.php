<?php

namespace App\Providers;

use App\Http\ViewComposers\ServiceCategoryViewComposer;
use Illuminate\Foundation\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Vite::macro('image', fn ($asset) => $this->asset("resources/images/{$asset}"));
        view()->composer('admin.*', ServiceCategoryViewComposer::class);
    }
}