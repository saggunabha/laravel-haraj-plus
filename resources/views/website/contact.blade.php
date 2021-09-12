@extends('website.layouts.app')

@section('content')
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
                        <form class="needs-validation row" novalidate>
                            <div class="static-stars center-stars">
                                <input class="star" id="rate-1" type="radio" name="starrate">
                                <label class="star" for="rate-1"></label>
                                <input class="star" id="rate-2" type="radio" name="starrate">
                                <label class="star" for="rate-2"></label>
                                <input class="star" id="rate-3" type="radio" name="starrate">
                                <label class="star" for="rate-3"></label>
                                <input class="star" id="rate-4" type="radio" name="starrate">
                                <label class="star" for="rate-4"></label>
                                <input class="star" id="rate-5" type="radio" name="starrate">
                                <label class="star" for="rate-5"></label>
                            </div>
                            <div class="form-group  col-12">
                                <textarea class="form-control" placeholder="كتابه تقييم"></textarea>
                                <div class="invalid-feedback">
                                    من فضلك أدخل نص صحيح
                                </div>
                            </div>


                            <div class="form-group  col-12">
                                <button type="submit" class="custom-btn full-width-btn">إرسال</button>
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
                        <form class="needs-validation row" novalidate>

                            <div class="form-group  col-12">
                                <textarea class="form-control" placeholder="نص البلاغ" required></textarea>
                                <div class="invalid-feedback">
                                    من فضلك أدخل نص صحيح
                                </div>
                            </div>


                            <div class="form-group  col-12">
                                <button type="submit" class="custom-btn full-width-btn">إرسال</button>
                            </div>



                        </form>

                        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                                async defer>
                        </script>

                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- end spam-model -->










<!--start product-details-pg
      ================-->
<section class="order-div page-order-div">
    <div class="producut-details-pg  margin-div responsive-margin-div">
        <div class="container">
            <div class="row">

                <!--contact-map-grid-->
                <div class="col-lg-6  contact-map-grid  wow fadeIn">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3788.151085581853!2d42.70682121488955!3d18.29469758754099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15fb59f5d90ac1bd%3A0xa04d42324f09f5a3!2z2YXYpNiz2LPYqSDYrdix2KfYrCDYqNmE2LUg2KfZhNiq2KzYp9ix2YrYqQ!5e0!3m2!1sen!2seg!4v1580210543214!5m2!1sen!2seg" width="100%" height="470" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                   {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14948662.522732439!2d54.11138174731509!3d23.833678558438827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2z2KfZhNiz2LnZiNiv2YrYqQ!5e0!3m2!1sar!2seg!4v1580207384704!5m2!1sar!2seg" width="100%" height="470" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
--}}
<!--                    <div class="map">-->


<!--                   {{-- @include('admin.map')-->--}}
                       MAP HOLDER -->
<!--{{--                        <div id="gmap"></div>--}}-->
<!--                         REFERENCES -->
<!--                        <style type="text/css">-->
<!--                            html { height: 100% }-->
<!--                            body { height: 100%; margin: 0; padding: 0 }-->
<!--                            #map_canvas { height: 100% }-->
<!--                        </style>-->

<!--                        <script type="text/javascript">-->

