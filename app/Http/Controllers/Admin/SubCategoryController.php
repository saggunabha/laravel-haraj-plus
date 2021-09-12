<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubCategoryRequest;
use App\Http\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CategoryService $service)
    {
        $this->service = $service;

    }

    public function index()
    {
        $categories = $this->service->getCategoriesService();
        return view('admin.sub-categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->service->getCategoriesService();
        return view('admin.sub-categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $this->service->storeCategoryService($request);
        return redirect(route('sub-categories.index'));
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
        $cats = $this->service->getCategoriesService();
        $category = $this->service->editCategoryService($id);
        return view('admin.sub-categories.edit',compact('category', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, $id)
    {

        $this->service->updateCategoryService($request,$id);
        //  return response()->json();
        return redirect(route('sub-categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);

        Product::where('category_id',$category->id)->delete();
        $this->service->destroyCategoryService($id);


        return response()->json(['success' => 'true']);
    }
}
