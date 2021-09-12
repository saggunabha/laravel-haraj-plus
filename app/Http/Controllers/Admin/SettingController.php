<?php

namespace App\Http\Controllers\Admin;

use App\Classes\FileOperations;
use App\Http\Requests\SettingRequest;
use App\Http\Services\SettingService;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $imageDirectory = 'settings';

    public  function __construct(SettingService $service)
    {
        $this->service = $service;
    }


    public function index()
    {

        $settings=Setting::all();

      //  return $settings;

        return view('admin.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        $setting = $this->service->editSettingService($id);
        return redirect(route('settings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


     public function update2(Request $request)
     {
         $requestData=$request->all();
         if ($file = $request->hasFile('logo_header')) {
             $pathAfterUpload = FileOperations::StoreFileAs($this->imageDirectory, $request->logo_header, time() . 'Setting_header__img');
             $requestData['logo_header'] = $pathAfterUpload;
         }
         if ($file = $request->hasFile('logo_footer')) {
             $pathAfterUpload = FileOperations::StoreFileAs($this->imageDirectory, $request->logo_footer, time() . 'Setting_footer__img');
             $requestData['logo_footer'] = $pathAfterUpload;
         }


         foreach($requestData as $key=>$value)
         {
             Setting::where('key',$key)->update(['value'=>$value]);

         }

         return back();


     }

}
