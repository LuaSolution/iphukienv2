<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Cate;
use App\Color;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\Size;
use App\Status;
use App\Tag;
use App\Trademark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $this->data['trademarks'] = (new Trademark())->getListTrademark();
        $this->data['listParentProduct'] = (new Product())->getListParentProduct();

        return view('metronic_admin.products.add', $this->data);
    }

    public function updateProductImage(Request $request)
    {
        if ($request->input('type') == 'add') {
            $imgName = date('YmdHis') . '_' . $request->input('size_id') . '_' . $request->input('color_id') . '.' . $request->file('image')->extension();
            $path = $request->file('image')->storeAs(
                'img/product/' . $request->input('id'), $imgName
            );
            (new ProductImage())->insertProductImage(
                [
                    'product_id' => $request->input('id'),
                    'image' => $path,
                ]
            );
            $productObj = (new Product())->getProductById($request->input('id'));
            $parentProductObj = (new Product())->getProductById($productObj->parent_id);
            $dataUpdate = [
                'default_image' => $path,
            ];
            (new Product())->updateProduct($parentProductObj->id, $dataUpdate);
            (new Product())->updateProduct($productObj->id, $dataUpdate);
        } else {
            $productImageObj = (new ProductImage())->getListProductImageById($request->input('product_image_id'));
            $imgName = date('YmdHis') . '_' . $request->input('size_id') . '_' . $request->input('color_id') . '.' . $request->file('image')->extension();
            $path = $request->file('image')->storeAs(
                'img/product/' . $request->input('id'), $imgName
            );
            (new ProductImage())->updateProductImage(
                $request->input('product_image_id'),
                [
                    'image' => $path,
                ]
            );
            $productObj = (new Product())->getProductById($request->input('id'));
            $parentProductObj = (new Product())->getProductById($productObj->parent_id);
            $dataUpdate = [
                'default_image' => $path,
            ];
            (new Product())->updateProduct($parentProductObj->id, $dataUpdate);
            (new Product())->updateProduct($productObj->id, $dataUpdate);
        }

        return json_encode(['code' => 1]);
    }

    public function deleteProductImage(Request $request)
    {
        $productImageObj = (new ProductImage())->getListProductImageById($request->input('product_image_id'));
        $productObj = (new Product())->getProductById($productImageObj->product_id);
        $parentProductObj = (new Product())->getProductById($productObj->parent_id);
        if ($productImageObj->image == $productObj->default_image) {
            (new Product())->updateProduct($parentProductObj->id, [
                'default_image' => null,
            ]);
        }
        if ($productImageObj->image == $parentProductObj->default_image) {
            (new Product())->updateProduct($parentProductObj->id, [
                'default_image' => null,
            ]);
        }
        (new ProductImage())->deleteProductImageById($request->input('product_image_id'));

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
        $slug = $request->input('slug');
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
        if (!$salePrice) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $video = $request->input('video') == '' ? null : $request->input('video');
        $status = $request->input('status_id') == 'no-status' ? null : $request->input('status_id');
        $tag = $request->input('tag_id') == 'no-tag' ? null : $request->input('tag_id');
        $trademark = $request->input('trademark_id');
        $parent = $request->input('parent_id') == 'no-parent' ? null : $request->input('parent_id');
        $size = $request->input('size_id') == 'no-size' ? null : $request->input('size_id');
        $color = $request->input('color_id') == 'no-color' ? null : $request->input('color_id');

        $dataInsert = [
            'name' => $name,
            'slug' => $slug,
            'category_id' => $categoryId,
            'short_description' => $shortDescription,
            'full_description' => $fullDescription,
            'price' => $price,
            'sale_price' => $salePrice,
            'video' => $video,
            'status_id' => $status,
            'tag_id' => $tag,
            'trademark_id' => $trademark,
            'parent_id' => $parent,
            'size_id' => $size,
            'color_id' => $color,
            'sold' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Product())->insertProduct($dataInsert);

        if ($result != null) {
            if ($result->parent_id !== null) {
                $parentProductObj = (new Product())->getProductById($result->parent_id);

                for ($i = 0; $i < $request->input('total_image'); $i++) {
                    $imgName = date('YmdHis') . '_' . $i . '_' . $request->input('size_id') . '_' . $request->input('color_id') . '.' . $request->file('list_image_' . $i)->extension();
                    $path = $request->file('list_image_' . $i)->storeAs(
                        'img/product/' . $result->id, $imgName
                    );
                    (new ProductImage())->insertProductImage(
                        [
                            'product_id' => $result->id,
                            'image' => $path,
                        ]
                    );
                    if ($parentProductObj->image == null) {
                        $dataUpdate = [
                            'default_image' => $path,
                        ];
                        (new Product())->updateProduct($parentProductObj->id, $dataUpdate);
                    }
                    if ($result->image == null) {
                        $dataUpdate = [
                            'default_image' => $path,
                        ];
                        (new Product())->updateProduct($result->id, $dataUpdate);
                    }
                }
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

        toast()->success('Thêm thành công');
        return json_encode(['code' => 1, 'product_id' => $result->id]);
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
        $this->data['productImage'] = (new ProductImage())->getListProductImageByProduct($id);
        $this->data['listParentProduct'] = (new Product())->getListParentProduct();
        $this->data['trademarks'] = (new Trademark())->getListTrademark();

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
        $slug = $request->input('slug');
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
        if (!$salePrice) {
            return json_encode(['code' => 0, 'message' => "Thêm thất bại"]);
        }
        $video = $request->input('video') == '' ? null : $request->input('video');
        $status = $request->input('status_id') == 'no-status' ? null : $request->input('status_id');
        $tag = $request->input('tag_id') == 'no-tag' ? null : $request->input('tag_id');
        $trademark = $request->input('trademark_id');
        $parent = $request->input('parent_id') == 'no-parent' ? null : $request->input('parent_id');
        $size = $request->input('size_id') == 'no-size' ? null : $request->input('size_id');
        $color = $request->input('color_id') == 'no-color' ? null : $request->input('color_id');

        $dataUpdate = [
            'name' => $name,
            'slug' => $slug,
            'category_id' => $categoryId,
            'short_description' => $shortDescription,
            'full_description' => $fullDescription,
            'price' => $price,
            'sale_price' => $salePrice,
            'status_id' => $status,
            'tag_id' => $tag,
            'sold' => 0,
            'video' => $video,
            'trademark_id' => $trademark,
            'parent_id' => $parent,
            'size_id' => $size,
            'color_id' => $color,
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
    public function getListProduct(Request $request)
    {
        // $this->data['products'] = (new Product())->getListProduct();
        if(null != $request->input('keyword')) {
            $this->data['products'] = (new Product())->searchByName($request->input('keyword'));
        } else {
            $this->data['products'] = (new Product())->getListProduct();
        }

        return view('metronic_admin.products.list', $this->data);
    }

    /**
     * Delete Tag
     */
    public function getDelProduct($id)
    {
        $listChildProd = (new Product())->getListChildProduct($id);
        if (count($listChildProd) > 0) {
            toast()->error('Không thể xóa sản phẩm có sản phẩm con');
            return redirect()->route('adMgetListProduct')->with('error', 'Xóa thất bại!');
        }
        (new ProductImage())->deleteProductImageByProduct($id);
        $result = (new Product())->deleteProduct($id);

        if ($result > 0) {
            return redirect()->route('adMgetListProduct')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListProduct')->with('error', 'Xóa thất bại!');
        }
    }

    public function syncProductFromNhanh()
    {
        ini_set('max_execution_time', 0);
        // get list from nhanh
        $cPage = 0;
        $tPage = 0;

        // get category nhanh
        $listNhanhCate = Helpers::callNhanhApi("productcategory", "/product/category", true);
        do {
            $cPage++;
            //get list parent
            $listParentProduct = $this->getListProductFromNhanh($cPage, 0);
            if (!isset($listParentProduct->code)) {
                if ($tPage == 0) {
                    $cPage = $listParentProduct->currentPage;
                    $tPage = $listParentProduct->totalPages;
                }
                $listProduct = (array) $listParentProduct->products;
                foreach ($listProduct as $product) {
                    //insert parent product
                    $nhanhParentCate = $this->getCategoryOfNhanh($listNhanhCate, $product->categoryId);
                    $parentCate = Cate::firstOrCreate(['title' => $nhanhParentCate != null ? $nhanhParentCate->name : 'no-category']);
                    //status
                    if ($product->status != 'Inactive') {
                        //insert parent product
                        $parentPrd = Product::firstOrCreate([
                            'product_id_nhanh' => $product->idNhanh,
                        ]);
                        //status
                        $parentStatusId = $this->getStatusIdFromNhanh($product->status);
                        //trademark
                        $branchName = !empty($product->brandName) ? $product->brandName : 'iPhuKien';
                        $trademarkObj = Trademark::firstOrCreate(['name' => $branchName]);
                        //update product information
                        $this->updateProductInformationFromNhanh(
                            $product, $parentCate->id, $parentStatusId, $trademarkObj->id, $parentPrd->id);
                        // updade child product
                        $cChildPage = 0;
                        $tChildPage = 0;
                        do {
                            $cChildPage++;
                            $listChildProduct = $this->getListProductFromNhanh($cChildPage, $product->idNhanh);
                            if (!isset($listChildProduct->code)) {
                                if ($tChildPage == 0) {
                                    $cChildPage = $listChildProduct->currentPage;
                                    $tChildPage = $listChildProduct->totalPages;
                                }
                                $listChildrentProduct = (array) $listChildProduct->products;

                                foreach ($listChildrentProduct as $p) {
                                    //insert parent product
                                    $nhanhChildCate = $this->getCategoryOfNhanh($listNhanhCate, $p->categoryId);
                                    $childCate = Cate::firstOrCreate(['title' => isset($nhanhChildCate->name) ? $nhanhChildCate->name : 'no-category']);
                                    //insert parent product
                                    $checkChild = (new Product())->getProductByNhanhId($p->idNhanh);
                                    if($checkChild == null) {
                                        $childPrd = Product::firstOrCreate([
                                            'product_id_nhanh' => $p->idNhanh,
                                            'parent_id' => $parentPrd->id,
                                        ]);
                                        //status
                                        $childStatusId = $this->getStatusIdFromNhanh($p->status);
                                        //trademark
                                        $childBranchName = !empty($p->brandName) ? $p->brandName : 'iPhuKien';
                                        $chilTrademarkObj = Trademark::firstOrCreate(['name' => $childBranchName]);
                                        //update product information
                                        if (count($p->attributes) > 0) {
                                            foreach ($p->attributes as $att) {
                                                if (strpos(reset($att)->attributeName, 'Kích thước') !== false) {
                                                    $pSize = Size::firstOrCreate(['name' => reset($att)->name]);
                                                }
                                                if (strpos(reset($att)->attributeName, 'Màu sắc') !== false) {
                                                    $pColor = Color::firstOrCreate(['name' => reset($att)->name]);
                                                }
                                            }
                                        }
                                        if (!isset($pSize)) {
                                            $pSize = Size::firstOrCreate(['name' => 'One Size']);
                                        }
                                        if (!isset($pColor)) {
                                            $pColor = Color::firstOrCreate(['name' => 'One Color']);
                                        }
                                        $this->updateProductInformationFromNhanh(
                                            $p, $childCate->id, $childStatusId, $chilTrademarkObj->id, $childPrd->id, $pSize->id, $pColor->id);
                                    }
                                }
                            }
                        } while ($cChildPage < $tChildPage);
                    }
                }
            }
        } while ($cPage < $tPage);

        return redirect()->route('adMgetListProduct');
    }

    public function getListProductFromNhanh($page, $parentId)
    {
        return Helpers::callNhanhApi([
            'page' => $page,
            'parentId' => $parentId,
            'icpp' => 50,
        ], "/product/search");
    }

    public function getCategoryOfNhanh($listCate, $categoryId)
    {
        if(!is_array($listCate)) return;
        foreach ($listCate as $c) {
            if ($c->id == $categoryId) {
                return $c;
            }
        }
    }

    public function getStatusIdFromNhanh($status)
    {
        $parentStatusId = 0;
        switch ($status) {
            case 'OutOfStock':
                $parentStatusId = 11;
                break;
            case 'Active':
                $parentStatusId = 13;
                break;
            case 'New':
                $parentStatusId = 13;
                break;
        }

        return $parentStatusId;
    }

    public function updateProductInformationFromNhanh($product, $parentCateId, $parentStatusId, $trademarkId, $parentPrdId, $sizeId = null, $colorId = null)
    {
        $dataUpdate = [
            'name' => $product->name,
            'category_id' => $parentCateId,
            'short_description' => $product->name,
            'full_description' => $product->name,
            'price' => $product->oldPrice != null ? $product->oldPrice : $product->price,
            'sale_price' => $product->price,
            'status_id' => $parentStatusId,
            'tag_id' => 11,
            'size_id' => $sizeId,
            'color_id' => $colorId,
            'trademark_id' => $trademarkId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        (new Product())->updateProduct($parentPrdId, $dataUpdate);
    }
}
