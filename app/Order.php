<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'id', 'address_id', 'payment_method_id', 'delivery_id', 'ship_fee', 'delivery_date', 'status', 'created_at', 'updated_at', 'nhanh_order_id'
    ];

    public function insertOrder($data)
    {
        return Order::create($data);
    }

    public function getListContact()
    {
        return Order::orderBy('created_at', 'desc')->get();
    }

    public function getById($id){
        return Order::where('id', '=', $id)->first();
    }

    public function updateOrder($id,$data){
        return Order::where('id', '=', $id)->update($data);
    }
}