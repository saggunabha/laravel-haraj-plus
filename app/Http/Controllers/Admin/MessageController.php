<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Product;
use App\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification;
use App\Notifications\adminMessageNotification;
use App\Notifications\MailNotification;

class MessageController extends Controller
{
    
    
      public function getMessages(){

        $adv_left = Ad::where('position','left')->first();

        return view('admin.Chats.index',compact('adv_left'));
    }

    public function getChatPage($id){

       return view('admin.Chats.Chat');

    }
    
    //
//messages between user and admin
    public function chatUserPro($product_id){
        $product=Product::findOrFail($product_id);
        $receiver_user=User::findOrFail($product->user_id);
       /* if(isset($id))
            $sender=User::find($id);*/

        $messages=Auth::user()->getMessages($receiver_user,$product);
        $messages_receives=Auth::user()->getMsgReceives($receiver_user);
        $adv_left=Ad::where('position','left')->first();
        return view('admin.messagesAdmin',compact('adv_left','receiver_user','product','messages','messages_receives'));

    }


    public function chatUser($id){

        $receiver_user=User::findOrFail($id);

        $messages=Auth::user()->getMessages($receiver_user,null);
        $messages_receives=Auth::user()->getMsgReceives($receiver_user);
        $adv_left=Ad::where('position','left')->first();

        return view('admin.messagesAdmin',compact('adv_left','receiver_user','messages','messages_receives'));

    }

    public function sendBussiness(Request $request)
    {
  
        $recievers =   User::whereIn('id',$request['users'])->get();
            foreach ($recievers as $reciever) {
                $message = Message::create([
                    'sender_id' =>Auth::id(),
                    'reciever_id' => $reciever->id,
                    'content'=>$request['message']
                ]);
                $details=[
                    'type'=>'admin-message',
                    'actionUrl'=>route('chat_user',$message->id),
                    'message'=>' لديك رسالة جديدة من الادارة'];
            
                    Notification::send($reciever, new adminMessageNotification($details));  
                    Notification::send($reciever,new MailNotification(['line'=> $details['message'],'url'=>$details['actionUrl'],'url_text'=>'رسالة جديدة']));

            }

            return response()->json(['success'=>true]);
    }
}
