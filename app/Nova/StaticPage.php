<?php

namespace App\Nova;

use App\Constants\EntityFields\StaticPageFields;
use App\Enums\PublishedStatusEnum;
use App\Nova\Filters\CommonTitleFilter;
use App\Nova\Filters\PublishedStatusFilter;
use App\Rules\UniqueTitleRule;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Kongulov\NovaTabTranslatable\TranslatableTabToRowTrait;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class StaticPage extends Resource {


    use TranslatableTabToRowTrait;

    /**
     * The model the resource corresponds to.
     * @var class-string<\App\Models\StaticPage>
     */
    public static $model = \App\Models\StaticPage::class;

    /**
     * Get the displayable label of the resource.
     * @return string
     */
    public static function label() {

        return 'Статические страницы';
    }

    /**
     * Get the displayable singular label of the resource.
     * @return string
     */
    public static function singularLabel() {

        return 'Статическая страница';
    }

    /**
     * Get the text for the create resource button.
     * @return string|null
     */
    public static function createButtonLabel() {

        return 'Добавить статическую страницу';
    }


    /**
     * The single value that should be used to represent the resource when being displayed.
     * @var string
     */
    public static $title = StaticPageFields::TITLE;

    /**
     * Indicates if the resource should be searchable on the index view.
     * @var bool
     */
    public static $searchable = FALSE;

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function fields(NovaRequest $request) {

        return [
            ID::make()
                ->sortable(),
            Text::make('Ключ статической страницы', StaticPageFields::PAGE_KEY)
                ->hideWhenUpdating()
                ->hideWhenCreating(),
            Text::make('Ссылка')
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->displayUsing(function($value, $model) {

                    $url = $model->getAliasURL(TRUE);

                    return '<a href="' . $url . '" style="color: #0000ff;" target="_blank">Перейти</a>';
                })
                ->asHtml(),

            Text::make('Ключ статической страницы', StaticPageFields::PAGE_KEY)
                ->onlyOnForms()
                ->hideWhenUpdating()
                ->rules('required', 'string', 'max:255', 'unique:static_pages,page_key,' . $this->model()->id)
                ->help('Введите короткий ключ статической страницы, который будет использоваться для обращения к ней в коде'),
            NovaTabTranslatable::make([

                Text::make('Заголовок', StaticPageFields::TITLE)
                    ->rules('required', 'string', 'max:255', new UniqueTitleRule($this->model(), $this->model()->id ?? NULL))
                    ->help('Введите название статической страницы, которое будет заголовком на сайте'),


                NovaTinyMCE::make('Наполнение', StaticPageFields::BODY)
                    ->options(self::editorOptions())
                    ->rules('required')
                    ->onlyOnForms(),


            ]),
            Select::make('Статус публикации', StaticPageFields::STATUS)
                ->options(PublishedStatusEnum::getValuesAsOption())
                ->displayUsingLabels()
                ->default(function($request) {

                    return 1;
                }),
            Date::make('Дата обновления', StaticPageFields::UPDATED_AT)
                ->sortable()
                ->onlyOnIndex()
                ->displayUsing(function($value, $model) {

                    return $model->updated_at->format('d.m.Y H:i:s');
                })
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function cards(NovaRequest $request) {

        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function filters(NovaRequest $request) {

        return [
            new CommonTitleFilter(Text::make('Заголовок', 'title')),
            new PublishedStatusFilter()
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function lenses(NovaRequest $request) {

        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     *
     * @return array
     */
    public function actions(NovaRequest $request) {

        return [];
    }


    /**
     * Determine if the current user can delete resources.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    public function authorizedToDelete(Request $request)
    :bool {

        //        $model = $this->model();
        //        if (in_array($model->getPageKey(), array_keys(\App\Constants\StaticPage::PAGE_KEY_LIST)))
        //            return FALSE;
        //
        return TRUE;
    }

    /**
     * Determine if the current user can replicate the given resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    public function authorizedToReplicate(Request $request) {

        return FALSE;
    }
}
