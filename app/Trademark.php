<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
  protected $table = 'trademarks';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name'
  ];

  public function insertTrademark($data){
  	return Trademark::create($data);
  }
  public function updateTrademark($id,$data){
  	return Trademark::where('id', '=', $id)->update($data);
  }

  public function getTrademarkById($id){
  	return Trademark::where('id', '=', $id)->first();
  }
  public function getListTrademark(){
  	return Trademark::orderBy('created_at','desc')->get();
  }
  public function deleteTrademark($id){
  	return Trademark::where('id', '=', $id)->delete();
  }
}