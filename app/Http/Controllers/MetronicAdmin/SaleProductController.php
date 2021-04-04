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
        $this->data['products'] = (new Product())->getListProductNotInFlashSale();

        return view('metronic_admin.sale_products.add', $this->data);
    }

    /**
     * Post add SaleProduct page
     */
    public function postAddSaleProduct(Request $request)
    {
        $productId = $request->input('product');
        if (!$productId) {
            return redirect()->route('adMgetListSaleProduct')->with('error', 'Thêm thất bại!');
        }
        $fromDate = $request->input('from_date');
        if (!$fromDate) {
            return redirect()->route('adMgetListSaleProduct')->with('error', 'Thêm thất bại!');
        }
        $toDate = $request->input('to_date');
        if (!$toDate) {
            return redirect()->route('adMgetListSaleProduct')->with('error', 'Thêm thất bại!');
        }
        $salePrice = $request->input('sale_price');
        if (!$salePrice) {
            return redirect()->route('adMgetListSaleProduct')->with('error', 'Thêm thất bại!');
        }

        $dataInsert = [
            'product_id' => $productId,
            'from_date' => date("Y-m-d", strtotime($fromDate)),
            'to_date' => date("Y-m-d", strtotime($toDate)),
            'sale_price' => $salePrice,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $result = (new SaleProduct())->insertSaleProduct($dataInsert);

        if ($result instanceof SaleProduct) {
            toast()->success('Thêm thành công');
            return redirect()->route('adMgetListSaleProduct')->with('success', 'Thêm thành công!');
        } else {
            toast()->error('Thêm thất bại');
            return redirect()->route('adMgetListSaleProduct')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get list SaleProduct page
     */
    public function getListSaleProduct()
    {
        $this->data['saleProducts'] = (new SaleProduct())->getListSaleProduct();

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
