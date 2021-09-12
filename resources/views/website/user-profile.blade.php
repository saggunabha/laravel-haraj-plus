@extends('website.layouts.app')
@section('meta')
    <meta property="og:title" content="{{$user->name}}" />
    <meta property="og:type" content="website" />
    <meta property="og:image:url"  content="{{asset('storage/'.$user->image)}}" />
    <meta property="og:image:width"  content="600" />
    <meta property="og:image:height"  content="314" />
    <meta property="og:description" content="<?=strip_tags($user->about)?>" />
    <meta property="og:site_name" content="حراج بلص" />
    <meta property="fb:app_id" content="1909299302714716" />
   
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="حراج بلص" />
    <meta name="twitter:creator" content="https://haraj-plus.sa" />
    <meta property="og:url" content="{{route('user-profile',$user->id)}}"/>
    <meta property="og:title" content="{{$user->name}}" />
    <meta property="og:description" content="<?=strip_tags($user->about)?>" />
    <meta property="og:image" content="{{asset('storage/'.$user->cover_image)}}" />
@endsection
@section('seoTitle', $user->name)
@section('seoDescription', strip_tags($user->about) )
@section('seoKeywords', ($user->name))
@section('seoGoogleImg', asset('storage/'.$user->image))
@section('content')

    <section class="order-div page-order-div">
        <div class="profile-pg">
            <div class="container-fluid">
                <div class="row">
                    <!--start profile-images-->
                    <div class="profile-images-grid col-12 no-marg-row wow fadeIn">

                        <div class="form-group profile-image-upload">
                            <input type="file" class="img-form-shape file-input form-control" value="" id="main-01"
                                   disabled>

                            <label class="file-input-label timeline-label full-width-img " for="main-01"> <img
                                    src="{{asset('storage/'.$user->cover_image)}}" alt="img" class="converted-img" />
                                <img id="preview-main-01" />
                            </label>


                            <div class="user-profile-img">
                                <input type="file" class="img-form-shape file-input form-control" value="" id="main-02"
                                       disabled>


                                <label class="file-input-label timeline-label full-width-img " for="main-02"> <img
                                        src="{{asset('storage/'.$user->image)}}" alt="img" class="converted-img" />
                                    <img id="preview-main-02" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--end profile-images-->
                </div>
            </div>

            <div class="container">
                <div class="row">


                    <div class="col-12 text-center wow fadeIn">
                        <div class="store-information-text">
                            <h2 class="info-title first_color">نبذة عن {{$user->name}}</h2>
                            <p>
                                {{$user->about}}
                            </p>
                        </div>
                    </div>

                    <div class="col-12 two-btns  margin-div text-left-dir wow fadeIn">

                        <a  href="{{route("chatStore",$user->id)}}"  @if(!auth()->id())   data-toggle="modal" data-target="#login-modal"   @endif class="custom-btn big-btn">راسلنا</a>
                        <br>
                        <a  href="https://api.whatsapp.com/send?phone={{$user->phone}}"  class="custom-btn big-btn">للتواصل عبر الواتس اب</a>


                    </div>
                </div>

            </div>

        </div>
        <!--start rate-model -->

        <!-- end rate-model -->


        <!-- start products
         ================ -->
        <div class="products md-center margin-div products-pg profile-products   wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="sec-title text-center"> المنتجات</h2>
                    </div>
                    <div class="col-12 text-left-dir sm-center">

                        <div class="product-contact-btns col-12 xs-center">
                            @if(isset($user->phone))
                                <span class="main-white-box"><i class="fab fa-whatsapp"></i>التواصل
                                    باستخدام
                                    الواتساب
                                    <a  href="https://wa.me/?text={{$user->phone}}">{{$user->phone}}</a>
                                </span>
                            <span class="main-white-box"><i class="fa fa-phone"></i>قم
                                    بالاتصال
                                    الآن
                                    <a  href="tel:{{$user->phone}}">{{$user->phone}}</a>
                                </span>

@endif
                        </div>

                        <div class="share-social">
                            <span class="first_color info-title"> مشاركة </span>
                            <div class="share-social">
                                <ul class="list-inline auto-icon">
                                    <div class="sharethis-inline-share-buttons"></div>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row no-marg-row col-12">
                        <!--start item-->


@if(!$user->products->isEmpty())
                            @foreach($user->products as $product)
                        <div class="item col-xl-3 col-lg-4 col-6 load-div ">
                            <!--start product-grid-->
                            <div class="product-grid">
                                <div class="product-div">
                                    @if(auth()->id())
                                        @if($user->favourite!=[] )

                                            <span @if(in_array($product->id,$user->favourite)) class="fav-icon first_bg active" @else  class="fav-icon first_bg " @endif  ><i class="far fa-heart"></i></span>
                                        @else
                                            <span class="fav-icon first_bg">

                                          <i class="far fa-heart"></i>
                                      </span>
                                        @endif
                                    @endif


                                    <a  href="{{route('product-details',$product->id.'-'.$product->name)}}">
                                        <div class="product-img">
                                            <img src="{{asset('storage/'.$product->main_image)}}" alt="logo" />
                                        </div>
                                        <div class="product-details">
                                            <h3 class="product-name first_color">{{$product->name}} </h3>
                                            @if($product->discount_ratio)

                                            <span class="new-price price">{{$product->price-$product->price*$product->discount_ratio/100 }} ر.س</span>
                                            <span class="old-price price">{{$product->price}} ر.س</span>
                                        @else
                                            <span class="new-price price">{{$product->price}} ر.س</span>
                                        @endif
                                            <div class="two-btns">
                                                <button class="custom-btn sm-btn">إشتري الأن</button>
                                                <span class="product-time second_bg first_color"> {{$product->created_at->diffForHumans(Carbon\Carbon::now(), false)}} </span>
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
                        @if($user->products->count()>12)
                                <div class="text-center col-12 margin-div">
                                    <a  href="#" class="custom-btn big-btn" id="loadmore">المزيد</a>
                                </div>
                            @endif
@else

                            <h4 class='empty-div-messages text-center'>لا يوجد منتجات</h4>

@endif
                    </div>
                </div>


            </div>
        </div>
        <!--end products-->

    </section>
    @endsection

@section('scripts')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e9e29a0e3a49d0012075ee9&product=image-share-buttons&cms=website' async='async'></script>

    <script>

        $(".product-contact-btns .main-white-box").click(function () {
            $(".product-contact-btns .main-white-box").removeClass("active");
            $(this).addClass("active");
        });
    $(function () {
    $(".load-div").slice(0, 12).fadeTo("slow", 1);

    $("#loadmore").on('click', function (e) {
    e.preventDefault();
    $(".load-div:hidden").slice(0, 12).slideDown("fast");

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
