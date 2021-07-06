<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Order;
use App\PaymentMethod;

class PaymentController extends Controller
{
    public function index($id){
        $urlVnPay = PaymentMethod::getUrlPaymentVnPay($id);

        return redirect($urlVnPay);
    }

    public function verify(){
        $request = request()->all();
        $vnp_ResponseCode = !empty($request['vnp_ResponseCode']) ? $request['vnp_ResponseCode'] : '99';
        $vnp_TxnRef = !empty($request['vnp_TxnRef']) ? $request['vnp_TxnRef'] : null;
        $order = Order::where(['order_code' => $vnp_TxnRef])->first();

        if(!empty($order)){
            if($vnp_ResponseCode === '00'){
                $order->status = 'PaymentSuccess';
            } elseif($vnp_ResponseCode === '24') {
                $order->status = 'PaymentPending';
            } else {
                $order->status = 'PaymentError';
            }
            $order->save();
        }
        return redirect('/');
    }
}