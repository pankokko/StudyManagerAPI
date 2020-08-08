<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    protected $user_redirect = 'user.login';
    protected $admin_redirect = 'admin.login';

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Route::is('user.*')) {
                return route($this->user_redirect);
            } elseif (Route::is('admin.*')) {
                return route($this->admin_redirect);
            }
        }
    }
}
