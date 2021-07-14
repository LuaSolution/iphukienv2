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

    public static function checkResponseVnPay($data, $order)
    {
        $inputData = array();
        $returnData = array();
        $vnp_HashSecret = env('CHECKSUM_CODE');
        foreach ($data as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }
//        $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
//        $vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
        $secureHash = hash('sha256',$vnp_HashSecret . $hashData);
        $orderId = $inputData['vnp_TxnRef'];

        try {
            if ($secureHash == $vnp_SecureHash) {
                if (!empty($order)) {
                    if (!empty($order["status"]) && $orderId ) {
                        $returnData['RspCode'] = '00';
                        $returnData['Message'] = 'Confirm Success';
                    } else {
                        $returnData['RspCode'] = '02';
                        $returnData['Message'] = 'Order already confirmed';
                    }
                } else {
                    $returnData['RspCode'] = '01';
                    $returnData['Message'] = 'Order not found';
                }
            } else {
                $returnData['RspCode'] = '97';
                $returnData['Message'] = 'Invalid Checksum';
            }
        } catch (Exception $e) {
            $returnData['RspCode'] = '99';
            $returnData['Message'] = 'Unknow error';
        }
        return $returnData;
    }
}
