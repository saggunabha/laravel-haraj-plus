
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
    تعديل الاعدادات
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>تعديل الاعدادات</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>تعديل الاعدادات</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" action="{{route('settings.update', $setting->id)}}" method="post" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}                     {{ csrf_field() }}

                    <div class="form-group  col-md-6">
                        <label>اسم الاعداد<span class="starrisk">*</span></label>
                        <input type="text" class="form-control" name="value"   placeholder="اسم الاعداد" value="{{$setting->name}}" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل اسم الاعداد
                        </div>

                    </div>

                    @if($setting->type == 'url')
                        <div class="form-group  col-md-6">
                            <label>الرابط<span class="starrisk">*</span></label>
                            <input type="{{$setting->type}}" class="form-control" name="value"   placeholder="الرابط" value="{{$setting->value}}" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل رابط مناسب
                            </div>

                        </div>

                    @elseif($setting->type == 'tel')
                        <div class="form-group  col-md-6">
                            <label>الجوال<span class="starrisk">*</span></label>
                            <input type="{{$setting->type}}" class="form-control" name="value"   placeholder="الجوال" value="{{$setting->value}}" min="10" max="14" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل رقم جوال مناسب
                            </div>

                        </div>

                    @elseif($setting->type == 'email')
                        <div class="form-group  col-md-6">
                            <label>البريد الاليكتروني<span class="starrisk">*</span></label>
                            <input type="{{$setting->type}}" class="form-control" name="value"   placeholder="البريد الاليكتروني" value="{{$setting->value}}" min="10" max="14" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل بريد اليكتروني مناسب
                            </div>

                        </div>

                    @elseif($setting->type == 'text')
                        <div class="form-group  col-md-6">
                            <label>أدخل نص مناسب<span class="starrisk">*</span></label>
                            <input type="{{$setting->type}}" class="form-control" name="value"   placeholder="أدخل نص مناسب" value="{{$setting->value}}" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص مناسب
                            </div>

                        </div>

                    @elseif($setting->type == 'number')
                        <div class="form-group  col-md-6">
                            <label>أدخل رقم مناسب<span class="starrisk">*</span></label>
                            <input type="{{$setting->type}}" class="form-control" name="value"   placeholder="أدخل رقم مناسب" value="{{$setting->value}}" step="any" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل رقم مناسب
                            </div>

                        </div>

                    @elseif($setting->type == 'file')
                        <div class="form-group  col-md-6">
                            <label>ارفع صورة مناسبة<span class="starrisk">*</span></label>
                            <input type="{{$setting->type}}" class="form-control" name="value"   placeholder="ارفع صورة مناسبة" value="{{$setting->value}}" required>
                            <div class="invalid-feedback">

                                من فضلك ارفع صورة مناسبة
                            </div>

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

@endsection
