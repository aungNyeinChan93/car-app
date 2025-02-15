<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsNotSuspendedMIddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (collect($request->user()->roles)->contains(fn($role) => $role->name === 'suspended')) {
            abort(403, 'Your account is suspended !');
        }
        return $next($request);
    }
}
