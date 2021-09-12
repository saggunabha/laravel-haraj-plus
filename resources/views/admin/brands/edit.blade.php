
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
    تعديل ماركة
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>تعديل ماركة</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>تعديل ماركة</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" method="post" enctype="multipart/form-data"  action="{{route('brands.update', $brand->id)}}"
                >
                    {{method_field('PATCH')}} {{csrf_field()}}



                    <div class="form-group  col-md-6">
                        <label for="upload-img">الصورة<span class="starrisk"></span></label>
                        <input type="file" class="form-control" value="{{$brand->image}}" name="image" id="upload-img">
                        <div class="invalid-feedback">
                            من فضلك ارفع صورة
                        </div>
                         <div class="form-group col-12 text-center">
                                                        <div class="img_container">
                                                        <img id="preview-upload-img" src="{{asset('storage/'.$brand->image)}}"
                                                                 alt="img"/>
                                                        </div>
                                                    </div>
                        @if ($errors->has('image'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('image') }}</div>
                        @endif
                    </div>
                        <div class="form-group  col-md-6">
                        <label>الرابط<span class="starrisk">*</span></label>
                        <input type="text" class="form-control"  name="link" value="{{$brand->link}}" >
                        <div class="invalid-feedback">
                            من فضلك  ادخل الرابط
                        </div>
                        @if ($errors->has('link'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('link') }}</div>
                        @endif
                    </div>
                    <div class="form-group  margin-top-div text-center col-12">
                        <button type="submit" class="more-link color-bg inline-block-btn full-width-btn m-0">حفظ</button>
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
