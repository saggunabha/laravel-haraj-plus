<?php

namespace App\Http\Controllers\Website;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Slider;

class SubCategoryController extends Controller
{
    public function index($string){
         $id = explode('-', $string)[0];
        $category = Category::findOrFail($id);
        if ($category->parent_id){
            //it is child category
            return redirect()->route('categoryProducts',$string);

        }else{
            //main category
            //get its sub
            $subCategories = Category::findOrFail($id)->where('parent_id', $id)->orderBy('order','ASC')->get();

        }
        $recentProducts = Product::where('is_valid', 1)->wherehas('user', function ($q) {

            $q->where('is_active', 1)->where('is_promoted', '<>', 1);
        })->latest()->take(3)->get();
        $favouriteProducts = Favorite::where('user_id', auth()->id())->pluck('product_id')->toarray();
        $sliders = Slider::all();
        return view('website.sub_category', compact('subCategories','recentProducts','favouriteProducts', 'sliders'));
    }
}
