<?php

namespace App\Http\Middleware;

use Closure;

class RequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header("Access-Control-Allow-Origin","*");
        $response->header("Access-Control-Allow-Headers","Origin,Content-Type,Cookie,Accept");
        $response->header("Access-Control-Allow-Method","GET,POST,PUT,PATCH");
        $response->header("Access-Control-Allow-Credentials","false");
        return $response;
    }
}
