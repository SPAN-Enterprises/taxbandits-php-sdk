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
         ])->get( env('TBS_BASE_URL').'Business/List', [
            'Page' =>1,
            'PageSize' => 100,
            'FromDate' => '03/01/2021',
            'ToDate' => '12/31/2021',
        ]);

        return view('business_list',['businesses'=>$response['Businesses']]);
    }

    public function save_business()
    {
        $business=new Business();
        $business->setBusinessNm(request('business_name'));
        $business->setTradeNm(request('trade_nm'));
        $business->setIsEIN(request('is_ein'));
        $business->setEINorSSN(request('ein_or_ssn'));
        $business->setEmail(request('email'));
        $business->setContactNm(request('contact_nm'));
        $business->setPhone(request('phone'));
        $business->setPhoneExtn(request('phone_extn'));
        $business->setFax(request('fax'));
        $business->setBusinessType(request('business_name'));
        $business->setSigningAuthority(request('sa_name'));
        $business->setKindOfEmployer(request('kind_of_employer'));
        $business->setKindOfPayer(request('kind_of_payer'));
        $business->setIsBusinessTerminated(request('is_business_terminated'));
        $business->setIsForeign(request('is_foreign'));
        $business->setUSAddress(request('business_name'));
        $business->setForeignAddress(request('business_name'));
        $business->setBusinessId(request(null));

        if($business->getIsForeign()==true)
        {   
            $forienAddress=new ForeignAddress();
            $forienAddress->setAddress1(request('address1'));
            $forienAddress->setAddress2(request('address2'));
            $forienAddress->setCity(request('city'));
            $forienAddress->setProvinceOrStateNm(request('state'));
            $forienAddress->setCountry(request('country'));
            $forienAddress->setPostalCd(request('zip_cd'));
            $business->setForienAddress($forienAddress);
            
        }else
        {
            $usAddress=new USAddress();
            $usAddress->setAddress1(request('address1'));
            $usAddress->setAddress2(request('address2'));
            $usAddress->setCity(request('city'));
            $usAddress->setState(request('state_drop_down'));
            $usAddress->setZipCd(request('zip_cd'));
            $business->setUSAddress($usAddress);
        }
        $signingAuthority=new SigningAuthority();
        $signingAuthority->setName(request('sa_name'));
        $signingAuthority->setPhone(request('sa_phone'));
        $signingAuthority->setBusinessMemberType(request('business_member_type'));
        $business->setSigningAuthority($signingAuthority);

        
 
    $jwtController= new JwtController();

    $accessToken = $jwtController->generateToken();

    error_log($accessToken);

    $response= Http::withHeaders([
    
     'Authorization' =>  $accessToken
        ])->post(env('TBS_BASE_URL').'/Business/Create', 
        $business->toArray()
    );
    error_log($response);

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
