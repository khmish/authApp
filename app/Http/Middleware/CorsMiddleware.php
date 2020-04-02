<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
        header("Access-Control-Allow-Origin: *");

        $headers = [
        'Access-Control-Allow-Methods'=> '*',
        'Access-Control-Allow-Headers'=> '*'
        ];
        // if($request->getMethod() == "OPTIONS") {

        // return response()->make('OK', 200, $headers);
        // }

        $response = $next($request);
        foreach($headers as $key => $value)
        $response->header($key, $value);
        return $response;
    }
}
