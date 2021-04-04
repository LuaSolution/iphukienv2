<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Cate;
use App\Color;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductColor;
use App\ProductSize;
use App\Size;
use App\Status;
use App\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Get add Tag page
     */
    public function getAddProduct()
    {
        $this->data['categories'] = (new Cate())->getListCate();
        $this->data['statuses'] = (new Status())->getListStatus();
        $this->data['tags'] = (new Tag())->getListTag();
        $this->data['sizes'] = (new Size())->getListSize();
        $this->data['colors'] = (new Color())->getListColor();

        return view('metronic_admin.products.add', $this->data);
    }

    public function uploadProductImage(Request $request)
    {
        $imgName = $request->input('color_id') . '.' . $request->file('img')->extension();
        $path = $request->file('img')->storeAs(
            'img/product/' . $request->input('product_id'), $imgName
        );

        (new ProductColor())->insertProductColor(
            [
                'product_id' => $request->input('product_id'),
                'color_id' => $request->input('color_id'),
                'image' => $path,
            ]
        );

        return json_encode(['code' => 1]);
    }

    public function updateProductImage(Request $request)
    {
        // check productImg
        $productColorObj = (new ProductColor())->getListProductColorByProductAndColor($request->input('product_id'), $request->input('color_id'));
        if ($productColorObj->isEmpty() && !$request->hasFile('img')) {
            return json_encode(['code' => 0, 'message' => "Cập nhật ảnh thất bại"]);
        }

        if ($request->hasFile('img')) {
            $imgName = $request->input('color_id') . '.' . $request->file('img')->extension();
            $path = $request->file('img')->storeAs(
                'img/product/' . $request->input('product_id'), $imgName
            );
            if (!$productColorObj->isEmpty()) {
                (new ProductColor())->updateImageByProductAndColor(
                    $request->input('product_id'),
                    $request->input('color_id'),
                    $path
                );
            } else {
                (new ProductColor())->insertProductColor(
                    [
                        'product_id' => $request->input('product_id'),
                        'color_id' => $request->input('color_id'),
                        'image' => $path,
                    ]
                );
            }
        }

        return json_encode(['code' => 1]);
    }

    /**
     * Post add Tag page
     */
    public function postAddProduct(Request $request)
    {
        $name = $request->input('name');
        if (!$name) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $categoryId = $request->input('category_id');
        $shortDescription = $request->input('short_description');
        if (!$shortDescription) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $fullDescription = $request->input('full_description');
        if (!$fullDescription) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $price = $request->input('price');
        if (!$price) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $salePrice = $request->input('sale_price');
        if (!$price) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $status = $request->input('status_id');
        $tag = $request->input('tag_id');
        $sizes = explode(",", $request->input('sizes'));

        $dataInsert = [
            'name' => $name,
            'category_id' => $categoryId,
            'short_description' => $shortDescription,
            'full_description' => $fullDescription,
            'price' => $price,
            'sale_price' => $salePrice,
            'status_id' => $status,
            'tag_id' => $tag,
            'sold' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Product())->insertProduct($dataInsert);

        if ($result instanceof Product) {
            foreach ($sizes as $s) {
                (new ProductSize())->insertProductSize(
                    [
                        'product_id' => $result->id,
                        'size_id' => $s,
                    ]
                );
            }
            //sync to nhanh
            $addProductId = $result->id;
            $resNhanh = Helpers::callNhanhApi([
                [
                    'id' => $addProductId,
                    'name' => $result->name,
                    'price' => $result->sale_price,
                ],
            ], "/product/add");
            $dataUpdate = [
                'product_id_nhanh' => $resNhanh->ids->$addProductId,
            ];
            (new Product())->updateProduct($addProductId, $dataUpdate);
            toast()->success('Thêm thành công');
            return json_encode(['code' => 1, 'product_id' => $addProductId]);
        } else {
            toast()->error('Thêm thất bại');
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }

    }

    /**
     * Get edit Tag page
     */
    public function getEditProduct($id)
    {
        $this->data['categories'] = (new Cate())->getListCate();
        $this->data['statuses'] = (new Status())->getListStatus();
        $this->data['tags'] = (new Tag())->getListTag();
        $this->data['sizes'] = (new Size())->getListSize();
        $this->data['colors'] = (new Color())->getListColor();
        $this->data['product'] = (new Product())->getProductById($id);
        $this->data['productSize'] = (new ProductSize())->getListProductSizeByProduct($id)->map(function ($i) {
            return $i->size_id;
        })->all();
        $productColor = (new ProductColor())->getListProductColorByProduct($id);

        $this->data['productColorObj'] = $productColor->map(function ($i) {
            $obj = new \stdClass();
            $obj->color = $i->color_id;
            $obj->code = $i->code;
            $obj->img = asset('public/' . $i->image);
            return $obj;
        })->all();

        $this->data['productColorId'] = $productColor->map(function ($i) {
            return $i->color_id;
        })->all();

        if ($this->data['product']) {
            return view('metronic_admin.products.edit', $this->data);
        } else {
            return redirect()->route('adMgetListProduct');
        }

    }

    /**
     * Tag edit page
     */
    public function postEditProduct($id, Request $request)
    {
        $name = $request->input('name');
        if (!$name) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $categoryId = $request->input('category_id');
        $shortDescription = $request->input('short_description');
        if (!$shortDescription) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $fullDescription = $request->input('full_description');
        if (!$fullDescription) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $price = $request->input('price');
        if (!$price) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $salePrice = $request->input('sale_price');
        if (!$price) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $status = $request->input('status_id');
        $tag = $request->input('tag_id');

        //update size
        $sizes = explode(",", $request->input('sizes'));
        (new ProductSize())->deleteProductSizeByProduct($id);
        foreach ($sizes as $s) {
            (new ProductSize())->insertProductSize(
                [
                    'product_id' => $id,
                    'size_id' => $s,
                ]
            );
        }

        //delete unused color
        $colors = explode(",", $request->input('colors'));
        (new ProductColor())->removeProductColorByProduct($id, $colors);

        $dataUpdate = [
            'name' => $name,
            'category_id' => $categoryId,
            'short_description' => $shortDescription,
            'full_description' => $fullDescription,
            'price' => $price,
            'sale_price' => $salePrice,
            'status_id' => $status,
            'tag_id' => $tag,
            'sold' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Product())->updateProduct($id, $dataUpdate);
        if ($result > 0) {
            toast()->success('Sửa thành công');
            return json_encode(['code' => 1, 'product_id' => $id]);
        } else {
            toast()->error('Sửa thất bại');
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }

    }

    /**
     * Get list Tag page
     */
    public function getListProduct()
    {
        $this->data['products'] = (new Product())->getListProduct();

        return view('metronic_admin.products.list', $this->data);
    }

    /**
     * Delete Tag
     */
    public function getDelProduct($id)
    {
        (new ProductSize())->deleteProductSizeByProduct($id);
        (new ProductColor())->deleteProductColorByProduct($id);
        $result = (new Product())->deleteProduct($id);

        if ($result > 0) {
            return redirect()->route('adMgetListProduct')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListProduct')->with('error', 'Xóa thất bại!');
        }
    }
}
