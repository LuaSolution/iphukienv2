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
        'id',
        'name',
        'short_description',
        'full_description',
        'price',
        'category_id',
        'status_id',
        'tag_id',
        'created_at',
        'updated_at',
        'sold',
        'sale_price',
        'product_id_nhanh',
        'video',
        'slug',
        'trademark_id',
        'parent_id',
        'default_image',
        'size_id',
        'color_id',
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
            $res = Product::leftJoin('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.*', 'categories.title as category_name', 'categories.slug as category_slug')
                ->where('products.id', $id)->first();
        } else {
            $res = Product::leftJoin('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.*', 'categories.title as category_name', 'categories.slug as category_slug')
                ->where('products.slug', $id)->first();
        }
        parse_str(parse_url($res->video, PHP_URL_QUERY), $embed_link);
        $res->video = $embed_link;

        return $res;
    }
    public function getChildProductByParentSizeColor($parentId, $sizeId, $colorId)
    {
        return Product::where('products.parent_id', $parentId)
            ->where('products.size_id', $sizeId)
            ->where('products.color_id', $colorId)
            ->first();
    }
    public function getProductBySlug($slug)
    {
        return Product::where('slug', '=', $slug)->first();
    }
    public function getProductByTypeSlug($type, $slug)
    {
        return Product::where('slug', '=', $slug)->where('type', '=', $type)->first();
    }
    public function getProductByNhanhId($nhanhId)
    {
        return Product::where('product_id_nhanh', '=', $nhanhId)->first();
    }
    public function getListProduct()
    {
        return Product::leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'products.status_id')
            ->leftJoin('tags', 'tags.id', '=', 'products.tag_id')
            ->select('products.*', 'tags.name as tag_name', 'categories.title as category_name', 'statuses.name as status_name')
            ->orderBy('pos', 'asc')->orderBy('created_at', 'desc')
            ->paginate(10);
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
        })->whereNull('parent_id')->orderBy('created_at', 'desc')->get();
    }
    public function getListSameProduct($cateId, $productId)
    {
        return Product::where('category_id', '=', $cateId)
            ->where('id', '<>', $productId)
            ->where('parent_id', '=', null)
            ->take(4)
            ->orderBy('created_at', 'desc')->get();
    }
    public function searchByKeyword($keyword)
    {
        return Product::select('products.*')
            ->where('products.slug', '<>', null)
            ->where('products.parent_id', null)
            ->where('products.name', 'like', '%' . $keyword . '%')
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function getListParentProduct()
    {
        return Product::whereNull('parent_id')->get();
    }
    public function getListChildProduct($parentId)
    {
        $cId = null;
        if (!is_numeric($parentId)) {
            $cId = Product::where('products.slug', $parentId)->first()->id;
        } else {
            $cId = $parentId;
        }

        return Product::leftJoin('sizes', 'products.size_id', '=', 'sizes.id')
            ->leftJoin('colors', 'products.color_id', '=', 'colors.id')
            ->select('products.*', 'colors.name as color_name', 'sizes.name as size_name')
            ->where('parent_id', '=', $cId)->get();
    }
    public function getProductDefaultImage($parentId)
    {
        return Product::leftJoin('product_image', 'product_image.product_id', '=', 'products.id')
            ->select('products.*', 'product_image.image')
            ->where('products.parent_id', $parentId)->first();
    }
    public function searchByName($keyword)
    {
        return Product::leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('statuses', 'statuses.id', '=', 'products.status_id')
            ->leftJoin('tags', 'tags.id', '=', 'products.tag_id')
            ->select('products.*', 'tags.name as tag_name', 'categories.title as category_name', 'statuses.name as status_name')
            ->orderBy('pos', 'asc')->orderBy('created_at', 'desc')
            ->where('products.name', 'like', '%' . $keyword . '%')
            ->paginate(10);
    }
}
