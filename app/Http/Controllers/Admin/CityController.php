<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Http\Services\CityService;
use App\Http\Services\CountryService;
use App\Models\City;
use App\Models\Country;
use App\Models\Product;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CityService $cityService, CountryService $countryService)
    {
        $this->cityService = $cityService;
        $this->countryService = $countryService;
    }

    public function index()
    {

        $cities = $this->cityService->getCitiesService();
        return view('admin.cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = $this->countryService->getCountriesService();
        return view('admin.cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $this->cityService->storeCityService($request);
        return redirect(route('cities.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = $this->countryService->getCountriesService();
        $city = $this->cityService->editCityService($id);
        return view('admin.cities.edit',compact('city', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $this->cityService->updateCityService($request,$id);
        return redirect(route('cities.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getCountryCities($id){

     $cities= City::where('country_id',$id)->get();
        return json_encode($cities);

    }
    public function destroy($id)
    {
        $products=Product::where('city_id',$id)->get();
        return json_encode($products);
      $this->cityService->destroyCityService($id);

        return response()->json(['success' => 'true']);
    }
}
