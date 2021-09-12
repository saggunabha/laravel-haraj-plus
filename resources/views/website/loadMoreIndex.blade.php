@if(!$products->isEmpty())
    @foreach($products as $product)
        <div class="item load-div">
            <!--start product-grid-->
            <div class="product-grid">
                <div class="product-div">
                    @if(auth()->id())
                        @if($favouriteProducts!=[] )

                            <span
                                @if(in_array($product->id,$favouriteProducts)) class="fav-icon first_bg active"
                                onclick="toggleFavourites({{$product->id, auth()->id()}})"
                                @else class="fav-icon first_bg "
                                onclick="toggleFavourites({{$product->id, auth()->id()}})"  @endif  ><i
                                    class="far fa-heart"></i></span>
                        @else
                            <span onclick="toggleFavourites({{$product->id, auth()->id()}})"
                                  class="fav-icon first_bg">

                                          <i class="far fa-heart"></i>
                                      </span>
                        @endif
                    @endif
                    <a  href="{{route('product-details',$product->id)}}">
                        <div class="product-img">
                            <img src="{{asset('storage/'.$product->main_image)}}" alt="logo"/>
                        </div>
                        <div class="product-details">
                            <h3 class="product-name first_color">{{strpos($product->name, '%') !== false ? str_replace("%","/",$product->name) : $product->name }}
 </h3>
                             @if($product->discount_ratio != null)

                                <span class="new-price price">{{{$product->price-($product->price*$product->discount_ratio)/100 }} ر.س</span>
                                <span class="old-price price">{{$product->price}} ر.س</span>
                            @else
                                <span class="new-price price">{{$product->price}} ر.س</span>
                            @endif
                            <div class="two-btns">
                                     <button class="custom-btn sm-btn">الشراء
                                                    الأن</button>
                            <span
                                    class="product-time second_bg first_color">{{$product->created_at->diffForHumans(Carbon\Carbon::now(), false)}} </span>
                            </div>
                        </div>
                    </a>
                    <span class="pointer-shadow"></span>

                </div>
            </div>
            <!--end product-grid-->
        </div>

    @endforeach
    <!--end item-->--}}

    </div>
    </div>
{{--    @if($normal_count >12)--}}
        <div class="text-center col-12 margin-index-div">
            <a  id="loadmore" value="0"  style="display: none" class="custom-btn big-btn loadmore">المزيد</a>
        </div>
   {{-- @endif--}}
@else
    <h4 class='empty-div-messages text-center'>لا يوجد منتجات</h4>
@endif
