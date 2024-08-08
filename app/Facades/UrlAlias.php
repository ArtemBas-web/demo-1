<?php


namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class UrlAlias extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Manager\UrlAlias::class;
    }
}
