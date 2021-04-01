<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
  protected $table = 'product_size';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
   */
  protected $fillable = [
    'product_id', 'size_id'
  ];

  public function insertProductSize($data){
  	return ProductSize::create($data);
  }
  public function getListProductSizeByProduct($productId){
  	return ProductSize::leftJoin('sizes', 'sizes.id', '=', 'product_size.size_id')
          ->select('product_size.*', 'sizes.name')
          ->where('product_id', '=', $productId)->orderBy('created_at','desc')->get();
  }
  public function deleteProductSizeByProduct($id){
  	return ProductSize::where('product_id', '=', $id)->delete();
  }
}
