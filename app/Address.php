<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $table = 'addresses';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id', 'name', 'address', 'phone', 'email', 'user_id', 'city', 'district', 'ward', 'is_default', 'created_at', 'updated_at'
  ];

  public function insertAddress($data){
  	return Address::create($data);
  }
  public function updateAddress($id,$data){
  	return Address::where('id', '=', $id)->update($data);
  }
  public function removeDefault($userId) {
    return Address::where('user_id', '=', $userId)->update(['is_default' => 0]);
  }
  public function getAddressByUser($userId){
  	return Address::where('user_id', '=', $userId)->get();
  }
  public function deleteAddress($id){
  	return Address::where('id', '=', $id)->delete();
  }
}
