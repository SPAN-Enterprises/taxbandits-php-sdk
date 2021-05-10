<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use \Firebase\JWT\JWT;

class JWTController extends Controller
{
    function generateToken()
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
    
        //create JWS 
        $jws = JWT::encode($payload,  env("SECRET_ID"));


        $response= Http::withHeaders([
           
            'Authentication' => $jws
         ])->get(env("TSB_OAUTH_URL"));

        return $response['AccessToken'];
       
        


        
    }
}
