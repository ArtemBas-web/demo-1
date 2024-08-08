<?php

use App\Http\Controllers\StaticPageController;
use App\StaticPageDomain\Services\StaticPageService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth:admin')
    ->prefix('filemanager')
    ->group(function() {

        \UniSharp\LaravelFilemanager\Lfm::routes();

    });

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware'=>['auth.custom.verify']
], function() {
    

    Route::get('/static-pages/{page}', [StaticPageController::class, 'show'])
        ->name('static-page');
   
    StaticPageService::routes();
    
});

