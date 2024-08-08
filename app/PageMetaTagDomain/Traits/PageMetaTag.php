<?php

namespace App\PageMetaTagDomain\Traits;

use App\Services\PageMetaTagService;

trait PageMetaTag {
    
    /**
     * Добавление специальных суффиксов к URI
     * @return array
     */
    public function getAdditionalUriSuffixList()
    :array {
        
        return [];
    }
    
    /**
     * @return string
     */
    public function getTitles()
    :array {
        
        return $this->getTranslations('title');
    }
    
    
    /**
     * @param string $suffix
     * @param array $uriList
     *
     * @return array
     */
    private function getChangedUriListBySuffix(string $suffix, array $uriList)
    :array {
        
        $newUriList = [];
        foreach ($uriList as $locale => $uri) {
            $newUriList[$locale] = $uri . $suffix;
        }
        
        return $newUriList;
    }
    
    /**
     * @param array $uri
     *
     * @return void
     */
    public function createPageMetaTag(array $uriList)
    :void {
        
        if (empty($uriList)) {
            return;
        }
        $pageMetaTag = app(PageMetaTagService::class);
        
        if (!empty($this->getAdditionalUriSuffixList())) {
            
            foreach ($this->getAdditionalUriSuffixList() as $suffix => $translations) {
                $pageMetaTag->create($this->getChangedUriListBySuffix($suffix, $uriList), $translations);
            }
        }
        $pageMetaTag->create($uriList, $this->getTitles());
    }
    
    
    /**
     * @param string $oldUri
     * @param array $newUriList
     *
     * @return void
     */
    public function updatePageMetaTag(string $oldUri, array $newUriList)
    :void {
        
        if (empty($oldUri) || empty($newUriList)) {
            return;
        }
        
        $pageMetaTagService = app(PageMetaTagService::class);
        $pageMetaTag = $pageMetaTagService->getByURI($oldUri);
        if (empty($pageMetaTag)) {
            $this->createPageMetaTag($newUriList);
            
            return;
        }
        try {
            $pageMetaTag->uri = $newUriList;
            $pageMetaTag->meta_tag_title = $this->getTitles();
            $pageMetaTag->save();
            if (!empty($this->getAdditionalUriSuffixList())) {
                foreach ($this->getAdditionalUriSuffixList() as $suffix => $translations) {
                    $pageMetaTag = $pageMetaTagService->getByURI($oldUri . $suffix);
                    if (empty($pageMetaTag)) {
                        $pageMetaTagService->create($this->getChangedUriListBySuffix($suffix, $newUriList), $translations);
                    }
                    else {
                        $pageMetaTag->uri = $this->getChangedUriListBySuffix($suffix, $newUriList);
                        $pageMetaTag->meta_tag_title = $translations;
                        $pageMetaTag->save();
                    }
                }
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
    
    /**
     * @param string $uri
     *
     * @return bool
     */
    public function removePageMetaTag(string $uri)
    :bool {
        
        if (empty($uri)) {
            return FALSE;
        }
        
        $pageMetaTag = app(PageMetaTagService::class)->getByURI($uri);
        if (empty($pageMetaTag)) {
            return FALSE;
        }
        $pageMetaTag->delete();
        if (!empty($this->getAdditionalUriSuffixList())) {
            foreach ($this->getAdditionalUriSuffixList() as $suffix) {
                $pageMetaTag = app(PageMetaTagService::class)->getByURI($uri . $suffix);
                if (!empty($pageMetaTag)) {
                    $pageMetaTag->delete();
                }
            }
        }
        
        return TRUE;
    }
}