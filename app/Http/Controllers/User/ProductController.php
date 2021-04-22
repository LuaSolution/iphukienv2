<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Request $request, $id)
    {
        $data = [];
        $data['product'] = (new Product())->getProductById($id);
        $listChildProduct = (new Product())->getListChildProduct($id);
        $productImageModel = new ProductImage();
        $data['listChildProduct'] = [];
        $data['listImage'] = [];
        foreach($listChildProduct as $p) {
            $obj = new \stdClass();
            $obj->product = $p;
            $obj->listImage = $productImageModel->getListProductImageByProduct($p->id);
            foreach($obj->listImage as $i) {
                array_push($data['listImage'], asset('public/'.$i->image));
            }
            array_push($data['listChildProduct'], $obj);
        }
        if (Auth::check() && Auth::user()->role_id == 2) {
            $data['wishlist'] = (new Wishlist())->getWishlistByUserAndProduct(Auth::user()->id, $id);
        }

        $data['listSameProduct'] = (new Product())->getListSameProduct($data['product']->category_id, $data['product']->id);
        foreach ($data['listSameProduct'] as $i) {
            $i->wishlist = null;
            if (Auth::check() && Auth::user()->role_id == 2) {
                $i->wishlist = (new Wishlist())->getWishlistByUserAndProduct(Auth::user()->id, $i->id);
            }
        }

        return view('user/product-details', $data);
    }

    public function searchByKeyword(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword == '' || !isset($keyword)) {
            return;
        }

        $data['keyword'] = $keyword;
        $data['listProduct'] = (new Product())->searchByKeyword($keyword);

        return view('user/search-result', $data);
    }
}
