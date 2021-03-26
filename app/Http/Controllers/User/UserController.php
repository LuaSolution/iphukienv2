<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        return view('user/login');
    }
    
    public function forgotPassword(Request $request) {
        return view('user/forgot-password');
    }

    public function signup(Request $request) {
        return view('user/signup');
    }

    public function cart(Request $request) {
        return view('user/cart');
    }

    public function payment(Request $request) {
        $listCity = callNhanhApi([
            "type" => "CITY",
            "parentId" => 0
        ], "/shipping/location");
        $data = [
            "list_city" => $listCity
        ];

        return view('user/payment', $data);
    }

    public function paymentComplete(Request $request) {
        return view('user/payment-complete');
    }

    public function orderDetails(Request $request, $orderId) {
        return view('user/order-details');
    }

    public function getListOrders(Request $request) {
        return view('user/orders');
    }

    public function getUserInformation(Request $request) {
        return view('user/user-information');
    }

    public function getUserAddresses(Request $request) {
        $listCity = callNhanhApi([
            "type" => "CITY",
            "parentId" => 0
        ], "/shipping/location");
        $data = [
            "list_city" => $listCity
        ];

        return view('user/user-addresses', $data);
    }

    public function changePassword(Request $request) {
        return view('user/user-change-password');
    }

    public function getUserWishlist(Request $request) {
        return view('user/user-wishlist');
    }
}