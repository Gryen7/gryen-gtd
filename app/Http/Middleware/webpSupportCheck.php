<?php

namespace App\Http\Middleware;

use Closure;

class webpSupportCheck
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
        $request->wepb = preg_match('/image\/webp/', $request->header('Accept'));
        return $next($request);
    }
}
