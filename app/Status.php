<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  protected $table = 'statuses';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name'
  ];

  public function insertStatus($data){
  	return Status::create($data);
  }
  public function updateStatus($id,$data){
  	return Status::where('id', '=', $id)->update($data);
  }

  public function getStatusById($id){
  	return Status::where('id', '=', $id)->first();
  }
  public function getListStatus(){
  	return Status::orderBy('created_at','desc')->get();
  }
  public function deleteStatus($id){
  	return Status::where('id', '=', $id)->delete();
  }
}