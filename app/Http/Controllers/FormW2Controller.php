<?php

namespace App\Http\Controllers;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\BusinessController;
use Eastwest\Json\Facades\Json;
use Session;

class FormW2Controller extends Controller
{
    # Returns list of all the businesses
    public function get_all_business_list()
    {
        $businessController= new BusinessController();

        return view('form_w2_list',['businesses'=>$businessController->getBusinessList()['Businesses']]);
       
    }
    
    #LIST endpoint lets you list the basic details of all the returns irrespective of their record status. 
    #List can be customized by sending values corresponding to its optional parameters, which gets applied as filters to the list.
    public function get_all_form_w2_list_by_business_id(Request $request)
    {

        $response= Http::withHeaders([
           
            'Authorization' =>  Session::get('jwt_access_token')
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

    # Render create Form W2 Template
    public function create_form_w2()
    {
        
    

        return view('create_form_w2');
    }

    #The CREATE endpoint takes in the Request Payload, validates data, applies the business rules, and creates the appropriate tax return
    public function save_form_w2(Request $request)
    {
        error_log(request('W2Forms_Business_BusinessNm'));
        $FormW2Request =  array(

           

            "ReturnHeader" => array(

                "Business"=>array(
                    "BusinessNm"  => (request('W2Forms_Business_BusinessNm')),
                    "TradeNm"=>"LLC",
                    "IsEIN"=>true,
                    "EINorSSN"  => (request('W2Forms_Business_EINorSSN')),
                    "Email"  => (request('W2Forms_Business_Email')),
                    "ContactNm"  => (request('W2Forms_Business_ContactNm')),
                    "Phone"  => (request('W2Forms_Business_Phone')),
                    "KindOfEmployer"  => (request('W2Forms_Business_KindOfEmployer')),
                    "KindOfPayer"  => (request('W2Forms_Business_KindOfPayer')),
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

            
            "ReturnData"=> array(

                array(
                    "SequenceId"  => 1,
                    "Employee"=> array(
                        "SSN"  => request('W2Forms_Employee_SSN'),
                        "FirstNm"  => request('W2Forms_Employee_FirstNm'),
                        "MiddleNm"  => request('W2Forms_Employee_MiddleNm'),
                        "LastNm"  => request('W2Forms_Employee_LastNm'),
                        "Email"  =>  request('W2Forms_Employee_Email'),
                        "Phone"  =>  request('W2Forms_Employee_Phone'),
                        "IsForeign"  =>  false,
                        "USAddress"  => array(
                            "Address1"  => "1751 Kinsey Rd",
                            "Address2"  => "Main St",
                            "City"  => "Charlotte",
                            "State"  => "NC",
                            "ZipCd"  => "28201"
                        )
                    ),                                                                                                              

                    "W2FormData"=> array(
                        "B1Wages"  => request('W2Forms_FormDetails_Box1'),
                        "B2FedTaxWH"  => request('W2Forms_FormDetails_Box2'),
                        "B3SocSecWages"  => request('W2Forms_FormDetails_Box3'),
                        "B4SocSecTaxWH"  => request('W2Forms_FormDetails_Box4')
                    
                    )
                )
            )
        );
        error_log(json_encode($FormW2Request));

        $response= Http::withHeaders([
            'Authorization' =>  Session::get('jwt_access_token')
         ])->post( env('TBS_BASE_URL').'FormW2/Create', 
           $FormW2Request
        );

        error_log($response);
            
        return $response;
    }

    public function transmit_form_w2(Request $request)
    {

        $response= Http::withHeaders([
            'Authorization' =>  Session::get('jwt_access_token')
         ])->post( env('TBS_BASE_URL').'FormW2/Transmit',[ 
         'SubmissionId' =>$request->submissionId,
         ]);

        error_log($response);

        if ($response!=null)
        {
            if ($response['StatusCode'] == 200){
    
                $responseJson='Status Timestamp=' . $response['FormW2Records']['SuccessRecords'][0]['StatusTs'];
                $ErrorMessage='Status= ' . $response['FormW2Records']['SuccessRecords'][0]['Status'];
                $ButtonText="Form 1099-MISC";
                $FormType="MISC";

                return view('success', ['response'=>$responseJson],['ErrorMessage'=>$ErrorMessage],['formtype'=>$FormType],['button'=>$ButtonText]);
            }

            elseif ($response['Errors'] !=null)
            {
    
                 $errorList=$response['Errors'];
                 $status=$response['StatusCode'] . " - " . $response['StatusName'] . " - " . $response['StatusMessage'];

                return view('error_list',['errorList'=>$errorList],['status'=>$status]);
            }
            else{

                $responses='StatusMessage=' . $response['StatusCode'];
                $ErrorMessage='Message=' . $response;
                return view('success', ['response'=>$responses],['ErrorMessage'=>$ErrorMessage]);
            }
        }
    }


    
}
