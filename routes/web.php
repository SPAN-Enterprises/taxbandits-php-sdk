<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
# Index Page
Route::get('/', 'App\Http\Controllers\BusinessController@index');

Route::post('/', function () {
 
    return OK;
});



# Get Business List
Route::get("business_list",'App\Http\Controllers\BusinessController@get_all_business_list')->middleware('jwt');

# Create Business - Get
Route::get('/create_business', function () {
 
    return view('create_business');
});

Route::post('/success','App\Http\Controllers\BusinessController@save_business')->middleware('jwt');

# FORM 1099 MISC

# Get Business list for form 1099 MISC
Route::get('/render_template_1099_misc_list','App\Http\Controllers\Form1099MiscController@get_all_business_list')->middleware('jwt');

# Get 1099-MISC list by BusinessId
Route::get('/form_1099_misc_list','App\Http\Controllers\Form1099MiscController@get_all_form_1099_misc_list_by_business_id')->middleware('jwt');

# Render 1099-MISC List Template
Route::get('/render_template_create_form_1099_misc','App\Http\Controllers\Form1099MiscController@create_form_1099_misc');

# On selecting business from drop down this method gets invoked
Route::post('/get_recipient_by_business_id_misc','App\Http\Controllers\Form1099MiscController@get_recipient_by_business_id')->middleware('jwt');

# Save Form 1099-MISC
Route::post('/save_form_1099_misc','App\Http\Controllers\Form1099MiscController@save_form_1099_misc')->middleware('jwt');

# Transmit Form 1099-MISC
Route::get('/transmit_form1099_misc','App\Http\Controllers\Form1099MiscController@transmit_form1099_misc')->middleware('jwt');

# FORM 1099 NEC

# Get Business list for form 1099 NEC
Route::get('/render_template_nec_list','App\Http\Controllers\Form1099NecController@get_all_business_list')->middleware('jwt');

# 1099-NEC List By BusinessId
Route::post('/form_1099_nec_list','App\Http\Controllers\Form1099NecController@get_all_form_1099_nec_list_by_business_id')->middleware('jwt');

# Render 1099-NEC List template
Route::get('/render_template_create_form_1099_nec','App\Http\Controllers\Form1099NecController@create_form_1099_nec');

# on selecting business from drop down this method gets invoked
Route::post('/get_recipient_by_business_id','App\Http\Controllers\Form1099NecController@get_recipient_by_business_id')->middleware('jwt');

# Save Form 1099 NEC
Route::post('/save_form_1099_nec','App\Http\Controllers\Form1099NecController@save_form_1099_nec')->middleware('jwt');

# Transmit Form 1099-NEC
Route::get('/transmit_form1099_nec','App\Http\Controllers\Form1099NecController@transmit_form1099_nec')->middleware('jwt');



# FORM W2

# Get Business list for form w2
Route::get('/render_template_w2_list','App\Http\Controllers\FormW2Controller@get_all_business_list')->middleware('jwt');

# W2C List By BusinessId
Route::post('/form_w2_list','App\Http\Controllers\FormW2Controller@get_all_form_w2_list_by_business_id')->middleware('jwt');

# Render w2 create template
Route::get('/render_template_create_form_w2','App\Http\Controllers\FormW2Controller@create_form_w2');

# Save Form W2
Route::post('/form_w2_success','App\Http\Controllers\FormW2Controller@save_form_w2')->middleware('jwt');

# Transmit Form W2
Route::get('/transmit_form_w2','App\Http\Controllers\FormW2Controller@transmit_form_w2')->middleware('jwt');


# FORM W9

# Load Payee List
Route::get('/render_template_w9','App\Http\Controllers\FormW9Controller@render_template_w9');

# View the Form W9
Route::get('/form_w9_view','App\Http\Controllers\FormW9Controller@form_w9_view')->middleware('jwt');


# Webhook

# Receive Webhook status response
Route::post('/webhook_status','App\Http\Controllers\WebhookController@get_webhook_status');

# Get recently received webhook  List
Route::get('/webhook_responses','App\Http\Controllers\WebhookController@get_webhook_responses');




# Receive Webhook Esign response
Route::post('/webhook_esign_status','App\Http\Controllers\WebhookController@get_webhook_esign_status');

# Get recently received webhook Esign  List
Route::get('/webhook_esign_responses','App\Http\Controllers\WebhookController@get_webhook_esign_responses');











