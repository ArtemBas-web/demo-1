<?php


use App\Models\User;
use App\StaticPageDomain\Services\StaticPageService;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

try {

    Breadcrumbs::for('home', function(BreadcrumbTrail $trail) {

        $trail->push(__('titles.home'), route('home'));
    });

    StaticPageService::breadcrumbs();
} catch (Exception $e) {
    Log::error($e->getMessage());
}
