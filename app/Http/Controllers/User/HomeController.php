<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cate;
use App\Product;
use App\Mail;
use App\StaticPage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $cates = Cate::take(5)->get();
        $proNew = Product::take(4)->orderBy('created_at', 'desc')->get();
        $proTopSold = Product::take(4)->orderBy('sold', 'desc')->get();

        $this->data['cates'] = $cates;
        $this->data['proNew'] = $proNew;
        $this->data['proTopSold'] = $proTopSold;

        return view('user.home', $this->data);
    }

    public function postContact(Request $req)
    {
        $m = new Mail;
        $m->email = $req->email;
        $m->created_at=date('Y-m-d');
        $m->updated_at=date('Y-m-d');
        $m->save();
        return redirect()->back();
    }

    public function getStaticPage($url) {
        $data = StaticPage::where('url', $url)->first();
        if ($data) {
            $this->data['data'] = $data;
            return view('user.blank', $this->data);
        } else {
            return redirect()->route('getHome');
        }
    }
}
