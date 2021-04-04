<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{

    /**
     * Get add Delivery page
     */
    public function getAddDelivery()
    {
        return view('metronic_admin.deliveries.add', $this->data);
    }

    /**
     * Post add Delivery page
     */
    public function postAddDelivery(Request $request)
    {
        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListDelivery')->with('error', 'Thêm thất bại!');
        }
        
        $dataInsert = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Delivery())->insertDelivery($dataInsert);

        if ($result instanceof Delivery) {
            return redirect()->route('adMgetListDelivery')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListDelivery')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit Delivery page
     */
    public function getEditDelivery($id)
    {

        $delivery = (new Delivery())->getDeliveryById($id);

        if ($delivery) {
            $this->data['delivery'] = $delivery;

            return view('metronic_admin.deliveries.edit', $this->data);
        } else {
            return redirect()->route('adMgetListDelivery');
        }

    }

    /**
     * Delivery edit page
     */
    public function postEditDelivery($id, Request $request)
    {

        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListDelivery')->with('error', 'Thêm thất bại!');
        }

        $dataUpdate = [
            'name' => $name,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Delivery())->updateDelivery($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditDelivery', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditDelivery', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list Delivery page
     */
    public function getListDelivery()
    {
        $this->data['deliveries'] = (new Delivery())->getListDelivery();

        return view('metronic_admin.deliveries.list', $this->data);
    }

    /**
     * Delete Delivery
     */
    public function getDelDelivery($id)
    {
        $result = (new Delivery())->deleteDelivery($id);

        if ($result > 0) {
            return redirect()->route('adMgetListDelivery')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListDelivery')->with('error', 'Xóa thất bại!');
        }
    }
}
