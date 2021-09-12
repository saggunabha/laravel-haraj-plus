<?php

namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;


class FavouriteController extends Controller
{
    public function index()
    {


        $productsId = Favorite::where('user_id', auth()->id())->pluck('product_id');
        $products = Product::whereIn('id', $productsId)->get();
        foreach ($products as $product) {
            if ($product->id == '') {
                Favorite::where('product_id', $product->id)->delete();
            }
        }

        return view('website.favourite', compact('productsId', 'products'));


    }

    public function deleteFavourites($id){
        $product = Product::findOrFail($id);
        Favorite::where('user_id', auth()->id())->where('product_id', $product->id)->delete();
        return response()->json('remove');
        }





}
