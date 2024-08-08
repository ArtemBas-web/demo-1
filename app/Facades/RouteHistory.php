<?php

namespace App\Facades;

use App\Services\PageMetaTagService;
use App\Services\RouteHistoryService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void rememberRoute(string $url)
 * @method static string|null getPreviousRoute()
 * @method static void forgetRoute()
 */
class RouteHistory extends Facade {
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    :string {

        return RouteHistoryService::class;
    }
}
