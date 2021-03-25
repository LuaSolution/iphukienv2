<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function insertOrder($data)
    {
        return Order::insert($data);
    }

    public function getListContact()
    {
        return Order::orderBy('created_at', 'desc')->get();
    }

    public function getById($id){
        return Order::where('id', '=', $id)->first();
    }
}