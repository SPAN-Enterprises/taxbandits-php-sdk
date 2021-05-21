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
use Session;

class BusinessController extends Controller
{

    public function index()
    {
            $jwtController= new JwtController();
    
            $accessToken = $jwtController-> get_access_token();
    
            error_log($accessToken);

            return view('index');
    }
    



    # Returns Lists every business created for a date range.
    # Method: Business/List (POST)
    public function getBusinessList()
    {
    
            $response= Http::withHeaders([
               
                'Authorization' =>  Session::get('jwt_access_token')
             ])->get( env('TBS_BASE_URL').'Business/List', [
                'Page' =>1,
                'PageSize' => 100,
                'FromDate' => '03/01/2021',
                'ToDate' => '12/31/2021',
            ]);

            return $response;    
    }


    # Returns list of all the businesses
    public function get_all_business_list()
    {
        

        return view('business_list',['businesses'=>$this->getBusinessList()['Businesses']]);
    }

    # Creates a new Business and returns Business Id on successful creation
    # Method: Business/Create (POST)
    public function save_business()
    {

        

        $business =  array(
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

    $response= Http::withHeaders([
    
     'Authorization' =>  Session::get('jwt_access_token')
        ])->post(env('TBS_BASE_URL').'/Business/Create', 
        $business
    );
    

    if ($response['StatusCode'] == 200)
    {

        $responseJson = "StatusMessage= " . $response['StatusMessage'] . "<br>BusinessId = " . $response['BusinessId'];

        $ErrorMessage="Business Created Successfully";

        $formtype="Businesses";

        return view('success', ['response'=>$responseJson],['ErrorMessage'=>$ErrorMessage],['formtype'=>$formtype]);
    }

    elseif ($response['Errors'] !=null)
    {
        
        return view('error_list',  ['errorList'=>$response['Errors']] , ['status'=>$response['StatusCode'] . $response['StatusName'] . $response['StatusMessage']]);
    }

    else{

        return view('success', ['response'=>$response='StatusMessage=' . response['StatusCode']],
                               ['ErrorMessage'=>$ErrorMessage='Message=' . $response]);
   
    }
}
}
