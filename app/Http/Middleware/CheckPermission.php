<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission): Response
    {
        if (auth()->check()) {
            // dd(Permission::all());
            // if ($permission == 'manage-projects-categories')
            //     dd(auth()->user()->permissions);
            if (!auth()->user()->hasPermission($permission)) {
                return redirect()->route('admin.errors.not-found', 'errors/404');
            }

            return $next($request);
        } else
            return redirect()->route('login');
    }
}
