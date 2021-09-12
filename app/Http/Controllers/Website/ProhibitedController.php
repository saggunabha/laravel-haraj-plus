<?php

namespace App\Http\Controllers\Website;

use App\Models\StaticPages;
use App\Http\Controllers\Controller;

class ProhibitedController extends Controller
{
    public function index(){
        $prohibited = StaticPages::find(9);
        return view('website.prohibited',compact('prohibited'));
    }
}