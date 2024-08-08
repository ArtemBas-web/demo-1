<?php

namespace App\StaticPageDomain\Repositories;

use App\Constants\EntityFields\StaticPageFields;
use App\Models\StaticPage;

interface StaticPageRepository {
    
    /**
     * @param string $pageKey
     *
     * @return ?StaticPage
     */
    public function getByPageKey(string $pageKey)
    :?StaticPage;
    
    /**
     * @param array $keyList
     *
     * @return Collection|null
     */
    public function getTitleByKeyList(array $keyList = [])
    :?Collection;
    
    /**
     * @param string $pageKey
     * @param string $title
     * @param string $body
     * @param int $adminId
     *
     * @return StaticPage|null
     */
    public function create(string $pageKey, string $title, string $body, int $adminId)
    :?StaticPage;
}