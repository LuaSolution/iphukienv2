<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helpers;
use App\User;
use App\Order;
use App\OrderDetail;

class AjaxController extends Controller
{
    public function getLocation(Request $request, $type, $parentId = null) {
        return json_encode(Helpers::callNhanhApi([
            "type" => $type,
            "parentId" => $parentId
        ], "/shipping/location"));
    }

    public function loginWithGoogle(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        
        $userModal = new User();
        $userCheck = $userModal->getUserByEmail($email);

        if ($userCheck) {
            return json_encode(['code' => 0, 'message' => "Email đã tồn tại"]);
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role_id' => 2,
        ]);

        return json_encode(['code' => 1]);
    }

    public function calcShippingFee(Request $request) {
        $resArray = Helpers::callNhanhApi([
            'fromCityName' => 'Hồ Chí Minh',
            'fromDistrictName' => 'Quận Phú Nhuận',
            'toCityName' => $request->input('toCityName'),
            'toDistrictName' => $request->input('toDistrictName'),
            'codMoney' => $request->input('codMoney'),
            'productIds' => $request->input('productIds')
        ], '/shipping/fee');
        $returnItem = NULL;
        foreach($resArray as $item) {
            if(!$returnItem) {
                $returnItem = $item;
            } else {
                if($returnItem->shipFee > $item->shipFee) {
                    $returnItem = $item;
                }
            }
        }

        return json_encode($returnItem);
    }

    public function createOrder(Request $request) {
        // create order
        $addressId = $request->input('addressId');
        $paymentMethodId = $request->input('paymentMethodId');
        $deliveryId = $request->input('deliveryId');
        $shipFee = $request->input('shipFee');
        $deliveryDate = $request->input('deliveryDate');
        $listProduct = json_decode($request->input('productList'));
        
        $dataInsertOrder = [
            'address_id' => $addressId,
            'payment_method_id' => $paymentMethodId,
            'delivery_id' => $deliveryId,
            'ship_fee' => $shipFee,
            'delivery_date' => $deliveryDate,
            'status' => 'New',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $addedOrder = (new Order())->insertOrder($dataInsertOrder);
        $addedOrderId = $addedOrder->id;


        foreach ($listProduct as $product) {
            $dataInsertDetail = [
                'order_id' => $addedOrderId,
                'product_id' => $product->id,
                'total_price' => $product->quantity * $product->price,
                'total_count' => $product->quantity,
                'color_id' => $product->color,
                'size_id' => $product->size,
                'image' => $product->image,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            (new OrderDetail())->insertOrderDetail($dataInsertDetail);
        }
        //call nhanh
        $nhanhRes = Helpers::callNhanhApi([
            'id' => $addedOrderId,
            'type' => 'Shipping',
            'customerCityName' => $request->input('customerCityName'),
            'customerDistrictName' => $request->input('customerDistrictName'),
            'customerAddress' => $request->input('customerAddress'),
            'customerName' => $request->input('customerName'),
            'customerMobile' => $request->input('customerMobile'),
            'customerEmail' => $request->input('customerEmail'),
            'paymentMethod' => 'COD',
            'carrierId' => $request->input('carrierId'),
            'status' => 'New',
            'productList' => $listProduct
        ], '/order/add');
        //update nhanh order id
        (new Order())->updateOrder($addedOrderId, ['nhanh_order_id' => $nhanhRes->$addedOrderId]);
        //send mail


        return json_encode(['code' => 1, 'orderId' => $addedOrderId]);
    }

    public function getListOrders(Request $request)
    {
        if (!Auth::check() || Auth::user()->role_id != 2) {
            return redirect()->route('login');
        }
        $data['listOrder'] = (new Order())->getListOrderByUser(Auth::user()->id);
        
        return view('user/orders', $data);
    }
}
