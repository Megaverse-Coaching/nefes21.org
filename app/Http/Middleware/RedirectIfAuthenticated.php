<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param  string|null  ...$guards
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards): mixed
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            switch ($guard){
                case 'admin' : (!Auth::guard('admin')->check()) ? redirect('/admin/login') : redirect(theme()->getPageUrl(RouteServiceProvider::ADMIN)); break;
                case 'user' : (!Auth::guard('user')->check()) ? redirect('/login') : redirect(theme()->getPageUrl(RouteServiceProvider::HOME)); break;
//                default : (!Auth::guard('user')->check()) ? redirect(theme()->getPageUrl('/login')) : redirect(theme()->getPageUrl(RouteServiceProvider::HOME)); break;
            }
        }
        return $next($request);
    }
}
