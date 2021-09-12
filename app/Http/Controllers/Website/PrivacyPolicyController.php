<?php

namespace App\Http\Controllers\Website;

use App\Models\StaticPages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    public function index(){
        $privacy = StaticPages::find(2);
        return view('website.privacy', compact('privacy'));
    }
}
