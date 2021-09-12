
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
    تعديل الصفحات
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>تعديل الصفحات</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>تعديل الصفحات</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" action="{{route('static-pages.update', $staticPage->id)}}" method="post">
                    {{ method_field('PATCH') }}                     {{ csrf_field() }}

                    <div class="form-group  col-md-6">
                        <label>الإسم<span class="starrisk">*</span></label>
                        <input type="text" class="form-control" placeholder="الإسم" name="name" value="{{$staticPage->name}}" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل اسم الصفحة
                        </div>

                    </div>
                    <div class="form-group  col-md-6">
                        <label>من فضلك ادخل رابط<span class="starrisk">*</span></label>
                        <input type="url" class="form-control" placeholder="الرابط" name="url" value="{{isset($staticPage->url)?$staticPage->url:''}}">

                    </div>

                    @if($staticPage->id!=5)

                    <div class="form-group  col-md-12">
                        <label>محتوي الصفحة<span class="starrisk">*</span></label>
                        <textarea class="form-control" name="description" id="summary-ckeditor"  required>{{$staticPage->description}}</textarea>

                        <div class="invalid-feedback">
                            من فضلك أدخل  محتوي الصفحة
                        </div>
                        @if ($errors->has('description'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('description') }}</div>
                        @endif
                    </div>
@endif

                    <div class="form-group  margin-top-div text-center col-12">
                        <button type="submit" class="more-link color-bg full-width-btn">حفظ</button>
                    </div>



                </form>
            </div>

        </div>
        <!--end div-->

    </div>
    <!--end row-->







    <!-- start footer
     ================ -->




@endsection
<!-- scripts
     ================ -->



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
