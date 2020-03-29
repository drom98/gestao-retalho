<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
<<<<<<< HEAD
        if (Auth::guard($guard)->check()) {
            if($guard == 'admin') {
                //utilizador autenticado com a guarda admin
                return redirect()->route('admin.home');
            }
            return redirect()->route('home');
=======
        if (Auth::guard($guard)->check() && $guard === 'web') {
            return redirect(RouteServiceProvider::HOME);
>>>>>>> master
        }

        if (Auth::guard($guard)->check() && $guard === 'admin') {
            return redirect('/admin');
        }

        return $next($request);
    }
}
