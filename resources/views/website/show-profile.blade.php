 @extends("website.layouts.app")

@section('content')

    <!--start profile-pg
          ================-->
    <section class="order-div page-order-div">

        <!-- start products
         ================ -->
        <div class="products md-center show-profile margin-div products-pg   wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-left-dir sm-center">
                        <a  href="{{route('products.add')}}" class="custom-btn">إضافة منتج
                        </a>
                    </div>
                    <div class="col-12">
                        <h2 class="sec-title text-center"> إعلاناتي</h2>
                        @if(\Auth::user()->is_promoted == 0)
                        <span class="sec-title text-center" style="font-size:20px"> متبقي لديك عدد {{countProductsPerMonth()}} إعلان لهذا الشهر</span>
                         @endif
                    </div>

                    <div id="products" class="row no-marg-row col-12">
                        <!--start item-->



                    </div>
                </div>
                <div class="text-center col-12 margin-div">
                    <button class="custom-btn big-btn" value="0" style="display: none"  onclick="loadmore()" id="loadmore">المزيد</button>
                </div>


            </div>
        </div>


        </div>
        <!--end products-->

    </section>
    <!--end profile-pg-->



@endsection

@include('website.layouts.footer')

@section('scripts')
    <script>
        $(function () {
            $(".load-div").slice(0, 3).fadeTo("slow", 1);

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


        $(document).ready(function (e) {

            loadmore();


        });

        function loadmore() {


            var url = $('#loadmore').val();

            // console.log(url);

            if (url == 0) {

                url = "/loadMore"
            }
         $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#products').append(data['output'])
                    if (data['next_url'] == '') {
                        $('#loadmore').remove();

                    } else
                        $('#loadmore').val(data['next_url'])
                    $('#loadmore').show();

                }
            });


        }

    </script>


@endsection
