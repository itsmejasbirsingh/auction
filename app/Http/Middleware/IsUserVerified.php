<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Closure;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUserVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user() && ($request->user()->is_verified || $request->user()->is_admin)) {
            return $next($request);
        }
        Auth::guard('web')->logout();
        return redirect(RouteServiceProvider::HOME);
    }
}
