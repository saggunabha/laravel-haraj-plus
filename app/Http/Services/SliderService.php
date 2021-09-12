<?php


namespace App\Http\Services;
use App\Classes\FileOperations;
use App\Http\Repositories\MainReopsitory;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    private $imageDirectory = 'sliders';

    public function __construct(Slider $slider)
    {
        $this->repo = new MainReopsitory($slider);
    }

    public function getSlidersService()
    {
        return $this->repo->getall();
    }

    public function storeSliderService(Request $request)
    {   $requestData = $request->all();
        $pathAfterUpload = FileOperations::StoreFileAs($this->imageDirectory, $request->file('image'), time(). 'slider_img');
        $requestData['image'] = $pathAfterUpload;

        return $this->repo->store($requestData);
    }

    public function editSliderService($id){
        return $this->repo->get($id);
    }

    public function updateSliderService(Request $request, $id)
    {
        $slider = $this->repo->get($id);
        $requestData=$request->all();
        if ($file = $request->hasFile('image')) {
            Storage::delete($slider->image);
            $pathAfterUpload = FileOperations::StoreFile($this->imageDirectory, $request->image);
            $requestData['image'] = $pathAfterUpload;




        }
        $this->repo->get($id)->update($requestData);
    }

    public function destroySliderService($id)
    {
        $slider = $this->repo->get($id);
        Storage::delete($slider->image);
        $this->repo->delete($id);
        return response()->json();

    }
}
