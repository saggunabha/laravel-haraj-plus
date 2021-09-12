<?php


namespace App\Http\Services;


use App\Classes\FileOperations;
use App\Http\Repositories\MainReopsitory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    private $imageDirectory = 'categories';

    public function __construct(Category $category)
    {
        $this->repo = new MainReopsitory($category);
    }

    public function getCategoriesService()
    {
        return $this->repo->getall();
    }

    public function storeCategoryService(Request $request)
    {   $requestData = $request->all();
        $pathAfterUpload = FileOperations::StoreFileAs($this->imageDirectory, $request->file('image'), time(). 'category_img');
        $requestData['image'] = $pathAfterUpload;

        return $this->repo->store($requestData);
    }

    public function editCategoryService($id){
        return $this->repo->get($id);
    }

    public function updateCategoryService(Request $request, $id)
    {
        $category = $this->repo->get($id);
        $requestData=$request->all();
        if ($file = $request->hasFile('image')) {
            Storage::delete($category->image);
            $pathAfterUpload = FileOperations::StoreFile($this->imageDirectory, $request->image);
            $requestData['image'] = $pathAfterUpload;




        }
        $this->repo->get($id)->update($requestData);
    }

    public function destroyCategoryService($id)
    {
        $category = $this->repo->get($id);
        Storage::delete($category->image);
        $this->repo->delete($id);
        return response()->json();

    }
}
