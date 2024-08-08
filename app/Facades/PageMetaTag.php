<?php

namespace App\Facades;

use App\Services\PageMetaTagService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Models\PageMetaTag|null getByURI(string $uri)
 * @method static \Illuminate\Database\Eloquent\Collection|array getList()
 * @method static string getCurrentHtml()
 */
class PageMetaTag extends Facade {
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    :string {

        return PageMetaTagService::class;
    }
}
