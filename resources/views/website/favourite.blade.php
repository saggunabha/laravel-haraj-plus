@extends('website.layouts.app')

@section('content')
    <!--start products-title  -->
    <div class="favorites-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>المفضلة</h1>
                </div>
            </div>
        </div>
    </div>
    <!--end Favorites-title  -->


    <div class="favorites-ps">
        <div class="container">
            <div class="row slider-products">
                @if(count($products) > 0)
                @foreach($products as $product)

                <div class="col-lg-4 col-md-6 col-sm-12 fav-col-grid">
                    <!--start product-grid-->
                    <div class="product-grid md-center">


                        <div class="product-div">
                            <div class="product-img">
                                <a  href="{{'/storage/' . $product->main_image}}" class="html5lightbox" data-group="set-1">

                                    <img src="{{'/storage/' . $product->main_image}}" alt="logo" />
                                </a>
                                <span  class="fav-icon first_bg active" id="{{$product->id}}" onclick="deleteFavourites({{$product->id, auth()->id()}})"><i class="far fa-heart"></i></span>
                            </div>
                            <a  href="{{ route('product-details',$product->id.'-'.$product->name) }}">
                                <div class="pavorites-text">
                                    <h3 class="product-name first_color">{{strpos($product->name, '%') !== false ? str_replace("%","/",$product->name) : $product->name }}
</h3>
                                   <span class="new-price price">{{isset($product->discount_ratio) ? $product->discount_ratio . ' ر.س  ': ''   }}</span>
                                   <span @if($product->discount_ratio != null) class="old-price price" @endif>{{$product->price . ' ر.س '}}</span> 
                                </div>
                            </a>
                        </div>

                    </div>
                    <!--end product-grid-->
                </div>
                @endforeach
                @else
                <div>لا توجد منتجات في المفضلة</div>
                @endif








            </div>
        </div>
    </div>
@endsection

@section('footer')
@include('website.layouts.footer')
@endsection