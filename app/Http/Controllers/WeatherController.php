<?php

namespace App\Http\Controllers;

use App\Repositories\IWeatherInterface;


use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weather;
    public function __construct(IWeatherInterface $weather)
    {
      $this->weather = $weather;
    }  

    public function index()
    {
      return view('city');
    }

    public function check_weather(Request $request){
      $city = $request->input('city_name');
      $response = $this->weather->check_weather_api($city);
      return view('result', compact('city','response'));
    }

}