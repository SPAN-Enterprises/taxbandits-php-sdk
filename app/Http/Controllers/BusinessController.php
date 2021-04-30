<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\JWTController;
use Eastwest\Json\Facades\Json;
use App\Models\Business;
use App\Models\ForeignAddress;
use App\Models\USAddress;
use App\Models\SigningAuthority;

class BusinessController extends Controller
{
    public function get_all_business_list()
    {

        $jwtController= new JwtController();

        $accessToken = $jwtController->generateToken();

        error_log($accessToken);

        $response= Http::withHeaders([
           
            'Authorization' =>  $accessToken
         ])->get('https://testapi.taxbandits.com/v1.6.1/Business/List', [
            'Page' =>1,
            'PageSize' => 100,
            'FromDate' => '03/01/2021',
            'ToDate' => '12/31/2021',
        ]);

        return view('business_list',['businesses'=>$response['Businesses']]);
    }

    public function save_business()
    {

       $data_array =  array(
        "BusinessNm" => request('business_name'),
        "TradeNm" => request('trade_nm'),
        "IsEIN" =>isset($_POST['is_ein']),
        "EINorSSN" => request('ein_or_ssn'),
        "Email" => request('email'),
        "ContactNm" => request('contact_nm'),
        "Phone" => request('phone'),
        "PhoneExtn" => request('phone_extn'),
        "Fax" => request('fax'),
        "IsForeign" =>request('is_foreign'),

        $ForeignAddress    = array(
         "Address1"  => request('address1'),
         "Address2" => request('address2'),
         "City"  => request('city'),
         "ProvinceOrStateNm"  => request('state'),
         "Country"  => request('country'),
         "PostalCd"  => request('zip_cd')
        ),
        "ForienAddress" =>$ForeignAddress,

        $USAddress    = array(
         "Address1"  => request('address1'),
         "Address2"       => request('address2'),
         "City"  => request('city'),
         "State"  => request('state_drop_down'),
         "ZipCd"  => request('zip_cd')
        ),
         "USAddress" =>$USAddress,

        $SigningAuthority    = array(
         "Name"  => request('sa_name'),
         "Phome" => request('sa_phone'),
        ),
        "SigningAuthority" =>$SigningAuthority
      );
 
    error_log(json_encode( $data_array));
 
    $jwtController= new JwtController();

    $accessToken = $jwtController->generateToken();

    error_log($accessToken);

    $response= Http::withHeaders([
    
     'Authorization' =>  $accessToken
        ])->post('https://testapi.taxbandits.com/v1.6.1/Business/Create', 
        $data_array
    );
    error_log($response);

    return view('/success');
    }
}
