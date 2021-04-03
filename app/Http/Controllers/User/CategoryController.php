<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, $id)
    {
        $this->data['listProduct'] = Product::where('category_id', $id)->paginate(5);
        return view('user/category-details', $this->data);
    }
}
