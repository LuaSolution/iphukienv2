<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'level', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUserByEmail($email){
        return User::where('email', '=', $email)->first();
    }

    public function getListUser(){
        return User::all();
    }

    public function deleteUser($id){
        return User::where('id', '=', $id)->delete();
    }
    public function updateUser($id, $data){
        return User::where('id', '=', $id)->update($data);
    }
}
