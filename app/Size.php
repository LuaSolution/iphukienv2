<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

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
  	return Size::orderBy('created_at','desc')->get();
  }
  public function getListSizeByCate($catId){
    $res = Product::where('category_id', $catId)->distinct()->pluck('size_id')->toArray();
    $res2 = Size::whereIn('id', $res)->get();
    return $res2;
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