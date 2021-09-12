<?php

namespace App\Console\Commands;

use App\Models\PromotedUser;
use App\Notifications\MailNotification;
use App\User;
use Notification;
use Illuminate\Console\Command;

class Dailyupdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        $promotedUsers = PromotedUser::all();

        foreach ($promotedUsers as $promotedUser) {
            $end_date =\Carbon\Carbon::parse($promotedUser->end_date);
            
            if ($end_date->diffInDays(\Carbon\Carbon::now(), false)>0) {

                User::where('id',$promotedUser->user_id)->update(['is_promoted' => '0']);

                if($end_date->diffInDays(\Carbon\Carbon::now(), false)==-10)
                {
                     Notification::send($promotedUser->user,new MailNotification(['line'=>'باقى 10 ايام ع انتهاء الاشتراك الخاص بك ف موقع حراج بلص لتجديد اشتراكك بالموقع يرجى زياره هذا الرابط','url'=>route('package'),'url_text'=>'ترقيه الحساب ']));
                }
                if($end_date->diffInDays(\Carbon\Carbon::now(), false)==-3)
                {
                    Notification::send($promotedUser->user,new MailNotification(['line'=>'باقى 3 ايام ع انتهاء الاشتراك الخاص بك ف موقع حراج بلص لتجديد اشتراكك بالموقع يرجى زياره هذا الرابط','url'=>route('package'),'url_text'=>'ترقيه الحساب ']));
                }

            }

        }



    }
}