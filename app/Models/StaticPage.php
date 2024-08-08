<?php

namespace App\Models;

use App\Constants\EntityFields\StaticPageFields;
use App\Contracts\HasUrlAlias;
use App\Traits\InteractsWithUrlAlias;
use App\Traits\Scopes\ScopeActive;
use Fomvasss\UrlAliases\Traits\UrlAliasable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;
use App\PageMetaTagDomain\Traits\PageMetaTag;

/**
 *
 */
class StaticPage extends Model implements HasUrlAlias {

    use HasFactory, InteractsWithUrlAlias, UrlAliasable, HasTranslations, PageMetaTag, ScopeActive;

    /**
     * @var array
     */
    public $translatable = [
        StaticPageFields::TITLE,
        StaticPageFields::BODY
    ];

    /**
     * @var array
     */
    protected $fillable = [
        StaticPageFields::PAGE_KEY,
        StaticPageFields::TITLE,
        StaticPageFields::BODY,
        StaticPageFields::STATUS,
        StaticPageFields::ADMIN_ID,
    ];

    /**
     * Получение полного пути к странице
     *
     * @return string
     */
    private function getPageKeyWithPrefix()
    :string {

        if (!empty(\App\Constants\StaticPage::PAGE_KEY_LIST[$this->page_key])) {
            $route = \App\Constants\StaticPage::PAGE_KEY_LIST[$this->page_key]['prefix_path'];
            $route = $route . $this->page_key;

            return $route;
        }

        return '';
    }

    /**
     * Для работы с мета-тегами
     *
     * @return string[]
     */
    private function getPageKeyWithPrefiList()
    :array {

        return [
            'ru' => $this->getPageKeyWithPrefix(),
            'en' => $this->getPageKeyWithPrefix(),
            'uz' => $this->getPageKeyWithPrefix()
        ];
    }

    /**
     * @return void
     */
    protected static function boot() {

        parent::boot();

        static::creating(function($model) {

            $model->rechangePageKey();
        });

        static::created(function($model) {

            $model->createAlias();
            $model->createPageMetaTag($model->getPageKeyWithPrefiList());
        });
        static::updating(function($model) {

            $model->deleteAlias();
            $model->createAlias();
            $model->updatePageMetaTag($model->getPageKeyWithPrefix(), $model->getPageKeyWithPrefiList());
        });

        static::deleting(function($model) {

            $model->removePageMetaTag($model->getPageKeyWithPrefix());
            $model->deleteAlias();
        });
    }

    /**
     * Создание псевдонима (ключа) для страницы
     * @return void
     */
    public function rechangePageKey() {

        $this->page_key = Str::slug(Str::lower($this->page_key));
    }

    /**
     * Получение маршрута для детальной странице материала
     * @return string
     */
    public function getDetailRoute()
    :string {

        return route('static-page', ['page' => $this], FALSE);
    }

    /**
     * Префикс для псевдонима (ссылка на материал)
     * @return string
     */
    public function getAliasPrefix()
    :string {

        return 'static-pages/';
    }

    /**
     * @param bool $absolute
     *
     * @return string
     */
    public function getAliasURL($absolute = FALSE) {

        $relativeLink = $this->getAliasPrefix() . Str::slug(Str::lower($this->title));

        return $absolute ? config('app.url') . '/' . $relativeLink : $relativeLink;
    }

    /**
     * @return array
     */
    public function getTitles()
    :array {

        return $this->getTranslations('title', ['ru', 'en', 'uz']);
    }
}
