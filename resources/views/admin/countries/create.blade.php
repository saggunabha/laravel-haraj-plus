
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
    اضافة دولة
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>اضافة دولة</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>إضافة دولة</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" method="post"  action="{{route('countries.store')}}"
                >
                    @csrf



                    <div class="form-group  col-md-6">
                        <label>الإسم<span class="starrisk">*</span></label>
                        <input type="text" class="form-control" placeholder="الإسم" name="name" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل اسم الدولة
                        </div>
                        @if ($errors->has('name'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('name') }}</div>
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


