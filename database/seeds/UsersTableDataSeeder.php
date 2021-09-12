<?php



use Illuminate\Database\Seeder;


class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'جداره',
            'email'=>'info@jadara.com',
            'phone'=>'01234567890',
            'city_id' => 1,
            'address'=> null,
            'password'=>bcrypt('jadara'),
            'type'=>'1',

            'is_active'=>true

        ]);
    }
}
