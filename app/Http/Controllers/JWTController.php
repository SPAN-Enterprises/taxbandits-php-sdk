<?php

namespace App\Http\Controllers;
use Config;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use \Firebase\JWT\JWT;
use Session;

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

         Session::put('jwt_access_token', $response['AccessToken']);
         Session::put('access_token_generated_time', date("m/d/Y H:i:s"));
         Session::put('token_expires_in', $response['ExpiresIn']);

    
       

        

        return $response['AccessToken'];
 
    }
}

