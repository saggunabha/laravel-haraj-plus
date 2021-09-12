<?php

namespace App\Http\Controllers\Website;

use App\Classes\FileOperations;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Notification;
class MessageController extends Controller
{
    protected $directory='chat';
    


    public function getMessages(){

        $adv_left = Ad::where('position','left')->first();

        return view('website.Chats.index',compact('adv_left'));
    }

    public function getChatPage($id){

       return view('website.Chats.Chat');

    }


    public function uploadChatImage(Request $request)
    {
 
    if($request->hasFile('image')) {
 
        $pathAfterUpload = FileOperations::StoreFileAs($this->directory, $request->file('image'), 'user'.str_random(5));
        $image = $pathAfterUpload;
    }
 
    if($request->hasFile('file')) {
 
     $pathAfterUpload = FileOperations::StoreFileAs($this->directory, $request->file('file'), 'user'.str_random(5));
     $image = $pathAfterUpload;
    }
    return response()->json(['success'=>'true' ,'data'=>$image]);

    }
 
 



}
