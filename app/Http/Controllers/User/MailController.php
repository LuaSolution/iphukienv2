<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function addFeedback(Request $request)
    {
        $input = $request->all();
        Mail::send('form', array('name' => 'nad', 'email' => 'ifa.lms.app@gmail.com', 'content' => '2345'), function ($message) {
            $message->to('lualua0909@gmail.com', 'Visitor')->subject('Visitor Feedback!');
        });

        return view('form');
    }
}
