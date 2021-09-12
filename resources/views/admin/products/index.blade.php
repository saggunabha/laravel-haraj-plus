
@extends('admin.layouts.app')
@section('pageTitle','حراج بلص')
@section('pageSubTitle', 'المنتجات')
<!--start main-content-->
@section('content')

    <!--start row-->
    <div class="raw">
        <div class="main-products-row row  no-marg-row col-12">
          {{--  <div class="col-md-3 col-5">
                <a href="add-product.html" class="more-link color-bg inline-block-btn">إضافة جديد</a>
            </div>
            <div class="left-text-dir col-md-9 col-7 left-text-dir">
                <!--start div-->
                <div class="product-filter-grid">
                    <span class="menu-open-link"><i class="fa fa-filter"></i><span>تصفية</span></span>
                    <ul class="list-unstyled main-filter-list has-dropmenu">
                        <li><span><i class="fa fa-flag"></i>حالة المنتج</span>
                            <ul class="list-unstyled secondary-filter-list">
                                <li><a href="#"><i class="fa fa-bars"></i>جميع المنتجات</a></li>
                                <li><a href="#"><i class="fa fa-dollar-sign"></i>منتجات مخفضة</a></li>
                                <li><a href="#"><i class="fa fa-exclamation-triangle"></i>منتجات نفذت</a>
                                </li>
                                <li><a href="#"><i class="fa fa-eye-slash"></i>منتجات مخفية</a></li>

                            </ul>
                        </li>
                        <li><span><i class="fa fa-box-open"></i>تصنيف المنتج</span>
                            <ul class="list-unstyled secondary-filter-list">
                                <li>
                                    <span> ملابس</span>
                                    <ul class="list-unstyled">
                                        <li><a href="#">اسم البراند</a></li>
                                        <li><a href="#">اسم البراند</a></li>
                                        <li><a href="#">اسم البراند</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <span> جوالات</span>
                                    <ul class="list-unstyled">
                                        <li><a href="#">اسم البراند</a></li>
                                        <li><a href="#">اسم البراند</a></li>
                                        <li><a href="#">اسم البراند</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
                <!--end div-->

                <!--start div-->
                <div class="product-filter-grid">
                    <span class="menu-open-link"><i class="fa fa-briefcase"></i><span>خدمات</span></span>
                    <ul class="list-unstyled main-filter-list">
                        <li>
                            <a href="product-cat.html"><i class="fa fa-flag"></i>تصنيفات المنتجات</a>
                        </li>

                        <li>
                            <a href="#" class="remove-alert"><i class="fa fa-times"></i>حذف جميع
                                المنتجات</a>
                        </li>

                    </ul>
                </div>
                <!--end div-->



            </div>--}}
            <!--end div-->











            <!--end div-->

        </div>
        <div class="more-link-grid text-center col-12">
            <button class="more-link color-bg full-width-btn"  style="display:none" value='0'  onclick="loadmore()" id="loadmore">عرض المزيد</button>
        </div>


    </div>



@endsection
  @section('scripts')
      <script>




          $(document).ready(function(e){

                $(document).on("click",".more-text", function () {
                  $(this).next(".more-list").slideToggle("slow")
              });



        //   $(function () {


        //       var $winr = $(window); // or $box parent container
        //       var $boxr = $(".more-div");
        //       $winr.on("click.Bst", function (event) {
        //           if (
        //               $boxr.has(event.target).length === 0 && //checks if descendants of $box was clicked
        //               !$boxr.is(event.target) //checks if the $box itself was clicked
        //           ) {
        //           $boxr.find(".more-list").hide();

        //           }
        //       });
        //   });

              loadmore()
          });



          function loadmore() {


              var url = $('#loadmore').val();

              // console.log(url);

              if (url == 0) {

                  url = "/getMore?is_valid={{(isset($_GET['is_valid'])&&$_GET['is_valid']==3)?3:1}}"
              }
              $.ajax({
                  url: url,
                  type: 'GET',
                  dataType: 'json',
                  success: function (data) {
                      $('.main-products-row').append(data['output'])
                      if (data['next_url'] == '') {
                          $('#loadmore').remove();

                      } else
                          $('#loadmore').val(data['next_url'])

                      $('#loadmore').show();

                  }
              });


          }



      </script>
      <script>

          $(document).on("click",".show_invalid_pro", function () {
             Swal.fire({
                    type: 'warning',
                    title: 'عفوا هذا المنتج غير مفعل',
                    showConfirmButton: false,
                    timer: 1500
                })
              });
    </script>

  @endsection
