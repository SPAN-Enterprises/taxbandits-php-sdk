<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\JWTController;
use Eastwest\Json\Facades\Json;

class FormW9Controller extends Controller
{
    public function render_template_w9()
    {

        function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

        $Payees= array(
            array(
                "PayeeName"  => "Subbu",
                "Email"  => "subbu@spanllc.com",
                "uid"  => GUID()
            )
        );


        


        return view('form_w9_list',['Payees'=>$Payees]);


        
    }

    public function form_w9_view(Request $request)
    {
        $jwtController= new JwtController();

        $accessToken = $jwtController->generateToken();

       

        $response= Http::withHeaders([
            'Authorization' =>  $accessToken
         ])->get( env('TBS_BASE_URL').'FormW9/RequestByUrl',[
            'AccountNum' =>$request->uid,
            'BusinessId'=> 'bc1f60c5-4b72-49e0-bf51-697bd5a5035f']
        );

       

        return view('form_w9_view',['FormW9'=>$response]);
    }


    
    

    
}
