<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('admin_logged_in') || Session::get('admin_logged_in') !== true) {
            return redirect()->route('admin.login')->withErrors(['email' => 'You must log in to access the admin panel.']);
        }

        return $next($request);
    }
}
