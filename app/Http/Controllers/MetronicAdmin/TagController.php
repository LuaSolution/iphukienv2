<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
     * Get add Tag page
     */
    public function getAddTag()
    {
        return view('metronic_admin.tags.add', $this->data);
    }

    /**
     * Post add Tag page
     */
    public function postAddTag(Request $request)
    {
        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListTag')->with('error', 'Thêm thất bại!');
        }
        
        $dataInsert = [
            'name' => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Tag())->insertTag($dataInsert);

        if ($result instanceof Tag) {
            return redirect()->route('adMgetListTag')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListTag')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit Tag page
     */
    public function getEditTag($id)
    {

        $tag = (new Tag())->getTagById($id);

        if ($tag) {
            $this->data['tag'] = $tag;

            return view('metronic_admin.tags.edit', $this->data);
        } else {
            return redirect()->route('adMgetListTag');
        }

    }

    /**
     * Tag edit page
     */
    public function postEditTag($id, Request $request)
    {

        // name
        $name = $request->input('name');
        if (!$name) {
            return redirect()->route('adMgetListTag')->with('error', 'Thêm thất bại!');
        }

        $dataUpdate = [
            'name' => $name,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $result = (new Tag())->updateTag($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditTag', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditTag', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list Tag page
     */
    public function getListTag()
    {
        $this->data['tags'] = (new Tag())->getListTag();

        return view('metronic_admin.tags.list', $this->data);
    }

    /**
     * Delete Tag
     */
    public function getDelTag($id)
    {
        $result = (new Tag())->deleteTag($id);

        if ($result > 0) {
            return redirect()->route('adMgetListTag')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListTag')->with('error', 'Xóa thất bại!');
        }
    }
}
