<?php

namespace App\PageMetaTagDomain\Services;

use App\Constants\EntityFields\PageMetaTagFields;
use App\Models\PageMetaTag;
use App\Repositories\PageMetaTagRepository;
use App\Services\StaticPageService;

/**
 * Сервис для работы с метатегами страниц
 */
class PageMetaTagService {
    /**
     * @var PageMetaTagRepository
     */
    protected PageMetaTagRepository $pageMetaTagRepository;
    
    /**
     * @var StaticPageService
     */
    protected StaticPageService $staticPageService;
    
    /**
     * @param PageMetaTagRepository $pageMetaTagRepository
     * @param StaticPageService $staticPageService
     */
    public function __construct(PageMetaTagRepository $pageMetaTagRepository, StaticPageService $staticPageService) {
        
        $this->pageMetaTagRepository = $pageMetaTagRepository;
        $this->staticPageService = $staticPageService;
    }
    
    /**
     * Контентные страницы
     * @return array
     */
    public function getContentPages()
    :array {
        
        $articles = Article::getNavigationCategories();
        $routes = [
            'home' => 'titles.home',
            'about' => 'titles.about',
            'about.contacts' => 'titles.contacts',
            'about.management' => 'titles.management',
            'about.coaching-staff' => 'titles.coaching-staff',
            'about.faq' => 'titles.faq',
            'athletes.national-team' => 'titles.national-team',
            'athletes.youth-team' => 'titles.national-team-youth',
            'athletes.age-group' => 'titles.no-national-team',
            'athletes.reserve' => 'titles.national-team-reserve',
            'athletes.rating.elite' => 'titles.rating-athletes',
            'athletes.rating.age-group' => 'titles.rating-amateurs',
            'register' => 'titles.register',
            'login' => 'titles.login',
            'password.request' => 'titles.password-recovery',
            'password.reset' => 'titles.password-recovery',
            'verification.notice' => 'titles.account-verification',
            'verification.result' => 'titles.account-verification',
            'verification.verify' => 'titles.account-verification',
            'password.confirm' => 'titles.confirm-password',
            'events' => 'titles.events',
            'events.archive' => 'titles.events-archive',
            'join.licenses' => 'titles.licenses',
            'join.licenses.payment' => 'titles.licenses',
            'news' => 'titles.news',
            'organizations.clubs' => 'titles.clubs',
            'organizations.children-sections' => 'titles.children-sections',
            'payment.result' => 'titles.payment-result',
            'payment.success' => 'titles.payment-success',
            'payment.fail' => 'titles.payment-fail',
            'profile' => 'titles.profile',
            'profile.setting' => 'titles.access-settings',
            'profile.events' => 'titles.my-events',
            'profile.leaderboard' => 'titles.my-leaderboards',
            'profile.orders' => 'titles.my-orders',
            'profile.licenses' => 'titles.my-licenses',
            'shop' => 'titles.shop',
            'shop.cart' => 'titles.cart',
            'shop.cart.checkout' => 'titles.checkout',
            'gallery' => 'titles.gallery',
        ];
        foreach ($articles as $article) {
            $routes[$article['route']] = $article['title'];
        }
        
        return $routes;
    }
    
    /**
     * Получение списка маршрутов для контентных страниц
     * @return array
     */
    public function getUriContentPages()
    :array {
        
        return $this->getUriFromRoutes(array_keys($this->getContentPages()));
    }
    
    /**
     * Получение списка маршрутов из списка имен маршрутов
     *
     * @param array $routeNameList
     *
     * @return array
     */
    public function getUriFromRoutes(array $routeNameList)
    :array {
        
        $uriList = [];
        $routes = Route::getRoutes();
        foreach ($routeNameList as $page) {
            $route = $routes->getByName($page);
            if (empty($route)) {
                continue;
            }
            $uriList[] = $routes->getByName($page)->uri;
        }
        
        return $uriList;
    }
    
    /**
     * @var array
     */
    protected $allUri = [];
    
