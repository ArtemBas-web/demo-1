<?php

namespace App\Providers;

use App\Models\Admin;
use App\Nova\Article;
use App\Nova\Dashboards\Main;
use App\Nova\News;
use App\Nova\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Laravel\Nova\Menu\MenuGroup;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider {
    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot() {

        parent::boot();
    }

    /**
     * Register the Nova routes.
     * @return void
     */
    protected function routes() {

        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     * This gate determines who can access Nova in non-local environments.
     * @return void
     */
    protected function gate() {

        Gate::define('viewNova', function($user) {

            return in_array($user->email, [
                Auth::guard('admin')
                    ->check(),
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     * @return array
     */
    protected function dashboards() {

        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     * @return array
     */
    public function tools() {

        return [
            new \Bernhardh\NovaTranslationEditor\NovaTranslationEditor()
        ];
    }

    /**
     * Register any application services.
     * @return void
     */
    public function register() {
        //
    }
}
