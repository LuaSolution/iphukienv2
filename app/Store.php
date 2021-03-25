<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  protected $table = 'store';

  public function insertStore($data){
  	return Store::insert($data);
  }

  public function updateStore($id,$data){
  	return Store::where('id', '=', $id)->update($data);
  }

  public function getStoreById($id){
  	return Store::where('id', '=', $id)->first();
  }
  public function getStoreBySlug($slug){
    return Store::where('slug', '=', $slug)->first();
  }
  public function getListStore(){
  	return Store::orderBy('pos', 'asc')->orderBy('created_at','desc')->get();
  }
  public function deleteStore($id){
  	return Store::where('id', '=', $id)->delete();
  }
  public function getListStoreRelate($slug){
    return Store::where('slug', '!=', $slug)->orderBy('pos', 'asc')->orderBy('created_at','desc')->limit(8)->get();
  }
}
