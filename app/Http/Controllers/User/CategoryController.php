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
        $this->data['category'] = (new Cate())->getCateById($id);
        $this->data['listProduct'] = Product::where('category_id', $id)->orderBy('id', 'DESC')->paginate(5);

        return view('user/category-details', $this->data);
    }
}
