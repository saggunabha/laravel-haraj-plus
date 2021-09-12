<?php

use Illuminate\Database\Seeder;

class promotedUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 \App\Models\PromotedUser::create(['user_id'=>1,
'cover_photo'=>'admin/images/main/logo.png',
     'is_active'=>1
     ]);
    }
}
