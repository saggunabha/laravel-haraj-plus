<?php

namespace App\Http\Controllers\Website;

use App\Models\StaticPages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommissionPrivacyController extends Controller
{
    public function index(){
        $commissionPrivacy = StaticPages::find(4);
        return view('website.commission_privacy', compact('commissionPrivacy'));
    }
}
