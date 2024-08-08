<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Constants\EntityFields\StaticPageFields;
use App\Models\StaticPage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


/**
 *
 */
class StaticPageRepository implements \App\StaticPageDomain\Repositories\StaticPageRepository {
    
    /**
     * @var Model
     */
    protected Model $model;
    
    /**
     * @param Model $model
     */
    public function __construct() {
        
        $this->model = new StaticPage();
    }
    
    /**
     * @param string $pageKey
     *
     * @return ?StaticPage
     */
    public function getByPageKey(string $pageKey)
    :?StaticPage {
        
        return $this->model->active()
            ->where(StaticPageFields::PAGE_KEY, $pageKey)
            ->first();
    }
    
    /**
     * @param array $keyList
     *
     * @return Collection|null
     */
    public function getTitleByKeyList(array $keyList = [])
    :?Collection {
        
        return $this->model->active()
            ->whereIn(StaticPageFields::PAGE_KEY, $keyList)
            ->get(['title', 'page_key']);
    }
    
    /**
     * @param string $pageKey
     * @param string $title
     * @param string $body
     * @param int $adminId
     *
     * @return StaticPage|null
     */
    public function create(string $pageKey, string $title, string $body, int $adminId)
    :?StaticPage {
        
        try {
            return $this->model->create([
                StaticPageFields::PAGE_KEY => $pageKey,
                StaticPageFields::TITLE => $title,
                StaticPageFields::BODY => $body,
                StaticPageFields::ADMIN_ID => $adminId
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            
            return NULL;
        }
        
    }
}
