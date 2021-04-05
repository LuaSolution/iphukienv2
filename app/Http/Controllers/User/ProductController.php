<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductColor;
use App\ProductSize;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Request $request, $id)
    {
        $data = [];
        $data['product'] = (new Product())->getProductById($id);
        $data['productColor'] = (new ProductColor())->getListProductColorByProduct($data['product']->id);
        $data['productColorDistinct'] = (new ProductColor())->getListProductColorByProductDistinct($data['product']->id);
        $data['productSize'] = (new ProductSize())->getListProductSizeByProduct($data['product']->id);
        $data['listSameProduct'] = (new Product())->getListSameProduct($data['product']->category_id, $data['product']->id);
        foreach ($data['listSameProduct'] as &$i) {
            // $i->image = asset('public/'.(new ProductColor())->getListProductColorByProduct($i->id)[0]->image);
            $i->wishlist = null;
            if (Auth::check() && Auth::user()->role_id == 2) {
                $i->wishlist = (new Wishlist())->getWishlistByUserAndProduct(Auth::user()->id, $id);
            }
        }
        
        return view('user/product-details', $data);
    }
}
