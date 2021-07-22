<?php

namespace App\Http\Controllers\User;

use App\Color;
use App\Http\Controllers\Controller;
use App\Metatag;
use App\Product;
use App\ProductImage;
use App\SaleProduct;
use App\Size;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Request $request, $id)
    {
        $data = [];
        $data['product'] = (new Product())->getProductById($id);
        // if ($data['product']) {
        //     parse_str(parse_url($data['product']->video, PHP_URL_QUERY), $embed_link);
        //     $data['product']->video = @$embed_link['v'] ?: '';
        // }
        $checkProductInSale = (new SaleProduct)->checkProductIsSale($id);
        $data['salePrice'] = $data['product']->sale_price;
        if ($checkProductInSale != null) {
            $data['salePrice'] = $checkProductInSale->sale_price;
        }
        $data['listSize'] = [];
        $data['listColor'] = [];
        $listChildProduct = (new Product())->getListChildProduct($id);
        $productImageModel = new ProductImage();
        $data['listChildProduct'] = [];
        $data['listImage'] = [];
        $sizeModel = new Size();
        $colorModel = new Color();
        $checkHasSize = [];
        $checkHasColor = [];
        foreach ($listChildProduct as $p) {
            $obj = new \stdClass();
            $obj->product = $p;
            $obj->listImage = $productImageModel->getListProductImageByProduct($p->id);
            foreach ($obj->listImage as $i) {
                array_push($data['listImage'], asset('public/' . $i->image));
            }
            array_push($data['listChildProduct'], $obj);
            if ($p->size_id != null) {
                if (!in_array($p->size_id, $checkHasSize)) {
                    array_push($checkHasSize, $p->size_id);
                    array_push($data['listSize'], $sizeModel->getSizeById($p->size_id));
                }
            }
            if ($p->color_id != null) {
                if (!in_array($p->color_id, $checkHasColor)) {
                    array_push($checkHasColor, $p->color_id);
                    array_push($data['listColor'], $colorModel->getColorById($p->color_id));
                }
            }
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
        $this->data['meta'] = Metatag::find(3);
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
