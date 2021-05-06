<?php


namespace App\Http\Controllers;
use App\Http\Resources\ProjectResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\JWTController;
use Eastwest\Json\Facades\Json;
use App\Models\Business;
use App\Models\ForeignAddress;
use App\Models\USAddress;
use App\Models\SigningAuthority;
use App\Models\Form1099NECCreateRequest;
use App\Models\ReturnHeader;
use App\Models\SubmissionManifest;
use App\Models\ScheduleFiling;
use App\Models\ReturnData;
use App\Models\Recipient;
use App\Models\NECFormData;
use App\Models\States;

class Form1099NecController extends Controller
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
        

        return view('form_1099_nec_list',['businesses'=>$response['Businesses']]);
        
    }

    public function get_all_form_1099_nec_list_by_business_id(Request $request)
    {

        $jwtController= new JwtController();

        $accessToken = $jwtController->generateToken();

        error_log($accessToken);

        $response= Http::withHeaders([
           
            'Authorization' =>  $accessToken
         ])->get( env('TBS_BASE_URL').'Form1099NEC/List', [
            'BusinessId' =>$request->BusinessId,
            'Page' =>1,
            'PageSize' => 100,
            'FromDate' => '03/01/2021',
            'ToDate' => '12/31/2021',
        ]);

       
        error_log($response);
            
        return $response;


        
    }

    public function create_form_1099_nec()
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

        return view('create_form_1099_nec',['businesses'=>$response['Businesses']]);
    }

    public function get_recipient_by_business_id(Request $request)
    {
    
        $jwtController= new JwtController();

        $accessToken = $jwtController->generateToken();

        error_log($accessToken);

        $response= Http::withHeaders([
            'Authorization' =>  $accessToken
         ])->get( env('TBS_BASE_URL').'Form1099NEC/List', [
            'BusinessId' =>$request->BusinessId,
            'Page' =>1,
            'PageSize' => 100,
            'FromDate' => '03/01/2021',
            'ToDate' => '12/31/2021',
        ]);

        error_log($response);
            
        return $response;
    }

    public function save_form_1099_nec(Request $request)
    {

    
        $form1099NECCreateRequest =  array(

            "ReturnHeader" => array(

                "Business"=>array(

                    "BusinessId"=>(request('business_list'))
                )
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

                    "Recipient"=> array(
                        "RecipientId"  => (request('recipientsDropDown') != '-1') ? request('recipientsDropDown') : null,
                        "TINType"  => "EIN",
                        "TIN"  => request('rTIN'),
                        "FirstPayeeNm"  => request('rName'),
                        "SecondPayeeNm"  => "",
                        "IsForeign"  => false,
                        "USAddress"  => array(
                            "Address1"  => request('address1'),
                            "Address2"       => request('address2'),
                            "City"  => request('city'),
                            "State"  => request('state_drop_down'),
                            "ZipCd"  => request('zip_cd')
                        ),
                        "Email"  => "subbu+php@spanllc.com",
                        "Fax"  => "1234567890",
                        "Phone"  => "1234567890"
                    ),                                                                                                              

                    "NECFormData"=> array(

                        "B1NEC"  => request('amount'),
                        "B4FedTaxWH"  => 54.12,
                        "IsFATCA"  =>true,
                        "Is2ndTINnot"  => true,
                        "AccountNum"  => "20123130000009000001",
                        "States"=> array(
                            array(
                            "StateCd"  =>"PA",
                            "StateWH"  =>15,
                            "StateIdNum"  =>"99999999",
                            "StateIncome"  =>16),
                            array(
                                "StateCd"  =>"AZ",
                                "StateWH"  =>14,
                                "StateIdNum"  =>"99-9999999",
                                "StateIncome"  =>16)
                        ),
                    
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
           $form1099NECCreateRequest
        );

        error_log($response);
            
        return $response;
    }

    

    

    
    
}
