<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
  protected $table = 'sale_products';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'product_id', 'from_date', 'to_date', 'sale_price', 'created_at', 'updated_at'
  ];

  public function insertSaleProduct($data){
  	return SaleProduct::create($data);
  }
  public function updateSaleProduct($id,$data){
  	return SaleProduct::where('id', '=', $id)->update($data);
  }

  public function getSaleProductById($id){
  	return SaleProduct::where('id', '=', $id)->first();
  }
  public function getListSaleProduct(){
  	return SaleProduct::leftJoin('products', 'products.id', '=', 'sale_products.product_id')
          ->select('sale_products.*', 'products.name as product_name')
          ->orderBy('created_at','desc')->get();
  }
  public function deleteSaleProduct($id){
  	return SaleProduct::where('id', '=', $id)->delete();
  }
}