<?php


namespace App\Http\Services;


use App\Http\Repositories\MainReopsitory;
use App\Models\City;
use App\Models\Country;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class CityService
{
    public function __construct(City $city)
    {
        $this->repo = new MainReopsitory($city);
    }

    public function getCitiesService()
    {
        return $this->repo->getall();
    }

    public function storeCityService(Request $request)
    {
        return $this->repo->store($request->all());
    }

    public function editCityService($id){
        return $this->repo->get($id);
    }



    public function updateCityService(Request $request, $id)
    {
        $this->repo->get($id)->update($request->all());
        return response()->json();
    }

    public function destroyCityService($id)
    {     $users=User::where('city_id',$id)->get();
          $products=Product::where('city_id',$id)->get();
         // dd($products);
        foreach ($products as $product) {
            Product::destroy($product->id);
        }
    foreach ($users as $user){
        $user->update(['city_id',null]);
    }
        $this->repo->delete($id);



    }
}
