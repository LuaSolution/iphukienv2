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

        if (empty($orderInfo)) {
            toast()->error('Order not found', 'Alert');
            return redirect('/');
        }
        if (!empty($orderInfo['OrderDetailInfo'])) {
            foreach ($orderInfo['OrderDetailInfo'] as $value) {
                $amount += $value['total_price'];
            }
        }
        if ($amount === 0 || !is_numeric($amount)) {
            toast()->error('Invalid amount', 'Alert');
            return redirect('/');
        }


        if (!empty($orderInfo->status) && $orderInfo->status === 'PaymentSuccess') {
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
        $vnp_TxnRef = !empty($request['vnp_TxnRef']) ? $request['vnp_TxnRef'] : null;
        $order = Order::with(['OrderDetailInfo'])->where(['order_code' => $vnp_TxnRef])->first();
        $checkPayment = Order::checkResponseVnPay($request, $order);

        if ($checkPayment['Type'] === 'success') {
            toast()->success($checkPayment['Message']);
        } else {
            toast()->error($checkPayment['Message']);
        }
        return redirect('/');
    }

    public function verifyConfirm()
    {
        $request = request()->all();

        $vnp_TxnRef = !empty($request['vnp_TxnRef']) ? $request['vnp_TxnRef'] : null;
        $order = Order::with(['OrderDetailInfo'])->where(['order_code' => $vnp_TxnRef])->first();
        $checkPayment = Order::checkResponseVnPay($request, $order);
        if (!empty($order) && $checkPayment['RspCode'] === '00') {
            $order->status = 'PaymentSuccess';
            $order->save();
        }

        return response()->json($checkPayment, 200);
    }
}