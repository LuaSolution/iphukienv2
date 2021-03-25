<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
  protected $table = 'cate';

  public function insertCate($data){
  	return Cate::insert($data);
  }

  public function updateCate($id,$data){
  	return Cate::where('id', '=', $id)->update($data);
  }

  public function getCateById($id){
  	return Cate::where('id', '=', $id)->first();
  }
  public function getCateBySlug($slug){
    return Cate::where('slug', '=', $slug)->first();
  }
  public function getListCate(){
  	return Cate::orderBy('pos', 'asc')->orderBy('created_at','desc')->get();
  }
  public function deleteCate($id){
  	return Cate::where('id', '=', $id)->delete();
  }
  public function getListCateRelate($slug){
    return Cate::where('slug', '!=', $slug)->orderBy('pos', 'asc')->orderBy('created_at','desc')->limit(8)->get();
  }
}
