<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Session;

class VerifyJwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $current_time=date("m/d/Y H:i:s");

        $accessToken = Session::get('jwt_access_token');

        $token_generated_time = Session::get('access_token_generated_time');

        $token_expires_in = Session::get('token_expires_in');

        error_log($token_generated_time);

        error_log($token_expires_in);

        $min =(strtotime($current_time) - strtotime($token_generated_time) ) / 60;

        error_log($min);

        if($min<$token_expires_in) {

            return  $next($request);
        }else{
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        
    }
}
