<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
  protected $table = 'deliveries';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name'
  ];

  public function insertDelivery($data){
  	return Delivery::create($data);
  }
  public function updateDelivery($id,$data){
  	return Delivery::where('id', '=', $id)->update($data);
  }

  public function getDeliveryById($id){
  	return Delivery::where('id', '=', $id)->first();
  }
  public function getListDelivery(){
  	return Delivery::orderBy('created_at','desc')->get();
  }
  public function deleteDelivery($id){
  	return Delivery::where('id', '=', $id)->delete();
  }
}