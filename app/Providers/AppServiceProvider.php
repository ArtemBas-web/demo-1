<?php

namespace App\Providers;

use App\Managers\UrlAlias;
use App\Services\PageMetaTagService;
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
        
        $this->app->bind( \App\StaticPageDomain\Repositories\StaticPageRepository::class, \App\Infrastructure\Persistence\Eloquent\StaticPageRepository::class);
        $this->app->bind( \App\StaticPageDomain\Services\StaticPageService::class, \App\StaticPageDomain\Services\StaticPageService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
