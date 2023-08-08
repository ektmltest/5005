<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check())
            if (auth()->user()->hasAnyPermission()) {
                return $next($request);
            } else {
                session()->flash('error', __('errors.unauthorized'));
                return redirect()->route('home');
            }
        else
            return redirect()->route('login');
    }
}
