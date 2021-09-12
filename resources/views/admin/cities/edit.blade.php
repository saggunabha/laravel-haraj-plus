
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
    تعديل مدينة
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>تعديل مدينة</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>تعديل مدينة</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" method="post"  action="{{route('cities.update', $city->id)}}"
                >
                    {{method_field('PATCH')}} {{csrf_field()}}



                    <div class="form-group  col-md-6">
                        <label>الإسم<span class="starrisk">*</span></label>
                        <input type="text" class="form-control" placeholder="الإسم" name="name" value="{{$city->name}}" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل اسم المدينة
                        </div>
                        @if ($errors->has('name'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="form-group  col-md-6">
                        <label>الدولة<span class="starrisk">*</span></label>
                        <select class="form-control" name="country_id" required>
                            <option value=""  disabled>اسم الدولة</option>
                            @foreach($countries as $country)

                                <option {{$country->id == $city->country_id ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach

                        </select>
                        <div class="invalid-feedback">
                            من فضلك أدخل  الدولة
                        </div>
                        @if ($errors->has('country_id'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('country_id') }}</div>
                        @endif
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
