<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\App;

class UserIsBlockedException extends Exception
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
    public function __construct(string $message = 'Your account is blocked', $redirectTo = '/')
    {

        $message= __($message);
        parent::__construct($message);

        $this->redirectTo = $redirectTo.App::getlocale();
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
