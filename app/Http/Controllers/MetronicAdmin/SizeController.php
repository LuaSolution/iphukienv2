<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    /**
     * Get add Size page
     */
    public function getAddSize()
    {
        return view('metronic_admin.sizes.add', $this->data);
    }

    /**
     * Post add Size page
     */
    public function postAddSize(Request $request)
    {
        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListSize')->with('error', 'Thêm thất bại!');
        }
        
        $dataInsert = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Size())->insertSize($dataInsert);

        if ($result instanceof Size) {
            return redirect()->route('adMgetListSize')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListSize')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit Size page
     */
    public function getEditSize($id)
    {

        $size = (new Size())->getSizeById($id);

        if ($size) {
            $this->data['size'] = $size;

            return view('metronic_admin.sizes.edit', $this->data);
        } else {
            return redirect()->route('adMgetListSize');
        }

    }

    /**
     * Size edit page
     */
    public function postEditSize($id, Request $request)
    {

        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListSize')->with('error', 'Thêm thất bại!');
        }

        $dataUpdate = [
            'name' => $name,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Size())->updateSize($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditSize', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditSize', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list Size page
     */
    public function getListSize()
    {
        $this->data['sizes'] = (new Size())->getListSize();

        return view('metronic_admin.sizes.list', $this->data);
    }

    /**
     * Delete Size
     */
    public function getDelSize($id)
    {
        $result = (new Size())->deleteSize($id);

        if ($result > 0) {
            return redirect()->route('adMgetListSize')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListSize')->with('error', 'Xóa thất bại!');
        }
    }
}
