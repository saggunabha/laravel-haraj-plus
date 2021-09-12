<?php

namespace App\Http\Controllers\Website;

use App\Classes\FileOperations;
use App\Models\Ad;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\PromotedUser;
use App\Models\Setting;
use App\Models\Slider;
use App\Notifications\favoriteNotification;
use App\User;
use Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Notifications\MailNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendCountMail;


class HomeController extends Controller
{
    public function index()
    {

        $favouriteProducts = Favorite::where('user_id', auth()->id())->pluck('product_id')->toarray();
        $products_pro = (Product::where('is_valid', 1)->wherehas('user', function ($q) {

            $q->where('is_promoted', 1)->where('is_active', 1);

        })->orderBy('id','DESC')->take(12)->get());


        $products = (Product::where('is_valid', 1)->wherehas('user', function ($q) {

            $q->where('is_active', 1)->where('is_promoted', '<>', 1);
        })->orderBy('id','DESC')->take(12)->get());

        $brands = Brand::take(12)->get();
        $banner1 = Ad::where('position', 'banner1')->first();
        $banner2 = Ad::where('position', 'banner2')->first();

        $categories = Category::where('parent_id',  null)->orderBy('order','ASC')->pluck('name', 'id');
        $recentProducts = Product::where('is_valid', 1)->wherehas('user', function ($q) {
            $q->where('is_active', 1)->where('is_promoted',1);
        })->orderBy('id','DESC')->take(10)->get();
        $sliders = Slider::take(12)->get();

        $stores = PromotedUser::wherehas('user', function ($q) {
            $q->where('is_active', 1)->where('is_promoted', 1);

        })->orderBy('id','DESC')->take(8)->get();
        $pro_count = $products_pro->count();
        $normal_count = $products->count();
        $store_count = $stores->count();
        return view('website.index', compact('products_pro', 'store_count', 'pro_count', 'products', 'normal_count', 'stores', 'sliders', 'brands', "banner1", 'banner2','categories', 'recentProducts', 'favouriteProducts'));
    }

    public function productSearch(Request $request)
    {
        // dd($request->name);

        $data = $request->all();
        $model = new Product();

        $favouriteProducts = Favorite::where('user_id', auth()->id())->pluck('product_id')->toarray();


        $products_pro = Product::wherehas('user', function ($q) {

            $q->where('is_active', 1)->where('is_promoted', 1);
        })->where('is_valid', 1)->where('name', 'like', '%' . $request->name . '%');

        $products = Product::wherehas('user', function ($q) {

            $q->where('is_active', 1)->where('is_promoted', '<>', 1);
        })->where('is_valid', 1)->where('name', 'like', '%' . $request->name . '%');

        $dates = [];
        if ($request->datefilter != null) {

            //  return $request->dates;

            $dates = explode('-', $request->datefilter);
            /*  $dates[0] =strtotime();
             $dates[1] = strtotime(str_replace('/', '-', $dates[1]));*/

            //  return date('Y-m-d H:i:s',strtotime('06/10/2011 19:00:02'));

            $products_pro = $products_pro->whereBetween('created_at', [date('Y-m-d H:i:s', strtotime($dates[0])), date('Y-m-d H:i:s', strtotime($dates[1]))]);
            $products = $products->whereBetween('created_at', [date('Y-m-d H:i:s', strtotime($dates[0])), date('Y-m-d H:i:s', strtotime($dates[1]))]);
        }
        if ($request->max_price != 0) {
            $products_pro = $products_pro->whereBetween('price', [$request->min_price, $request->max_price]);
            $products = $products->whereBetween('price', [$request->min_price, $request->max_price]);

        }

        if ($request->has('type') && $request->type != 0) {
            
            $ca = Category::where('parent_id' , $request->type)->first();
  
                $products_pro = $products_pro->where('category_id', $ca->id);
                $products = $products->where('category_id', $ca->id);  

        }
        

        $products_pro =   $products_pro->orderBy('id','DESC')->take(12)->get();
        $products =  $products->orderBy('id','DESC')->take(12)->get();
        $allProducts = $products_pro->union($products);

        $pro_count = $allProducts->count();
// dd($favouriteProducts);
        // return view('website.products', compact('allProducts', 'count', 'favouriteProducts'));

        $output ="";
        if($allProducts->isNotEmpty())
        {
            
            $output = view('website.appendProducts' ,compact('allProducts' ,'favouriteProducts','pro_count'))->render();

            return response()->json(['success'=>'success','output'=>$output]);
        }
        if($allProducts->isEmpty())
        {
            return response()->json(['error'=>'error','output'=>$output]);
        }
    }
    
    
    // public function productSearchCat(Request $request)
    // {
    //     // dd($request->name);
        
