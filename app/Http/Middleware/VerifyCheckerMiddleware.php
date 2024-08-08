<?php

namespace App\Http\Middleware;

use App\Exceptions\UserIsBlockedException;
use App\Exceptions\UserIsNotVerifyException;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class VerifyCheckerMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * @throws UserIsBlockedException
     * @throws UserIsNotVerifyException
     */
    public function handle(Request $request, Closure $next) {

        $user = Auth::guard('web')
            ->user();
        if (empty($user))
            return $next($request);

        if ($user->isBlocked()) {
            throw new UserIsBlockedException();
        }
        $currentRouteName = Route::getCurrentRoute()
            ->getName();
        if ($user->isVerified() && !in_array($currentRouteName, [
                'verification.notice',
                'verification.verify',
                'verification.send',
                'logout'
            ])) {
            throw new UserIsNotVerifyException();
        }

        return $next($request);
    }
}
