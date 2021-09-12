@extends('website.layouts.app')

@section('meta')
    <meta property="og:title" content="{{$product->name}}" />
    <meta property="og:type" content="website" />
    <meta property="og:image:url"  content="{{asset('storage/'.$product->main_image)}}" />
    <meta property="og:image:width"  content="600" />
    <meta property="og:image:height"  content="314" />
    <meta property="og:description" content="<?=strip_tags($product->description)?>" />
    <meta property="og:site_name" content="حراج بلص" />
    <meta property="fb:app_id" content="1909299302714716" />
   
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="حراج بلص" />
    <meta name="twitter:creator" content="https://haraj-plus.sa" />
    <meta property="og:url" content="{{route('product-details',$product->id)}}" />
    <meta property="og:title" content="{{$product->name}}" />
    <meta property="og:image" content="{{asset('storage/'.$product->main_image)}}" />
    <meta property="og:image:width"  content="600" />
    <meta property="og:image:height"  content="314" />
    <meta property="twitter:description" content="<?=strip_tags($product->description)?>" />
    
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Product",
          "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "{{$product->avg()?$product->avg():1}}",
            "reviewCount": "{{$product->rates()->count()?$product->rates()->count():1}}"
          },
          "description": "{{$product->description}}",
          "name": "{{$product->name}}",
          "image": "{{asset('storage/'.$product->main_image)}}",
          "offers": {
            "@type": "Offer",
            "availability": "http://schema.org/InStock",
            "price": "{{$product->price}}",
            "priceCurrency": "SAR"
          },
          "review": [
            {
              "@type": "Review",
              "author": "{{$product->user->name}}",
              "datePublished": "{{$product->created_at}}",
              "description": "{{$product->description}}",
              "name": "{{$product->bestRate()?$product->bestRate()->comment:'no comment'}}",
              "reviewRating": {
                "@type": "Rating",
                "bestRating": "{{$product->bestRate()?$product->bestRate()->degree:1}}",
                "ratingValue": "{{$product->avg()?$product->avg():1}}",
                "worstRating": "{{$product->WorsetRate()?$product->WorsetRate()->degree:1}}"
              }
            }
            
          ]
        }
        </script>
     
@endsection
@section('seoTitle', $product->name)
@section('seoDescription', strip_tags($product->description) )
@section('seoKeywords', ($product->name))
@section('seoGoogleImg', asset('storage/'.$product->main_image))
@section('pop')
    <!--start rate-model -->
    <div class="modal fade" id="rate-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center spam-form">
                        <h2 class="modal-title">تقييم منتج</h2>

                        <div  id="writeinfo"  class="writeinfo" style="display:none" >

                        </div>
                        <form class="needs-validation row"  id="rate-form" method="post" action="">
                            @csrf
                            <div class="static-stars center-stars">
                                <input class="star" id="rate-1" type="radio"  {{ isset($rate) && ($rate->degree==5)? 'checked' : ''  }}   value="5" name="degree">
                                <label class="star " for="rate-1"></label>
                                <input class="star" id="rate-2" type="radio" {{ isset($rate) && ($rate->degree==4) ?'checked' :''  }} value="4" name="degree">
                                <label class="star " for="rate-2"></label>
                                <input class="star  " id="rate-3" type="radio" {{ isset($rate ) && ( $rate->degree==3) ?'checked': '' }} value="3" name="degree">
                                <label class="star " for="rate-3"></label>
                                <input class="star" id="rate-4" type="radio" {{ isset($rate ) && ( $rate->degree==2) ? 'checked':'' }}  value="2" name="degree">
                                .                                <label class="star" for="rate-4"></label>
                                <input class="star" id="rate-5" type="radio" {{ isset($rate ) && ( $rate->degree==1)? 'checked':'' }}   value="1" name="degree">
                                <label class="star" for="rate-5"></label>
                            </div>
                            <div class="invalid-feedback">
                                من فضلك أدخل درجه تقييم
                            </div>
                            <div class="form-group  col-12">
                                <textarea class="form-control"   name='comment' id="comment"  required>
                                    {{isset($rate)? $rate->comment:''}}


                                </textarea>
                                <div class="invalid-feedback">
                                    من فضلك أدخل نص صحيح
                                </div>
                            </div>


                            <div class="form-group  col-12">
                                <button type="submit" @If(isset($product)) value="{{$product->id}}"  @endif id="rate" class="custom-btn full-width-btn">إرسال</button>
                            </div>



                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end rate-model -->


    <!--start spam-model -->
    <div class="modal fade" id="spam-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center spam-form">
                        <h4 class="modal-title">ابلاغ عن منتج</h4>
                        <div  id="writeinfo1" class="writeinfo1"   style="display:none" >

                        </div>
                        <form class="needs-validation row" method="post" novalidate>
                            @csrf
                            <div class="form-group  col-12">
                                <textarea class="form-control" placeholder="نص البلاغ"  name="body" id="body"required></textarea>
                                <div class="invalid-feedback">
                                    من فضلك أدخل نص صحيح
                                </div>
                            </div>


                            <div class="form-group  col-12">
                                <button type="submit"  id="report" @If(isset($product)) value="{{$product->id}}"  @endif class="custom-btn full-width-btn">إرسال</button>
                            </div>



                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end spam-model -->
