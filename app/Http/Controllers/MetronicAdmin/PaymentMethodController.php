<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{

    /**
     * Get add PaymentMethod page
     */
    public function getAddPaymentMethod()
    {
        return view('metronic_admin.payment_methods.add', $this->data);
    }

    /**
     * Post add PaymentMethod page
     */
    public function postAddPaymentMethod(Request $request)
    {
        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListPaymentMethod')->with('error', 'Thêm thất bại!');
        }
        
        $dataInsert = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new PaymentMethod())->insertPaymentMethod($dataInsert);

        if ($result instanceof PaymentMethod) {
            return redirect()->route('adMgetListPaymentMethod')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListPaymentMethod')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit PaymentMethod page
     */
    public function getEditPaymentMethod($id)
    {

        $paymentMethod = (new PaymentMethod())->getPaymentMethodById($id);

        if ($paymentMethod) {
            $this->data['paymentMethod'] = $paymentMethod;

            return view('metronic_admin.payment_methods.edit', $this->data);
        } else {
            return redirect()->route('adMgetListPaymentMethod');
        }

    }

    /**
     * PaymentMethod edit page
     */
    public function postEditPaymentMethod($id, Request $request)
    {

        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListPaymentMethod')->with('error', 'Thêm thất bại!');
        }

        $dataUpdate = [
            'name' => $name,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new PaymentMethod())->updatePaymentMethod($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditPaymentMethod', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditPaymentMethod', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list PaymentMethod page
     */
    public function getListPaymentMethod()
    {
        $this->data['paymentMethods'] = (new PaymentMethod())->getListPaymentMethod();

        return view('metronic_admin.payment_methods.list', $this->data);
    }

    /**
     * Delete PaymentMethod
     */
    public function getDelPaymentMethod($id)
    {
        $result = (new PaymentMethod())->deletePaymentMethod($id);

        if ($result > 0) {
            return redirect()->route('adMgetListPaymentMethod')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListPaymentMethod')->with('error', 'Xóa thất bại!');
        }
    }
}