<!--                            {{--function initialize() {--}}-->
<!--                            {{--    var uluru = {lat: {{$location_lat}}, lng: {{$location_lng}}};--}}-->

<!--                            {{--    var myLatlng = new google.maps.LatLng(uluru);--}}-->
<!--                            {{--    var myOptions = {--}}-->
<!--                            {{--        zoom:7,--}}-->
<!--                            {{--        center: myLatlng,--}}-->
<!--                            {{--        mapTypeId: google.maps.MapTypeId.ROADMAP--}}-->
<!--                            {{--    }--}}-->
<!--                            {{--    map = new google.maps.Map(document.getElementById("gmap"), myOptions);--}}-->
                            {{--    // marker refers to a global variable--}}
<!--                            {{--    marker = new google.maps.Marker({--}}-->
<!--                            {{--        position: myLatlng,--}}-->
<!--                            {{--        map: map--}}-->
<!--                            {{--    });--}}-->
                            {{--    // if center changed then update lat and lon document objects--}}
<!--                            {{--    google.maps.event.addListener(map, 'center_changed', function () {--}}-->
<!--                            {{--        var location = map.getCenter();--}}-->
<!--                            {{--        document.getElementById("lat").innerHTML = location.lat();--}}-->

<!--                            {{--        document.getElementById("lon").innerHTML = location.lng();--}}-->
                            {{--        // call function to reposition marker location--}}
<!--                            {{--        placeMarker(location);--}}-->
<!--                            {{--    });--}}-->
                            {{--    // if zoom changed, then update document object with new info--}}
<!--                            {{--    google.maps.event.addListener(map, 'zoom_changed', function () {--}}-->
<!--                            {{--        zoomLevel = map.getZoom();--}}-->
<!--                            {{--        document.getElementById("zoom_level").innerHTML = zoomLevel;--}}-->
<!--                            {{--    });--}}-->
                            {{--    // double click on the marker changes zoom level--}}
<!--                            {{--    google.maps.event.addListener(marker, 'dblclick', function () {--}}-->
<!--                            {{--        zoomLevel = map.getZoom() + 1;--}}-->
<!--                            {{--        if (zoomLevel == 20) {--}}-->
<!--                            {{--            zoomLevel = 10;--}}-->
<!--                            {{--        }--}}-->
<!--                            {{--        document.getElementById("zoom_level").innerHTML = zoomLevel;--}}-->
<!--                            {{--        map.setZoom(zoomLevel);--}}-->
<!--                            {{--    });--}}-->

<!--                            {{--    function placeMarker(location) {--}}-->
<!--                            {{--        var clickedLocation = new google.maps.LatLng(location);--}}-->
<!--                            {{--        marker.setPosition(location);--}}-->
<!--                            {{--    }--}}-->
<!--                            {{--}--}}-->
<!--                            {{--window.onload = function () { initialize() };--}}-->
<!--                        </script>-->
<!--                        <style>-->
<!--                            div#gmap {-->
<!--                                width: 100%;-->
<!--                                height: 450px;-->
<!--                                border:none;-->
<!--                            }-->

<!--                            @media  only screen and (max-width: 576px) {-->
<!--                                div#gmap {-->
<!--                                    height: 250px;-->
<!--                                }-->
<!--                            }-->


<!--                        </style>-->


<!--                    </div>-->

{{--

                    <style type="text/css">
                        html { height: 100% }
                        body { height: 100%; margin: 0; padding: 0 }
                        #map_canvas { height: 100% }
                    </style>

                    <script type="text/javascript">

                        function initialize() {
                            var uluru = {lat:{{$location_lat}}, lng:{{$location_lng}}};

                            var myLatlng = new google.maps.LatLng(uluru);
                            var myOptions = {
                                zoom:7,
                                center: myLatlng,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            }
                            map = new google.maps.Map(document.getElementById("gmap"), myOptions);
                            // marker refers to a global variable
                            marker = new google.maps.Marker({
                                position: myLatlng,
                                map: map
                            });
                            // if center changed then update lat and lon document objects
                            google.maps.event.addListener(map, 'center_changed', function () {
                                var location = map.getCenter();
                                document.getElementById("lat").innerHTML = location.lat();

                                document.getElementById("lon").innerHTML = location.lng();
                                // call function to reposition marker location
                                placeMarker(location);
                            });
                            // if zoom changed, then update document object with new info
                            google.maps.event.addListener(map, 'zoom_changed', function () {
                                zoomLevel = map.getZoom();
                                document.getElementById("zoom_level").innerHTML = zoomLevel;
                            });
                            // double click on the marker changes zoom level
                            google.maps.event.addListener(marker, 'dblclick', function () {
                                zoomLevel = map.getZoom() + 1;
                                if (zoomLevel == 20) {
                                    zoomLevel = 10;
                                }
                                document.getElementById("zoom_level").innerHTML = zoomLevel;
                                map.setZoom(zoomLevel);
                            });

                            function placeMarker(location) {
                                var clickedLocation = new google.maps.LatLng(location);
                                marker.setPosition(location);
                            }
                        }
                        window.onload = function () { initialize() };
                    </script>
                    <style>
                        div#gmap {
                            width: 100%;
                            height: 450px;
                            border:none;
                        }

                        @media  only screen and (max-width: 576px) {
                            div#gmap {
                                height: 250px;
                            }
                        }


                    </style>
--}}






                </div>
                <!-- end contact-map-grid-->
                <!--start div-->
                <div class="col-lg-6 no-marg-row">
                    <div class="form-group col-12">
                        <h2 class="info-title first_color">تواصل معنا</h2>

                    </div>
                    @include('alert')
                    <form class="needs-validation row no-marg-row " method="post" action="{{ route('contact.store') }}"  novalidate>
                        @csrf


                        <div class="form-group col-12">
                            <input type="text" class="form-control" id="name" placeholder="إسم المستخدم " name="name" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل إسم صحيح
                            </div>
                            @if ($errors->has('name'))
                                <div style="display:block;" class="invalid-feedback">{{$errors->first('name') }}</div>
                            @endif
                        </div>


                        <div class="form-group col-12">
                            <input type="email" class="form-control" id="email"  placeholder="البريد الإلكتروني" name="email" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل بريد إلكتروني صحيح
                            </div>
                            @if ($errors->has('email'))
                                <div style="display:block;" class="invalid-feedback">{{$errors->first('email') }}</div>
                            @endif
                        </div>


                        <div class="form-group col-12">
                            <input type="text" class="form-control" id="subject"  placeholder="الموضوع" name="subject" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل الموضوع
                            </div>
                            @if ($errors->has('subject'))
                                <div style="display:block;" class="invalid-feedback">{{$errors->first('subject') }}</div>
                            @endif
                        </div>

                        <div class="form-group col-12">
                            <textarea class="form-control" id="message"  placeholder="الرسالة" name="body" required></textarea>
                            <div class="invalid-feedback">
                                من فضلك أدخل رسالة صحيحة
                            </div>
                        </div>
                        @if ($errors->has('body'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('body') }}</div>
                        @endif

                        <div  class="form-group col-12" id="html_element" ></div>

                        <script type="text/javascript"
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWZCkmkzES9K2-Ci3AhwEmoOdrth04zKs&sensor=false">
                        </script>

                        <div id="html_element" class="custom-invalid-feedback invalid-feedback">
                            يجب عليك تأكيد أنك لست روبوت
                        </div>
                        <div class="form-group col-12 text-center">
                            <button type="submit" class="custom-btn big-btn">إرسال </button>
                        </div>
                    </form>
                </div>
                <!--end div-->


                <!--start contact-details -->

                <div class="contact-details text-center row no-row-margin col-12">



                    <!--start contact-icons-->
                    <div class="col-xl-4 col-md-4 col-12 icon-con-grid  wow fadeIn">
                        <div class="contact-icons">
                            <span class="contact-icon"> <i class="far fa-envelope"></i></span>
                            <h3>البريد الإلكتروني:</h3>
                            <p>
                                <a href="mailto:Support@haraj-plus.sa" >Support@haraj-plus.sa</a>
                                <br />
                                {{$siteUrl}}
                                <br>
                               
                            </p>
                        </div>
                    </div>
                    <!--end contact-icons-->

                    <!--start contact-icons-->
                    <div class="col-xl-4 col-md-4 col-12 icon-con-grid  wow fadeIn">
                        <div class="contact-icons">
                            <span class="contact-icon"><i class="fa fa-map-marker-alt"></i></span>
                            <h3>موقعنا:</h3>
                            <p>
                                {!! $location !!}
                            </p>

                        </div>
                    </div>
                    <!--end contact-icons-->

                    <!--start contact-icons-->
                    <div class="col-xl-4 col-md-4 col-12 icon-con-grid  wow fadeIn">
                        <div class="contact-icons">
                            <span class="contact-icon"> <i class="far fa-clock"></i></span>
                            <h3>مواعيد العمل:</h3>
                            <p>
                                {!! $workingTime !!}
                            </p>
                        </div>
                    </div>
                    <!--end contact-icons-->

                </div>

            </div>
        </div>
    <div>

<!--end product-details-pg-->



@endsection


@include('website.layouts.footer')








<!-- scripts
     ================ -->

@section('scripts')
<script src="{{asset('website/js/jssor.slider-28.0.0.min.js')}}" type="text/javascript"></script>
<script src="{{asset('website/js/custom-jssor.js')}}" type="text/javascript"></script>
<script type="text/javascript">


        var onloadCallback = function() {
        grecaptcha.render('html_element', {'sitekey' :'6LeSWtEUAAAAAAPcM9Uj-fcd0RqndCqodVhERZTn'});
    };



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
</script>
            <script src="{{asset('website/js/mapPlace.js')}}"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWZCkmkzES9K2-Ci3AhwEmoOdrth04zKs&libraries=places&callback=initMap&language={{ App::getLocale() }}"
                    async defer></script>
                    <script>
                        $('form').on('submit', function(e) {
                          if(grecaptcha.getResponse() == "") {
                            e.preventDefault();
                           $(".custom-invalid-feedback").show();
                          } else {
                             $(".custom-invalid-feedback").hide();

                          }
                        });
                        
                        
//  $("#contact-form").click(function(event){
// 	event.preventDefault();
//     var name = $('#name').val();
//     var email = $('#email').val();
//     var subject = $('#subject').val();
//     var message = $('#message').val();
//     var url =  $(this).attr('attr-url');
    
//     var token=$('meta[name="csrf-token"]').attr('content');


// if($('#name').val() && $('#email').val() && $('#message').val() && $('#subject').val() != null){
// $.ajax({
//     url : url,
//     type:'POST',
//     dataType: "json",
//     data:{"name":name ,"email":email ,"subject":subject, "message":message,"_token":token},
//     success: function(response) {
//             if(response['success'] == 'true') {
//               Swal.fire({
//                         type: 'success',
//                         title: 'تم إرسال الرسالة بنجاح',
//                         showConfirmButton: false,
//                         timer: 1500
//                     })
//                       location.reload();
//                     $('#subject').val('') ;
//                     $('#message').val('');
//                     $('#name').val('');
//                     $('#email').val('');
                    
//             } // end of if       
        
//     }

// });
// }else{
//     $('.invalid-feedback').show();
// }
// });                        
                        
                        
                        
                    </script>



@endsection



