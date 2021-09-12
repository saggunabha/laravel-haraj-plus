
@if($allProducts && $allProducts->isNotEmpty())
@foreach($allProducts as $product)
    <!--start item-->
    <div class="item m-2">
        <!--start product-grid-->
        <div class="product-grid">
            <div class="product-div"> 
                @if(auth()->id())
                    @if($favouriteProducts!=[] )
                        <span
                            @if(in_array($product->id,$favouriteProducts)) class="fav-icon first_bg active"
                            onclick="toggleFavourites({{$product->id, auth()->id()}})"
                            @else  class="fav-icon first_bg "
                            onclick="toggleFavourites({{$product->id, auth()->id()}})" @endif  ><i
                                class="far fa-heart"></i></span>
                    @else
                        <span onclick="toggleFavourites({{$product->id, auth()->id()}})"
                                class="fav-icon first_bg">
                    <i class="far fa-heart"></i>
                </span>
                        @endif
                @endif
                <a  href="{{route('product-details',$product->id.'-'.$product->name)}}">
                    <div class="product-img">
                        <img src="{{asset('storage/'.$product->main_image)}}" alt="logo"/>
                    </div>
                    <div class="product-details">
                        <h3 class="product-name first_color">{{strpos($product->name, '%') !== false ? str_replace("%","/",$product->name) : $product->name }}
</h3>
                        @if($product->discount_ratio)
                            <span class="new-price price">{{$product->price-$product->price*$product->discount_ratio/100 }} ر.س</span>
                            <span class="old-price price">{{$product->price}} ر.س</span>
                        @else
                            <span class="new-price price">{{$product->price}} ر.س</span>
                        @endif
                        <div class="two-btns">
                            <button class="custom-btn sm-btn">الشراء الان</button>
                            <span
                                class="product-time second_bg first_color"> {{$product->created_at->diffForHumans(Carbon\Carbon::now(), false)}}</span>
                        </div>
                    </div>
                </a>
                <span class="pointer-shadow"></span>

            </div>
        </div>
        <!--end product-grid-->
    </div>
    <!--end item-->
@endforeach
@endif

