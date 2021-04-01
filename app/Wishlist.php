<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
  protected $table = 'wishlist';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'product_id', 'user_id', 'created_at', 'updated_at'
  ];

  public function insertWishlist($data){
  	return Wishlist::create($data);
  }
  public function getWishlistByUser($userId){
  	return Wishlist::where('user_id', '=', $userId)->get();
  }
  public function deleteWishlist($userId, $productId){
  	return Wishlist::where('user_id', '=', $userId)->where('product_id', '=', $productId)->delete();
  }
  public function getWishlistByUserAndProduct($userId, $productId){
  	return Wishlist::where('user_id', '=', $userId)->where('product_id', '=', $productId)->first();
  }
}