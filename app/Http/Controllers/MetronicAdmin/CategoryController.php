<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Cate;
use App\Http\Controllers\Controller;
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
        // imageFile
        $imageFile = $request->file('image');
        $path = "";
        if ($request->hasFile('image')) {
            $image = $slug . '.' . $request->image->extension();
            $path = $request->image->storeAs('img/cate', $image);
        }
        // meta image
        $imageFile = $request->file('meta_image');
        $meta_path = "";
        if ($request->hasFile('meta_image')) {
            $meta_image = $slug . '-meta.' . $request->meta_image->extension();
            $meta_path = $request->meta_image->storeAs('img/cate', $meta_image);
        }

        $parentId = $request->input('parentId') != '' ? $request->input('parentId') : null;
        $dataInsert = [
            'title' => $title,
            'slug' => $slug,
            'pos' => $pos,
            'parent_id' => $parentId,
            'image' => $path,

            'meta_title' => $request->meta_title,
            'meta_des' => $request->meta_des,
            'meta_keywords' => $request->meta_keywords,
            'meta_url' => $request->meta_url,
            'meta_image' => $meta_path,

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $cateModel = new Cate();
        $result = $cateModel->insertCate($dataInsert);

        if ($result instanceof Cate) {
            toast()->success('Thêm thành công');
            return redirect()->route('adMgetListCategory')->with('success', 'Thêm thành công!');
        } else {
            toast()->error('Thêm thất bại');
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
        // imageFile
        $imageFile = $request->file('image');
        $path = "";
        if ($request->hasFile('image')) {
            $image = $slug . '.' . $request->image->extension();
            $path = $request->image->storeAs('img/cate', $image);
        }

        // meta image
        $imageFile = $request->file('meta_image');
        $path_meta = "";
        if ($request->hasFile('meta_image')) {
            $meta_image = $slug . '-meta.' . $request->meta_image->extension();
            $path_meta = $request->meta_image->storeAs('img/cate', $meta_image);
        }

        $parentId = $request->input('parentId') != '' ? $request->input('parentId') : null;

        $dataUpdate = [
            'title' => $title,
            'slug' => $slug,
            'pos' => $pos,
            'image' => $path,
            'meta_title' => $request->meta_title,
            'meta_des' => $request->meta_des,
            'meta_keywords' => $request->meta_keywords,
            'meta_url' => $request->meta_url,
            'meta_image' => $path_meta,

            'parent_id' => $parentId,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $cateModel = new Cate();
        $result = $cateModel->updateCate($id, $dataUpdate);
        if ($result > 0) {
            toast()->success('Sửa thành công');
            return redirect()->route('adMgetEditCategory', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            toast()->error('Sửa thất bại');
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
