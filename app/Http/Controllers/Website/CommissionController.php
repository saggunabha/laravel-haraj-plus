<?php

namespace App\Http\Controllers\Website;

use App\Classes\FileOperations;
use App\Http\Requests\PaymentRequest;
use App\Models\BankAccount;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Setting;
use App\Models\StaticPages;
use App\Http\Controllers\Controller;
use App\Notifications\orderActionNotification;
use App\Notifications\OrderNotification;
use App\User;
use Notification;
use App\Notifications\MailNotification;


class CommissionController extends Controller
{
    private $imageDirectory = 'payments';
    public function index(){
        $commission = StaticPages::find(4);
        $bankAccounts = BankAccount::all();
        $settingsCommission = Setting::where('key', 'commission')->first();
        $products = Product::where('user_id', auth()->id())->pluck('name','id');
        return view('website.commission', compact('commission', 'bankAccounts', 'settingsCommission', 'products'));
    }

    public function create(PaymentRequest $request){
        $requestData = $request->all();
        $pathAfterUpload = FileOperations::StoreFileAs($this->imageDirectory, $request->file('image'), time(). 'payment_img');
        $requestData['image'] = $pathAfterUpload;
      $payment= Payment::create(array_merge($requestData, ['user_id' => auth()->id()], ['type' => 0]));
        $details=['user_name'=>auth()->user()->name,
            'message'=>'قام'.auth()->user()->name.'بارسال طلب عموله',
            'actionUrl'=>Url(\route('commissions.show',$payment->id)),
            'image'=>auth()->user()->image,


        ];
        $notification=new OrderNotification($details);
        Notification::send(User::where('type',1)->first(), $notification);
        Notification::send(User::where('type',1)->first(),new MailNotification(['line'=> $details['message'],'url'=>$details['actionUrl'],'url_text'=>'طلب عمولة']));
        session()->flash('success', 'تم الارسال بنجاح');
        return redirect(route('home'));
    }

    public function show($id){

    $data= Payment::findOrFail($id);
    //dd($commission);
    $bankAccount=BankAccount::findOrFail($data->bankAccount_id);
//        dd($bankAccount);
    return view('admin.commissions.details',compact('data','bankAccount'));

}

    public function acceptIgnoreCommission($id,$status){
        $commission=Payment::find($id);

        $commission->update(['is_accepted'=>$status]);


        $details=[
            'type'=>'commission','message'=>$commission->is_accepted==0?'تم رفض طلب الترقيه الخاص بك':'تم قبول طلب الترقيه الخاص بك'];

        Notification::send($commission->user, new orderActionNotification($details));
     Notification::send($commission->user,new MailNotification(['line'=> $details['message'],'url'=>'https://haraj-plus.sa/','url_text'=>'الرجوع للموقع']));

        return redirect(route('commissions.index'));
    }

//    public function index2(){
//        $commissions= Payment::where('is_accepted',1)->orwhere('is_accepted',2)->where('type',0)->get();
//        return view('admin.commissions.index',compact('commissions'));
//
//
//    }

}
