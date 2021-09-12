<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 20/08/18
 * Time: 09:52
 */

namespace App\Http\ViewComposers;


use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use App\Models\LocationsCompany;
use App\Models\Message;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Setting;
use App\Models\SettingMainPage;
use App\Models\StaticPage;
use App\Models\Store_product;
use App\Models\Subcategories;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HeaderComposer
{
    protected $categoriess = [];



    /**
     * HeaderComposer constructor.
     */
//    sort orderby sort main page
    public function __construct()
    {
        $this->categoriess = Category::where('parent_id', null)->orderBy('order','ASC')->get();






    }

    /**
     * bind data to the view
     *
     * 0* @param \View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            "categoriess" => $this->categoriess,




        ]);
    }


}