@extends('website.layouts.app')







@section('content')

    <!--start preview-model -->
    <div class="modal fade login-modal-style white-bg" id="preview-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Modal body -->
                <div class="modal-body">
                    <form class="needs-validation row no-marg-row gray-form" novalidate>
                        <div class="form-group text-center  col-12">
                            <h2 class="page-title"> عرض الإعلان</h2>
                        </div>
                        <div class="form-group  col-12">
                            <div class="generate-form2 row no-marg-row">
                                <div class="form-group col-12 text-center adv-img-preview">
                                    <img src="{{asset('website/images/products/1.png')}}">
                                    <img src="{{asset('website/images/products/1.png')}}">
                                    <img src="{{asset('website/images/products/1.png')}}">
                                    <img src="{{asset('website/images/products/1.png')}}">
                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>اسم المنتج<span class="starrisk">*</span></label>
                                <input type="text" name="" class="form-control" placeholder="سيارة حديثة"
                                       disabled />
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>القسم الرئيسي <span class="starrisk">*</span></label>
                                <select class="form-control" disabled>
                                    <option value="" selected disabled>القسم الرئيسي</option>
                                </select>

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>القسم الفرعي <span class="starrisk">*</span></label>
                                <input type="text" name="" class="form-control" placeholder="السيارات" disabled />


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>مكان المنتج <span class="starrisk">*</span></label>
                                <input type="text" name="" class="form-control" placeholder="الرياض " disabled />


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>سعر المنتج<span class="starrisk">*</span></label>
                                <input type="number" name="" class="form-control" min="1" placeholder="100"
                                       disabled />
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>حالة المنتج <span class="starrisk">*</span></label>
                                <input type="text" name="" class="form-control" placeholder="جديد " disabled />


                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label> وصف المنتج<span class="starrisk">*</span></label>
                                <textarea class="form-control" placeholder=" وصف المنتج بالتفاصيل"
                                          disabled></textarea>
                            </div>

                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
    <!-- end preview-model -->


<!--start page-order-div
      ================-->
<section class="order-div page-order-div edit-data text-center">
    <div class="add-advertisment-pg margin-div">
        <div class="container">
            <div class="row">
                <div class="col-12 row  main-adv-block wow fadeInUp">
                    <div class="col-12 text-center">
                        <h1 class="page-title">تعديل البيانات</h1>
                    </div>

                                        @include('alert')

 <ul class="nav nav-tabs col-12" style="justify-content: center;" id="myTab" role="tablist">
  <li class="nav-item">
    <a  class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">البيانات الأساسية</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">كلمة المرور</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">البريد الإلكتروني</a>
  </li>
    <li class="nav-item">
    <a  class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contac2t" aria-selected="false">الجوال</a>
  </li>
