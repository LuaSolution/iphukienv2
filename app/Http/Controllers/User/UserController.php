<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Delivery;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\PaymentMethod;
use App\User;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return redirect()->route('adMgetHome');
            } else {
                return redirect()->route('getHome');
            }
        } else {
            return view('user/login');
        }
    }

    public function doLogin(Request $request)
    {
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

    public function doLogout(Request $request)
    {
        Auth::logout();
        toast()->success('Đăng xuất thành công');

        return redirect()->route('getHome');
    }

    public function forgotPassword(Request $request)
    {
        return view('user/forgot-password');
    }

    public function signup(Request $request)
    {
        return view('user/signup');
    }

    public function doSignup(Request $request)
    {
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

    public function cart(Request $request)
    {
        return view('user/cart');
    }

    public function payment(Request $request)
    {
        if (!Auth::check() || Auth::user()->role_id != 2) {
            return redirect()->route('login');
        }

        $listCity = Helpers::callNhanhApi([
            "type" => "CITY",
            "parentId" => 0,
        ], "/shipping/location");
        $data['listCity'] = $listCity;
        $data['addresses'] = (new Address())->getAddressByUser(Auth::user()->id);
        $data['paymentMethods'] = (new PaymentMethod())->getListPaymentMethod();
        $data['deliveries'] = (new Delivery())->getListDelivery();

        return view('user/payment', $data);
    }

    public function addNewAddress(Request $request)
    {
        if (!Auth::check() || Auth::user()->role_id != 2) {
            return redirect()->route('login');
        }

        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('user.payment')->with('error', 'Chưa nhập tên người nhận ');
        }
        $email = $request->input('email');
        if (!$email) {
            return redirect()->route('user.payment')->with('error', 'Chưa nhập Email');
        }
        $phone = $request->input('phone');
        if (!$phone) {
            return redirect()->route('user.payment')->with('error', 'Chưa nhập số điện thoại');
        }
        $address = $request->input('address');
        if (!$address) {
            return redirect()->route('user.payment')->with('error', 'Chưa nhập địa chỉ');
        }
        $city = $request->input('city');
        if (!$city) {
            return redirect()->route('user.payment')->with('error', 'Chưa chọn thành phố');
        }
        $district = $request->input('district');
        if (!$district) {
            return redirect()->route('user.payment')->with('error', 'Chưa chọn quận');
        }
        $ward = $request->input('ward');
        if (!$ward) {
            return redirect()->route('user.payment')->with('error', 'Chưa chọn phường');
        }
        $defaultAddress = $request->input('default-address') == 'on' ? 1 : 0;

        $dataInsert = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'user_id' => Auth::user()->id,
            'is_default' => $defaultAddress,
            'city' => $city,
            'district' => $district,
            'ward' => $ward,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Address())->insertAddress($dataInsert);

        if ($result) {
            return redirect()->to(url()->previous());
        }
    }

    public function paymentComplete(Request $request, $orderId)
    {
        if (!Auth::check() || Auth::user()->role_id != 2) {
            return redirect()->route('login');
        }

        $data['order'] = (new Order())->getById($orderId);
        $orderDetail = (new OrderDetail())->getListOrderDetailByOrder($orderId);
        $data['productName'] = '';
        $data['totalCost'] = 0;
        foreach ($orderDetail as $key => $detail) {
            $data['productName'] .= $key == 0 ? '' : ', ';
            $data['productName'] .= $detail->product_name;
            $data['totalCost'] += $detail->total_price;
        }
        $data['totalCost'] += $data['order']->ship_fee;

        return view('user/payment-complete', $data);
    }

    public function orderDetails(Request $request, $orderId)
    {
        if (!Auth::check() || Auth::user()->role_id != 2) {
            return redirect()->route('login');
        }

        $data['order'] = (new Order())->getById($orderId);
        $data['orderDetail'] = (new OrderDetail())->getListOrderDetailByOrder($orderId);
        $checkSumData = config('app.nhanh_api_user_name') . $data['order']->order_code;
        $checksum = md5(md5(config('app.nhanh_api_secret_key') . $checkSumData) . $checkSumData);
        $data['orderDetailUrl'] = config('app.nhanh_api_host') . "/shipping/trackingframe?apiUsername=" . config('app.nhanh_api_user_name') . "&orderId=" . $data['order']->order_code . "&checksum=" . $checksum;
        $data['countAllOrderProduct'] = 0;
        $data['countAllOrderPrice'] = 0;
        foreach ($data['orderDetail'] as $oD) {
            $data['countAllOrderProduct'] += $oD->total_count;
            $data['countAllOrderPrice'] += $oD->total_price;
        }
        
        return view('user/order-details', $data);
    }

    public function getListOrders(Request $request)
    {
        if (!Auth::check() || Auth::user()->role_id != 2) {
            return redirect()->route('login');
        }
        $listOrder = (new Order())->getListOrderByUser(Auth::user()->id);
        $data['listOrder'] = [];
        foreach($listOrder as $o) {
            $obj = new \stdClass();
            $obj->order = $o;
            $orderDetail = (new OrderDetail())->getListOrderDetailByOrder($o->id);
            $obj->total = 0;
            foreach ($orderDetail as $key => $detail) {
                $obj->total += $detail->total_price;
            }
            $obj->total += $o->ship_fee;
            array_push($data['listOrder'], $obj);
        }
        
        return view('user/orders', $data);
    }

    public function getUserInformation(Request $request)
    {
        if (Auth::check()) {
            return view('user/user-information');
        }
        return redirect()->route('login');
    }

    public function getUserAddresses(Request $request)
    {
        if (!Auth::check() || Auth::user()->role_id != 2) {
            return redirect()->route('login');
        }
        $listCity = Helpers::callNhanhApi([
            "type" => "CITY",
            "parentId" => 0,
        ], "/shipping/location");
        $data = [
            "list_city" => $listCity,
        ];
        $data['addresses'] = (new Address())->getAddressByUser(Auth::user()->id);

        return view('user/user-addresses', $data);
    }

    public function changePassword(Request $request)
    {
        return view('user/user-change-password');
    }

    public function getUserWishlist(Request $request)
    {
        if (Auth::check()) {
            $this->data['listProduct'] = (new Wishlist)->getWishlistByUser(Auth::user()->id);
            return view('user/user-wishlist', $this->data);
        } else {
            return redirect()->route('login');
        }
    }

    public function postUserInformation(Request $request)
    {
        $model = User::where('id', Auth::user()->id)->first();
        $coverFile = $request->file('avatar');
        $cover = "";
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->storeAs('img/avatar/', $request->file('avatar')->getClientOriginalName());
            $cover = $request->file('avatar')->getClientOriginalName() . '?n=' . time();
            $model->avatar = $cover;
        }

        if ($request->year) {
            $year = $request->year;
        } else {
            $year = 2020;
        }

        if ($request->month) {
            $month = $request->month;
        } else {
            $month = 1;
        }

        if ($request->day) {
            $day = $request->day;
        } else {
            $day = 1;
        }

        $model->name = $request->name;
        $model->phone = $request->phone;
        $model->email = $request->email;
        $model->gender = $request->gender;
        $model->birthday = $year . '-' . $month . '-' . $day;
        $model->save();
        return redirect()->back();
    }

    public function setDefaultAddress(Request $request, $id) {
        if (!Auth::check() || Auth::user()->role_id != 2) {
            return redirect()->route('login');
        }
        (new Address())->removeDefault(Auth::user()->id);
        (new Address())->updateAddress($id, ['is_default' => 1]);

        return redirect()->route('user.addresses');
    }
    public function deleteAddress(Request $request, $id) {
        if (!Auth::check() || Auth::user()->role_id != 2) {
            return redirect()->route('login');
        }
        (new Address())->deleteAddress($id);

        return redirect()->route('user.addresses');
    }
}
