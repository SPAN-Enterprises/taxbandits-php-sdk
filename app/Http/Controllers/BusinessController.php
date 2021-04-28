<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\JWTController;
use Eastwest\Json\Facades\Json;

class BusinessController extends Controller
{
    public function get_all_business_list()
    {

        $jwtController= new JwtController();

        $accessToken = $jwtController->generateToken();

        error_log($accessToken);

        $response1= Http::withHeaders([
           
            'Authentication' =>  $accessToken
         ])->get('https://testoauth.expressauth.net/v2/tbsauth');
       
        $response= Http::withHeaders([
           
            'Authorization' =>  $response1['AccessToken']
         ])->get('https://testapi.taxbandits.com/v1.6.1/Business/List', [
            'Page' =>1,
            'PageSize' => 100,
            'FromDate' => '03/01/2021',
            'ToDate' => '12/31/2021',
        ]);

        return view('business_list',['businesses'=>$response['Businesses']]);
    }
}
