<?php

use App\Imports\Cities;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new Cities, base_path('public/cities.xlsx'));

    }
}
