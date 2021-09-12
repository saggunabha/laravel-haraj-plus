@extends('website.layouts.app')
@section('pop')
    <!--start preview-model -->
    <div class="modal fade login-modal-style white-bg" id="preview-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Modal body -->
                <div class="modal-body">
                    <form class="needs-validation row no-marg-row gray-form"  novalidate>
                        <div class="form-group text-center  col-12">
                            <h2 class="page-title"> عرض الإعلان</h2>
                        </div>
                        <div class="form-group  col-12">
                           <div class="generate-form2 row no-marg-row">
                                <div class="form-group col-12 text-center adv-img-preview">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>اسم المنتج<span class="starrisk">*</span></label>
                                <input type="text" name="" id="name2" class="form-control"
                                       disabled />
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>القسم الرئيسي <span class="starrisk">*</span></label>

                                <input type="text" name=""  id="category2" class="form-control"  disabled />


                            </div>

                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>القسم الفرعي <span class="starrisk">*</span></label>
                                <input type="text" name="" id="sub-category" class="form-control" disabled />


                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label> الدوله <span class="starrisk">*</span></label>
                                <input type="text" name="" class="form-control" id="country2"  disabled />


                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label> المدينه <span class="starrisk">*</span></label>
                                <input type="text" name="" class="form-control" id="city2"  disabled />


                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>سعر المنتج<span class="starrisk">*</span></label>
                                <input type="number" id="price2" class="form-control" min="1"
                                       disabled />
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>حالة المنتج <span class="starrisk">*</span></label>
                                <input type="text" name=""  id="status2"class="form-control" disabled />


                            </div>
                        </div>
                        <div class="col-md-12" style="overflow: hidden">
                            <div class="form-group" style="overflow: hidden">
                                <label>فيديو اعلانى</label>
                                <div id="video_url2"></div>
                                {{--                                <input type="text" name="" id="video_url2" class="form-control" disabled>--}}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label> وصف المنتج<span class="starrisk">*</span></label>
                                <div class="form-control height_auto" id="description2"></div>
                            </div>

                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
    <!-- end preview-model -->
@endsection


