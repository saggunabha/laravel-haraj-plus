<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\MailNotification;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Notification;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

   // use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function email_form(){

        return view('auth.passwords.email');
    }
    public function send_mail(Request $request){
        $request->validate(['email'=>'email|required']);

        if($user=User::where('email',$request->email)->first()) {
          //  return $user;
            $user->update(['code'=>Str::random(7)]);

            $title = 'حراج بلس';
            $content = 'حراج بلس';
            // $this->email = 'sarrakasem2@gmail.com';
            // $this->email = 'sarrakasem2@gmail.com';
            $this->email = $user->email;

            \Illuminate\Support\Facades\Mail::send('emails.name', ['title' => $title, 'content' => $content,'link'=>url("/reset-form?code=$user->code")], function ($message)
            {

                $message->from('sales@jaadara.com', 'حراج بلص');

                $message->to($this->email);
                $message->subject('استعادة كلمة المرور');
                $message->priority(999);
            });
        //    return 'Email was sent';


        //   Notification::send($user,new MailNotification( ['line' => 'قم بزياره هذا الرابط لتغيير كلمه المرور الخاصه بك ', 'url_text' => 'استعاده كلمه المرور', 'url' => url("/reset-form?code=$user->code")]));
            session()->flash('success','لقد ارسلنا رابط الى البريد الالكترونى يرجى مراعته ');
    
        }
       else {
            session()->flash('failed','عذرا هذا البريد الالكترونى غير موجود بسجلاتنا يرجى التاكد منه ):');


        }

        // return redirect()->back();
        return redirect('/');

    }

    public function showResetForm(){
      $code=$_REQUEST['code'];
//return $code;
        $user=User::where('code',$code)->first();
        ////add text to show success

        return view('auth.passwords.reset',compact('user','code'));
    }

public function updatePassword(Request $request){

$request->validate(['password'=>'required|confirmed']);



     $user=User::where('code',$request->token)->first()->update(['password'=>bcrypt($request->password)]);

        session()->flash('success','تم استعاده كلمه3 المرور الخاصه بنجاح ');

        return redirect()->route('home');

}

}
