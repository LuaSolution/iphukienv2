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
  public function getListTrademarkByCate($catId)
    {
        $res = Product::where('category_id', $catId)->distinct()->pluck('trademark_id')->toArray();
        $res2 = Trademark::whereIn('id', $res)->get();
        return $res2;
    }
  public function deleteTrademark($id){
  	return Trademark::where('id', '=', $id)->delete();
  }
}