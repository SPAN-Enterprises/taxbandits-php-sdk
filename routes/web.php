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