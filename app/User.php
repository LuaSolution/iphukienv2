<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'birthday', 'created_at', 'email', 'gender', 'id', 'name', 'password', 'phone', 'remember_token', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUserByEmail($email)
    {
        return User::where('email', '=', $email)->first();
    }

    public function getUserById($id)
    {
        return User::where('id', '=', $id)->first();
    }

    public function getListUser()
    {
        return User::paginate(5);
    }

    public function deleteUser($id)
    {
        return User::where('id', '=', $id)->delete();
    }
    public function updateUser($id, $data)
    {
        return User::where('id', '=', $id)->update($data);
    }
}
