<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' => 'instagram_url',
                'name' => 'رابط الانستجرام',
                'value' => 'https://www.instagram.com',
                'type' => 'url',

            ],
            [
                'key' => 'googleplay_url',
                'name' => 'رابط الموقع علي جوجل بلاي ',
                'value' => 'https://www.google.com',
                'type' => 'url',

            ],
            [
                'key' => 'applestore_url',
                'name' => 'رابط الموقع علي أبل استور',
                'value' => 'https://www.apple.com',
                'type' => 'url',

            ],
            [
                'key' => 'facebook_url',
                'name' => 'رابط الفيسبوك',
                'value' => 'https://www.facebook.com',
                'type' => 'url',
            ],
            [
                'key' => 'twitter_url',
                'name' => 'رابط التويتر',
                'value' => 'https://www.twitter.com',
                'type' => 'url',
            ],
            [
                'key' => 'snapchat_url',
                'name' => 'رابط السنابشات',
                'value' => 'https://www.snapchat.com',
                'type' => 'url',
            ],
            [
                'key' => 'youtube_url',
                'name' => 'رابط اليوتيوب',
                'value' => 'https://www.youtube.com',
                'type' => 'url',
            ],
            [
                'key' => 'blog_url',
                'name' => 'رابط المدونة',
                'value' => 'http://blog.haraj-plus.sa',
                'type' => 'url',
            ],
            [
                'key' => 'site_url',
                'name' => 'رابط الموقع',
                'value' => `{{env("MAIN_URL")}}/`,
                'type' => 'url',
            ],
            [
                'key' => 'whatsapp',
                'name' => 'رقم الواتسأب',
                'value' => '160 91900394',
                'type' => 'tel',
            ],
            [
                'key' => 'phone_1',
                'name' => 'رقم التليفون 1',
                'value' => '160 91900394',
                'type' => 'tel',
            ],
            [
                'key' => 'phone_2',
                'name' => 'رقم التليفون 2',
                'value' => '160 91900394',
                'type' => 'tel',
            ],
            [
                'key' => 'email',
                'name' => 'البريد الاليكتروني',
                'value' => 'Info@haraj-plus.sa',
                'type' => 'email',
            ],
            [
                'key' => 'location',
                'name' => 'موقعنا',
                'value' => 'الإمام محمد بن سعود خميس مشيط 62431
                                <br />
                                السعودية      ',
                'type' => 'text',
            ],
            [
                'key' => 'working_time',
                'name' => 'مواعيد العمل',
                'value' => ' السبت - الجمعه
                                <br />
                                9:00 ص - 6:00 م',
                'type' => 'text',
            ],
            [
                'key' => 'description',
                'name' => 'الوصف',
                'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى',
                'type' => 'text',
            ],
            [
                'key' => 'owner',
                'name' => 'مسمي الموقع',
                'value' => 'مؤسسة موقع حراج بلص',
                'type' => 'text',
            ],
            [
                'key' => 'location_lat',
                'name' => 'خط العرض',
                'value' => '24.6687816',
                'type' => 'mapping'
            ],
            [
                'key' => 'location_lng',
                'name' => 'خط الطول',
                'value' => '46.7325966',
                'type' => 'mapping',
            ],
            [
                'key' => 'address',
                'name' => 'العنوان',
                'value' => 'جدة السعودية',
                'type' => 'mapping',
            ],
            [
                'key' => 'product_no',
                'name' => 'عدد المنتجات المسموح بيها',
                'value' => '7',
                'type' => 'number',
            ],
            // [
            //     'key' => 'commission',
            //     'name' => 'العمولة',
            //     'value' => '0.01',
            //     'type' => 'number',
            // ],
            [
                'key' => 'logo_header',
                'name' => 'صورة رأس الصفحة',
                'value' => 'settings/logo.png',
                'type' => 'file',
            ],
            [
                'key' => 'logo_footer',
                'name' => 'صورة ذيل الصفحة',
                'value' => 'settings/logo2.png',
                'type' => 'file',
            ],



        ]);












































    }
}
