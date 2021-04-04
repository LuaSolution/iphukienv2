<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductColor;
use App\ProductSize;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Request $request, $id)
    {
        $data = [];
        $data['product'] = (new Product())->getProductById($id);
        $data['productColor'] = (new ProductColor())->getListProductColorByProduct($id);
        $data['productSize'] = (new ProductSize())->getListProductSizeByProduct($id);
        $data['listSameProduct'] = (new Product())->getListSameProduct($data['product']->category_id, $data['product']->id);
        foreach ($data['listSameProduct'] as &$i) {
            $i->image = asset('public/'.(new ProductColor())->getListProductColorByProduct($i->id)[0]->image);
            $i->wishlist = null;
            if (Auth::check() && Auth::user()->role_id == 2) {
                $i->wishlist = (new Wishlist())->getWishlistByUserAndProduct(Auth::user()->id, $id);
            }
        }
        
        return view('user/product-details', $data);
    }
}
