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

Route::get('/', function () {
 
    return view('index');
});


Route::get("business_list",'App\Http\Controllers\BusinessController@get_all_business_list');


Route::get('/create_business', function () {
 
    return view('create_business');
});

Route::post('/success','App\Http\Controllers\BusinessController@save_business');



Route::get('/render_template_1099_misc_list','App\Http\Controllers\Form1099MiscController@get_all_business_list');

Route::get('/form_1099_misc_list','App\Http\Controllers\Form1099MiscController@get_all_form_1099_misc_list_by_business_id');



Route::get('/render_template_nec_list','App\Http\Controllers\Form1099NecController@get_all_business_list');

Route::post('/form_1099_nec_list','App\Http\Controllers\Form1099NecController@get_all_form_1099_nec_list_by_business_id');



Route::get('/render_template_w2_list','App\Http\Controllers\FormW2Controller@get_all_business_list');

Route::post('/form_w2_list','App\Http\Controllers\FormW2Controller@get_all_form_w2_list_by_business_id');



