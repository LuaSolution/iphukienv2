<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'id', 'order_id', 'product_id', 'total_price', 'total_count', 'created_at', 'updated_at'
    ];

    public function insertOrderDetail($data)
    {
        return OrderDetail::insert($data);
    }

    public function getListOrderDetailByOrder($orderId)
    {
        return OrderDetail::leftJoin('products', 'products.id', '=', 'order_details.product_id')
            ->select('order_details.*', 'products.name as product_name')
            ->where('order_id', '=', $orderId)->orderBy('created_at', 'desc')->get();
    }
}