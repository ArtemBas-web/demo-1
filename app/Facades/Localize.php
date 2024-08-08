<?php

namespace App\Facades;

use App\Services\LocalizeService;
use App\Services\PageMetaTagService;
use Illuminate\Support\Facades\Facade;

class Localize extends Facade {

    /**
     * @method static string getHtmlLocaleBlock()
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    :string {

        return LocalizeService::class;
    }
}
