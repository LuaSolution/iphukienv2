<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::paginate(10);
        $this->data['newss'] = $news;

        return view('user/list-news', $this->data);
    }

    public function show($news)
    {
        $newsModel = new News();
        $news = $newsModel->getNewsBySlug($news);

        if ($news) {
            $newsRelated = $newsModel->getListNewsRelate($news->slug);
            $this->data['newsRelated'] = $newsRelated;

            $this->data['news'] = $news;
            config(['config.title' => $news->title, 'config.description' => $news->description]);
            return view('user/news-details', $this->data);
        } else {
            return view('404', $this->data);
        }
    }
}
