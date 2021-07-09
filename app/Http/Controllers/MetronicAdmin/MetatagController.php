<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Metatag;
use Illuminate\Http\Request;

class MetatagController extends Controller
{
    /**
     * Get edit Metatag page
     */
    public function getEditMeta($id)
    {

        $Metatag = Metatag::find($id);

        if ($Metatag) {
            $this->data['Metatag'] = $Metatag;

            return view('metronic_admin.metatags.edit', $this->data);
        } else {
            return redirect()->route('adMgetListMeta');
        }

    }

    /**
     * Metatag edit page
     */
    public function postEditMeta($id, Request $request)
    {
        $res = Metatag::where('id', $id)->first();
        $res->title = $request->title;
        $res->url = $request->url;
        $res->canonical = $request->canonical;
        $res->description = $request->description;
        $res->keywords = $request->keywords;
        $res->save();
        if ($res) {
            toast()->success('Sửa thành công');
            return redirect()->route('adMgetEditMeta', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            toast()->error('Sửa thất bại');
            return redirect()->route('adMgetEditMeta', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list Metatag page
     */
    public function getListMeta()
    {
        $this->data['data'] = Metatag::get();

        return view('metronic_admin.metatags.list', $this->data);
    }

    /**
     * Delete Metatag
     */
    public function getDelMetatag($id)
    {
        $result = (new Metatag())->deleteMetatag($id);

        if ($result > 0) {
            return redirect()->route('adMgetListMeta')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListMeta')->with('error', 'Xóa thất bại!');
        }
    }
}
