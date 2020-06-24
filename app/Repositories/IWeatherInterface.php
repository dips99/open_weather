<?php

namespace App\Repositories;

use App\WeatherModel;

interface IWeatherInterface
{
    public function getWeatherByCity(WeatherModel $weather);
    public function check_weather_api($city);
}