<?php

namespace App\Http\Controllers\MetronicAdmin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    /**
     * Get add news page
     */
    public function getAddNews()
    {
        return view('metronic_admin.news.add', $this->data);
    }

    /**
     * Post add news page
     */
    public function postAddNews(Request $request)
    {

        // title
        $title = $request->input('title');
        if (!$title) {
            $title = "News " . time();
        }
        // slug
        $slug = $request->input('slug');
        if (!$slug) {
            $slug = str_slug($title, '-');
        } else {
            $slug = str_slug($slug, '-');
        }
        // coverFile
        $coverFile = $request->file('cover');
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = $slug . '.' . $request->cover->extension();
            $request->cover->storeAs('img/post/', $cover);
            $cover .= '?n=' . time();
        }
        // pos
        $pos = $request->input('pos');
        if (!$pos) {
            $pos = 999;
        }
        // description
        $description = $request->input('description');
        if (!$description) {
            $description = "";
        }
        // content
        $content = $request->input('content');
        if (!$content) {
            $content = "";
        }

        $dataInsert = [
            'title' => $title,
            'slug' => $slug,
            'cover' => $cover,
            'pos' => $pos,
            'description' => $description,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $newsModel = new News();
        $result = $newsModel->insertNews($dataInsert);
        if ($result > 0) {
            toast()->success('Thêm thông tin bài viết thành công');
            return redirect()->route('adMgetListNews');
        } else {
            toast()->error('Thêm thông tin bài viết thất bại');
            return redirect()->route('adMgetListNews');
        }

    }

    /**
     * Get edit news page
     */
    public function getEditNews($id)
    {

        $newsModel = new News();
        $news = $newsModel->getNewsById($id);

        if ($news) {
            $this->data['news'] = $news;
            return view('metronic_admin.news.edit', $this->data);
        } else {
            return redirect()->route('adMgetListNews');
        }

    }

    /**
     * News edit news page
     */
    public function postEditNews($id, Request $request)
    {

        // title
        $title = $request->input('title');
        if (!$title) {
            $title = "News " . time();
        }
        // slug
        $slug = $request->input('slug');
        if (!$slug) {
            $slug = str_slug($title, '-');
        } else {
            $slug = str_slug($slug, '-');
        }
        // coverFile
        $coverFile = $request->file('cover');
        $cover = "";
        if ($request->hasFile('cover')) {
            $cover = $slug . '.' . $request->cover->extension();
            $request->cover->storeAs('img/post/', $cover);
            $cover .= '?n=' . time();
        }
        // pos
        $pos = $request->input('pos');
        if (!$pos) {
            $pos = 999;
        }
        $status = $request->input('status');
        // description
        $description = $request->input('description');
        if (!$description) {
            $description = "";
        }
        // content
        $content = $request->input('content');
        if (!$content) {
            $content = "";
        }

        $dataUpdate = [
            'title' => $title,
            'slug' => $slug,
            'pos' => $pos,
            'description' => $description,
            'content' => $content,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($cover != "") {
            $dataUpdate['cover'] = $cover;
        }

        $newsModel = new News();
        $result = $newsModel->updateNews($id, $dataUpdate);
        if ($result > 0) {
            toast()->success('Thay đổi thông tin bài viết thành công');
            return redirect()->route('adMgetEditNews', ['id' => $id]);
        } else {
            toast()->error('Thay đổi thông tin bài viết thất bại');
            return redirect()->route('adMgetEditNews', ['id' => $id]);
        }

    }

    /**
     * Get list news page
     */
    public function getListNews()
    {
        $newss = News::orderBy('pos', 'asc')->orderBy('created_at', 'desc')->paginate(5);
        $this->data['newss'] = $newss;

        return view('metronic_admin.news.list', $this->data);
    }

    /**
     * Delete news
     */
    public function getDelNews($id)
    {

        $newsModel = new News();
        $result = $newsModel->deleteNews($id);

        if ($result > 0) {
            toast()->success('Xóa thông tin bài viết thành công');
            return redirect()->route('adMgetListNews')->with('success', 'Xóa thành công!');
        } else {
            toast()->error('Xóa thông tin bài viết thất bại');
            return redirect()->route('adMgetListNews')->with('error', 'Xóa thất bại!');
        }
    }
}
