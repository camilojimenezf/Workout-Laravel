<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\JwtAuth;

class CheckAuth
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
        $hash = $request->header('Authorization', null);
        if (is_null($hash)) {
            throw new \Illuminate\Auth\AuthenticationException('No Autorizado!');
        }
        $jwtAuth = new JwtAuth();
        $checkToken = $jwtAuth -> checkToken($hash);
        if ($checkToken) {
            return $next($request);
        } else {
            throw new \Illuminate\Auth\AuthenticationException('No Autenticado!');
        }
    }
}
