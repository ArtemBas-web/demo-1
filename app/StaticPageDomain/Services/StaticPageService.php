<?php

namespace App\StaticPageDomain\Services;

use App\StaticPageDomain\Constants\StaticPage as StaticPageConstants;
use App\Http\Controllers\StaticPageController;
use App\Models\StaticPage;
use App\StaticPageDomain\Repositories\StaticPageRepository;

/**
 * Сервис для работы со статическими страницами.
 * Работает с использованием констант StaticPageConstants
 */
class StaticPageService {
    
    /**
     * @var StaticPageRepository
     */
    protected StaticPageRepository $staticPageRepository;
    
    /**
     * @param StaticPageRepository $staticPageRepository
     */
    public function __construct(StaticPageRepository $staticPageRepository) {
        
        $this->staticPageRepository = $staticPageRepository;
    }
    
    public function getTitleByKeyList(array $keyList = [])
    :?array{
        
        return $this->staticPageRepository->getTitleByKeyList($keyList)->pluck('title', 'page_key')->toArray();
    }
    
    /**
     * @param string $pageKey
     *
     * @return ?StaticPage
     */
    public function getByPageKey(string $pageKey)
    :?StaticPage {
        
        return $this->staticPageRepository->getByPageKey($pageKey);
    }
    
    /**
     * Получение списка маршрутов для статических страниц (зарегистрированных в константах)
     * @return array
     */
    public function getRoutes()
    :array {
        
        $staticPages = [];
        $allPlacedPages = StaticPageConstants::PAGE_KEY_LIST;
        foreach ($allPlacedPages as $pageKey => $pageData) {
            $staticPages[] = $pageData['route'];
        }
        
        return $staticPages;
    }
    
    
    /**
     * Загрузка маршрутов для статических страниц
     * @return void
     */
    public static function routes()
    :void {
        
        $allPlacedPages = StaticPageConstants::PAGE_KEY_LIST;
        foreach ($allPlacedPages as $pageKey => $pageData) {
            Route::get($pageData['prefix_path'] . $pageKey, [StaticPageController::class, 'page'])
                ->name($pageData['route'])
                ->defaults('pageKey', $pageKey);
        }
    }
    
    /**
     * Создание хлебных крошек для статических страниц
     * @return void
     * @throws \Diglactic\Breadcrumbs\Exceptions\DuplicateBreadcrumbException
     */
    public static function breadcrumbs()
    :void {
        
        $allPlacedPages = StaticPageConstants::PAGE_KEY_LIST;
        foreach ($allPlacedPages as $pageKey => $pageData) {
            $route = $pageData['route'];
            Breadcrumbs::for($route, function(BreadcrumbTrail $trail) use ($pageKey, $pageData, $route) {
                
                $trail->parent($pageData['parent_route']);
                
                $trail->push(__($pageData['title']), route($route));
            });
        }
    }
    
    /**
     * Добавление статических страниц по умолчанию в базу данных
     *
     * @param array $contentArray
     *
     * @return void
     */
    public function createDefaultPages(array $contentArray)
    :void {
        
        $allPlacedPages = StaticPageConstants::PAGE_KEY_LIST;
        foreach ($allPlacedPages as $pageKey => $pageData) {
            if (empty($contentArray[$pageKey]))
                continue;
            $this->staticPageRepository->create($pageKey, $pageData['title'], $contentArray[$pageKey], 1);
        }
    }
}
