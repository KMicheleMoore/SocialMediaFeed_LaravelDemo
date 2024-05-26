<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->hasRole('User Administrator')) {
            return $next($request);
        } else {
            return redirect(route('home'))
                ->with('status', 'Denied: You do not have permissions to access User Management')
                ->with('status_type', 'danger');
        }
    }
}
