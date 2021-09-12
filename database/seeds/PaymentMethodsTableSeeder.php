<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run()
    {
        DB::table('paymentMethods')->insert([
            [
                'type' => 'بطافة فيزا او ماستركارد',
                'image' => 'website/images/main/visamaster.png',
            ],
            [
                'type' => 'حساب بنكى',
                'image' => null,
            ],
            [
                'type' => 'بطاقة مدى',
                'image' => 'website/images/main/mada.png',
            ],
        ]);
    }

}



