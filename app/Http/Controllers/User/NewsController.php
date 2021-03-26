<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        return view('user/list-news');
    }

    public function show(Request $request, $id)
    {
        return view('user/news-details');
    }
}