@section('content')
    <!--start page-order-div
          ================-->
    <section class="order-div page-order-div">
        <div class="add-advertisment-pg margin-div">
            <div class="container">
                <div class="row">
                    <div class="col-12 row  main-adv-block wow fadeInUp">
                        <div class="col-12 text-center">
                            <h1 class="page-title">تعديل إعلان</h1>
                        </div>
                        <form  id="data"class="needs-validation row no-marg-row gray-form"  method="post" enctype="multipart/form-data"  action="{{route('update',$product->id)}}" novalidate>
                            @csrf
                            @method('put')

                            <div class="form-group  col-12">
                                <div class="generate-form row no-marg-row">
                                    <div class="col-12">
                                        <span class="add-photo" id="generate-img-form-link"><i
                                                    class="fa fa-plus"></i>إضافة صورة أخري</span>
                                    </div>
                                    <div class="col-xl-2 col-md-4 col-sm-6">
                                        <div class="form-group">
                                            <input type="file"
                                                   class="img-form-shape file-input form-control"  name='main_image' value="{{$product->main_image}}"
                                                   id="main-01" >

                                            <label class="file-input-label" for="main-01"><img
                                                        src="{{asset('storage/'.$product->main_image)}}"
                                                        alt="product" /></label>



                                            <div class="invalid-feedback">
                                                من فضلك أدخل صورة المنتح
                                            </div>
                                            <div class="img_contain">
                                                <img id="preview-main-01" src="{{asset('storage/'.$product->main_image)}}"/></div>
                                            <div class="form-check custom-radio-check text-right-dir">
                                                <!--<input-->
                                                <!--    type="radio" class="form-check-input" id="test-00"-->
                                                <!--    checked name="optradio1">-->
                                                <label
                                                        class="form-check-label color-title" for="test-00">
                                                    الصورة الأساسية
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @php $i = 1; @endphp
                                    @foreach ($images as $image)


                                        <div class="col-xl-2 col-md-4 col-sm-6  form-group img-append-div">
                                            <input type="file" class="img-form-shape file-input" id="second-{{ $i }}" value="" name="image[]">
                                            <label class="file-input-label" for="second-{{ $i }}">
                                                <img src="{{asset('storage/'. $image->path )}}" alt=""/></label>
                                            <div class="img_contain">
                                                <img id="preview-second-{{ $i }}"></div>
                                            <button class="remove-img-value  remove-img auto-icon"  value="{{$image->id}}" ><i class="fa fa-trash"></i></button>
                                        </div>


                                        @php $i++  @endphp
                                    @endforeach

                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>اسم المنتج<span class="starrisk">*</span></label>
                                <input type="text" id="name" name="name" class="form-control"  value="{{$product->name}}"placeholder="اسم المنتج" required="">
                                <div class="invalid-feedback" >من فضلك أدخل اسم صحيح</div>
                            </div>
                            <input type="hidden "   name='deleted_ids' style="display: none" id="product_id" >
                            <div class="col-md-4">
                                <label>القسم الرئيسي <span class="starrisk">*</span></label>
                                <select class="form-control"  id="category" value="{{$product->category->category->name}}" onchange="showSubCategories(this)"  >

                                    <option value="" selected disabled>{{$product->category->category->name}}</option>
                                    @foreach($categories as $key=>$value)
                                        <option value="{{$key}}"  >{{$value}}</option>
                                    @endforeach


                                </select>
                                <div class="invalid-feedback">
                                    من فضلك إختر قسم
                                </div>
                            </div>


                            <div class="col-md-4">
                                <label>القسم الفرعي <span class="starrisk">*</span></label>
                                <select class="form-control" value="{{$product->category->name}}" id="catstyle" name="category_id"  >
                                    <option  value="{{$product->category->id}}" selected disabled> {{$product->category->name}}</option>



                                </select>
                                <div class="invalid-feedback">
                                    من فضلك إختر قسم
                                </div>
                                @if ($errors->has('category_id'))
                                    <div style="display:block;" class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                                @endif
                            </div>



                            <div class=" col-md-4">
                                <label>الدولة <span class="starrisk">*</span></label>
                                <select class="form-control"  value="{{$product->city->country->id}}" id="country1" onchange="showCities2(this)"  required>
                                    <option value="{{ $product->city->country->name }}" selected disabled>
                                        {{  $product->city->country->name  }}
                                    </option>
                                    @foreach($countries as $key=>$value)
                                        <option  style="@if($value==$product->city->name) display:none;@endif" value="{{$key}}">{{$value}} </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    من فضلك إختر دولة صحيحة
                                </div>
                            </div>
                            <input type="hidden" id="counter">
                            <div class="col-md-4">

                                <label>المدينه <span class="starrisk">*</span></label>
                                <select class="form-control"  id="citysel2" value="{{ $product->city->name }}"   name="city_id"required>
                                    <option value="{{ $product->city->name }}" selected disabled>
                                        {{ $product->city->name }}
                                    </option>
                                    {{--  @foreach($cities as $key=>$value)
                                          <option  value="{{$key}}" {{$product->city->name==$value ? "selected": ""}}>{{$value}} </option>
                                          @endforeach--}}
                                </select>

                                <div class="invalid-feedback">
                                    من فضلك إختر مدينه صحيحة
                                </div>
                                @if ($errors->has('city_id'))
                                    <div style="display:block;" class="invalid-feedback">{{ $errors->first('city_id') }}</div>
                                @endif



                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>حالة المنتج <span class="starrisk">*</span></label>
                                    <select class="form-control"  value="" id="status" name="status"required>
                                        <option value="" selected disabled>حالة المنتج</option>
                                        <option @if($product->status==1)selected @endif value="1">جديد</option>
                                        <option @if($product->status==2)selected @endif value="2">مستعمل </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        من فضلك إختر حالة المنتج
                                    </div>
                                    @if ($errors->has('status'))
                                        <div style="display:block;" class="invalid-feedback">{{ $errors->first('status') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>فيديو اعلانى</label>
                                 
                                    <input type="text" value="https://www.youtube.com/watch?v={{$product->video}}" id="video_url" name="video" class="form-control" placeholder="قم بالنقر بزر الماوس الايمن على فيديو اليوتيوب ثم نسخ رمز التضمين">
                
                                    <div class="invalid-feedback">
                                        من فضلك ادخل رابط صحيح
                                    </div>
                                    @if ($errors->has('video_url'))
                                        <div style="display:block;" class="invalid-feedback">{{ $errors->first('video_url') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>سعر المنتج<span class="starrisk">*</span></label>
                                    <input type="number" name="price" id="price1" value="{{$product->price}}" class="form-control" min="1" placeholder="سعر المنتج"
                                           required />
                                    <div class="invalid-feedback">من فضلك أدخل سعر صحيح</div>
                                    @if ($errors->has('price'))
                                        <div style="display:block;" class="invalid-feedback">{{ $errors->first('price') }}</div>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>نسبه الخصم <span class="starrisk">*</span></label>
                                    <input type="number" name="discount_ratio" class="form-control"  value="{{$product->discount_ratio?$product->discount_ratio:''}}" min="1" placeholder="نسبه الخصم">


                                </div>

                            </div>



                            <div class="col-12">
                                <div class="form-group">
                                    <label> وصف المنتج<span class="starrisk">*</span></label>
                                    <textarea class="form-control"  value="" id="summaryckeditor2"name="description" placeholder=" وصف المنتج" required> {!!$product->description!!}</textarea>
                                    <div class="invalid-feedback">من فضلك أدخل نص صحيح</div>
                                    @if ($errors->has('description'))
                                        <div style="display:block;" class="invalid-feedback">{{ $errors->first('description') }}</div>
                                    @endif
                                </div>

                            </div>



                            <div class="col-12 text-left-dir">
                                <div class="form-group">
                                    <button type="button" data-toggle="modal" data-target="#preview-modal"
                                            id="ad" onclick="change()"
                                            class="custom-btn sm-btn">شاهد الأعلان قبل نشره</button>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button  id="product" type="submit" class="custom-btn big-btn">تعديل</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end page-order-div-->

@endsection
@section('scripts')
<script>
$( document ).ready(function() {
var video = document.getElementById("video_url").value;


});
</script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summaryckeditor2' );
    </script>

    <script type="text/javascript" src="{{asset('/admin/js/main.js')}}"></script>
    <script>
        //upload append div
        $(function () {
            var count = 0;
            var count2 = 0;
            var count3 = 0;
             var remaining = 6;

  function UpdateRemaining(isAdd) {
      if (isAdd) {
          remaining = remaining - 1;
      } else {
          remaining = remaining + 1;
      }

  
  }
  
  
            $('#generate-img-form-link').click(function () {
               if (remaining == 0) {
                    $('#generate-img-form-link').addClass("active");
  Swal.fire({
    type: 'warning',
    title: 'الحد الأقصي لصور المنتج هو سبع صور فقط',
    showConfirmButton: false,
    timer: 2000
});


      }else {
                var newDiv = $(
                    ' <div class="col-xl-2 col-md-4 col-sm-6"> <div class="form-group img-append-div"><input type="file" class="img-form-shape file-input" id="test-' +
                    (
                        count++) + '"  name="image[]"><label class="file-input-label" for="test-' +
                    (
                        count2++) +
                    '"><i class="fa fa-plus"></i></label><div class="img_contain"> <img id="preview-test-' +
                    (count3++) +
                    '"/></div></div>'
                );

              $(newDiv).appendTo('.generate-form');
                var newDiv2 = $(
                    '<button class="remove-img auto-icon"><i class="fa fa-trash"></i></button>'
                );
                $(".generate-form input[type='file']").each(function () {
                    var mainimg = $(this).parent(".form-group").append(newDiv2);
                });
                                      UpdateRemaining(true);

              }

            });


            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        imgId = '#preview-' + $(input).attr('id');
                        $(imgId).attr('src', e.target.result);
                        // var picture = '<img src="' + e.target.result + '" class="pro-append" >'
                        // $(".adv-img-preview").empty().append(picture);
                    }

                    reader.readAsDataURL(input.files[0]);
                }

            }


            $(document).on('change', '.generate-form input[type="file"]', function () {
                readURL(this);
                $(this).next("label").text("").css("background", "transparent");
                $(this).parent().find(".form-check").show()

            });
            
              $(document).on('click', '.remove-img', function () {
            $(this).closest(".img-append-div").parent().remove();
                                  UpdateRemaining(false);

        });

        });



      


        function change(){

    var summer1 = CKEDITOR.instances.summaryckeditor2.getData().replace(/<\/?[^>]+(>|$)/g, "");
            $('#description2').val(summer1);
            // alert($('#citysel2').text());
            // $('#description2').val($('#description').val());
            $('#price2').val($('#price1').val());
            $('#name2').val($('#name').val());
            $('#status2').val($('#status option:selected').html());
            $('#city2').val($('#citysel2 option:selected').html());
            $('#sub-category').val($('#catstyle option:selected').html());
            $('#video_url2').html($('#video_url').val());
            // $('#video_url2').val($('#video_url').val());
            $('#country2').val($('#country1 option:selected').html());
            $('#category2').val($('#category option:selected').html());
                         var a =  $('.generate-form .img_contain img').clone();
             var e = $('.adv-img-preview').html(a);
                $('.adv-img-preview img').removeAttr('id');
                $('.adv-img-preview img').each(function () {
                if (this.src.length > 0) {
                }else{
                   $(this).remove();
                }
});

        }


        /*  $("#data").submit(function(e) {
              e.preventDefault();

              var formData = new FormData(this);
   alert(formData['name']);
              $.ajax({
                  url: "website/products/update/".$('#product_id').val(),
                  type: 'Put',
                  data: formData,
                  success: function (data) {
                      alert(data)
                  },
                  cache: false,
                  contentType: false,
                  processData: false
              });
          });*/

        $(".remove-img-value").click(function(){
            var val_remove =  $(this).val();
            var oldValue = $("#product_id").val();
            var arr = oldValue === "" ? [] : oldValue.split(',');
            arr.push(val_remove);
            var newValue = arr.join(',');
            $("#product_id").val(newValue);

        });


    </script>
@endsection
