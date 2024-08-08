<?php

namespace App\Http\Controllers;

use App\StaticPageDomain\Services\StaticPageService;
use Illuminate\Http\Request;

/**
 *
 */
class StaticPageController extends Controller {


    /**
     * @var StaticPageService
     */
    protected StaticPageService $staticPageService;

    /**
     * @param StaticPageService $staticPageService
     */
    public function __construct(StaticPageService $staticPageService) {

        $this->staticPageService = $staticPageService;
    }


    /**
     * @param StaticPage $page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(StaticPage $page)
    :\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
       
        $breadcrumbs = FALSE;
        if (!$page->isPublished())
            abort(404);

        return view('pages.page', compact('page', 'breadcrumbs'));
    }

    /**
     * @param $pageKey
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function page($pageKey)
    :\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application {

        $page = $this->staticPageService->getByPageKey($pageKey);
        if (empty($page))
            abort(404);
        $breadcrumbs = TRUE;

        return view('pages.page', compact('page', 'breadcrumbs'));
    }
}
