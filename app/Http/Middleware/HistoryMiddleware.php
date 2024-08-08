<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HistoryMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {

        $routes = [
            'events.detail'
        ];
        $currentRoute = $request->route()
            ->getName();

        if (in_array($currentRoute, $routes)) {
            \App\Facades\RouteHistory::rememberRoute($request->fullUrl());
        }
        else {
            if (!in_array($currentRoute, ['login', 'login-post'])) {
                \App\Facades\RouteHistory::forgetRoute();
            }
        }

        return $next($request);
    }
}
