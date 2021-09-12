<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.layouts.app');
    }
    public function mail(){
        $name = 'حراج بلص';
//        \Mail::to('ahmedhamada2555@gmail.com')->send(new \App\Mail\SendMailable($name));
        $title = 'حراج بلص';
        $content = 'حراج بلص';
        $this->email = 'sarrakasem2@gmail.com';

        Mail::send('emails.name', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('sales@jaadara.com', 'حراج بلص');

            $message->to($this->email);
            $message->subject('استعادة كلمة المرور');
            $message->priority(999);
        });
        return 'Email was sent';
    }//end mail
}
