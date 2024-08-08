<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\App;

class UserIsNotVerifyException extends Exception
{

    /**
     * The path the user should be redirected to.
     *
     * @var string|null
     */
    protected $redirectTo;

    /**
     * Create a new authentication exception.
     *
     * @param string $message
     * @param  string|null  $redirectTo
     *
     * @return void
     */
    public function __construct(string $message = '', $redirectTo = '/verify-email')
    {
        parent::__construct($message);

        $this->redirectTo = '/'.App::getlocale().$redirectTo;
    }

    /**
     * Get the path the user should be redirected to.
     *
     * @return string|null
     */
    public function redirectTo()
    {
        return $this->redirectTo;
    }
}