@endsection
@section('content')
    <!--start product-details-pg
          ================-->
    <section class="order-div page-order-div">
        <div class="producut-details-pg  margin-div responsive-margin-div">
            <div class="container">
                <div class="row">
                    <div class="col-12 no-marg-row">
                        <!--start slider-->
                        <div id="jssor_1"
                             style="position:relative;margin:0 auto;top:0px; max-width:calc(100% - 15px);left:0px;width:1200px;height:500px;overflow:hidden;visibility:hidden;background-color:#fff;">
                            <!-- Loading Screen -->
                            <div data-u="loading" class="jssorl-009-spin"
                                 style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:#fff;">
                                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;"
                                     src="{{asset('website/images/main/spin.svg')}}" />
                            </div>



                            <div data-u="slides" class="slides-slider"
                                 style="cursor:default;position:relative;top:0px;left:150px;width:1050px;height:500px;overflow:hidden;">
                                <span class="share-icon auto-icon" data-url="{{route('product-details',$product->id)}}" data-title="Sharing is great!">
                                    <div data-network="sharethis" class="st-custom-button fa fa-share-alt" ></div>
                                </span>

                                @if($images!=[])
                                    @foreach($images as $image)
                                        <div>
                                            <img data-u="image" class="main-pro-det-img" src="{{asset('storage/'.$image)}}" />
                                            <img data-u="thumb" src="{{asset('storage/'.$image)}}" />
                                        </div>
                                    @endforeach
                                @else
                                    <div>
                                        <img data-u="image" class="main-pro-det-img" src="{{asset('storage/'.$product->main_image)}}" />
                                        <img data-u="thumb" src="{{asset('storage/'.$product->main_image)}}" />
                                    </div>
                                @endif
                                @if($product->video)
                                    <div>
                                        @php $video_id =  $product->video @endphp
                                    <iframe width=\"853\" height=\"480\" src="https://www.youtube.com/embed/{{$video_id}}" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>
                                    </div>
                                @endif
                            </div>
                            <!-- Thumbnail Navigator -->
                            <div data-u="thumbnavigator" class="jssort101 side-jssor-menu"
                                 style="position:absolute;left:15px;top:0px;width:100px;height:500px;background-color:#fff;"
                                 data-autocenter="2" data-scale-left="0.75">
                                <div data-u="slides">
                                    <div data-u="prototype" class="p" style="width:99px;height:66px;">
                                        <div data-u="thumbnailtemplate" class="t"></div>
                                        <svg viewbox="0 0 16000 16000" class="cv">
                                            <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                            <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                                            <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Arrow Navigator -->
                            <div data-u="arrowleft" class="jssora093 slid-moves"
                                 style="width:50px;height:50px;top:0px;left:170px;" data-autocenter="2">
                                <svg viewbox="0 0 16000 16000"
                                     style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                                    <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                                    <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
                                </svg>
                            </div>
                            <div data-u="arrowright" class="jssora093 slid-moves"
                                 style="width:50px;height:50px;top:0px;right:10px;" data-autocenter="2">
                                <svg viewbox="0 0 16000 16000"
                                     style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                                    <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                                    <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
                                </svg>
                            </div>
                        </div>
                        <!--end slider-->
                    </div>



                    <!--start product-details-description-->
                    <div class="product-details-description margin-div col-12">
                        <div class="row no-marg-row">
                            <div class="product-describe col-lg-9 col-md-8">
                              
                                  @if(auth()->id())
                                            @if($favouriteProducts!=[] )

                                                <span
                                                    @if(in_array($product->id,$favouriteProducts)) class="fav-icon first_bg active"
                                                    onclick="togFav({{$product->id, auth()->id()}})"
                                                    @else  class="fav-icon first_bg "
                                                    onclick="togFav({{$product->id, auth()->id()}})" @endif  ><i
                                                        class="far fa-heart"></i></span>
                                            @else
                                                <span onclick="togFav({{$product->id, auth()->id()}})"
                                                        class="fav-icon first_bg">

                                        <i class="far fa-heart"></i>
                                    </span>
                                            @endif
                                        @endif
                                <ul class="list-unstyled">
                                    <li>
                                        <span> اسم المنتج : </span>
                                   {{strpos($product->name, '%') !== false ? str_replace("%","/",$product->name) : $product->name }}
                                    </li>
                                    <li>
                                        <span>اسم البائع : </span>
                                        @php $promoted = \App\Models\PromotedUser::where('user_id',$product->user_id)->get(); @endphp
                                        @if(count($promoted))
                                            <a href="{{asset($promoted->first()->link)}}">{{$product->user->name}}</a>
                                            @else
                                        {{$product->user->name}}
                                            @endif
                                    </li>

                                    <li>
                                        <span>تقييم المنتج : </span>
                                        @if($product->rate)
                                            {{$product->rate}}  
                                        @else
                                            لا يوجد تقييمات
                                        @endif 
                                        
                                    </li>
                                    
                                    <li>
                                        <span>المدينه : </span>
                                        @if($product->city->name)
                                            {{$product->city->name}}
                                        @else
                                            لا توجد مدينه
                                        @endif 
                                        
                                    </li>                                    

                                    <li>
                                        <span> تفاصيل المنتج :</span>
                                        {!!$product->description!!}

                                    </li>

                                    <li>
                                        <span>  سعر المنتج : </span>
                                        <!--{{$product->price}}-->
                                               @if($product->discount_ratio !=null)
                                                <figure class="new-price price">{{$product->price-($product->price*$product->discount_ratio)/100}} ر.س</figure>
                                                <figure class="old-price price">{{$product->price}} ر.س</figure>
                                                @else
                                                <figure class="new-price price">{{$product->price}} ر.س</figure>
                                                
                                                @endif
                                    </li>
                                </ul>
                            </div>

                            <div class="product-btns col-lg-3 col-md-4 text-left-dir sm-center">
                                @if($product->user_id==auth()->id())
                                    <a href="{{route('product.change',$product->id)}}" class="main-white-box"><i class="fa fa-edit"></i>تعديل
                                    </a>


                                    <a href="{{route('products.deactivate',$product->id)}}" class="main-white-box">
                                        @if($product->is_valid)
                                            <i class="fa fa-cube"></i>تجميد </a>
                                @else
                                    <i class="fas fa-retweet"></i>تفعيل </a>
                                @endif
                                @else
                                    <a href="#" data-toggle="modal"  id="report-btn" @if(auth()->id()) data-target="#spam-modal" @else data-target="#login-modal" @endif class="main-white-box"><i
                                                class="fa fa-flag"></i>إبلاغ</a>

                            </div>


                            <div class="product-contact-btns col-12 xs-center">
                                <span class="main-white-box"><i class="fab fa-whatsapp"></i>التواصل
                                    باستخدام
                                    الواتساب
                                    <?php $phone = format_number($product->user->phone) ;?>
                                    <a href="https://wa.me/{{$phone}}" target="_blank">{{$phone}}</a>
                                </span>
                                <span class="main-white-box"><i class="fa fa-phone"></i>قم
                                    بالاتصال
                                    الآن
                                    <a href="tel:{{$phone}}">
                                   {{$phone}}
                                    </a>
                                </span>
                                @if(Auth::user())
                                    <a href="{{route('chat.getChat',$product->user->id)}}" class="main-white-box"><i class="far fa-comments"></i>قم بمراسلة
                                        البائع</a>
                                @endif

                            </div>

                            @endif
                        </div>
                        

                        <div class="col-12 text-left-dir sm-center">

                            <div class="share-social">
                                {{-- <span class="first_color info-title"> مشاركة </span> --}}
                                <div class="share-social">
                                    <span class="first_color info-title">مشاركة</span>
                                 
                                    <ul class="list-inline auto-icon"> 
                                        <div class="sharethis-inline-share-buttons"></div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product-details-description-->


                    <!--start comment-->

                    <div class="commnets-div col-12">
                        <h2 class="sec-title wow fadeIn  sm-center">التقييمات</h2>

                        <ul class="list-unstyled">
                            
                            @if($rates->isNotEmpty())
                                @foreach($rates as $rate )
                                    <li>
                                        <div class="rev-det">
                                            <div class="rev-name">
                                                <div class="full-width-img rev-img">
                                                    <img  @if($rate->user->image)  src="{{asset('storage/'.$rate->user->image)}}"  @else src="{{asset("admin/images/main/avatar.png")}}"  @endif }} class="converted-img" alt="img" />
                                                </div>
                                                {{$rate->user->name}}
                                                <span class="rev-date">{{$rate->created_at->format("d/m/Y")}}</span>
                                                <div class="prod-stars">
                                                    @if(auth()->id())
                                                        <a class="report-link" href="{{route("reportComment",[$rate->id,$product->id])}}" title="الابلاغ عن المنتج"><i class="fa fa-flag"></i></a>
                                                    @endif
                                                    <div class="static-stars">
                                                        <input class="star" type="radio"  name="starclothes.{{$rate->id}}" @if($rate->degree==5) checked @endif disabled  >
                                                        <label class="star"></label>
                                                        <input class="star" type="radio" name="starclothes.{{$rate->id}}"  @if($rate->degree==4) checked  @endif disabled >
                                                        <label class="star"></label>
                                                        <input class="star" type="radio" name="starclothes.{{$rate->id}}"  @if($rate->degree==3) checked @endif disabled >
                                                        <label class="star"></label>
                                                        <input class="star" type="radio" name="starclothes.{{$rate->id}}" @if($rate->degree==2) checked @endif disabled >
                                                        <label class="star"></label>
                                                        <input class="star" type="radio" name="starclothes.{{$rate->id}}" @if($rate->degree==1) checked @endif disabled >
                                                        <label class="star"></label>

                                                    </div>

                                                </div>

                                            </div>


                                            <p>
                                                {{$rate->comment}}
                                            </p>
                                        </div>

                                    </li>
                                @endforeach
                            @else

                                <h4 class='empty-div-messages text-center' style="color:red">لا يوجد تقييمات</h4>
                            @endif
                        </ul>
                        @if($product->user_id!=auth()->id())


                            <div class=" sm-center">
                                <button type="submit" id="rate-btn" data-toggle="modal" @if(auth()->id())  data-target="#rate-modal"   @else data-target="#login-modal"  @endif class="custom-btn">أضف
                                    تقييم</button>
                            </div>

                        @endif
                    </div>
                    <!--end comment-->

                </div>
            </div>
        </div>
    </section>
    <!--end product-details-pg-->

@endsection

@include("website.layouts.footer")

@section("scripts")

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e9e29a0e3a49d0012075ee9&product=image-share-buttons&cms=website' async='async'></script>
    <script src="{{asset("website/js/jssor.slider-28.0.0.min.js")}}" type="text/javascript"></script>
    <script src="{{asset('website/js/custom-jssor.js')}}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <script type="text/javascript">
        jssor_1_slider_init();
        $(".product-contact-btns .main-white-box").click(function () {
            $(".product-contact-btns .main-white-box").removeClass("active");
            $(this).addClass("active");
        });


        var $wincontact = $(window); // or $box parent container
        var $boxcontact = $(".product-contact-btns .main-white-box");
        $wincontact.on("click.Bst", function (event) {
            if (
                $boxcontact.has(event.target).length === 0 && //checks if descendants of $box was clicked
                !$boxcontact.is(event.target) //checks if the $box itself was clicked
            ) {

                $boxcontact.removeClass("active");
            }
        });

        $("#jssor_1 .slides-slider").click(function(){
            $(this).find("iframe").addClass("active");
        });
        
        
        
        
    </script>


@endsection

