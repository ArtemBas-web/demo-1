<?php

namespace App\Models;

use App\Constants\EntityFields\PageMetaTagFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 *
 */
class PageMetaTag extends Model {

    use HasFactory, HasTranslations;

    /**
     * @var array
     */
    public $translatable = [
        PageMetaTagFields::URI,
        PageMetaTagFields::META_TAG_TITLE,
        PageMetaTagFields::META_TAG_DESCRIPTION,
        PageMetaTagFields::META_TAG_KEYWORDS
    ];

    /**
     * @var string
     */
    protected $table = 'page_meta_tags';

    /**
     * @var string[]
     */
    protected $casts = [
        PageMetaTagFields::CREATED_AT => 'datetime',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        PageMetaTagFields::URI,
        PageMetaTagFields::IS_TEMPLATE,
        PageMetaTagFields::META_TAG_TITLE,
        PageMetaTagFields::META_TAG_DESCRIPTION,
        PageMetaTagFields::META_TAG_KEYWORDS,
    ];
    
}
