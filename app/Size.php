<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
  protected $table = 'sizes';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'category_id'
  ];

  public function insertSize($data){
  	return Size::create($data);
  }
  public function updateSize($id,$data){
  	return Size::where('id', '=', $id)->update($data);
  }
  public function getListSizeByCategory($catId){
  	return Size::where('category_id', '=', $catId)->orderBy('created_at','desc')->get();
  }
  public function getSizeById($id){
  	return Size::where('id', '=', $id)->first();
  }
  public function getListSize(){
  	return Size::orderBy('created_at','desc')->get();
  }
  public function deleteSize($id){
  	return Size::where('id', '=', $id)->delete();
  }
}