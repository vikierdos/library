<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
=======
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
>>>>>>> a7043f99f93028c712bab7f35327cf80c83cd855

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
<<<<<<< HEAD
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !Auth::user()->role === 0) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        return $next($request);
    }
=======
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !(Auth::user()->role===0)) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        return $next($request); //folytatódhat a kérés
    }

>>>>>>> a7043f99f93028c712bab7f35327cf80c83cd855
}
