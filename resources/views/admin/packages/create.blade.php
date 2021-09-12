
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
    اضافة باقة
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>اضافة باقة</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>إضافة باقة</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" method="post"  action="{{route('packages.store')}}"
                >
                    @csrf

                    <div class="form-group  col-md-6">
                        <label>نوع الباقة<span class="starrisk">*</span></label>
                        <input type="text" class="form-control" placeholder="نوع الباقة" name="type" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل نوع الباقة
                        </div>

                    </div>

                    <div class="form-group  col-md-6">
                        <label>سعر الباقة بالريال<span class="starrisk">*</span></label>
                        <input type="number" class="form-control" placeholder="سعر الباقة بالريال" name="price" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل سعر الباقة
                        </div>

                    </div>

                    <div class="form-group  col-md-6">
                        <label>مدة الباقة بالأيام<span class="starrisk">*</span></label>
                        <input type="number" class="form-control" placeholder="مدة الباقة بالأيام" name="duration" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل مدة الباقة
                        </div>

                    </div>

                        {{--<div class="form-group  col-md-6">--}}
                            {{--<label>عنوان الباقة<span class="starrisk">*</span></label>--}}
                            {{--<input type="text" class="form-control" placeholder="عنوان الباقة" name="title" required>--}}
                            {{--<div class="invalid-feedback">--}}
                                {{--من فضلك أدخل عنوان الباقة--}}
                            {{--</div>--}}

                        {{--</div>--}}

                        <div class="form-group  col-md-6">
                            <label>وصف الباقة<span class="starrisk">*</span></label>
    <textarea class="form-control" placeholder="وصف الباقة" name="body" id="summary-ckeditor" required></textarea>
    <div class="invalid-feedback">
        من فضلك أدخل وصف الباقة
    </div>
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
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>

@endsection
