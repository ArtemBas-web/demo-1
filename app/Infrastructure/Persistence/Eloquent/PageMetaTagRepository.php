<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Models\PageMetaTag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

/**
 *
 */
class PageMetaTagRepository implements \App\PageMetaTagDomain\Repositories\PageMetaTagRepository {
    
    /**
     * @var Model
     */
    protected Model $model;
    
    /**
     * @param Model $model
     */
    public function __construct() {
        
        $this->model = new PageMetaTag();
    }
    
    /**
     * @param string $uri
     *
     * @return PageMetaTag|null
     */
    public function getByURI(string $uri)
    :?PageMetaTag {
        
        if (!Schema::hasTable($this->model->getTable()))
            return NULL;
        
        return $this->model->query()
            ->where('uri', 'LIKE', '%"' . $uri . '"%')
            ->first();
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function getList()
    :\Illuminate\Database\Eloquent\Collection|array {
        
        return $this->model->query()
            ->get();
    }
    
    /**
     * @param array $data
     *
     * @return PageMetaTag|null
     */
    public function create(array $data)
    :?PageMetaTag {
        
        if (!Schema::hasTable($this->model->getTable()))
            return NULL;
        
        try {
            
            $pageMetaTag = new PageMetaTag();
            $pageMetaTag->uri = $data['uri'];
            $pageMetaTag->is_template = $data['is_template'];
            $pageMetaTag->meta_tag_title = $data['meta_tag_title'];
            $pageMetaTag->meta_tag_description = $data['meta_tag_description'];
            $pageMetaTag->meta_tag_keywords = $data['meta_tag_keywords'];
            $pageMetaTag->save();
            
            return $pageMetaTag;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            
            return NULL;
        }
    }
}
