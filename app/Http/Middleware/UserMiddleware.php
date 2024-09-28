<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        

        //condition
        // if (auth()->user()->role == 'user') {
        //     return $next($request);
        // } else {
        //     return redirect('/');
        // }


        # Check user
        // if (Auth::check() && Auth::user()->role == 'customer') {
        //     return $next($request);
        // } else {
        //     return redirect()->route('login');
        // }


        if (auth()->user()->role == 'customer') {

            return $next($request);
        }
        return redirect('home')->with('error', "You don't have admin access.");

        
    }
}
