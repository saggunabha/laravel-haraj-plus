<?php


namespace App\Http\Services;


use App\Classes\FileOperations;
use App\Http\Repositories\MainReopsitory;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdService
{
    private $imageDirectory = 'ads';

    public function __construct(Ad $ad)
    {
        $this->repo = new MainReopsitory($ad);
    }

    public function getAdsService()
    {
        return $this->repo->getall();
    }

    public function storeAdService(Request $request)
    {   $requestData = $request->all();
        $pathAfterUpload = FileOperations::StoreFileAs($this->imageDirectory, $request->file('image'), time(). 'ad_img');
        $requestData['image'] = $pathAfterUpload;

        return $this->repo->store($requestData);
    }

    public function editAdService($id){
        return $this->repo->get($id);
    }

    public function updateAdService(Request $request, $id)
    {
        $ad = $this->repo->get($id);
        $requestData=$request->all();
        if ($file = $request->hasFile('image')) {
            Storage::delete($ad->image);
            $pathAfterUpload = FileOperations::StoreFile($this->imageDirectory, $request->image);
            $requestData['image'] = $pathAfterUpload;




        }
        $this->repo->get($id)->update($requestData);
    }

    public function destroyAdService($id)
    {
        $ad = $this->repo->get($id);
        Storage::delete($ad->image);
        $this->repo->delete($id);
        return response()->json();

    }
}
