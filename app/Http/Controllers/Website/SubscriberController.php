<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriper;

class SubscriberController extends Controller
{
    public function create(SubscriberRequest $request){
        Subscriper::create($request->all());
        session()->flash('success', 'تم الاشتراك بنجاح');
        return redirect(route('home'));
    }
}
