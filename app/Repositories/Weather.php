<?php
namespace App\Repositories;

use App\WeatherModel;
use App\Repositories\IWeatherInterface;

use Illuminate\Support\Facades\Config;


class Weather implements IWeatherInterface{
    protected $weather;
    public function __construct(WeatherModel $weather)
    {
        $this->weather = $weather;
    }

    public function getWeatherByCity($weather){
        return WeatherModel::select('name','id')->find($weather);
    }
    public function check_weather_api($city){
        $result = $this->_post_api($city);
        $decoded_res = json_decode($result,true);
        $status_code = $decoded_res['cod'];
       
        if($status_code==200){
            $city_id = $decoded_res['id'];
            
            $find_city = $this->getWeatherByCity($city_id);
           
            if(!empty( $find_city)){
                $city_data = $find_city->getOriginal();
                if ($city_data['id']==$city_id) {

                    $update_data = [
                        'coord'=>json_encode($decoded_res['coord'])??'',
                        'main'=>json_encode($decoded_res['main'])??'',
                        'wind'=>json_encode($decoded_res['wind'])??'',
                        'clouds'=>json_encode($decoded_res['clouds'])??'',
                        'sys'=>json_encode($decoded_res['sys'])??'',
                        'timezone'=>$decoded_res['timezone'],
                        'dt'=>$decoded_res['dt']
                    ];
                    WeatherModel::updateData($city_id, $update_data);
                    $ret = $decoded_res['name'].' Data Updated';
                }
            }
            else{
                $this->weather->id = $city_id;
                $this->weather->name = $decoded_res['name'];
                $this->weather->coord = json_encode($decoded_res['coord'])??'';
                $this->weather->main = json_encode($decoded_res['main'])??'';
                $this->weather->wind = json_encode($decoded_res['wind'])??'';
                $this->weather->clouds = json_encode($decoded_res['clouds'])??'';
                $this->weather->sys = json_encode($decoded_res['sys'])??'';
                $this->weather->timezone = $decoded_res['timezone'];
                $this->weather->dt = $decoded_res['dt'];
                $this->weather->save();
                $ret =   $this->weather->name.' Data Inserted';
            }         
        }
        else{
            $ret = 'Not a valid city';
        }
        return $ret;
    }

    private function _post_api($city){
        $WEATHER_URL = Config::get('constants.open_weather.WEATHER_URL');
        $WEATHER_APPID = Config::get('constants.open_weather.WEATHER_APPID');
        $endpoint = $WEATHER_URL.'?q='.$city.'&appid='.$WEATHER_APPID;
        $ch = curl_init();  
        curl_setopt_array($ch, 
                [CURLOPT_URL => $endpoint,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => ["Cache-Control: no-cache"]
            ]);
        $response = curl_exec($ch);
        return $response;        
    }
}