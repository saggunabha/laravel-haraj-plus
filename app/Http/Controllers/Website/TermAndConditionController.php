<?php

namespace App\Http\Controllers\Website;

use App\Models\StaticPages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermAndConditionController extends Controller
{
    public function index(){
        $terms = StaticPages::find(3);
        return view('website.terms', compact('terms'));
    }

    public function questions(){
        $questions = StaticPages::find(8);
        return view('website.questions', compact('questions'));
    }
}
