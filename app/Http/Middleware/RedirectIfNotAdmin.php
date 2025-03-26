<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && Auth::user()->role == 'admin' || Auth::user()->role == 'tenaga kesehatan') {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->role == 'wali') {
            return redirect('/wali');
        }
        if (Auth::check() && Auth::user()->role == 'kepala') {
            return redirect('/pimpinan');
        }
    }
}
