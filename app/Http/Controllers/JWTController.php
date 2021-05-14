<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use \Firebase\JWT\JWT;

class JWTController extends Controller
{
   
    function get_access_token()
    {
        # Fetching current epoch time
        $ts = time();
    
        # Constructing payload
        $payload = array(
            "iss" => env("CLIENT_ID"),
            "sub" => env("CLIENT_ID"),
            "aud" => env("USER_TOKEN"),
            "iat" => $ts
        );
    
        # Generate JWS using the Client Id, Secret Id and User Token
        # JWS generation using HS256 algorithm
        $jws = JWT::encode($payload,  env("SECRET_ID"));

        # Returns the Access token generated using JWS
        $response= Http::withHeaders([
           
            'Authentication' => $jws
         ])->get(env("TBS_OAUTH_URL"));

        return $response['AccessToken'];
 
    }
}