    //     $favouriteProducts = Favorite::where('user_id', auth()->id())->pluck('product_id')->toarray();

    //     $category = Category::where('parent_id' , $request->type)->get();
        
        
    //     //dd($category);

    //     $output ="";
    //     if($category->isNotEmpty())
    //     {
    //         $stat = 0;
    //         $output = view('website.appendCategory' ,compact('category' , 'stat' , 'favouriteProducts'))->render();
        

    //         return response()->json(['success'=>'success','output'=>$output]);
    //     }
    //     if($category->isEmpty())
    //     {
    //         return response()->json(['error'=>'error','output'=>$output]);
    //     }
    // }    
    
    
    
    
    
    
    
    


    public function getSearchResult(Request $request)
    {
        $favouriteProducts = Favorite::where('user_id', auth()->id())->pluck('product_id')->toarray();


        $products_pro = Product::wherehas('user', function ($q) {

            $q->where('is_active', 1)->where('is_promoted', 1);
        })->where('is_valid', 1)->where('name', 'like', '%' . $request->search . '%');


        $products = Product::wherehas('user', function ($q) {

            $q->where('is_active', 1)->where('is_promoted', '<>', 1);
        })->where('is_valid', 1)->where('name', 'like', '%' . $request->search . '%');


        $allProducts = $products_pro->union($products)->orderBy('id','DESC')->take(12)->get();
        $count=$allProducts->count();
        return view('website.products', compact('allProducts', 'count', 'favouriteProducts'));



    }


    public function profileGeneral($profile)
    {
        $user = PromotedUser::wherehas('user', function ($q) {
            $q->where('is_active', 1)->where('is_promoted', 1);
        })->where('link', $profile)->first();

        if ($user == null) {
            abort('404');
        } else {
            $favouriteProducts = Favorite::where('user_id', auth()->id())->pluck('product_id')->toarray();
            $products = Product::where('is_valid', 1)->where('user_id', $user->user->id)->orderBy('id','DESC')->get();
            $count = $products->count();

            return view('website.general-profile', compact('user', 'count', 'products', 'favouriteProducts'));
        }

    }


    /* public function profileGeneralSecond($profile)
     {


 //dd('nd');
         $user = PromotedUser::find($profile);
 //dd($user);
         if ($user == null) {


             abort('404');
         } else {
             $favouriteProducts = Favorite::where('user_id', auth()->id())->pluck('product_id')->toarray();
             $products = Product::where('is_valid', 1)->where('user_id', $user->user->id)->get();
             $count=$products->count();

             return view('website.general-profile', compact('user','count', 'products', 'favouriteProducts'));
         }

     }*/


    public function profile($id)
    {

        if (auth()->id() == $id) {
            $user = PromotedUser::where('user_id', auth()->id())->first();
            $products = Product::where('user_id', auth()->id())->orderBy('id','DESC')->get();
            $count = $products->count();
            // $productsId = Favorite::where('user_id', auth()->id())->pluck('product_id');
            // $products=Product::whereIn('id',$productsId)->get();
            /* $products = (Product::where('is_valid',1)->wherehas('user',function($q){

                 $q->where('is_promoted',1);
             })->latest()->get());*/
            //  return $user;


            if ($user == null)
                abort(404);


            //  return $products;
            return view('website.profile', compact('user', 'count', 'products'));
        } else
            abort(401);

    }


    public function authProfile(Request $request)
    {

        if ($request->hasFile('cover')) {
            //
            $pathAfterUpload = FileOperations::StoreFileAs('website/users/covers', $request->cover, str::random(8));
            PromotedUser::where('user_id', auth()->id())->update(['cover_image' => $pathAfterUpload]);


        }
        if ($request->hasFile('profile')) {

            $pathAfterUpload = FileOperations::StoreFileAs('website/users', $request->profile, str::random(8));


            $user = User::find(auth()->id())->update(['image' => $pathAfterUpload]);

            // dd($pathAfterUpload);mo
        }


        //return response()->json('success');


        //   dd($request->cover);
        //  return view('website.profile',compact('user'));

    }