</ul>
<div class="tab-content col-12" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <form class="needs-validation row no-marg-row"  method="post" action="{{route('edit-data.update', auth()->id())}}" enctype="multipart/form-data" novalidate>
                        {{method_field('PATCH')}}  {{csrf_field()}}

                        <!--start profile-images-->
                        <div class="profile-images-grid col-12  wow fadeIn">

                            <div class="form-group profile-image-upload">

                                <div class="user-profile-img">
                                    <input type="file" class="img-form-shape file-input" name="image"
                                           id="main-02">


                                    <label class="file-input-label timeline-label full-width-img " for="main-02">
                                        <img src= "{{auth()->user()->image != null?asset('storage/'. auth()->user()->image):asset('storage/Users/avatar.png')}}" alt="img" class="converted-img"/>
                                        <img id="preview-main-02" />

                                </div>
                            </div>
                        </div>
                        <!--end profile-images-->

                        {{--<div class="form-group col-lg-4  col-md-6">--}}
                            {{--<select class="form-control" name="type" required>--}}
                                {{--<option disabled >نوع الحساب</option>--}}
                                {{--<option @if(auth()->user()->type == 2) selected @endif value="2">مستخدم</option>--}}
                                {{--<option @if(auth()->user()->type == 3) selected @endif value="3">رجل أعمال</option>--}}
                            {{--</select>--}}
                            {{--<div class="invalid-feedback">--}}
                                {{--من فضلك إختر نوع الحساب--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group col-lg-4  col-md-6">
                            <input type="text" class="form-control" placeholder="إسم المستخدم " name="name" value="{{auth()->user()->name}}" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل إسم صحيح
                            </div>
                        </div>


{{--                        <div class="form-group col-lg-4  col-md-6">--}}
{{--                            <input type="email" class="form-control" placeholder="البريد الإلكتروني" name="email" value="{{auth()->user()->email}}" required>--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                من فضلك أدخل بريد إلكتروني صحيح--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group col-lg-4  col-md-6">--}}
{{--                            <input type="tel" class="form-control" placeholder="رقم الجوال" minlength="10"--}}
{{--                                   maxlength="14" name="phone" value="{{auth()->user()->phone}}" required>--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                من فضلك أدخل رقم جوال صحيح--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group col-lg-4  col-md-6">
                            <select class="form-control" onchange="showCities2(this)"  required>
                                <option disabled >الدولة</option>
                                @foreach($countries as $country)

                                <option @if(isset($country1)&&$country1->name==$country->name)  selected @endif value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach

                            </select>
                            <div class="invalid-feedback">
                                من فضلك إختر دولة
                            </div>
                        </div>

                        <div class="form-group col-lg-4  col-md-6">
                            <select class="form-control" name="city_id" id="citysel2"  required>
                                <option disabled >المدينة</option>
                                @foreach($cities as $city)
                                    <option   @if(isset($city1)&&$city1->name==$city->name)    selected  @endif value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach

                            </select>
                            <div class="invalid-feedback">
                                من فضلك إختر المدينة
                            </div>
                        </div>


                        <div class="form-group col-lg-4  col-md-6">
                            <input type="text" class="form-control" placeholder="العنوان" name="address" value="{{auth()->user()->address}}" >
                            <div class="invalid-feedback">
                                من فضلك أدخل عنوان صحيح
                            </div>
                        </div>



                          @if(auth()->user()->is_promoted == 1)
                              @php $p = \App\Models\PromotedUser::where([
                                    ['end_date','>',\Carbon\Carbon::now()],['user_id',\Auth::id()]
                                ])->first(); @endphp
                        <div class="form-group col-lg-4  col-md-6">
                            <input type="url" class="form-control" placeholder="رابط المتجر" name="link" value="{{url('/') . '/' . $promotedUser->link}}" disabled>
                        </div>
                                <div class="form-group col-lg-4  col-md-6">
                                    
                                    <input type="text" class="form-control" value="{{\Carbon\Carbon::parse($p->end_date)->diffInDays(Carbon\Carbon::now(), false)<0?substr(\Carbon\Carbon::parse($p->end_date)->diffInDays(Carbon\Carbon::now(), false),1 ).'  يوم متبقي من الاشتراك' :'انتهى الاشتراك'}}" disabled>
                                </div>
                        <div class="form-group  col-md-6">
                            <textarea class="form-control" placeholder="نبذة عن المتجر" name="about">{{$promotedUser->about}}</textarea>
                        </div>
                        @endif


                        <div class="form-group col-12 text-center">
                            <button type="submit" class="custom-btn big-btn">تعديل </button>
                        </div>
                    </form>
                    </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form class="row row no-marg-row" style="justify-content: center;"  method="post" action="{{route('update_password', auth()->id())}}" enctype="multipart/form-data" novalidate>
                         {{csrf_field()}}
                          <h4 class="col-12 sm-center form-group">تعديل كلمة المرور</h4>
                        <div class="col-md-12 text-warning">
                            فى حالة التسجيل من خلال منصات التواصل الاجتماعى برجاء ترك خانة كلمة المرور القديمة فارغة
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                            <input type="password" class="form-control" placeholder="كلمة المرور القديمة" name="old_password" min="6">
                            <div class="invalid-feedback">
                                من فضلك أدخل كلمة مرور صحيحة
                            </div>
                        </div>
                        </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <input type="password" class="form-control" placeholder="كلمة المرور الجديدة" name="new_password" min="6">
                                <div class="invalid-feedback">
                                    من فضلك أدخل كلمة مرور صحيحة
                                </div>
                            </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="تأكيد كلمة المرور الجديدة" name="new_password_confirmation" min="6">
                                    <div class="invalid-feedback">
                                        من فضلك أدخل كلمة مرور صحيحة
                                    </div>
                            </div>
                            </div>
                        <input type="hidden"   name="email" value="{{auth()->user()->email}}" required>

                        <div class="form-group col-12 text-center">
                            <button type="submit" class="custom-btn big-btn">تعديل </button>
                        </div>

                    </form>
           </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <form class="row row no-marg-row" style="justify-content: center;"  style="width: 100%" method="post" action="{{route('update_email', auth()->id())}}" enctype="multipart/form-data" novalidate>
                        {{csrf_field()}}
            <h4 class="col-12 sm-center form-group">تعديل  البريد الالكترونى</h4>
<div class="col-md-4">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="كلمة المرور " name="password" min="6">
                                <div class="invalid-feedback">
                                    من فضلك أدخل كلمة مرور صحيحة
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="email" class="form-control" value="{{auth()->user()->email}}" placeholder="البريد الالكترونى" name="email" min="6">
                            </div>

                        </div>

                        <input type="hidden"   name="old_email" value="{{auth()->user()->email}}" required>

                        <div class="form-group col-12 text-center">
                            <button type="submit" class="custom-btn big-btn">تعديل </button>
                        </div>

                    </form>

  </div>
    <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
                    <form class="row row no-marg-row" style="justify-content: center;"  style="width: 100%" method="post" action="{{route('update_phone', auth()->id())}}" enctype="multipart/form-data" novalidate>
                        {{csrf_field()}}
<h4 class="col-12 sm-center form-group">تعديل رقم الجوال  </h4>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="tel" class="form-control" value="{{auth()->user()->phone}}" placeholder="رقم الجوال " name="phone">
                            </div>

                        </div>

                        <div class="form-group col-12 text-center">
                            <button type="submit" class="custom-btn big-btn">تعديل </button>
                        </div>

                    </form>
                    </div>

</div>



                </div>
            </div>
        </div>
    </div>
</section>
<!--end page-order-div-->

@endsection



@section('scripts')

<!-- scripts
     ================ -->


<script>
    //upload append div
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imgId = '#preview-' + $(input).attr('id');
                $(imgId).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }

    }


    $(document).on('change', '.profile-image-upload input', function () {
        readURL(this);
        $(this).next("label").css("background-image", "none");

    });
</script>

@endsection


