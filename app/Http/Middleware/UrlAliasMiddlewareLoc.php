<?php

namespace App\Http\Middleware;

use Closure;
use DragonCode\Support\Facades\Helpers\Str;
use Fomvasss\UrlAliases\Middleware\UrlAliasMiddleware;
use Fomvasss\UrlAliases\UrlAliasLocalization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UrlAliasMiddlewareLoc extends UrlAliasMiddleware {


    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $this->app = app();
        $this->config = $this->app['config'];

        if ($this->isAvailableMethod($request) && $this->isAvailableCheckPath($request)) {

            $path = $request->path();

            // Check localization support
            if ($this->useLocalization = $this->config->get('url-aliases.use_localization') && $this->isAvailableLocalizationPath($request)) {
                $localization = $this->app->make(UrlAliasLocalization::class);
                $localizationResult = $localization->prepareLocalizePath($request->path());

                if (isset($localizationResult['redirect'])) {
                    $params = count($request->all()) ? '?' . http_build_query($request->all()) : '';

                    // Hide default locale in URL
                    return redirect()->to($localizationResult['redirect'] . $params, 302);
                }
                elseif (isset($localizationResult['path'])) {
                    $path = $localizationResult['path'];
                }
            }

            $urlModels = $this->getByPath($path);

            // If visited source - system path
            if ($urlModel = $urlModels->where('source', $path)
                ->where('type', NULL)
                ->where('locale', $this->app->getLocale())
                ->first()) {
                $redirectStatus = $this->config->get('url-aliases.redirect_for_system_path', 301) == 301 ? 301 : 302;

                // Redirect to alias path
                $params = count($request->all()) ? '?' . http_build_query($request->all()) : '';

                if ($this->useLocalization) {
                    return redirect()->to(url($urlModel->localeAlias) . '/' . $params, $redirectStatus);
                }

                return redirect()->to(url($urlModel->alias) . '/' . $params, $redirectStatus);

                // If visited alias
            }
            elseif ($urlModel = $urlModels->where('alias', $path)
                ->where('locale', $this->app->getLocale())
                ->where('type', NULL)
                ->first()) {

                $newRequest = $this->makeNewRequest($request, $urlModel);

                return $next($newRequest);

                // If custom redirection
            }
            elseif ($urlModel = $urlModels->where('alias', $path)
                ->where('type', '<>', NULL)
                ->first()) {
                return redirect(url($urlModel->source), $urlModel->type);

                // Check if isset facet in current url and find aliased path without facet
            }
            elseif ($customReturn = $this->customize($request, $next, $path)) {
                return $customReturn;
            }
        }

        return $next($request);
    }

    /**
     * Remake request.
     *
     * @param Request $request
     * @param $urlModel
     *
     * @return Request
     */
    protected function makeNewRequest(Request $request, $urlModel, $getParams = []) {

        $newRequest = $request;
        $newRequest->server->set('REQUEST_URI', App::getLocale() . '/' . $urlModel->source);
        $newRequest->initialize($request->query->all(), $request->request->all(), $request->attributes->all(), $request->cookies->all(), $request->files->all(), $newRequest->server->all() + [
                'ALIAS_REQUEST_URI' => $request->path(),
                'ALIAS_ID' => $urlModel->id,
                'ALIAS_LOCALE_BOUND' => $urlModel->locale_bound
            ], $request->getContent());

        $newRequest->merge($getParams);

        return $newRequest;
    }

    /**
     * @param $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function customize($request, Closure $next, $path) {

        if (!in_array($path, ['ru', 'en', 'uz'])) {
            $ignore = $this->app['config']->get('url-aliases.ignored_paths');
            $isIgnore = FALSE;
            foreach ($ignore as $pattern) {
                if (Str::is($pattern, $path)) {
                    $isIgnore = TRUE;
                    break;
                }
            }
            if (!$isIgnore)
                $path = App::getLocale() . '/' . $path;
        }

        $newRequest = $request;
        $newRequest->server->set('REQUEST_URI', $path);
        $newRequest->initialize($request->query->all(), $request->request->all(), $request->attributes->all(), $request->cookies->all(), $request->files->all(), $newRequest->server->all(), $request->getContent());

        return $next($request);
    }
}