    public function addLink(Request $request)
    {

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), ['link' => 'required:string']);
        if ($validator->fails()) {


            $msg = '<div class="alert-danger">يرجى ادخال رابط </div>';

        } else {
            $link = PromotedUser::where('link', $request->link)->first();
            if ($link) {
                $msg = '<div class="alert-danger"> هذا الرابط موجود بالفعل  </div>';
            } else {
                PromotedUser::where('user_id', auth()->id())->update(['link' => $request->link]);
                $msg = '<div class="alert-success">تم الاضافه بنجاح</div>';
            }


        }
        return response()->json(['msg' => $msg]);


    }


    public function profileProducts()
    {
        // $products = Product::where('user_id',auth()->id())->latest()->take(1)->get();


//

        return view('website.show-profile');


    }


    public function loadMore()
    {

        $products = Product::where('user_id', auth()->id())->orderBy('id','DESC')->paginate(16);
        $next_url = '';

        if ($products->toArray()['next_page_url'] != null)
            $next_url = $products->toArray()['next_page_url'];

        $output = view('website.load', compact('products'))->render();
        //  dd('dfsd');

        //  return $products ;
        return response()->json(['output' => $output, 'next_url' => $next_url]);


    }

    public function loadMoreProducts()
    {

        $products = Product::where('is_valid', 1)->wherehas('user', function ($q) {

            $q->where('is_active', 1)->where('is_promoted', '<>', 1);
        })->orderBy('id','DESC')->paginate(12);
        $next_url = '';

        if ($products->toArray()['next_page_url'] != null)
            $next_url = $products->toArray()['next_page_url'];

        $output = view('website.loadMoreIndex', compact('products'))->render();
        //  dd('dfsd');

        //  return $products ;
        return response()->json(['output' => $output, 'next_url' => $next_url]);


    }


    public function products()
    {
        $products_pro = (Product::where('is_valid', 1)->wherehas('user', function ($q) {

            $q->where('is_promoted', 1)->where('is_active', 1);

        })->orderBy('id','DESC'));

        $products = (Product::where('is_valid', 1)->wherehas('user', function ($q) {

            $q->where('is_active', 1)->where('is_promoted', '<>', 1);
        })->orderBy('id','DESC'));
        $allProducts = $products_pro->union($products)->orderBy('id','DESC')->get();

        $count = $allProducts->count();

        $favouriteProducts = Favorite::where('user_id', auth()->id())->pluck('product_id')->toarray();
        return view('website.products', compact('allProducts', 'count', 'favouriteProducts'));

    }

    public function toggleFavourites($id)
    {
        $product = Product::findOrFail($id);
        $user = User::find($product->user_id);
        $favouriteProducts = Favorite::where('user_id', auth()->id())->pluck('product_id')->toarray();
        if (in_array($product->id, $favouriteProducts)) {
            Favorite::where('user_id', auth()->id())->where('product_id', $product->id)->delete();
            return response()->json('delete');
        } else {
            $favorite = Favorite::create(array_merge(['user_id' => auth()->id()], ['product_id' => $product->id]));
            Notification::send($product->user, new favoriteNotification(['type' => 'favorite', 'image' => $user->image, 'actionUrl' => url(route('product-details', $product->id)), 'message' => ' قام ' . $favorite->user->name . '  بتفضيل منتجك ']));
         
            Notification::send($product->user,new MailNotification(['line'=>  'بتفضيل منتجك ' . $favorite->user->name . ' قام' ,'url'=> url(route('product-details', $product->id.'-'.$product->name)),'url_text'=>'مشاهدة المنتج']));

                return response()->json('add');
        }

    }

    public function togFav($id)
    {
        $product = Product::findOrFail($id);
        $favouriteProducts = Favorite::where('user_id', auth()->id())->pluck('product_id')->toarray();
        if (in_array($product->id, $favouriteProducts)) {
            Favorite::where('user_id', auth()->id())->where('product_id', $product->id)->delete();
            return response()->json('delete1');
        } else {
           $favorite =  Favorite::create(array_merge(['user_id' => auth()->id()], ['product_id' => $product->id]));
           
            Notification::send($product->user,new MailNotification(['line'=>  'بتفضيل منتجك ' . $favorite->user->name . ' قام' ,'url'=> url(route('product-details', $product->id.'-'.$product->name)),'url_text'=>'مشاهدة المنتج']));

            return response()->json('add1');
        }
    }

    public function unReadNotification()
    {


        $count = 0;

        $output = view('website.load_notification')->render();
        /*foreach (auth()->user()->unReadNotifications as $notification) {
            if (in_array($notification->created_at->diffInSeconds(\Carbon\Carbon::now(), false), range(0, 2))) {
                $count++;


            }

        }*/
        return response()->json(['output' => $output, 'count' => $count]);


    }

    public function unReadMsg()
    {
       
        $output=view('website.load_msg')->render();

        return response()->json(['output'=>$output]);

    }

}
