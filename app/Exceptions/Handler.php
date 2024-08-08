<?php

namespace App\Exceptions;

use App\Services\StackMessages;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;
use Throwable;

class Handler extends ExceptionHandler {
    /**
     * A list of the exception types that are not reported.
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [//
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     * @return void
     */
    public function register() {

        $this->reportable(function(Throwable $e) {
            //
        });


        $this->renderable(function(UserIsBlockedException $e, $request) {

            $stackMessage = new StackMessages();
            $stackMessage->add('error', __('auth.account-is-blocked'));
            Auth::guard('web')
                ->logout();

            return redirect($e->redirectTo());
        });
        $this->renderable(function(UserIsNotVerifyException $e, $request) {

            return redirect($e->redirectTo());
        });

        $this->reportable(function(EventPriceNotFoundException $e) {

        });
    }
}
