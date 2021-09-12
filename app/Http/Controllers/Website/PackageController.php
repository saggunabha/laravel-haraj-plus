<?php

namespace App\Http\Controllers\Website;

use App\Models\Pakage;
use App\Models\StaticPages;
use App\Http\Controllers\Controller;
use Auth;
class PackageController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            $packages = Pakage::all();
            $data = StaticPages::find(7);
            return view('website.package', compact('packages','data'));
        }else{
            session()->flash('success', 'عليك تسجيل الدخول أولا ');
            return redirect()->route('signUp');
        }
        
    }
}
