<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Product;
use Modules\Ingredient\Entities\Category;
use Modules\Ingredient\Entities\Group;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class Cities implements ToCollection
{
    public function collection(Collection $rows)
    {
        $rows->shift();

        foreach ($rows as $row){
            $arr['name_ar'] = $row[0];
            $arr['country_id'] = $row[2];


            City::create([
                'name'=>$arr['name_ar'],
                'country_id'=>$arr['country_id'],
            ]);
        }
    }




}
