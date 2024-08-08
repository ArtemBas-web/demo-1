<?php

namespace App\PageMetaTagDomain\Entities;

/**
 *
 */
class PageMetaTag {
    /**
     * @var int
     */
    private int $id;
    
    /**
     * @var string
     */
    private string $uri;
    
    /**
     * @var string
     */
    private string $title;
    
    /**
     * @var string
     */
    private string $description;
    
    /**
     * @var string
     */
    private string $keywords;
    
    /**
     * @var bool
     */
    private bool $isTemplate;
    
    /**
     * @param int $id
     * @param string $uri
     * @param string $title
     * @param string $description
     * @param string $keywords
     * @param bool $isTemplate
     */
    public function __construct(int $id, string $uri, string $title, string $description, string $keywords, bool $isTemplate = FALSE) {
        
        $this->id = $id;
        $this->uri = $uri;
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
        $this->isTemplate = $isTemplate;
    }
    
    
    /**
     * @return int
     */
    public function getId()
    :int {
        
        return $this->id;
    }
    
    
    /**
     * @return string
     */
    public function getUri()
    :string {
        
        return $this->uri;
    }
    
    
    /**
     * @return string
     */
    public function getTitle()
    :string {
        
        return $this->title;
    }
    
    
    /**
     * @return string
     */
    public function getDescription()
    :string {
        
        return $this->description;
    }
    
    
    /**
     * @return string
     */
    public function getKeywords()
    :string {
        
        return $this->keywords;
    }
    
    
    /**
     * @return bool
     */
    public function isTemplate()
    :bool {
        
        return $this->isTemplate;
    }
}