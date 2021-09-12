<?php

namespace App\Imports;

use App\Models\Country;
use App\Models\Product;
use Modules\Ingredient\Entities\Category;
use Modules\Ingredient\Entities\Group;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class Countries implements ToCollection
{
    public function collection(Collection $rows)
    {
        $rows->shift();

        foreach ($rows as $row){

            $arr['id'] = $row[0];
            $arr['name_ar'] = $row[2];


            Country::create([
                'id'     => $arr['id'],
                'name'=>$arr['name_ar'],
            ]);
        }
    }



}
