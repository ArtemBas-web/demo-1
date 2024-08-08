<?php

namespace App\PageMetaTagDomain\Repositories;

use App\Models\PageMetaTag;

interface PageMetaTagRepository {
    
    /**
     * @param string $uri
     *
     * @return PageMetaTag|null
     */
    public function getByURI(string $uri)
    :?PageMetaTag;
    
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getList()
    :\Illuminate\Database\Eloquent\Collection;
    
    /**
     * @param array $data
     *
     * @return PageMetaTag|null
     */
    public function create(array $data)
    :?PageMetaTag;
}