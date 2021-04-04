<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
  protected $table = 'payment_methods';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
  */
  protected $fillable = [
      'name'
  ];

  public function insertPaymentMethod($data){
  	return PaymentMethod::create($data);
  }
  public function updatePaymentMethod($id,$data){
  	return PaymentMethod::where('id', '=', $id)->update($data);
  }

  public function getPaymentMethodById($id){
  	return PaymentMethod::where('id', '=', $id)->first();
  }
  public function getListPaymentMethod(){
  	return PaymentMethod::orderBy('created_at','desc')->get();
  }
  public function deletePaymentMethod($id){
  	return PaymentMethod::where('id', '=', $id)->delete();
  }
}