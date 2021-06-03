<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user()->hasRole('super-admin')) {
            session()->flash('flash.banner', 'Access denied!');
            session()->flash('flash.bannerStyle', 'danger');
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
