<?php

namespace App\Http\Controllers\Website;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Notifications\MailNotification;
use App\Notifications\OrderNotification;
use App\Notifications\adminMessageNotification;

use App\User;
use Notification;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){

        return view('website.contact');
    }

    public function store(ContactRequest $request){

        $token = $request->input('g-recaptcha-response');
        if ($token > 0)
        {
            $contact= Contact::create($request->all());
                //$admin = User::where('id',1)->first();
                //$details = ['type' => 'conatact', 'actionUrl' => url(route('contact.store')), 'message' => ' لقد قام' .$contact->email . ' بإرسال رسالة '];
               // Notification::send($admin, new adminMessageNotification($details));            

            Notification::send(User::find(1),new OrderNotification(['actionUrl'=>route('contacts.index'),'message'=>"قد قام  ".$contact->name.'بارسال طلب تواصل' ]));
            Notification::send(User::find(1),new MailNotification(['line'=>'تم ارسال رساله تواصل اليك عبر موقع حراج بلص لماشهدتها يرجى زياره الرباط بالاسفل','url'=>url('admin/contacts'),'url_text'=>'مشاهده الرسائل']));
            session()->flash('success', 'تم الارسال بنجاح');
            return redirect(route('home'));

        } else {
            session()->flash('failed','برجاء ادخال  جميع البينات');

            return back();
        }



    }
}
