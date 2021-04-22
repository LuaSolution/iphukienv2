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
    public function deleteProductImageByProduct($id)
    {
        return ProductImage::where('product_id', '=', $id)->delete();
    }
}
