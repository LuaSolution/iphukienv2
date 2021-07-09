<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'roles';

  public function insertRole($data){
  	return Role::insert($data);
  }
  public function updateRole($id,$data){
  	return Role::where('id', '=', $id)->update($data);
  }
  public function getRoleById($id){
  	return Role::where('id', '=', $id)->first();
  }
  public function getListRole(){
  	return Role::orderBy('created_at','desc')->get();
  }
  public function deleteRole($id){
  	return Role::where('id', '=', $id)->delete();
  }
}
