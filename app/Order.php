<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'id',
        'address_id',
        'payment_method_id',
        'delivery_id',
        'ship_fee',
        'delivery_date',
        'status',
        'created_at',
        'updated_at',
        'nhanh_order_id',
        'order_code',
        'user_id'
    ];

    public function insertOrder($data)
    {
        return Order::create($data);
    }

    public function getListOrderByUser($userId)
    {
        return Order::where('orders.user_id', '=', $userId)
            ->orderBy('orders.created_at', 'desc')->get();
    }

    public function getById($id)
    {
        return Order::leftJoin('payment_methods', 'payment_methods.id', '=', 'orders.payment_method_id')
            ->leftJoin('addresses', 'addresses.id', '=', 'orders.address_id')
            ->select('orders.*', 'addresses.name as receiver_name', 'addresses.address as receiver_address', 'addresses.phone as receiver_phone', 'addresses.email as receiver_email', 'addresses.phone as receiver_phone', 'payment_methods.name as payment_method_name')
            ->where('orders.id', '=', $id)->first();
    }

    public function updateOrder($id, $data)
    {
        return Order::where('id', '=', $id)->update($data);
    }

    public function OrderDetailInfo()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public static function checkResponseVnPay($order, $vnp_TxnRef, $vnp_ResponseCode, $vnp_Amount, $vnp_SecureHash, $vnp_HashSecret)
    {
        $model['vnp_ResponseCode'] = '99';
        $model['message'] = 'Unknow error';
        $model['status'] = 'PaymentError';
        $model['type'] = 'error';
        $amount = 0;

        if (empty($vnp_TxnRef) || empty($vnp_ResponseCode) || empty($vnp_Amount) || empty($vnp_SecureHash) || empty($vnp_HashSecret)) {
            return $model;
        }

        if (!empty($vnp_ResponseCode) && $vnp_ResponseCode === '99') {
            $model['vnp_ResponseCode'] = $vnp_ResponseCode;
            $model['message'] = 'Unknow error';
            $model['status'] = 'PaymentError';
            $model['type'] = 'error';
            return $model;
        }

        if ($order->order_code !== $vnp_TxnRef || $vnp_ResponseCode === '01') {
            $model['vnp_ResponseCode'] = $vnp_ResponseCode;
            $model['message'] = 'Order Not Found';
            $model['status'] = 'PaymentError';
            $model['type'] = 'error';
            return $model;
        }

        if ($order->status !== 'PaymentSuccess' || $vnp_ResponseCode === '02') {
            $model['vnp_ResponseCode'] = $vnp_ResponseCode;
            $model['message'] = 'Order already confirmed';
            $model['status'] = 'PaymentSuccess';
            $model['type'] = 'error';
            return $model;
        }

        if (!empty($order['OrderDetailInfo'])) {
            foreach ($order['OrderDetailInfo'] as $value) {
                $amount += $value['total_price'];
            }
        }

        if ($amount != $vnp_Amount || $vnp_ResponseCode === '04') {
            $model['vnp_ResponseCode'] = $vnp_ResponseCode;
            $model['message'] = 'Invalid amount';
            $model['status'] = 'PaymentError';
            $model['type'] = 'error';
            return $model;
        }

        if ($order->vnp_secure_hash != $vnp_SecureHash || $vnp_ResponseCode === '97') {
            $model['vnp_ResponseCode'] = $vnp_ResponseCode;
            $model['message'] = 'Invalid Checksum';
            $model['status'] = 'PaymentError';
            $model['type'] = 'error';
            return $model;
        }

        return $model;
    }
}
