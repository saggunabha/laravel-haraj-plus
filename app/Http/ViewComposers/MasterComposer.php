<?php

namespace App\Http\ViewComposers;


use App\Models\Ad;
use App\Models\Message;
use App\Models\Setting;
use App\Models\StaticPages;
use Auth;
use Illuminate\View\View;

class MasterComposer
{
    public function compose(View $view)
    {


        $view->with('count_clientMsg',Message::whereIn('id', function($query) {
            $query->selectRaw('max(`id`)')
                ->from('messages')
                ->where('reciever_id',Auth::id())->where('seen',0)
                ->groupBy('sender_id');})->select('*')->orderBy('created_at', 'desc')->with('getSender','getReceiver')
            ->count());
        $view->with('client_messages', Message::whereIn('id', function($query) {
            $query->selectRaw('max(`id`)')
                ->from('messages')
                ->where('reciever_id',Auth::id())
                ->groupBy('sender_id');
        })->select('*')
            ->orderBy('created_at', 'desc')->with('getSender','getReceiver')
            ->take(6)->get());
        $view->with('logoHeader', Setting::where('key', 'logo_header')->first()->value);
        $view->with('logoFooter', Setting::where('key', 'logo_footer')->first()->value);
        $view->with('description', Setting::where('key', 'description')->first()->value);
        $view->with('youtubeUrl', Setting::where('key', 'youtube_url')->first()->value);
        $view->with('whatsapp', Setting::where('key', 'whatsapp')->first()->value);
        $view->with('snapchatUrl', Setting::where('key', 'snapchat_url')->first()->value);
        $view->with('twitterUrl', Setting::where('key', 'twitter_url')->first()->value);
        $view->with('facebookUrl', Setting::where('key', 'facebook_url')->first()->value);
        $view->with('instagramUrl', Setting::where('key', 'instagram_url')->first()->value);
        $view->with('blogUrl', Setting::where('key', 'blog_url')->first()->value);
        $view->with('location_lat', Setting::where('key', 'location_lat')->first()->value);
        $view->with('location_lng', Setting::where('key', 'location_lng')->first()->value);
        $view->with('address', Setting::where('key', 'address')->first()->value);
        $view->with('phone1', Setting::where('key', 'phone_1')->first()->value);
        $view->with('phone2', Setting::where('key', 'phone_2')->first()->value);
        $view->with('email', Setting::where('key', 'email')->first()->value);
        $view->with('siteUrl', Setting::where('key', 'site_url')->first()->value);
        $view->with('location', Setting::where('key', 'location')->first()->value);
        $view->with('workingTime', Setting::where('key', 'working_time')->first()->value);
        $view->with('googleplay_url', Setting::where('key', 'googleplay_url')->first()->value);
        $view->with('applestore_url', Setting::where('key', 'applestore_url')->first()->value);
    //    $view->with('commission', Setting::where('key', 'commission')->first()->value);
        $view->with('ad',Ad::where('position','top')->first());
        $view->with('about',StaticPages::find(1));
        $view->with('privacy',StaticPages::find(2));
        $view->with('conditions',StaticPages::find(3));
        $view->with('paymentWebsite',StaticPages::find(4));
        $view->with('support',StaticPages::find(5));

    }
}
