
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
    اضافة ماركة
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>اضافة ماركة</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>إضافة ماركة</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" method="post" enctype="multipart/form-data"  action="{{route('brands.store')}}"
                >
                    @csrf



                    <div class="form-group  col-md-6">
                        <label for="upload-img">الصورة<span class="starrisk">*</span></label>
                        <input type="file" class="form-control"  name="image" id="upload-img" required>
                        <div class="invalid-feedback">
                            من فضلك ارفع صورة
                        </div>
                         <div class="form-group col-12 text-center">
                            <div class="img_container">
                            <img id="preview-upload-img" src="" alt="img"/>
                            </div>
                        </div>
                        @if ($errors->has('image'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('image') }}</div>
                        @endif
                    </div>
                    <div class="form-group  col-md-6">
                        <label>الرابط<span class="starrisk">*</span></label>
                        <input type="text" class="form-control"  name="link" value="{{old('link')}}">
                        <div class="invalid-feedback">
                            من فضلك  ادخل الرابط
                        </div>
                        @if ($errors->has('link'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('link') }}</div>
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
