<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Tag;

class OrderController extends Controller
{
    /**
     * Get edit Tag page
     */
    public function getEditOrder($id)
    {
        $this->data['orders'] = OrderDetail::select('order_details.id',
            'products.name as product_name',
            'order_details.total_price',
            'order_details.total_count')
            ->leftJoin('products', 'products.id', '=', 'order_details.product_id')
            ->where('order_id', $id)
            ->get();
        if ($this->data['orders']) {
            return view('metronic_admin.orders.edit', $this->data);
        } else {
            return redirect()->route('adMgetListOrder');
        }

    }

    /**
     * Get list Tag page
     */
    public function getListOrder()
    {
        $this->data['orders'] = Order::select('orders.id',
            'nhanh_order_id',
            'addresses.address')
            ->leftJoin('addresses', 'addresses.id', '=', 'orders.address_id')
            ->paginate(10);

        return view('metronic_admin.orders.list', $this->data);
    }

    public function getDelOrder($id)
    {
        $result = OrderDetail::where('order_id', $id)->delete();
        $result = Order::where('id', $id)->delete();

        if ($result > 0) {
            return redirect()->route('adMgetListOrders')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListOrders')->with('error', 'Xóa thất bại!');
        }
    }
}
