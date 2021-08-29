<?php

namespace App\Http\Middleware;

use App\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if(User::where(['user_type'=>3])->exists())
           {
            return redirect('admin.home');
           }
        elseif (! $request->expectsJson()) {

            return route('login');
        }
    }
}
