<?php

namespace App\Http\Controllers\User;

use App\Cate;
use App\Color;
use App\Http\Controllers\Controller;
use App\Product;
use App\Size;
use App\Tag;
use App\Trademark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show(Request $request, $id)
    {
        if ($id == -1) {
            $this->data['listProduct'] = Product::where('parent_id', null)->orderBy('id', 'DESC')->paginate(8);
        } else if ($request->sort) {
            switch ($request->sort) {
                case "az":
                    $this->data['listProduct'] = Product::where('category_id', $id)->where('parent_id', null)->orderBy('name', 'ASC')->paginate(8);
                    break;
                case "za":
                    $this->data['listProduct'] = Product::where('category_id', $id)->where('parent_id', null)->orderBy('name', 'DESC')->paginate(8);
                    break;
                case "pasc":
                    $this->data['listProduct'] = Product::where('category_id', $id)->where('parent_id', null)->orderBy('price', 'ASC')->orderBy('sale_price', 'ASC')->paginate(8);
                    break;
                case "pdesc":
                    $this->data['listProduct'] = Product::where('category_id', $id)->where('parent_id', null)->orderBy('price', 'DESC')->orderBy('sale_price', 'DESC')->paginate(8);
                    break;
                default:
                    $this->data['listProduct'] = Product::where('category_id', $id)->where('parent_id', null)->orderBy('id', 'DESC')->paginate(8);
            }

        } else {
            $this->data['listProduct'] = Product::where('category_id', $id)->whereNull('parent_id')->orderBy('id', 'DESC')->paginate(8);
        }

        if ($id == -1) {
            $category = (object) ['title' => 'Danh sách sản phẩm'];

            $this->data['category'] = $category;
        } else {
            $this->data['category'] = (new Cate())->getCateById($id);
        }
        $this->data['colors'] = (new Color())->getListColor();
        $this->data['sizes'] = (new Size())->getListSize();
        $this->data['trademarks'] = (new Trademark())->getListTrademark();
        $this->data['tags'] = (new Tag())->getListTags();

        $this->data['id'] = $id;

        if ($request->ajax()) {
            $listProduct = $this->data['listProduct'];
            return view('layouts.list-product', compact('listProduct'));
        }

        return view('user/category-details', $this->data);
    }

    public function searchAjax(Request $request, $id)
    {
        $data = $request->all();

        $product = Product::query();

        $color = $data['colors']; 
        $tag = $data['tags']; 
        $size = $data['sizes']; 
        $trademark = $data['trademarks'];
        $price = $data['prices'];

        $product = DB::table('products')
            ->join('colors as c', function ($query) use ($color) {
                if(count(json_decode($color)) > 0) {
                    $query->on('products.color_id', '=', 'c.id')->whereIN('products.color_id', json_decode($color));
                }
            })
            ->join('tags as t', function ($query) use ($tag) {
                if(count(json_decode($tag)) > 0) {
                    $query->on('products.tag_id', '=', 't.id')->whereIN('products.tag_id', json_decode($tag));
                }
            })
            ->join('sizes as s', function ($query) use ($size) {
                if(count(json_decode($size)) > 0) {
                    $query->on('products.size_id', '=', 's.id')->whereIN('products.size_id', json_decode($size));
                }
            })
            ->join('trademarks as tr', function ($query) use ($trademark) {
                if(count(json_decode($trademark)) > 0) {
                    $query->on('products.trademark_id', '=', 'tr.id')->whereIN('products.trademark_id', json_decode($trademark));
                }
            })
            ->whereBetween('price', json_decode($price))
            ->whereNull('products.parent_id')
            ->where('category_id', $id);

        if (count(json_decode($data['tags'])) === 0 && count(json_decode($data['trademarks'])) === 0 && count(json_decode($data['sizes'])) === 0 && count(json_decode($data['colors'])) === 0 && count(json_decode($data['prices'])) === 0) {
            $product = DB::table('products')
                        ->where('category_id', $id)
                        ->whereNull('products.parent_id');
        }

        $listProduct = $product
            ->orderBy('products.id', 'DESC')
            ->paginate(5)
            ->appends(request()->query());

        $view = view('layouts.list-product', compact('listProduct'))->render();

        return response()->json(['currentPage' => $listProduct->currentPage(), 'total_page' => $listProduct->lastPage(), 'view' => $view], 200);
    }
}
