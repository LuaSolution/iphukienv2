<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $table = 'product_color';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'color_id', 'image',
    ];

    public function insertProductColor($data)
    {
        return ProductColor::create($data);
    }
    public function getListProductColorByProduct($productId)
    {
        return ProductColor::where('product_id', '=', $productId)
            ->leftJoin('colors', 'colors.id', '=', 'product_color.color_id')
            ->select('product_color.product_id', 'product_color.color_id', 'product_color.image', 'colors.name as color_name', 'colors.code', 'product_color.image')
            ->get();
    }
    public function getListProductColorByProductDistinct($productId)
    {
        return ProductColor::where('product_id', '=', $productId)
            ->leftJoin('colors', 'colors.id', '=', 'product_color.color_id')
            ->select('colors.name as color_name', 'product_color.color_id')->distinct()->get();
    }
    public function deleteProductColorByProduct($id)
    {
        return ProductColor::where('product_id', '=', $id)->delete();
    }
    public function getListProductColorByProductAndColor($productId, $colorId)
    {
        return ProductColor::where('product_id', '=', $productId)
            ->where('color_id', '=', $colorId)->get();
    }
    public function updateImageByProductAndColor($productId, $colorId, $newPath)
    {
        return ProductColor::where('product_id', '=', $productId)
            ->where('color_id', '=', $colorId)
            ->update(['image' => $newPath]);
    }
    public function removeProductColorByProduct($id, $colors)
    {
        return ProductColor::where('product_id', '=', $id)
            ->whereNotIn('color_id', $colors)
            ->delete();
    }
    public function getFirstImage($productId)
    {
        return ProductColor::where('product_id', '=', $productId)->first();
    }
}
