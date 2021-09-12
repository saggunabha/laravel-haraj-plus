
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
    تعديل اعلان
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>تعديل اعلان</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>تعديل اعلان</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" method="post" enctype="multipart/form-data" action="{{route('ads.update', $ad1->id)}}"
                >
                    {{method_field('PATCH')}} {{csrf_field()}}



                    <div class="form-group  col-md-6">
                        <label>الرابط<span class="starrisk">*</span></label>
                        <input type="url" class="form-control" placeholder="الرابط"  name="link" value="{{$ad1->link}}" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل رابط مناسب
                        </div>
                        @if ($errors->has('link'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('link') }}</div>
                        @endif
                    </div>

                    <div class="form-group  col-md-6">
                        <label>الوصف<span class="starrisk"></span></label>
                        <input type="text" class="form-control" placeholder="الوصف"  name="description" value="{{$ad1->description}}">

                    </div>

                    <div class="form-group  col-md-6">
                        <label>الموضع<span class="starrisk">*</span></label>
                        <select class="form-control" name ="position" required>
                             <option disabled >اختر الموضع</option>
                            <option @if($ad1->position == 'left') selected @endif value="left">{{'left'}}</option>
                            <option @if($ad1->position == 'top') selected @endif value="top">{{'top'}}</option>
                            <option @if($ad1->position == 'banner1') selected @endif value="banner1">{{'banner1'}}</option>
                            <option @if($ad1->position == 'banner2') selected @endif value="banner1">{{'banner2'}}</option>

                        </select>
                        <div class="invalid-feedback">
                            من فضلك أدخل الموضع
                        </div>
                        @if ($errors->has('position'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('position') }}</div>
                        @endif
                    </div>



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
