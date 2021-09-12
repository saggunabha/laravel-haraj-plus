
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
    اضافة اعلان
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>اضافة اعلان</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>إضافة اعلان</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" method="post" enctype="multipart/form-data" action="{{route('ads.store')}}"
                >
                    @csrf



                    <div class="form-group  col-md-6">
                        <label>الرابط<span class="starrisk">*</span></label>
                        <input type="url" class="form-control" placeholder="الرابط"  name="link" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل رابط مناسب
                        </div>
                        @if ($errors->has('link'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('link') }}</div>
                        @endif
                    </div>

                    <div class="form-group  col-md-6">
                        <label>الوصف<span class="starrisk"></span></label>
                        <input type="text" class="form-control" placeholder="الوصف"  name="description">
                        <div class="invalid-feedback">

                        </div>

                    </div>

                    <div class="form-group  col-md-6">
                        <label>الموضع<span class="starrisk">*</span></label>
                        <select class="form-control" name ="position" required>
                            <option value="" selected disabled >اختر الموضع</option>
                            <option value="left">{{'left'}}</option>
                            <option value="top">{{'top'}}</option>
                            <option value="banner1">{{'banner1'}}</option>
                            <option value="banner2">{{'banner2'}}</option>

                        </select>
                        <div class="invalid-feedback">
                            من فضلك أدخل الموضع
                        </div>
                        @if ($errors->has('position'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('position') }}</div>
                        @endif
                    </div>



                    <div class="form-group  col-md-6">
                        <label>الصورة<span class="starrisk">*</span></label>
                        <input type="file" class="form-control"  name="image" required>
                        <div class="invalid-feedback">
                            من فضلك ارفع صورة
                        </div>
                        @if ($errors->has('image'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('image') }}</div>
                        @endif
                    </div>





                    <div class="form-group  margin-top-div text-center col-12">
                        <button type="submit" class="custom-btn">حفظ</button>
                    </div>








                </form>
            </div>

        </div>
        <!--end div-->

    </div>
    <!--end row-->

@endsection

@section('scripts')

    <script>
        //phone
        $(function () {
            var input = document.querySelector("#phone");
            window.intlTelInput(input, {
                preferredCountries: ["sa", "eg"],
                utilsScript: "js/utils.js",
            });

        });
    </script>


@endsection
