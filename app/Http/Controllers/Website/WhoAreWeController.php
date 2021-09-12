<?php

namespace App\Http\Controllers\Website;

use App\Models\StaticPages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhoAreWeController extends Controller
{
    public function index(){
        $about = StaticPages::find(1);
        return view('website.about', compact('about'));
    }
}
