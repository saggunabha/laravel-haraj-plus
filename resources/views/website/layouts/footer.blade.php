 @section('footer')
<footer>
    <div class="inner-footer wow fadeIn">
        <div class="top-arrow auto-icon"><i class="fas fa-chevron-up"></i></div>
        <div class="container">
            <div class="row">
                <!--start footer-logo-->
                <div class="footer-logo  col-xl-3 col-lg-6 col-md-6 col-sm-6 text-dir-center">
                    <img src="{{asset('/storage/' . $logoFooter)}}" alt="logo" />

                    <p class="white-text">
                        {{$description}}
                    </p>


                    <!--start social-grid-->
                    <div class="social-div">
                        <ul class="list-inline footer-social auto-icon">
                            <li>
                             @if(isset($youtubeUrl))   <a href="{{$youtubeUrl}}" target="_blank" title="يوتيوب"><img src="{{asset('website/images/social/1.png')}}"@endif
                                                                               alt="img"></a>
                            </li>
                            @if(isset(\App\Models\Setting::where('key','whatsapp')->first()->value))
                            <li>
                                <a href="https://wa.me/?text={{\App\Models\Setting::where('key','whatsapp')->first()->value}}" target="_blank" title="واتس اب"><img src="{{asset('website/images/social/2.png')}}"
                                                                                alt="img"></a>
                            </li>
                            @endif

                            @if(isset($snapchatUrl))
                            <li>
                                <a href="{{$snapchatUrl}}" target="_blank" title="سناب شات"><img src="{{asset('website/images/social/3.png')}}"
                                                                                 alt="img"></a>
                            </li>
                            @endif
                            @if(isset($twitterUrl))
                            <li>
                                <a href="{{$twitterUrl}}" target="_blank" title="تويتر"><img src="{{asset('website/images/social/4.png')}}"
                                                                               alt="img"></a>
                            </li>
                            @endif
                            @if(isset($facebookUrl))
                            <li>
                                <a href="{{$facebookUrl}}" target="_blank" title="فيسبوك"><img src="{{asset('website/images/social/5.png')}}"
                                                                               alt="img"></a>
                            </li>
                            @endif
                            @if(isset($instagramUrl))
                            <li>
                                <a href="{{$instagramUrl}}" target="_blank" title="انستجرام"><img src="{{asset('website/images/social/6.png')}}"
                                                                                 alt="img"></a>
                            </li>
                                @endif

                        </ul>
                    </div>
                    <!--end social-grid-->
                </div>
                <!--end footer-logo-->

                <!--start footer-list-grid-->
                <div class="footer-list-grid col-xl-6">
                    <div class="row no-marg-row">
                        <div class="footer-list col-lg-6 col-6">
                            <h2 class="footer-title">عن الموقع</h2>
                            <ul class="list-unstyled">


                                <li><a href="{{isset($about->url)?$about->url:route('who')}}" target="_blank">من نحن</a></li>
                                <li><a href="{{route('contact')}}">اتصل بنا </a></li>
                                <li><a href="{{isset($privacy->url)?$privacy->url:route('privacy')}}">سياسة الخصوصية</a></li>
                                <li><a href="{{isset($conditions->url)?$conditions->url:route('terms')}}">الشروط والأحكام</a></li>
                                <li><a href="{{isset($questions->url)?$questions->url:route('questions')}}">الأسئلة الشائعة</a></li>
                                <li><a href="{{isset($googleplay_url)?$googleplay_url:"#"}}"><img src="{{asset('website/images/android.png')}}"/></a></li>
                                <li><a href="{{isset($applestore_url)?$applestore_url:"#"}}"><img src="{{asset('website/images/ios.png')}}"/></a></li>
                             

                                {{--<li><a href="help.html">الأسئلة الشائعة / الدعم الفني</a></li>--}}


                            </ul>
                        </div>

                        <div class="footer-list col-lg-6 col-6">
                            <h2 class="footer-title">الروابط المهمة</h2>
                            <ul class="list-unstyled">

                                <li><a href="{{$blogUrl}}"   target="_blank">المدونة</a></li>
                                <li><a href="{{route('prohibited')}}"  >السلع الممنوعة</a>
                                <li><a href="{{route('show-tech')}}"  > الدعم الفنى</a></li>
                                <li><a href="{{route('payment_porcedures')}}"  >اجراءات وسياسات الدفع</a></li>
                                <li><a href="{{route('haraj-specials')}}"  >مميزات الحساب المدفوع</a></li>

                                <li><a @if(auth()->guest()) data-toggle="modal" data-target="#login-modal" @endif href="{{route('paymentMethods',2)}}">طرق الدفع</a></li>

                    <li class="footer-pay-methods">
                  <i class="fab fa-cc-visa"></i><i class="fab fa-cc-mastercard"></i><i class="fas fa-landmark"></i>
                        </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!--end footer-list-grid-->


                <div class="subscribe-grid col-xl-3 col-lg-6 col-sm-6">
                    <h2 class="footer-title"> القائمة البريدية</h2>

                    <div class="subscribe-form white-holder icons-form">
                        @include('alert')
                        {{-- <div class="_form_1"></div><script src="https://ahmedhamada2555.activehosted.com/f/embed.php?id=1" type="text/javascript" charset="utf-8"></script> --}}
                    {{-- <form class="needs-validation" novalidate method="post" action="{{route('subscriber.store')}}">
                           {{csrf_field()}}
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="الاسم" name="name" required>
                               <i class="fa fa-user form-icon"></i>
                               <div class="invalid-feedback">
                                   من فضلك أدخل إسم صحيح
                               </div>
                           </div>
                           <div class="form-group">
                               <input type="email" class="form-control" placeholder="البريد الإلكتروني" name="email" required>
                               <i class="fa fa-envelope form-icon"></i>
                               <div class="invalid-feedback">
                                   من فضلك أدخل بريد إلكتروني صحيح
                               </div>
                           </div>
                           <button type="submit" class="custom-btn dark-btn big-btn full-width-btn">اشتراك</button>
                       </form> --}}

                       <!-- Begin Mailchimp Signup Form -->
                <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
          
                <div id="mc_embed_signup">
                <form  action="https://haraj-plus.us4.list-manage.com/subscribe/post?u=71d7265ec27139af8e84dc440&amp;id=15d0d6c578" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="needs-validation" target="_blank"  novalidate>
                <div id="mc_embed_signup_scroll">
               
                <div class=" form-group">
                <i class="fa fa-user form-icon"></i>
                <input type="text" value="" name="LNAME" placeholder="الاسم"  required class="required form-control" id="mce-LNAME">
                <div class="invalid-feedback">
                    من فضلك أدخل الاسم 
                </div>
               </div>
                <div class=" form-group">
                    <i class="fa fa-envelope form-icon"></i>
                <input type="email" value="" name="EMAIL" placeholder="البريد الإلكتروني" required class="required email form-control" id="mce-EMAIL">
                <div class="invalid-feedback">
                    من فضلك أدخل البريدالالكتروني 
                </div>
               </div>
                <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
                </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="b_71d7265ec27139af8e84dc440_15d0d6c578" tabindex="-1" value=""></div>
                <div class=" form-group">
                <button type="submit"  name="subscribe" id="mc-embedded-subscribe" class="custom-btn dark-btn big-btn full-width-btn">اشتراك</button></div>
                </div>
                </form>

                </div>
        
                <!--End mc_embed_signup-->
                    </div>
                    
                    <div class="maarof">
                        <a href="https://maroof.sa/124400">
                    <img src="{{asset('website/images/main/maaroof.png')}}" alt="">
                        </a>
                    </div>

                </div>
            </div>
        </div>
        

        <div class="copyrights text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        <a href="{{route('home')}}"  title="حراج بلص">مؤسسة حراج بلص التجارية ® - السعودية (2020)</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
