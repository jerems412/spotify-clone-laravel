<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class spaceAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('user') -> roles[0] -> id == 1) {
            # code...
            return $next($request);
        } else {
            # code...
            abort(403);
        }
    }
}
