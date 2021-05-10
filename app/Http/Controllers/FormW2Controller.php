<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\JWTController;
use Eastwest\Json\Facades\Json;

class FormW2Controller extends Controller
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
        
        error_log($response);
        return view('form_w2_list',['businesses'=>$response['Businesses']]);
        
    }

    public function get_all_form_w2_list_by_business_id(Request $request)
    {
        $jwtController= new JwtController();

        $accessToken = $jwtController->generateToken();

        error_log($accessToken);

        $response= Http::withHeaders([
           
            'Authorization' =>  $accessToken
         ])->get( env('TBS_BASE_URL').'FormW2/List', [
            'BusinessId' =>$request->BusinessId,
            'Page' =>1,
            'PageSize' => 100,
            'FromDate' => '03/01/2021',
            'ToDate' => date("m/d/Y"),
        ]);

       
    error_log($response);
           
    return $response;


        
    }

    public function create_form_w2()
    {
        return view('create_form_w2');
    }

    public function save_form_w2()
    {

        $FormW2Request =  array(

            "ReturnHeader" => array(

                "Business"=>array(
                    "BusinessNm"=>(request('W2Forms[0].Business.BusinessNm')),
                    "TradeNm"=>"LLC",
                    "IsEIN"=>true,
                    "EINorSSN"=>(request('W2Forms[0].Business.EINorSSN')),
                    "Email"=>(request('W2Forms[0].Business.Email')),
                    "ContactNm"=>(request('W2Forms[0].Business.ContactNm')),
                    "Phone"=>(request('W2Forms[0].Business.Phone')),
                    "KindOfEmployer"=>(request('W2Forms[0].Business.KindOfEmployer')),
                    "KindOfPayer"=>(request('W2Forms[0].Business.KindOfPayer')),
                    "IsForeign"=>false,
                    "USAddress"  => array(
                        "Address1"  => "1751 Kinsey Rd",
                        "Address2"  => "Main St",
                        "City"  => "Dothan",
                        "State"  => "AL",
                        "ZipCd"  => "36303"
                    )
                ),
                
            ),

            "SubmissionManifest"=> array(
                "TaxYear"  => 2020,
                "IsFederalFiling" => true,
                "IsStateFiling"  => true,
                "IsPostal"  => true,
                "IsOnlineAccess"  => true,
                "IsTinMatching"  => true,
                "IsScheduleFiling"  => true,

                "ScheduleFiling"  =>   array(
                    "EfileDate"=> date('m/d/Y')
                )
            ),

            
            "ReturnDataFormW2"=> array(

                array(
                    "SequenceId"  => 1,
                    "Recipient"=> array(
                        "SSN"  => "W2Forms[0].Employee.SSN",
                        "FirstNm"  => request('W2Forms[0].Employee.FirstNm'),
                        "MiddleNm"  => request('W2Forms[0].Employee.MiddleNm'),
                        "LastNm"  => request('W2Forms[0].Employee.LastNm'),
                        "Email"  =>  request('W2Forms[0].Employee.Email'),
                        "Phone"  =>  request('W2Forms[0].Employee.Phone'),
                        "IsForeign"  =>  false,
                        "USAddress"  => array(
                            "Address1"  => "1751 Kinsey Rd",
                            "Address2"  => "Main St",
                            "City"  => "Charlotte",
                            "State"  => "NC",
                            "ZipCd"  => "28201"
                        )
                    ),                                                                                                              

                    "NECFormData"=> array(
                        "B1Wages"  => request('W2Forms[0].FormDetails.Box1'),
                        "B2FedTaxWH"  => request('W2Forms[0].FormDetails.Box2'),
                        "B3SocSecWages"  =>request('W2Forms[0].FormDetails.Box3'),
                        "B4SocSecTaxWH"  => request('W2Forms[0].FormDetails.Box4')
                    
                    )
                )
            )
        );
     
        $jwtController= new JwtController();

        $accessToken = $jwtController->generateToken();

        error_log($accessToken);

        $response= Http::withHeaders([
            'Authorization' =>  $accessToken
         ])->post( env('TBS_BASE_URL').'Form1099NEC/Create', 
           $FormW2Request
        );

        error_log($response);
            
        return $response;
    }

    


    
}
