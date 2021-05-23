<?php

namespace App\Http\Controllers\User;

use App\Cate;
use App\Http\Controllers\Controller;
use App\Mail;
use App\Partner;
use App\Product;
use App\SaleProduct;
use App\Slider;
use App\StaticPage;
use App\User;
use App\Metatag;
use Illuminate\Http\Request;
use Mail as SendMail;

class HomeController extends Controller
{
    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }

    public function index(Request $request)
    {
        $data = [];
        $this->data['cates'] = Cate::orderBy('pos', 'asc')->take(5)->get();
        $this->data['proNew'] = Product::take(8)->where('tag_id', 11)->whereNull('parent_id')->orderBy('created_at', 'desc')->get();
        $this->data['proTopSold'] = Product::take(8)->where('tag_id', 12)->whereNull('parent_id')->orderBy('sold', 'desc')->get();
        $this->data['flashSale'] = (new SaleProduct())->getListValidSaleProduct();
        $this->data['slider'] = Slider::OrderBy('id', 'DESC')->first();
        $this->data['partners'] = Partner::take(8)->orderBy('created_at', 'desc')->get();
        $this->data['meta'] = Metatag::find(1);
        return view('user.home', $this->data);
    }

    public function postContact(Request $req)
    {
        $m = new Mail;
        $m->email = $req->email;
        $m->created_at = date('Y-m-d');
        $m->save();

        toast()->success('Đăng ký email thành công');
        return redirect()->back();
    }

    public function getStaticPage($url)
    {
        $data = StaticPage::where('url', $url)->first();
        if ($data) {
            $this->data['data'] = $data;
            return view('user.blank', $this->data);
        } else {
            return redirect()->route('getHome');
        }
    }

    public function postForgotPassword(Request $req)
    {
        $user = User::where('email', $req->email)->first();
        $passwd = uniqid();
        $email = $req->email;
        if ($user) {
            $user->password = bcrypt($passwd);
            $user->save();
            SendMail::send('form', array('newpassword' => $passwd, 'name' => $user->name), function ($message) use ($email) {
                $message->from('iphukien.send.mail@gmail.com', 'Iphukien');
                $message->to($email)->subject('[Iphukien] Reset Password');
            });
            toast()->success('Đã reset mật khẩu');
            return redirect()->back();
        } else {
            toast()->error('Email không tồn tại trong hệ thống');
            return redirect()->back();
        }
    }
}
