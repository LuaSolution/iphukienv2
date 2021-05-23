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
        if ($id == -1) { // danh sach hàng mới
            $this->data['listProduct'] = Product::where('tag_id', 11)->where('parent_id', null)->orderBy('id', 'DESC')->paginate(24);
        } else if ($id == -2) { // danh sach bán chạy
            $this->data['listProduct'] = Product::where('tag_id', 12)->where('parent_id', null)->orderBy('id', 'DESC')->paginate(24);
        } else if ($request->sort) {
            $newId = $id;
            if (!is_numeric($id)) {
                $newId = (new Cate())->getCateBySlug($id)->id;
            }
            switch ($request->sort) {
                case "az":
                    $this->data['listProduct'] = Product::where('category_id', $newId)->where('parent_id', null)->orderBy('name', 'ASC')->paginate(24);
                    break;
                case "za":
                    $this->data['listProduct'] = Product::where('category_id', $newId)->where('parent_id', null)->orderBy('name', 'DESC')->paginate(24);
                    break;
                case "pasc":
                    $this->data['listProduct'] = Product::where('category_id', $newId)->where('parent_id', null)->orderBy('price', 'ASC')->orderBy('sale_price', 'ASC')->paginate(24);
                    break;
                case "pdesc":
                    $this->data['listProduct'] = Product::where('category_id', $newId)->where('parent_id', null)->orderBy('price', 'DESC')->orderBy('sale_price', 'DESC')->paginate(24);
                    break;
                default:
                    $this->data['listProduct'] = Product::where('category_id', $newId)->where('parent_id', null)->orderBy('id', 'DESC')->paginate(24);
            }

        } else {
            $newId = $id;
            if (!is_numeric($id)) {
                $newId = (new Cate())->getCateBySlug($id)->id;
            }
            $this->data['listProduct'] = Product::where('category_id', $newId)->whereNull('parent_id')->orderBy('id', 'DESC')->paginate(24);
        }
        $newId = $id;
        if (!is_numeric($id)) {
            $newId = (new Cate())->getCateBySlug($id)->id;
        }
        if ($id == -1 || $id == -2) {
            $category = (object) ['id' => null, 'title' => 'Danh sách sản phẩm'];

            $this->data['category'] = $category;
        } else {
            $this->data['category'] = (new Cate())->getCateById($newId);
        }
        $this->data['colors'] = (new Color())->getListColorByCategory($newId);
        $this->data['sizes'] = (new Size())->getListSizeByCategory($newId);
        $this->data['trademarks'] = (new Trademark())->getListTrademark();
        $this->data['tags'] = (new Tag())->getListTags();
        $this->data['id'] = $newId;

        if ($request->ajax()) {
            $listProduct = $this->data['listProduct'];
            return view('layouts.list-product', compact('listProduct'));
        }

        $this->data['meta'] = [
            'title' => 'Trang chủ',
            'description' => 'mo ta 1',
            'url' => 'url',
            'keywords' => 'keywords',
            'canonical' => 'canonical',
        ];

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

        if (count(json_decode($data['tags'])) === 0 && count(json_decode($data['trademarks'])) === 0 && count(json_decode($data['sizes'])) === 0 && count(json_decode($data['colors'])) === 0 && count(json_decode($data['prices'])) === 0) {
            return json_encode(DB::table('products')
                    ->where('category_id', $id)
                    ->whereNull('products.parent_id')->get());
        }

        $query = Product::where('category_id', $id)->whereNull('parent_id')->whereBetween('price', json_decode($price));
        if (count(json_decode($tag)) > 0) {
            $query = $query->whereIn('tag_id', json_decode($tag));
        }
        if (count(json_decode($trademark)) > 0) {
            $query = $query->whereIn('trademark_id', json_decode($trademark));
        }
        $listProduct = $query->get();
        $func = function ($p) {
            return $p['id'];
        };
        $listParentId = array_map($func, $listProduct->toArray());

        $listFinal = [];
        $listFinalId = [];
        if (count(json_decode($size)) == 0 && count(json_decode($color)) == 0) {
            $listFinal = $listProduct;
        }
        $listChild = Product::whereIn('parent_id', $listParentId)->get();
        if (count(json_decode($size)) > 0) {
            foreach ($listChild as $p) {
                if (!in_array($p->parent_id, $listFinalId)) {
                    if (in_array($p->size_id, json_decode($size))) {
                        array_push($listFinalId, $p->parent_id);
                        array_push($listFinal, Product::where('id', '=', $p->parent_id)->first());
                    }
                }
            }
        }
        if (count(json_decode($color)) > 0) {
            foreach ($listChild as $p) {
                if (!in_array($p->parent_id, $listFinalId)) {
                    if (in_array($p->color_id, json_decode($color))) {
                        array_push($listFinalId, $p->parent_id);
                        array_push($listFinal, Product::where('id', '=', $p->parent_id)->first());
                    }
                }
            }
        }

        $view = view('layouts.list-product', ['listProduct' => $listFinal, 'hasReadMore' => false])->render();

        return response()->json(['currentPage' => 1, 'total_page' => 1, 'view' => $view], 200);
    }

}
