<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class AccessControlMiddleware
{
    use AuthorizesRequests;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ignore = config('accesscontrollist')['ignore.resources'];

        if (!in_array($request->route()->getName(), $ignore)) {
            $this->authorize($request->route()->getName());
        }

        return $next($request);
    }
}
