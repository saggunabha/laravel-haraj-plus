@extends('website.layouts.app')
@section('content')
    <!--start product-details-pg
          ================-->

    <div class="dark-gray-bg">
        <section class="order-div page-order-div">

            <!-- start products
             ================ -->
            <section class="products md-center margin-div products-pg  responsive-margin-div  wow fadeIn">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                                <h2 class="sec-title text-center"> المنتجات</h2>
                        </div>

                        <div class="row no-marg-row col-12">
                            <!--start item-->

                            @if($allProducts->isNotEmpty())
                                @foreach($allProducts as $product)

                                    <div class="item col-xl-3 col-lg-4 col-6 load-div ">
                                        <!--start product-grid-->
                                        <div class="product-grid">
                                            <div class="product-div">
                                                @if(auth()->id())
                                                    @if($favouriteProducts!=[] )

                                                        <span @if(in_array($product->id,$favouriteProducts)) class="fav-icon first_bg active" onclick="togFav({{$product->id, auth()->id()}})" @else  class="fav-icon first_bg " onclick="togFav({{$product->id, auth()->id()}})" @endif  ><i class="far fa-heart"></i></span>
                                                    @else
                                                        <span class="fav-icon first_bg" onclick="togFav({{$product->id, auth()->id()}})">

                                          <i class="far fa-heart"></i>
                                      </span>
                                                    @endif
                                                @endif
                                                <a  href="{{route('product-details',$product->id."-".$product->name)}}">
                                                    <div class="product-img">
                                                        <img src="{{asset('storage/'.$product->main_image)}}" alt="logo" />
                                                    </div>
                                                    <div class="product-details">
                                                        <h3 class="product-name first_color">{{strpos($product->name, '%') !== false ? str_replace("%","/",$product->name) : $product->name }}
 </h3>
                                                      
                                                          @if($product->discount_ratio != null)

                                                        <span class="new-price price">{{$product->price-($product->price*$product->discount_ratio)/100 }} ر.س</span>
                                                        <span class="old-price price">{{$product->price}} ر.س</span>
                                                        @else
                                                            <span class="new-price price">{{$product->price}} ر.س</span>
                                                        @endif
                                                        
                                                        
                                                        <div class="two-btns">
                                                             <button class="custom-btn sm-btn">الشراء
                                                    الأن</button>
                                                            <span class="product-time second_bg first_color"> {{$product->created_at->diffForHumans(Carbon\Carbon::now(), false)}}</span>
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

                        </div>
                    </div>

                    @if($count>12)
                        <div class="text-center col-12 margin-div">
                            <a  href="#" class="custom-btn big-btn" id="loadmore">المزيد</a>
                        </div>
                    @endif

                    @else
                        @if(\Route::currentRouteName()=='website.products')
                            <h1 class="empty-div-messages text-center">لا يوجد منتجات</h1>
                        @else
                            <h4 class="empty-div-messages text-center">لم ينجح بحثك, ربما المنتجات التي تريد الوصول له غير متوفرة</h4>
                        @endif
                </div>
        @endif
    </div>

    </section>
    <!--end products-->


    </section>
    </div>
@endsection

@include('website.layouts.footer')
@section('scripts')
    <script>
        //load div
        $(function () {
            $(".load-div").slice(0, 18).fadeTo("slow", 1);

            $("#loadmore").on('click', function (e) {
                e.preventDefault();
                $(".load-div:hidden").slice(0, 18).slideDown("fast");

                if('load-div')

                    if ($(".load-div:hidden").length == 0) {
                        $("#loadmore").fadeOut('fast');
                    } else {
                        $("#loadmore").fadeIn('fast');

                    }
                $('html,body').animate({
                    scrollTop: $(this).offset().top - 600
                }, 1500);
            });
        });
    </script>

@endsection
