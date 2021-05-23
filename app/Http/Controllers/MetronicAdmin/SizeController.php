<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Size;
use App\Cate;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    /**
     * Get add Size page
     */
    public function getAddSize()
    {
        $this->data['categories'] = (new Cate())->getListCate();

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
            'category_id' => $request->input('category'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Size())->insertSize($dataInsert);

        if ($result instanceof Size) {
            toast()->success('Thêm thành công');
            return redirect()->route('adMgetListSize')->with('success', 'Thêm thành công!');
        } else {
            toast()->error('Thêm thất bại');
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
            $this->data['categories'] = (new Cate())->getListCate();

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
            'category_id' => $request->input('category'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Size())->updateSize($id, $dataUpdate);
        if ($result > 0) {
            toast()->success('Sửa thành công');
            return redirect()->route('adMgetEditSize', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            toast()->error('Sửa thất bại');
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
