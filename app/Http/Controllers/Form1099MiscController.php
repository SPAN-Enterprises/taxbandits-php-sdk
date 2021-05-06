<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\JWTController;
use Eastwest\Json\Facades\Json;
use App\Models\FormList;

class Form1099MiscController extends Controller
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

        return view('form_1099_misc_list',['businesses'=>$response['Businesses']]);
        
    }

    public function get_all_form_1099_misc_list_by_business_id(Request $request)
    {

        $jwtController= new JwtController();

        $accessToken = $jwtController->generateToken();

        error_log($accessToken);

        $response= Http::withHeaders([
           
            'Authorization' =>  $accessToken
         ])->get(env('TBS_BASE_URL').'Form1099MISC/List',[
            'BusinessId' =>$request->BusinessId,
            'Page' =>1,
            'PageSize' => 100,
            'FromDate' => '03/01/2021',
            'ToDate' => '12/31/2021',
        ]);

       
        error_log($response);
            
        return $response;

        
    }

    public function create_form_1099_misc()
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

        return view('create_form_1099_misc',['businesses'=>$response['Businesses']]);
    }

    public function get_recipient_by_business_id(Request $request)
    {
    
        $jwtController= new JwtController();

        $accessToken = $jwtController->generateToken();

        error_log($accessToken);

        $response= Http::withHeaders([
            'Authorization' =>  $accessToken
         ])->get( env('TBS_BASE_URL').'Form1099MISC/List', [
            'BusinessId' =>$request->BusinessId,
            'Page' =>1,
            'PageSize' => 100,
            'FromDate' => '03/01/2021',
            'ToDate' => '12/31/2021',
        ]);

        error_log($response);
            
        return $response;
    }

    public function save_form_1099_misc(Request $request)
    {

    
        $form1099NECCreateRequest =  array(

            "ReturnHeader" => array(

                "Business"=>array(

                    "BusinessId"=>(request('MISCForms_Business_BusinessId'))
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
                        "RecipientId"  => (request('MISCForms_Recipient_RecipientId') != '-1') ? request('MISCForms_Recipient_RecipientId') : null,
                        "TINType"  => "EIN",
                        "TIN"  => request('MISCForms_Recipient_TIN'),
                        "FirstPayeeNm"  => request('MISCForms_Recipient_RecipientNm'),
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

                    "MISCFormData"=> array(

                        "B1Rents"  => request('MISCForms_MISCFormDetails_Box1'),
                        "B2Royalties"  => request('MISCForms_MISCFormDetails_Box2'),
                        "B3OtherIncome"  =>request('MISCForms_MISCFormDetails_Box3'),
                        "B4FedIncomeTaxWH" =>request('MISCForms_MISCFormDetails_Box4'),
                        "B5FishingBoatProceeds"  => 0,
                        "B6MedHealthcarePymts"  => 0,
                        "B7IsDirectSale"  => false,
                        "B8SubstitutePymts"  => 0,
                        "B9CropInsurance"  => 0,
                        "B10GrossProceeds"  => 0,
                        "B12Sec409ADeferrals"  => 0,
                        "B14NonQualDefComp"  => 0,
                        "B13EPP"  => 0,
                        "IsFATCA"  => true,
                        "AccountNum"  => 587879879879,
                        "Is2ndTINnot"  => 0,
                        

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
         ])->post( env('TBS_BASE_URL').'Form1099MISC/Create', 
           $form1099NECCreateRequest
        );

        error_log($response);
            
        return $response;
    }

    
}
