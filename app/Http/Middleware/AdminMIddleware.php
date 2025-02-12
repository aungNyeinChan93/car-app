<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMIddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        foreach ($request->user()->roles as $role) {
            if ($role->name === 'admin' || $role->name === 'superAdmin') {
                return $next($request);
            }
        }
        abort(403, 'admin only');
    }
}
