<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Order;
use App\PaymentMethod;

class PaymentController extends Controller
{
    public function index($id)
    {
        $orderInfo = Order::with(['OrderDetailInfo'])->where(['order_code' => $id])->first();
        $amount = 0;

        if(empty($orderInfo)){
            toast()->error('Order not found', 'Alert');
            return redirect('/');
        }
        if(!empty($orderInfo['OrderDetailInfo'])){
            foreach ($orderInfo['OrderDetailInfo'] as $value){
                $amount += $value['total_price'];
            }
        }
        if($amount === 0 || !is_numeric($amount)){
            toast()->error('Invalid amount', 'Alert');
            return redirect('/');
        }


        if(!empty($orderInfo->status) && $orderInfo->status === 'PaymentSuccess'){
            toast()->error('Order already confirmed', 'Alert');
            return redirect('/');
        }

        $vnp_Url = env('URL_VNPAY');
        $vnp_Returnurl = env('URL_CALLBACK_VNPAY') . "/payment/vnpay/verify";
        $vnp_TmnCode = env('WEBSITE_CODE');
        $vnp_HashSecret = env('CHECKSUM_CODE');
        $urlVnPay = PaymentMethod::getUrlPaymentVnPay($id, $amount, $vnp_Url, $vnp_Returnurl, $vnp_TmnCode, $vnp_HashSecret);

        return redirect($urlVnPay);
    }

    public function verify()
    {
        $request = request()->all();
        $vnp_ResponseCode = !empty($request['vnp_ResponseCode']) ? $request['vnp_ResponseCode'] : '99';
        $vnp_TxnRef = !empty($request['vnp_TxnRef']) ? $request['vnp_TxnRef'] : null;
        $order = Order::where(['order_code' => $vnp_TxnRef])->first();

        if (!empty($order)) {
            if ($vnp_ResponseCode === '00') {
                toast()->success('Confirm Success', 'Alert');
                $order->status = 'PaymentSuccess';
            } elseif ($vnp_ResponseCode === '01') {
                toast()->error('Order not found', 'Alert');
                $order->status = 'PaymentError';
            } elseif ($vnp_ResponseCode === '04') {
                toast()->error('Invalid amount', 'Alert');
                $order->status = 'PaymentError';
            } elseif ($vnp_ResponseCode === '02') {
                toast()->error('Order already confirmed', 'Alert');
                $order->status = 'PaymentError';
            } elseif ($vnp_ResponseCode === '97') {
                toast()->error('Invalid signature', 'Alert');
                $order->status = 'PaymentError';
            } elseif ($vnp_ResponseCode === '99') {
                toast()->error('Unknow error', 'Alert');
                $order->status = 'PaymentError';
            } elseif ($vnp_ResponseCode === '24') {
                toast()->error('Cancel Order Payment', 'Alert');
                $order->status = 'PaymentPending';
            } else {
                toast()->error('Payment Error', 'Alert');
                $order->status = 'PaymentError';
            }
            $order->save();
        } else {
            toast()->success('Order not found');
        }
        return redirect('/');
    }
}