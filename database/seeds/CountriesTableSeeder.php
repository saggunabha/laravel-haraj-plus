<?php

use App\Imports\Countries;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new Countries, base_path('public/countries.xls'));
    }
}