    /**
     * Получение списка маршрутов для всех страниц и установка в свойство
     * @return static
     */
    public function initUriList()
    :static {
        
        $uriList = $this->getUriFromRoutes(array_keys($this->getContentPages()));
        $this->allUri = $uriList;
        
        return $this;
    }
    
    /**
     * Получение списка маршрутов для всех страниц из свойства
     * @return array
     */
    public function getUriList()
    :array {
        
        return $this->allUri;
    }
    
    /**
     * Получение списка маршрутов для всех страниц в формате для select
     * @return array
     */
    public function getPreparedForSelectUriList()
    :array {
        
        $uriList = $this->getUriList();
        $preparedUriList = [];
        foreach ($uriList as $uri) {
            $preparedUriList[$uri] = $uri;
        }
        
        return $preparedUriList;
    }
    
    
    /**
     * @param array $data
     *
     * @return PageMetaTag|null
     */
    public function create($uri, $translatedTitle, $translatedDescription = NULL, $translatedKeywords = NULL, $isTemplate = FALSE)
    :?PageMetaTag {
        
        $data = [
            PageMetaTagFields::URI => $uri,
            PageMetaTagFields::IS_TEMPLATE => $isTemplate,
            PageMetaTagFields::META_TAG_TITLE => $translatedTitle,
            PageMetaTagFields::META_TAG_DESCRIPTION => $translatedDescription,
            PageMetaTagFields::META_TAG_KEYWORDS => $translatedKeywords
        ];
        
        return $this->pageMetaTagRepository->create($data);
    }
    
    /**
     * Создание метатегов по умолчанию
     * @return void
     */
    public function createDefaultMetaTags()
    :void {
        
        if ($this->pageMetaTagRepository->getList()
                ->count() > 0) {
            return;
        }
        $default = config('app.name');
        $this->create('*', ['ru' => $default, 'en' => $default, 'uz' => $default]);
    }
    
    /**
     * @param string $uri
     *
     * @return PageMetaTag|null
     */
    public function getByURI(string $uri)
    :?PageMetaTag {
        
        return $this->pageMetaTagRepository->getByURI($uri);
    }
    
    /**
     * @return PageMetaTag|null
     */
    public function getDefault()
    :?PageMetaTag {
        
        return $this->pageMetaTagRepository->getByURI('*');
    }
    
    /**
     * Получение метатегов для текущей страницы
     * @return PageMetaTag|null
     */
    public function getCurrent()
    :?PageMetaTag {
        
        $uri = prepare_url_path(UrlAlias::current());
        $uri = $this->removeLocaleFromUri($uri);
        
        $metaTags = $this->getByURI($uri);
        
        if (empty($metaTags)) {
            $metaTags = $this->getDefault();
        }
        
        return $metaTags;
    }
    
    /**
     * Удаление локали из uri
     *
     * @param string $uri
     *
     * @return string
     */
    public function removeLocaleFromUri(string $uri)
    :string {
        
        if ($uri === 'ru' || $uri === 'en' || $uri === 'uz' || $uri === '/') {
            return '/';
        }
        $uri = explode('/', $uri);
        if (count($uri) > 1 && in_array($uri[0], ['ru', 'en', 'uz'])) {
            $uri = array_slice($uri, 1);
        }
        
        return implode('/', $uri);
    }
    
    /**
     * Получение метатегов для текущей страницы в виде html
     * @return string
     */
    public function getCurrentHtml()
    :string {
        
        $metaTags = $this->getCurrent();
        if (empty($metaTags)) {
            $metaTags = $this->getDefault();
            if (empty($metaTags))
                return '';
        }
        $meta = Meta::prependTitle($metaTags->getTitle());
        if (!empty($metaTags->getDescriptions())) {
            $meta = $meta->setDescription($metaTags->getDescriptions());
        }
        if (!empty($metaTags->getKeywords())) {
            $meta = $meta->setKeywords($metaTags->getKeywords());
        }
        
        return $meta->toHtml();
    }
}