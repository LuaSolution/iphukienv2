<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'created_at', 'full_description', 'id', 'name', 'slug', 'price', 'sale_price', 'short_description', 'sold', 'status_id', 'tag_id', 'video', 'product_id_nhanh', 'updated_at',
    ];

    public function insertProduct($data)
    {
        return Product::create($data);
    }

    public function updateProduct($id, $data)
    {
        return Product::where('id', '=', $id)->update($data);
    }

    public function getProductById($id)
    {
        if (is_numeric($id)) {
            $res = Product::where('id', $id)->first();
        } else {
            $res = Product::where('slug', $id)->first();
        }
        return $res;
    }
    public function getProductBySlug($slug)
    {
        return Product::where('slug', '=', $slug)->first();
    }
    public function getProductByTypeSlug($type, $slug)
    {
        return Product::where('slug', '=', $slug)->where('type', '=', $type)->first();
    }

    public function getListProduct()
    {
        return Product::leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'products.status_id')
            ->leftJoin('tags', 'tags.id', '=', 'products.tag_id')
            ->select('products.*', 'tags.name as tag_name', 'categories.title as category_name', 'statuses.name as status_name')
            ->orderBy('pos', 'asc')->orderBy('created_at', 'desc')
            ->get();
    }

    public function getListProductByQuery($query)
    {
        return Product::where('title', 'like', '%' . $query . '%')->orderBy('pos', 'asc')->orderBy('created_at', 'desc')->get();
    }

    public function getListProductByType($type)
    {
        return Product::where('type', '=', $type)->orderBy('pos', 'asc')->orderBy('created_at', 'desc')->get();
    }
    public function getListProductByTypeRelate($type, $slug)
    {
        return Product::where('type', '=', $type)->where('slug', '!=', $slug)->orderBy('pos', 'asc')->orderBy('created_at', 'desc')->limit(8)->get();
    }
    public function getListProductLimit($type, $limit)
    {
        return Product::where('type', '=', $type)->orderBy('pos', 'asc')->orderBy('created_at', 'desc')->limit($limit)->get();
    }
    public function getListProductLimitOffset($type, $limit, $offset)
    {
        return Product::where('type', '=', $type)->orderBy('pos', 'asc')->orderBy('created_at', 'desc')->offset($offset)->limit($limit)->get();
    }
    public function deleteProduct($id)
    {
        return Product::where('id', '=', $id)->delete();
    }
    public function countProductByType($type)
    {
        return Product::where('type', '=', $type)->count();
    }
    public function getListProductById($arrId)
    {
        return Product::whereIn('id', $arrId)->orderBy('pos', 'asc')->orderBy('created_at', 'desc')->get();
    }
    public function getListProductNotInFlashSale()
    {
        return Product::whereNotIn('id', function ($query) {
            $query->select('product_id')
                ->from('sale_products')
                ->whereRaw('? >= from_date', [date("Y-m-d")])
                ->whereRaw('? <= to_date', [date("Y-m-d")]);
        })->orderBy('created_at', 'desc')->get();
    }
    public function getListSameProduct($cateId, $productId)
    {
        return Product::where('category_id', '=', $cateId)
            ->where('id', '<>', $productId)
            ->take(4)
            ->orderBy('created_at', 'desc')->get();
    }
}
