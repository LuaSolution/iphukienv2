<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\News;
use App\StaticPage;
use Illuminate\Http\Request;
use Toast;

class StaticPagesController extends Controller
{
    /**
     * Get add news page
     */
    public function getAddStaticPages()
    {
        toast()->success('message', 'title');
        return view('metronic_admin.static-page.add');
    }

    public function getListStaticPages()
    {
        $this->data['data'] = StaticPage::get();

        return view('metronic_admin.static-page.list', $this->data);
    }

    /**
     * Get edit static page
     */
    public function getEditStaticPages($id)
    {
        $data = StaticPage::findOrFail($id);

        if ($data) {
            $this->data['data'] = $data;
            return view('metronic_admin.static-page.edit', $this->data);
        } else {
            return redirect()->route('adMgetHome');
        }
    }

    public function getDeStaticPages($id)
    {

        $data = StaticPage::findOrFail($id);

        if ($data->delete()) {
            return redirect()->route('adMgetListStaticPage')->with('success', 'Xóa thành công!');
        } else {
            return redirect()->route('adMgetListStaticPage')->with('error', 'Xóa thất bại!');
        }
    }

    /**
     * News edit news page
     */
    public function postEditStaticPages($id, Request $request)
    {

        // title
        $title = $request->input('name');
        if (!$title) {
            $title = "News " . time();
        }
        // title
        $icon = $request->input('icon');
        if (!$icon) {
            $icon = 'icon-layers';
        }
        // slug
        $slug = $request->input('slug');
        if (!$slug) {
            $slug = str_slug($title, '-');
        } else {
            $slug = str_slug($slug, '-');
        }
        // content
        $content = $request->input('content');
        if (!$content) {
            $content = "";
        }

        $model = StaticPage::findOrFail($id);
        $model->name = $title;
        $model->url = $slug;
        $model->content = $content;
        $model->icon = $icon;
        $model->created_at = date('Y-m-d');
        $model->save();

        if ($model) {
            toast()->success('Sửa thành công');
            return redirect()->route('adMgetEditStaticPages', ['id' => $id])->with('success', 'Cập nhật thành công!');
        } else {
            toast()->error('Sửa thất bại');
            return redirect()->route('adMgetEditStaticPages', ['id' => $id])->with('error', 'Cập nhật thất bại!');
        }
    }

    public function postAddStaticPages(Request $request)
    {
        $title = $request->input('name');
        if (!$title) {
            $title = "News " . time();
        }
        $icon = $request->input('icon');
        if (!$icon) {
            $icon = 'icon-layers';
        }
        $slug = $request->input('slug');
        if (!$slug) {
            $slug = str_slug($title, '-');
        } else {
            $slug = str_slug($slug, '-');
        }
        $content = $request->input('content');
        if (!$content) {
            $content = "";
        }

        $model = new StaticPage;
        $model->name = $title;
        $model->url = $slug;
        $model->content = $content;
        $model->icon = $icon;
        $model->created_at = date('Y-m-d');
        $model->save();

        if ($model) {
            toast()->success('Thêm thành công');
            return redirect()->route('adMgetAddStaticPage')->with('success', 'Cập nhật thành công!');
        } else {
            toast()->error('Thêm thất bại');
            return redirect()->route('adMgetAddStaticPage')->with('error', 'Cập nhật thất bại!');
        }
    }
}
