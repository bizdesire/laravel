<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiUser
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
        //    print_r($request->user());
        //    die;

        // return response()->json(['message' => $request->user()], 200);
        return $next($request);
    }
}
