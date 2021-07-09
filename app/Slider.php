<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
  protected $table = 'sliders';

  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

  protected $fillable = [
    'image'
  ];

  public function getAll() {
    return Slider::all();
  }

  public function insertSlider($data){
  	return Slider::create($data);
  }

  public function getSliderById($id){
  	return Slider::where('id', $id)->first();
  }

  public function updateSlider($id,$data){
  	return Slider::where('id', $id)->update($data);
  }

}