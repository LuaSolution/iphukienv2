<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $table = 'mails';

    public function insertMail($data)
    {
        return Mail::insert($data);
    }

    public function getListContact()
    {
        return Mail::orderBy('created_at', 'desc')->get();
    }

    public function getById($id){
        return Mail::where('id', '=', $id)->first();
    }
}