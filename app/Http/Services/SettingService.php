<?php
/**
 * Created by PhpStorm.
 * User: NM NM
 * Date: 01/12/2019
 * Time: 07:37 م
 */

namespace App\Http\Services;


use App\Classes\FileOperations;
use App\Http\Repositories\MainReopsitory;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingService
{
    private $imageDirectory = 'settings';

    public function __construct(Setting $setting)
    {
        $this->repo = new MainReopsitory($setting);
    }

    public function getSettingsService()
    {
        return $this->repo->getall();
    }

    public function editSettingService($id)
    {
        return $this->repo->get($id);
    }


    public function updateSettingService(Request $request)
    {


//        $requestData = $request->all();
//        if ($request->hasFile($setting->key)) {
//           Storage::delete($setting->value);
//
//        }
//        $pathAfterUpload = FileOperations::StoreFileAs($this->imageDirectory, $request->file($setting->key), time() . 'setting_img');
//        $requestData[$setting->key] = $pathAfterUpload;
//        $this->repo->get($id)->update($requestData);


    }








}