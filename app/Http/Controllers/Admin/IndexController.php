<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\BankAccount;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Pakage;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Report;
use App\Models\Subscriper;
use App\User;

class IndexController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        $subscribers = Subscriper::all();
        $reports = Report::all();
        $brands = Brand::all();
        $ads = Ad::all();
        $bankAccounts = BankAccount::all();
        $categories = Category::where('parent_id', null)->get();
        $subCategories = Category::where('parent_id', '!=', null)->get();
        $normalUsers = User::where('is_promoted', 0)->get();
        $buinessUsers = User::where('is_promoted', 1)->get();
        $normalProducts = Product::whereIn('user_id', $normalUsers->pluck('id'))->get();
        $buinessProducts = Product::whereIn('user_id', $buinessUsers->pluck('id'))->get();
        $totalPayment = Payment::where('is_accepted', 1)->where('type', 1)->sum('money_amount');
        $pendingCommissions = Payment::where('type', 0)->where('is_accepted', 2)->get();
        $pendingPayments = Payment::where('type', 1)->where('is_accepted', 2)->get();
        $packages = Pakage::all();
        return view('admin.index', compact('contacts', 'subscribers', 'reports',
            'brands', 'ads', 'bankAccounts', 'categories', 'subCategories', 'normalUsers', 'buinessUsers', 'normalProducts',
            'buinessProducts', 'totalPayment', 'pendingCommissions', 'pendingPayments', 'packages'));

    }
}
