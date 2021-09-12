<?php


namespace App\Http\Services;
use App\Http\Repositories\MainReopsitory;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryService
{
    public function __construct(Country $country)
    {
        $this->repo = new MainReopsitory($country);
    }

    public function getCountriesService()
    {
        return $this->repo->getall();
    }

    public function storeCountryService(Request $request)
    {
        return $this->repo->store($request->all());
    }

    public function editCountryService($id){
        return $this->repo->get($id);
    }

    public function updateCountryService(Request $request, $id)
    {
        $this->repo->get($id)->update($request->all());
        return response()->json();
    }

    public function destroyCountryService($id)
    {
        $this->repo->delete($id);
        return response()->json();

    }



}
