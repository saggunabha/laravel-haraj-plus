
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
    تعديل سلايدر
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>تعديل سلايدر</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>تعديل سلايدر</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" method="post" enctype="multipart/form-data"  action="{{route('sliders.update', $slider->id)}}"
                >
                    {{method_field('PATCH')}} {{csrf_field()}}



                    <div class="form-group  col-md-6">
                        <label>الصورة<span class="starrisk"></span></label>
                        <input type="file" class="form-control"  name="image">
                        <div class="invalid-feedback">
                            من فضلك ارفع صورة
                        </div>
                        @if ($errors->has('image'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('image') }}</div>
                        @endif
                    </div>

                    <div class="form-group  col-md-6">
                        <label>العنوان<span class="starrisk"></span></label>
                        <input type="text" class="form-control" placeholder="العنوان"  name="title" value="{{$slider->title}}" >
                        <div class="invalid-feedback">
                            من فضلك أدخل العنوان
                        </div>
                        @if ($errors->has('title'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('title') }}</div>
                        @endif
                    </div>

                    <div class="form-group  col-md-6">
                        <label>المحتوي<span class="starrisk"></span></label>
                        <input type="text" class="form-control" placeholder="المحتوي"  name="body" value="{{$slider->body}}" >
                        <div class="invalid-feedback">
                            من فضلك أدخل المحتوي
                        </div>
                        @if ($errors->has('body'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('body') }}</div>
                        @endif
                    </div>

                    <div class="form-group  col-md-6">
                        <label>الرابط<span class="starrisk"></span></label>
                        <input type="url" class="form-control" placeholder="الرابط"  value="{{$slider->url}}" name="url" >
                    </div>


                    <div class="form-group  margin-top-div text-center col-12">
                        <button type="submit" class="more-link color-bg full-width-btn">حفظ</button>
                    </div>



                </form>
            </div>

        </div>
        <!--end div-->

    </div>
    <!--end row-->

@endsection

@section('script')

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
