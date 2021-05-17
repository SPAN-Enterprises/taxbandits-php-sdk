<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\BusinessController;
use Eastwest\Json\Facades\Json;
use App\Models\FormList;
use Session;

class Form1099MiscController extends Controller
{

    # Returns list of all the businesses
    public function get_all_business_list()
    {
        $businessController= new BusinessController();

        return view('form_1099_misc_list',['businesses'=>$businessController->getBusinessList()['Businesses']]);
        
    }
    #Lists all Form 1099-MISC returns created and transmitted on the account for a particular Submission or Payer. 
    #Form 1099-MISC returns will be listed based on the filters sent in the Request.
    # Method: Form1099MISC/List (GET)
    public function get_misc_list_by_business_id($business_id)
    {
        

        $response= Http::withHeaders([
           
            'Authorization' =>  Session::get('jwt_access_token')
         ])->get(env('TBS_BASE_URL').'Form1099MISC/List',[
            'BusinessId' =>$business_id,
            'Page' =>1,
            'PageSize' => 100,
            'FromDate' => '03/01/2021',
            'ToDate' => '12/31/2021',
        ]);
            
        return $response;
    }



    # Returns MISC List of specific business Id
    public function get_all_form_1099_misc_list_by_business_id(Request $request)
    {
            
        return $this->get_misc_list_by_business_id($request->BusinessId);
        
    }

   # Render Create Form 1099-MISC Template
    public function create_form_1099_misc()
    {

        $businessController= new BusinessController();

        return view('create_form_1099_misc',['businesses'=>$businessController->getBusinessList()['Businesses']]);

    }
    # Returns Recipient List of specific business Id
    public function get_recipient_by_business_id(Request $request)
    {

        return $this->get_misc_list_by_business_id($request->BusinessId);
    }

    # Creates 1099-MISC returns in TaxBandits. You can send multiple 1099-MISC forms in a single request for the same Payer.
    # Method: Form1099MISC/Create (POST)
    public function save_form_1099_misc(Request $request)
    {

    
        $form1099MiscCreateRequest =  array(

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
     
    
        $response= Http::withHeaders([
            'Authorization' =>  Session::get('jwt_access_token')
         ])->post( env('TBS_BASE_URL').'FormW2/Create', 
           $form1099NECCreateRequest
        );

        error_log($response);
            
        return $response;
    }

    
}
