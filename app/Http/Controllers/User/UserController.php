<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Address;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helpers;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return redirect()->route('adgetHome');
            } else {
                return redirect()->route('getHome');
            }
        } else {
            return view('user/login');
        }
    }

    public function doLogin(Request $request) {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication passed...
            if (Auth::user()->role_id == 2) {
                toast()->success('Đăng nhập thành công');
                return redirect()->route('getHome');
            } 
        } else {
            toast()->error('Mật khẩu hoặc tài khoản không đúng');
            return redirect()->route('login');
        }
    }

    public function doLogout(Request $request) {
        Auth::logout();
        toast()->success('Đăng xuất thành công');
        
        return redirect()->route('getHome');
    }
    
    public function forgotPassword(Request $request) {
        return view('user/forgot-password');
    }

    public function signup(Request $request) {
        return view('user/signup');
    }

    public function doSignup(Request $request) {
        $name = $request->input('name');
        if (!$name) {
            $name = "Người dùng " . time();
        }
        $email = $request->input('email');
        if (!$email) {
            return redirect()->route('signup')->with('error', 'Chưa nhập Email');
        }
        $password = $request->input('password');
        if (!$password) {
            return redirect()->route('signup')->with('error', 'Chưa nhập Password');
        }
        if (strlen($password) < 6) {
            return redirect()->route('signup')->with('error', 'Password ít nhất 6 kí tự');
        }
        $phone_number = $request->input('phone');
        if (!$phone_number) {
            $phone_number = "";
        }

        $userModal = new User();
        $userCheck = $userModal->getUserByEmail($email);

        if ($userCheck) {
            return redirect()->route('signup')->with('error', 'Email đã tồn tại');
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'phone' => $phone_number,
            'role_id' => 2,
        ]);

        return redirect()->route('getHome');
    }

    public function cart(Request $request) {
        return view('user/cart');
    }

    public function payment(Request $request) {
        // $listCity = Helpers::callNhanhApi([
        //     "type" => "CITY",
        //     "parentId" => 0
        // ], "/shipping/location");
        // $data = [
        //     "list_city" => $listCity
        // ];

        // return view('user/payment', $data);
        if (!Auth::check() || Auth::user()->role_id != 2) return redirect()->route('login');
        $data['addresses'] = (new Address())->getAddressByUser(Auth::user()->id);
        $data['paymentMethods'] = (new PaymentMethod())->getListPaymentMethod();
        $data['deliveries'] = (new Delivery())->getListDelivery();

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