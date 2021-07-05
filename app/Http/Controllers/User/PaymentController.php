<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Order;

class PaymentController extends Controller
{
    public function index($id){
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = env('APP_URL') . "/payment/vnpay/verify";
        dd(env('NHANH_API_USER_NAME'));
//        http://localhost:8000/vnpay_php/vnpay_return.php?vnp_Amount=12412400&
//vnp_BankCode=NCB&
//vnp_BankTranNo=20210705211034&
//vnp_CardType=ATM&
//vnp_OrderInfo=sfhdhdfh&
//vnp_PayDate=20210705211030&
//vnp_ResponseCode=00&
//vnp_TmnCode=FNBLPD6L&
//vnp_TransactionNo=13538680&
//vnp_TxnRef=20210705210939&
//vnp_SecureHashType=SHA256&
//vnp_SecureHash=1e7186e4f4b1bde131aa9fd6019cdb2effd2fe0a11ac69cc48a99c7a64f86927
        $vnp_TmnCode = "FNBLPD6L";//Mã website tại VNPAY
        $vnp_HashSecret = "BOSROMFBEMKCGPHXMQRRAAIBHPFATGPJ"; //Chuỗi bí mật

        $vnp_TxnRef = $id;
        $vnp_OrderInfo = 'Thông tin đơn hàng';
        $vnp_OrderType = 'CNB';
        $vnp_Amount = 124124 * 100;
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

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash('sha256',$vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }


        return redirect($vnp_Url);
    }

    public function verify(){
        $request = request()->all();
        $vnp_ResponseCode = !empty($request['vnp_ResponseCode']) ? $request['vnp_ResponseCode'] : '99';
        $vnp_TxnRef = !empty($request['vnp_TxnRef']) ? $request['vnp_TxnRef'] : null;
        $order = Order::where(['order_code' => $vnp_TxnRef])->first();
        if($vnp_ResponseCode === '00'){
            $order->status = 'PaymentSuccess';
        } elseif($vnp_ResponseCode === '24') {
            $order->status = 'PAymentPending';
        } else {
            $order->status = 'PaymentError';
        }
        $order->save();
        return redirect('/');
    }
}