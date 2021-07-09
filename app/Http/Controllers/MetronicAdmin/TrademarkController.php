<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Trademark;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{

    /**
     * Get add Trademark page
     */
    public function getAddTrademark()
    {
        return view('metronic_admin.trademarks.add', $this->data);
    }

    /**
     * Post add Trademark page
     */
    public function postAddTrademark(Request $request)
    {
        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListTrademark')->with('error', 'Thêm thất bại!');
        }
        
        $dataInsert = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Trademark())->insertTrademark($dataInsert);

        if ($result instanceof Trademark) {
            return redirect()->route('adMgetListTrademark')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListTrademark')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit Trademark page
     */
    public function getEditTrademark($id)
    {

        $trademark = (new Trademark())->getTrademarkById($id);

        if ($trademark) {
            $this->data['trademark'] = $trademark;

            return view('metronic_admin.trademarks.edit', $this->data);
        } else {
            return redirect()->route('adMgetListTrademark');
        }

    }

    /**
     * Trademark edit page
     */
    public function postEditTrademark($id, Request $request)
    {

        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListTrademark')->with('error', 'Thêm thất bại!');
        }

        $dataUpdate = [
            'name' => $name,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Trademark())->updateTrademark($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditTrademark', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditTrademark', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list Trademark page
     */
    public function getListTrademark()
    {
        $this->data['trademarks'] = (new Trademark())->getListTrademark();

        return view('metronic_admin.trademarks.list', $this->data);
    }

    /**
     * Delete Trademark
     */
    public function getDelTrademark($id)
    {
        $result = (new Trademark())->deleteTrademark($id);

        if ($result > 0) {
            return redirect()->route('adMgetListTrademark')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListTrademark')->with('error', 'Xóa thất bại!');
        }
    }
}
