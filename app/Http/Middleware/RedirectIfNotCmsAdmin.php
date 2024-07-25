<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotCmsAdmin
{
    public function handle($request, Closure $next, $guard = 'cms_admin')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}