<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCountMail;
use App\Models\PromotedUser;
class RegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email of promoted users';

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

                if(\Carbon\Carbon::parse($end_date)->diffInDays(\Carbon\Carbon::now(), false)==-10)
                {
                 $totalUsers =  ['line'=>'باقى 10 ايام ع انتهاء الاشتراك الخاص بك ف موقع حراج بلص لتجديد اشتراكك بالموقع يرجى زياره هذا الرابط','url'=>'https://haraj-plus.sa/package','url_text'=>'ترقيه الحساب '];
                    Mail::to($promotedUser->user)->send(new SendCountMail($totalUsers));
                }
                if(\Carbon\Carbon::parse($end_date)->diffInDays(\Carbon\Carbon::now(), false)==-3)
                {

                $totalUsers =  ['line'=>'باقى 3 ايام ع انتهاء الاشتراك الخاص بك ف موقع حراج بلص لتجديد اشتراكك بالموقع يرجى زياره هذا الرابط','url'=>'https://haraj-plus.sa/package','url_text'=>'ترقيه الحساب '];

                     Mail::to($promotedUser->user)->send(new SendCountMail($totalUsers));

                }

            }

        }



   
}