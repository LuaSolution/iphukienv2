<?php

namespace App\Http\Controllers\User;

use App\Cate;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, $id)
    {
        if ($request->sort) {
            switch ($request->sort) {
                case "az":
                    $this->data['listProduct'] = Product::where('category_id', $id)->orderBy('name', 'ASC')->paginate(5);
                    break;
                case "za":
                    $this->data['listProduct'] = Product::where('category_id', $id)->orderBy('name', 'DESC')->paginate(5);
                    break;
                case "pasc":
                    $this->data['listProduct'] = Product::where('category_id', $id)->orderBy('price', 'ASC')->orderBy('sale_price', 'ASC')->paginate(5);
                    break;
                case "pdesc":
                    $this->data['listProduct'] = Product::where('category_id', $id)->orderBy('price', 'DESC')->orderBy('sale_price', 'DESC')->paginate(5);
                    break;
                default:
                    $this->data['listProduct'] = Product::where('category_id', $id)->orderBy('id', 'DESC')->paginate(5);
            }

        } else {
            $this->data['listProduct'] = Product::where('category_id', $id)->orderBy('id', 'DESC')->paginate(5);
        }
        $this->data['category'] = (new Cate())->getCateById($id);
        return view('user/category-details', $this->data);
    }
}
