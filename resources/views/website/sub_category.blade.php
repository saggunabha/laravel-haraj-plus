@extends('website.layouts.app')

@section('content')
    <section class="order-div main-index-order">
        <!-- start slider-products
         ================ -->
        <section class="slider-products  wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-12 gray-bg row no-marg-row">
                        <div class="col-xl-2 latest-title-grid">
                            <div class="new-product-box">
                                أحدث المنتجات
                            </div>
                        </div>
                          <div class="col-xl-10 no-marg-row">
                            <div id="owl-demo6" class="owl-carousel owl-theme no-full-images    products-carousel2">
                                <!--start item-->
                                @if(!$recentProducts->isEmpty())
                                    @foreach($recentProducts as $product )
                                        <div class="item">
                                            <!--start product-grid-->
                                            <div class="product-grid md-center">
                                                <div class="product-div">
                                                    <div class="product-img">
                                                        <a  href="{{asset('storage/'.$product->main_image)}}"
                                                           class="html5lightbox"
                                                           data-group="set-1">
                                                            <img src="{{asset('storage/'.$product->main_image)}}"
                                                                 alt="logo"/>
                                                        </a>
                                                       <!-- @if(auth()->id())-->
                                                       <!--     @if($favouriteProducts!=[] )-->

                                                       <!--         <span-->
                                                       <!--             @if(in_array($product->id,$favouriteProducts)) class="fav-icon first_bg active"-->
                                                       <!--             @else class="fav-icon first_bg " @endif  ><i-->
                                                       <!--                 class="far fa-heart"></i></span>-->
                                                       <!--     @else-->
                                                       <!--         <span class="fav-icon first_bg">-->

                                                       <!--<i class="far fa-heart"></i>-->

                                                       <!--</span>-->
                                                       <!--     @endif-->
                                                       <!-- @endif-->
                                                    </div>
                                                    <a  href="{{route('product-details',$product->id.'-'.$product->name)}}">
                                                        <div class="product-details">
                                                            <h3 class="product-name first_color">{{$product->name}} </h3>
                                                            @if($product->discount_ratio)
                                                                <span class="new-price price">{{$product->price-$product->price*$product->discount_ratio/100}}  ر.س</span>
                                                                <span
                                                                    class="old-price price">{{$product->price }}ر.س</span>
                                                            @else
                                                                <span
                                                                    class="new-price price">{{$product->price}} ر.س</span>
                                                            @endif

                                                            <span
                                                                class="product-time second_bg first_color">{{$product->created_at->diffForHumans(Carbon\Carbon::now(), false)}} </span>

                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--end product-grid-->
                                        </div>
                                        <!--end item-->
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end slider-products-->



        <!-- start-main-setions -->
        <div class="sections-div gray-bg categories-sec">
            <div class="container">
                <div class="row">
                    @foreach($subCategories as $subCategory)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a  href="{{route('categoryProducts',$subCategory->id.'-'.$subCategory->name)}}">
                            <div class="img-section">
                                <img src="{{asset('/storage/' . $subCategory->image)}}" alt="">
                                <div class="text-section">
                                    <h3>{{$subCategory->name}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach




                </div>
            </div>
        </div>
        <!-- end-main-setions -->
        
        
        <!-- start main-slider
         ================ -->
        <section class="main-slider  wow fadeIn">
            <div class="container-fluid">
                <div class="row">
                    <div id="owl-demo" class="owl-carousel owl-theme main-carousel top-nav">
                        <!-- start owl-item -->
                        @if(!$sliders->isEmpty())
                            @foreach($sliders as $slider)

                                <div class="item">
                                    <div class="slider-img full-width-img">
                                        <img src="{{asset('storage/'.$slider->image)}}" class="converted-img"
                                             alt="slider img"/>
                                    </div>

                                    <div class="slider-caption">
                                        <div class="container">
                                            <h2 class="first_color">{{$slider->title}} </h2>
                                            <p>
                                                {{$slider->body}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end owl-item -->
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </section>
        <!--end main-slider-->


    </section>
@endsection

@include('website.layouts.footer')

@section('scripts')
    <script src="{{asset('website/js/price.js')}}" type="text/javascript"></script>
    <script src="{{asset('website/js/index.js')}}" type="text/javascript"></script>


    @endsection
