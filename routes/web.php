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
    return view('welcome');
});

Route::get("weather","WeatherController@index");

Route::post('check-weather',"WeatherController@check_weather");

Route::get("palindrome","StringsController@index");

Route::post('check-palindrome',"StringsController@check_palindrome");
