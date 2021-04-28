<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Firebase\JWT\JWT;

class JWTController extends Controller
{
    function generateToken()
    {
            
            # config values
        $jwtKey = "u6v1CPFsL1GuNNz4ipnRw";  # Client Secret
        $jwtClientId = "9757c9c24be51be5";  # Client Id
        $jwtUserToken = "3519b7e697384a0391d93485e07d60ee";  # User Token
        $authUrl = "https://testoauth.expressauth.net/v2/tbsauth";
    
        # Fetching current epoch time
        $ts = time();
    
        # Constructing payload
        $payload = array(
            "iss" => $jwtClientId,
            "sub" => $jwtClientId,
            "aud" => $jwtUserToken,
            "iat" => $ts
        );
    
        //create JWS 
        $jws = JWT::encode($payload, $jwtKey);

        
        return $jws;
       
        


        
    }
}
