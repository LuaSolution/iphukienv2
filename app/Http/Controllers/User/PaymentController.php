<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index($id){
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = env('APP_URL', 'http://127.0.0.1:8000') . "/payment/vnpay/verify";
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

        $vnp_TxnRef = date('YmdHis');//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'sfhdhdfh';
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
            "vnp_TxnRef" => 'inforOrder' . $vnp_TxnRef,
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
        $string = $request['vnp_SecureHash'];
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = 'This is my secret key';
        $secret_iv = 'This is my secret iv';

        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        echo "<pre>";
        print_r($iv);
        echo "</pre>";
        echo "<pre>";
        print_r($request);
        echo "</pre>";
        die;
    }
}