<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $table = 'tags';

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name'
  ];

  public function insertTag($data){
  	return Tag::create($data);
  }
  public function updateTag($id,$data){
  	return Tag::where('id', '=', $id)->update($data);
  }

  public function getTagById($id){
  	return Tag::where('id', '=', $id)->first();
  }
  public function getListTag(){
  	return Tag::orderBy('created_at','desc')->get();
  }
  public function deleteTag($id){
  	return Tag::where('id', '=', $id)->delete();
  }
  public function getListTags(){
  	return Tag::orderBy('created_at','desc')->get();
  }
}