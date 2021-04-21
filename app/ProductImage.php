<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_image';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'image',
    ];

    public function insertProductImage($data)
    {
        return ProductImage::create($data);
    }
    public function getListProductImageByProduct($productId)
    {
        return ProductImage::where('product_id', '=', $productId)->get();
    }
    public function getListProductImageById($id)
    {
        return ProductImage::where('id', '=', $id)->first();
    }
    public function updateProductImage($id, $data)
    {
        return ProductImage::where('id', '=', $id)->update($data);
    }
    public function deleteProductImageById($id)
    {
        return ProductImage::where('id', '=', $id)->delete();
    }
    // public function getListProductColorByProductDistinct($productId)
    // {
    //     return ProductColor::where('product_id', '=', $productId)
    //         ->leftJoin('colors', 'colors.id', '=', 'product_color.color_id')
    //         ->select('colors.name as color_name', 'product_color.color_id')->distinct()->get();
    // }
    public function deleteProductImageByProduct($id)
    {
        return ProductImage::where('product_id', '=', $id)->delete();
    }
    // public function getListProductColorByProductAndColor($productId, $colorId)
    // {
    //     return ProductColor::where('product_id', '=', $productId)
    //         ->where('color_id', '=', $colorId)->get();
    // }
    // public function updateImageByProductAndColor($productId, $colorId, $newPath)
    // {
    //     return ProductColor::where('product_id', '=', $productId)
    //         ->where('color_id', '=', $colorId)
    //         ->update(['image' => $newPath]);
    // }
    // public function removeProductColorByProduct($id, $colors)
    // {
    //     return ProductColor::where('product_id', '=', $id)
    //         ->whereNotIn('color_id', $colors)
    //         ->delete();
    // }
    // public function getFirstImage($productId)
    // {
    //     return ProductColor::where('product_id', '=', $productId)->first();
    // }
}
