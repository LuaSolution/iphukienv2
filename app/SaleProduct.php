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
  	return SaleProduct::leftJoin('products', 'products.id', '=', 'sale_products.product_id')
          ->select('sale_products.*', 'products.name as product_name')
          ->where('sale_products.id', '=', $id)->first();
  }
  public function getListSaleProduct(){
  	return SaleProduct::leftJoin('products', 'products.id', '=', 'sale_products.product_id')
          ->select('sale_products.*', 'products.name as product_name')
          ->orderBy('created_at','desc')->get();
  }
  public function deleteSaleProduct($id){
  	return SaleProduct::where('id', '=', $id)->delete();
  }
  public function getListValidSaleProduct(){
        return SaleProduct::leftJoin('products', 'products.id', '=', 'sale_products.product_id')
        ->select('sale_products.*', 'products.name as product_name', 'products.short_description as product_des', 'products.price as origin_price')
        ->whereRaw('? >= from_date', [date("Y-m-d H:i:s")])
        ->whereRaw('? <= to_date', [date("Y-m-d H:i:s")])
        ->orderBy('created_at','desc')->get();
  }
  public function checkProductIsSale($productId){
        return SaleProduct::where('product_id', '=', $productId)
        ->whereRaw('? >= from_date', [date("Y-m-d H:i:s")])
        ->whereRaw('? <= to_date', [date("Y-m-d H:i:s")])
        ->orderBy('created_at','desc')->get();
  }
}