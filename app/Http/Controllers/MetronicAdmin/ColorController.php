<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    /**
     * Get add color page
     */
    public function getAddColor()
    {
        return view('metronic_admin.colors.add', $this->data);
    }

    /**
     * Post add color page
     */
    public function postAddColor(Request $request)
    {
        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListColor')->with('error', 'Thêm thất bại!');
        }
        // code
        $code = $request->input('code');
        if (!$code) {
            return redirect()->route('adMgetListColor')->with('error', 'Thêm thất bại!');
        }
        
        $dataInsert = [
            'name' => $name,
            'code' => $code,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $colorModel = new Color();
        $result = $colorModel->insertColor($dataInsert);

        if ($result instanceof Color) {
            return redirect()->route('adMgetListColor')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListColor')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit color page
     */
    public function getEditColor($id)
    {

        $colorModel = new Color();
        $color = $colorModel->getColorById($id);

        if ($color) {
            $this->data['color'] = $color;

            return view('metronic_admin.colors.edit', $this->data);
        } else {
            return redirect()->route('adMgetListColor');
        }

    }

    /**
     * Color edit page
     */
    public function postEditColor($id, Request $request)
    {

        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListColor')->with('error', 'Thêm thất bại!');
        }
        // code
        $code = $request->input('code');
        if (!$code) {
            return redirect()->route('adMgetListColor')->with('error', 'Thêm thất bại!');
        }

        $dataUpdate = [
            'name' => $name,
            'code' => $code,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $colorModel = new Color();
        $result = $colorModel->updateColor($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditColor', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditColor', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list color page
     */
    public function getListColor()
    {
        $this->data['colors'] = (new Color())->getListColor();

        return view('metronic_admin.colors.list', $this->data);
    }

    /**
     * Delete color
     */
    public function getDelColor($id)
    {
        $result = (new Color())->deleteColor($id);

        if ($result > 0) {
            return redirect()->route('adMgetListColor')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListColor')->with('error', 'Xóa thất bại!');
        }
    }
}
