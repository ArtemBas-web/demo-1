<?php

namespace App\StaticPageDomain\Entities;

/**
 *
 */
class StaticPage {
    
    /**
     * @var int
     */
    private int $id;
    
    /**
     * @var string
     */
    private string $page_key;
    
    /**
     * @var string
     */
    private string $title;
    
    /**
     * @var string
     */
    private string $body;
    
    /**
     * @var string
     */
    private string $status;
    
    /**
     * @var int
     */
    private int $admin_id;
    
    /**
     * @param int $id
     * @param string $page_key
     * @param string $title
     * @param string $body
     * @param string $status
     * @param int $admin_id
     */
    public function __construct(int $id, string $page_key, string $title, string $body, string $status, int $admin_id) {
        
        $this->id = $id;
        $this->page_key = $page_key;
        $this->title = $title;
        $this->body = $body;
        $this->status = $status;
        $this->admin_id = $admin_id;
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
    public function getPageKey()
    :string {
        
        return $this->page_key;
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
    public function getBody()
    :string {
        
        return $this->body;
    }
    
    /**
     * @return string
     */
    public function getStatus()
    :string {
        
        return $this->status;
    }
    
    /**
     * @return int
     */
    public function getAdminId()
    :int {
        
        return $this->admin_id;
    }
    
}