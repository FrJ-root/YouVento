<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;

// class StudentMiddleware
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
//      * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
//      */
//     public function handle(Request $request, Closure $next)
//     {
//         return $next($request);
//     }
// }

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentMiddleware{
    public function handle(Request $request, \Closure $next){
        if (Auth::check() && Auth::user()->role === 'student') {
            return $next($request);
        }
        return redirect('/');
    }
}