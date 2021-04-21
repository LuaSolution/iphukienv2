<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
  protected $table = 'partners';

  /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

  protected $fillable = [
    'image'
  ];

  public function getAll() {
    return Partner::all();
  }

  public function insertPartner($data){
  	return Partner::create($data);
  }

  public function getPartnerById($id){
  	return Partner::where('id', $id)->first();
  }

  public function updatePartner($id,$data){
  	return Partner::where('id', $id)->update($data);
  }

  public function deletePartner($id)
  {
    return Partner::where('id', '=', $id)->delete();
  }
}
