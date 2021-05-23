<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metatag extends Model
{
  protected $table = 'metatags';

  public function getAll() {
    return Metatag::all();
  }

  public function insertMetatag($data){
  	return Metatag::create($data);
  }

  public function getMetatagById($id){
  	return Metatag::where('id', $id)->first();
  }

  public function updateMetatag($id,$data){
  	return Metatag::where('id', $id)->update($data);
  }

}