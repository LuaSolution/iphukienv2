<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function insertPaymentMethod($data)
    {
        return PaymentMethod::create($data);
    }

    public function updatePaymentMethod($id, $data)
    {
        return PaymentMethod::where('id', '=', $id)->update($data);
    }

    public function getPaymentMethodById($id)
    {
        return PaymentMethod::where('id', '=', $id)->first();
    }

    public function getListPaymentMethod()
    {
        return PaymentMethod::orderBy('created_at', 'desc')->get();
    }

    public function deletePaymentMethod($id)
    {
        return PaymentMethod::where('id', '=', $id)->delete();
    }

    public static function getUrlPaymentVnPay($id, $amount, $vnp_Url, $vnp_Returnurl, $vnp_TmnCode, $vnp_HashSecret)
    {
        $inputData = self::makeInput($id, $amount, $vnp_Returnurl, $vnp_TmnCode);
        $query = self::makeMergeInput($inputData)['query'];
        $hashdata = self::makeMergeInput($inputData)['hashdata'];
        $vnp_Url = $vnp_Url . "?" . $query;

        $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
        $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        $order = Order::with(['OrderDetailInfo'])->where(['order_code' => $id])->first();
        $order->vnp_secure_hash = $vnpSecureHash;
        $order->save();

        return $vnp_Url;
    }

    public static function makeInput($id, $amount, $vnp_Returnurl, $vnp_TmnCode)
    {
        $vnp_TxnRef = $id;
        $vnp_OrderInfo = 'Thông tin đơn hàng';
        $vnp_OrderType = 'CNB';
        $vnp_Amount = $amount * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        ksort($inputData);
        return $inputData;
    }

    public static function makeMergeInput($inputData){
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $model['query'] = $query;
        $model['hashdata'] = $hashdata;

        return $model;
    }
}