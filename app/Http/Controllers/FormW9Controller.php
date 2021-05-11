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
                "PayeeName"  => "Heidie Daleman",
                "Email"  => "hdaleman0@soundcloud.comedit",
                "uid"  => GUID()
            ),
            array(
                "PayeeName"  => "Cornall Gagg",
                "Email"  => "cgagg1@howstuffworks.comedit",
                "uid"  => GUID()
            ),
            array(
                "PayeeName"  => "Babbette Heustice",
                "Email"  => "bheustice2@independent.co.ukedit",
                "uid"  => GUID()
            ),
            array(
                "PayeeName"  => " Arvin Caudrey",
                "Email"  => "acaudrey3@shareasale.comedit",
                "uid"  => GUID()
            ),
            array(
                "PayeeName"  => "  Dominique Phebee",
                "Email"  => "dphebee4@intel.comedit",
                "uid"  => GUID()
            ),
            array(
                "PayeeName"  => "Juliet Dudin",
                "Email"  => "jdudin5@google.fredit",
                "uid"  => GUID()
            ),
            array(
                "PayeeName"  => "Gayla Kimm",
                "Email"  => "gkimm6@yandex.ruedit",
                "uid"  => GUID()
            ),array(
                "PayeeName"  => "Miof mela Roskelley",
                "Email"  => "mroskelley8@rambler.ruedit",
                "uid"  => GUID()
            ),
            array(
                "PayeeName"  => "Gusella Rolston",
                "Email"  => "grolston9@jugem.jpedit",
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
            'AccountNum' =>$request->uid]
        );

       

        return view('form_w9_view',['FormW9'=>$response]);
    }


    
    

    
}
