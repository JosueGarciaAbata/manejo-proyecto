<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            //return route('login');
            if ($request->routeIs('author.*')) {
                session()->flash('fail', 'You must sign in first.');
                return route('audmin.login', ['fail' => true, 'returnUrl' => URL::current()]);
            }
        }
    }
}