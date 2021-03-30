<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Product;
use App\SaleProduct;
use Illuminate\Http\Request;

class SaleProductController extends Controller
{

    /**
     * Get add SaleProduct page
     */
    public function getAddSaleProduct()
    {
        $this->data['list_product'] = (new Product())->getListProductNotInFlashSale();
dd($this->data['list_product']);
        return view('metronic_admin.sale_products.add', $this->data);
    }

    /**
     * Post add SaleProduct page
     */
    public function postAddSaleProduct(Request $request)
    {
        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListSaleProduct')->with('error', 'Thêm thất bại!');
        }
        
        $dataInsert = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new SaleProduct())->insertSaleProduct($dataInsert);

        if ($result instanceof SaleProduct) {
            return redirect()->route('adMgetListSaleProduct')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListSaleProduct')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit SaleProduct page
     */
    public function getEditSaleProduct($id)
    {

        $saleProduct = (new SaleProduct())->getSaleProductById($id);

        if ($saleProduct) {
            $this->data['saleProduct'] = $saleProduct;

            return view('metronic_admin.sale_products.edit', $this->data);
        } else {
            return redirect()->route('adMgetListSaleProduct');
        }

    }

    /**
     * SaleProduct edit page
     */
    public function postEditSaleProduct($id, Request $request)
    {

        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListSaleProduct')->with('error', 'Thêm thất bại!');
        }

        $dataUpdate = [
            'name' => $name,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new SaleProduct())->updateSaleProduct($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditSaleProduct', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditSaleProduct', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list SaleProduct page
     */
    public function getListSaleProduct()
    {
        $this->data['sale_products'] = (new SaleProduct())->getListSaleProduct();

        return view('metronic_admin.sale_products.list', $this->data);
    }

    /**
     * Delete SaleProduct
     */
    public function getDelSaleProduct($id)
    {
        $result = (new SaleProduct())->deleteSaleProduct($id);

        if ($result > 0) {
            return redirect()->route('adMgetListSaleProduct')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListSaleProduct')->with('error', 'Xóa thất bại!');
        }
    }
}
