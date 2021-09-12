
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
    اضافة سلايدر
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>اضافة سلايدر</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>إضافة سلايدر</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" method="post" enctype="multipart/form-data" action="{{route('sliders.store')}}"
                >
                    @csrf



                    <div class="form-group  col-md-6">
                        <label>الصورة<span class="starrisk">*</span></label>
                        <input type="file" class="form-control"  name="image" required>
                        <div class="invalid-feedback">
                            من فضلك ارفع صورة
                        </div>
                        @if ($errors->has('image'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('image') }}</div>
                        @endif
                        <p>يجب ان تكون الصورة الخاصة بالاسليدر بطول واحد
 ويشترط ان يكون العرض  1920‎ بشكل ثابت </p>                        
                    </div>

                    <div class="form-group  col-md-6">
                        <label>العنوان<span class="starrisk"></span></label>
                        <input type="text" class="form-control" placeholder="العنوان"  name="title" >
                        <div class="invalid-feedback">
                            من فضلك أدخل العنوان
                        </div>
                        @if ($errors->has('title'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('title') }}</div>
                        @endif
                        <p>يجب ان يكون العنوان سطر واحد فقط</p>
                    </div>

                    <div class="form-group  col-md-6">
                        <label>المحتوي<span class="starrisk"></span></label>
                        <input type="text" class="form-control" placeholder="المحتوي"  name="body" >
                        <div class="invalid-feedback">
                            من فضلك أدخل المحتوي
                        </div>
                        @if ($errors->has('body'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('body') }}</div>
                        @endif
                        <p>يجب ان يكون المحتوي سطر واحد فقط</p>
                    </div>


                    <div class="form-group  col-md-6">
                        <label>الرابط<span class="starrisk"></span></label>
                        <input type="url" class="form-control" placeholder="الرابط"  name="url" >
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
