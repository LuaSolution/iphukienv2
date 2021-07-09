<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Get edit Promotion page
     */
    public function getEdit($id)
    {

        $Promotion = Promotion::find($id);

        if ($Promotion) {
            $this->data = $Promotion;

            return view('metronic_admin.promotions.edit', ['data' => $this->data]);
        } else {
            return redirect()->route('adMgetListPromotion');
        }

    }

    /**
     * Promotion edit page
     */
    public function postEdit($id, Request $request)
    {
        // imageFile
        $imageFile = $request->file('image');
        $path = "";

        if ($request->hasFile('image')) {
            $image = $request->image->getClientOriginalName();
            $path = $request->image->storeAs('img/promotion', $image);
        }

        $result = Promotion::where('id', $id)->first();
        $result->href = $request->href;
        $result->hide = $request->hide;

        if ($request->hasFile('image')) {
            $result->image = $path;
        }
        $result->save();

        if ($result) {
            toast()->success('Sửa thành công');
            return redirect()->route('adMgetEditPromotion', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            toast()->error('Sửa thất bại');
            return redirect()->route('adMgetEditPromotion', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }
    }

    /**
     * Get list Promotion page
     */
    public function getList()
    {
        $this->data['data'] = Promotion::get();

        return view('metronic_admin.promotions.list', $this->data);
    }
}
