<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  protected $table = 'cart';

  public function insertGetIdCart($data){
  	return Cart::insertGetId($data);
  }

  public function updateCart($id,$data){
  	return Cart::where('id', '=', $id)->update($data);
  }

  public function getCartById($id){
  	return Cart::where('id', '=', $id)->first();
  }
  public function getListCart(){
  	return Cart::orderBy('status', 'asc')->orderBy('created_at','desc')->get();
  }
  public function deleteCart($id){
  	return Cart::where('id', '=', $id)->delete();
  }
}
