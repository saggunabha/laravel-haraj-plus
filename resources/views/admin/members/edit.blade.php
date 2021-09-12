@extends('admin.layouts.app')

@section('pageTitle','لوحة التحكم ')

@section('pageSubTitle', 'تعديل مستخدم')



    <!-- start header
     ================ -->
@section('content')
            <!--start row-->
            <div class="row">
                <!--start div-->
                <div class="breadcrumbes col-12">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-home"></i>الرئيسية</a></li>
                        <li>المستخدمين</li>
                    </ul>
                </div>
                <!--end div-->


                <!--start div-->
                <div class="col-md-12 clients-grid margin-bottom-div">
                    <div class="main-white-box">
                        <h3 class="sec-title color-title"><span>تعديل المستخدم </span></h3>
                     {{--   @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif--}}

                        <form  method="post" action='{{route('users.update',$user->id)}}' class="needs-validation row border-form"  enctype="multipart/form-data" novalidate="">
            @csrf
@method('put')
                            <div class="form-group  col-md-6">
                                <label>الإسم بالكامل<span class="starrisk">*</span></label>
                                <input type="text" class="form-control" value="{{$user->name}}"   name="name"placeholder="الإسم  " required>
                                <div class="invalid-feedback">
                                    من فضلك أدخل اسم صحيح
                                </div>
                                @if ($errors->has('name'))
                                   <div style="display:block;" class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group  col-md-6">
                                <label>البريد الإلكتروني<span class="starrisk">*</span></label>
                                <input type="email" class="form-control"  value="{{$user->email}}"name="email" placeholder="البريد الإلكتروني" required>


                                <div class="invalid-feedback">
                                    من فضلك أدخل بريد إلكتروني صحيح
                                </div>

                                @if ($errors->has('email'))
                                    <div style="display:block;" class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="form-group  col-md-6">
                                <label>رقم الجوال<span class="starrisk">*</span></label>
                                <input type="tel" class="form-control" value="{{$user->phone}}" name="phone" id="phone" minlength="10"
                                       maxlength="14" required>
                                <div class="invalid-feedback">
                                    من فضلك أدخل جوال صحيح
                                </div>
                            </div>
                            @if ($errors->has('phone'))
                                <div style="display:block;" class="invalid-feedback">{{ $errors->first('phone') }}</div>
                            @endif




                           {{-- <div class="form-group  col-md-6">
                                <label>الدولة <span class="starrisk">*</span></label>
                                <select class="form-control" name="country_id" value="{{isset($country)?$country->name:'تم حذف الدوله'}}" onchange="showCities(this)"  required>
                                    <option style="display: none" selected disabled>{{isset($country)?$country->name:''}} </option>
                                    @foreach($countries as $key=>$value)
                                    <option style="@if(isset($country)&&$value==$country->name) display:none; @else @endif" value="{{$key}}">{{$value}} </option>
                                  @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    من فضلك إختر دولة صحيحة
                                </div>
                            </div>--}}

                            <div class="form-group  col-md-6">
                                <label>المدينه <span class="starrisk">*</span></label>
                                <select class="form-control"  id="citysel" name="city_id" required>
                                    <option value="{{ isset($city)?$city->name:"لا يوجد" }}" selected disabled>
                                        {{ isset($city)?$city->name:'لا يوجد ' }}
                                    </option>
                                @foreach($cities as $key=>$value)
                                    <option  value="{{$key}}" >{{$value}} </option>
                                    @endforeach
                                </select>

                                <div class="invalid-feedback">
                                    من فضلك إختر مدينه صحيحة
                                </div>




                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">الوظيفه</label>
                                <input type="text"    readonly value="{{$roles[$user->type]}}"  class="form-control">
                            </div>


                            <div class="form-group col-md-6">
                                <label class="control-label">كلمة المرور الجديدة</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">تأكيد كلمة المرور</label>
                                <input type="password" name="password_confirmation" class="form-control">
                                @if($errors->has('password'))
                                    <div class="invalid-feedback" style="display: block">{!! $errors->first('password') !!}</div>
                                @endif
                            </div>



                            <div class="form-group col-md-6 text-center">
                                <div class="custom-file-div">
                                    <input type="file"
                                           class="file-input form-control" value=""  name="image"
                                           id="imageUpload" >
                                    <label class="file-input-label" for="imageUpload"> إضافة
                                        صورة</label>


                                    <div class="img_contain">
                                        <img id="imagePreview" /></div>
                                </div>
                            </div>


                            <div class="form-group col-md-6 ">
                                <img src="{{ ($user->image)?asset('storage/'.$user->image):asset('/admin/images/main/avatar.png')}}">
                            </div>

                           {{-- <div class="form-group  col-md-6">
                                <label>الصوره<span class="starrisk">*</span></label>
                                <input type="tel" class="form-control" name="image" id="image" minlength="10"
                                       maxlength="14" required>

                            </div>--}}

                            <div class="form-group  margin-top-div text-center col-12">
                                <button type="submit" class="more-link color-bg inline-block-btn">حفظ</button>
                                @if($user->is_active==1)
                                <a href="{{route('status',[$user->id,0])}}" class="more-link color-bg inline-block-btn remove-btn ">حظر</a>
                                    @else
                                    <a href="{{route('status',[$user->id,1])}}" class="remove-btn">تفعيل</a>
                                    @endif
                            </div>



                        </form>
                    </div>

                </div>
                <!--end div-->

            </div>
            <!--end row-->

@endsection

                @section('script')
                    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
                    <script src="{{asset('js/additional-methods.min.js')}}"></script>
                    <script src="{{asset('js/messages_ar.min.js')}}"></script>
                    <script>
                        $( "#myform" ).validate();
                    </script>

                    <script>
                     /*   function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    imgId = '#preview-' + $(input).attr('id');
                                    $(imgId).attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }

                        }
                        $(".style-file-input").on("change", function () {
                            var fileName = $(this).val().split("\\").pop();
                            $(this).siblings(".style-file-label").addClass("selected").html(fileName);
                            readURL(this);

                        });
*/

                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                                    $('#imagePreview').hide();
                                    $('#imagePreview').fadeIn(650);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                        $("#imageUpload").change(function() {
                            readURL(this);
                            $(this).next("label").css({"background":"transparent"}).text("");
                        });



                    </script>
@endsection


@section('scripts')
    <script type="text/javascript" src="{{asset('admin/js/main.js')}}"></script>
    @endsection

