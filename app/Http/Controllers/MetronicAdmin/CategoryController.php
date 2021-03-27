<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\Cate;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Get add cate page
     */
    public function getAddCate()
    {
        $this->data['parentCate'] = (new Cate())->getListParentCate();

        return view('metronic_admin.categories.add', $this->data);
    }

    /**
     * Post add cate page
     */
    public function postAddCate(Request $request)
    {

        // title
        $title = $request->input('title');
        if (!$title) {
            $title = "Cate " . time();
        }
        // slug
        $slug = $request->input('slug');
        if (!$slug) {
            $slug = str_slug($title, '-');
        } else {
            $slug = str_slug($slug, '-');
        }
        // pos
        $pos = $request->input('pos');
        if (!$pos) {
            $pos = 999;
        }
        $parentId = $request->input('parentId') != '' ? $request->input('parentId') : NULL;
        $dataInsert = [
            'title' => $title,
            'slug' => $slug,
            'pos' => $pos,
            'parent_id' => $parentId,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $cateModel = new Cate();
        $result = $cateModel->insertCate($dataInsert);

        if ($result instanceof Cate) {
            return redirect()->route('adMgetListCategory')->with('success', 'Thêm thành công!');
        } else {
            return redirect()->route('adMgetListCategory')->with('error', 'Thêm thất bại!');
        }

    }

    /**
     * Get edit cate page
     */
    public function getEditCate($id)
    {

        $cateModel = new Cate();
        $cate = $cateModel->getCateById($id);

        if ($cate) {
            $this->data['cate'] = $cate;
            $this->data['parentCate'] = (new Cate())->getListParentCate();
            return view('metronic_admin.categories.edit', $this->data);
        } else {
            return redirect()->route('adMgetListCategory');
        }

    }

    /**
     * Cate edit cate page
     */
    public function postEditCate($id, Request $request)
    {

        // title
        $title = $request->input('title');
        if (!$title) {
            $title = "Cate " . time();
        }
        // slug
        $slug = $request->input('slug');
        if (!$slug) {
            $slug = str_slug($title, '-');
        } else {
            $slug = str_slug($slug, '-');
        }
        // pos
        $pos = $request->input('pos');
        if (!$pos) {
            $pos = 999;
        }
        $parentId = $request->input('parentId') != '' ? $request->input('parentId') : NULL;

        $dataUpdate = [
            'title' => $title,
            'slug' => $slug,
            'pos' => $pos,
            'parent_id' => $parentId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $cateModel = new Cate();
        $result = $cateModel->updateCate($id, $dataUpdate);
        if ($result > 0) {
            return redirect()->route('adMgetEditCategory', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            return redirect()->route('adMgetEditCategory', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }

    }

    /**
     * Get list cate page
     */
    public function getListCate()
    {

        $cateModel = new Cate();
        $cates = $cateModel->getListCate();
        $this->data['cates'] = $cates;

        return view('metronic_admin.categories.list', $this->data);
    }

    /**
     * Delete cate
     */
    public function getDelCate($id)
    {

        $storeModel = new Cate();
        $result = $storeModel->deleteCate($id);

        if ($result > 0) {
            return redirect()->route('adMgetListCategory')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListCategory')->with('error', 'Xóa thất bại!');
        }
    }
}
