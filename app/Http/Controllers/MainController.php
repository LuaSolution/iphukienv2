<?php

namespace App\Http\Controllers;

use App\Config;
use App\Mail;
use App\News;
use App\Order;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);

        return redirect()->back();
    }
    /**
     * Get home page
     */
    public function getHome()
    {

        // $productModel = new Product();
        // $products = $productModel->getListProduct()->groupBy('type');
        // $this->data['products'] = $products;

        // $newsModel = new News();
        // $newss = $newsModel->getListNews();
        // $this->data['newss'] = $newss;

        // echo "<pre>";
        // print_r($products);die;

        return view('client.index');

    }

    /**
     * Get news page
     */
    public function getAllNews()
    {

        $newsModel = new News();
        $newss = $newsModel->getListNews();
        $this->data['newss'] = $newss;

        return view('client.news', $this->data);

    }

    /**
     * Get news detail page
     */
    public function getNews($news)
    {

        $newsModel = new News();
        $news = $newsModel->getNewsBySlug($news);

        if ($news) {
            $newsRelated = $newsModel->getListNewsRelate($news->slug);
            $this->data['newsRelated'] = $newsRelated;

            $this->data['news'] = $news;
            config(['config.title' => $news->title, 'config.description' => $news->description]);
            return view('client.news-detail', $this->data);
        } else {
            return view('404', $this->data);
        }
    }

    public function postContact(Request $req)
    {
        $dataInsert = [
            'name' => $req->name,
            'email' => $req->email,
            'content' => $req->content,
            'phone' => $req->phone,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $m = new Mail();
        $result = $m->insertMail($dataInsert);
        return redirect()->back();
    }

    public function  postOrder(Request $req) {
        $dataInsert = [
            'name' => $req->name,
            'address' => $req->address,
            'phone' => $req->phone,
            'status' => 0,
            'note' => $req->note,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $m = new Order();
        $result = $m->insertOrder($dataInsert);
        return redirect()->back();
    }
}
