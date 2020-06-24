<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class WeatherModel extends Model
{
    protected $table = 'weather';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'dt'];
    public $incrementing = false;
    public $timestamps = false;

    public static function updateData($id,$data){
        DB::table('weather')
          ->where('id', $id)
          ->update($data);
      }
    
}
