<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
  protected $table = 'config';

  public function getConfig(){
  	return Config::where('id', '=', 1)->first();
  }

  public function updateConfig($data){
  	return Config::where('id', '=', 1)->update($data);
  }
}
