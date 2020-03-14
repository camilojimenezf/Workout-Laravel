<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\JwtAuth;

class CheckAthlete
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
        $jwtAuth = new JwtAuth();
        $checkToken = $jwtAuth -> checkToken($hash, true);
        if (isset($checkToken) && is_object($checkToken) && $checkToken->role == 'ATHLETE') {
            return $next($request);
        } else {
            throw new \Illuminate\Auth\AuthenticationException('No Autorizado!');
        }
    }
}
