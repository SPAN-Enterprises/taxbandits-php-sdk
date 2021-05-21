<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function get_webhook_status(Request $request)
    {  
        error_log($request);

    
        $data = json_decode($request, true);

        error_log($data);

        $myfile = fopen("webhook_status.txt", "a") or die("Unable to open file!");
       
        fwrite($myfile, $request);
    
        fclose($myfile);
            
    }

    public function get_webhook_responses()
    {  
        echo file_get_contents("webhook_status.txt");
    }

    public function get_webhook_esign_status(Request $request)
    {  
        error_log($request);

        $myfile = fopen("esign_status.txt", "a") or die("Unable to open file!");
       
        fwrite($myfile, $request);
    
        fclose($myfile);
            
    }

    public function get_webhook_esign_responses()
    {  
        echo file_get_contents("esign_status.txt");
    }
}
