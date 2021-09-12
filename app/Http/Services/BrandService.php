<?php


namespace App\Http\Services;
use App\Models\Brand;
use App\Classes\FileOperations;
use App\Http\Repositories\MainReopsitory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandService
{
    private $imageDirectory = 'brands';

    public function __construct(Brand $brand)
    {
        $this->repo = new MainReopsitory($brand);
    }

    public function getBrandsService()
    {
        return $this->repo->getall();
    }

    public function storeBrandService(Request $request)
    {   $requestData=$request->all();
        $pathAfterUpload = FileOperations::StoreFileAs($this->imageDirectory, $request->file('image'), time(). 'brand_img');
        $requestData['image'] = $pathAfterUpload;

        return $this->repo->store($requestData);
    }

    public function editBrandService($id){
        return $this->repo->get($id);
    }

    public function updateBrandService(Request $request, $id)
    {
        $brand = $this->repo->get($id);
        $requestData=$request->all();
        if ($file = $request->hasFile('image')) {
          Storage::delete($brand->image);
          $pathAfterUpload = FileOperations::StoreFile($this->imageDirectory, $request->image);
          $requestData['image'] = $pathAfterUpload;




        }
        $this->repo->get($id)->update($requestData);
    }

    public function destroyBrandService($id)
    {
        $brand = $this->repo->get($id);
        Storage::delete($brand->image);
        $this->repo->delete($id);
        return response()->json();

    }
}
