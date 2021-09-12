<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CountriesTableSeeder::class);
         $this->call(CitiesTableSeeder::class);
         $this->call(UsersTableDataSeeder::class);
         $this->call(PaymentMethodsTableSeeder::class);
         $this->call(StaticPagesTableSeeder::class);
         $this->call(SettingsTableSeeder::class);



    }
}
