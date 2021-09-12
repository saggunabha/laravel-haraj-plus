
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
      تعديل قسم رئيسي
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>تعديل قسم رئيسي</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>تعديل قسم رئيسي</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" method="post" enctype="multipart/form-data" action="{{route('categories.update', $category->id)}}"
                >
                    {{method_field('PATCH')}} {{csrf_field()}}

                    <div class="form-group  col-md-6">
                        <label>الاسم<span class="starrisk">*</span></label>
                        <input type="text" class="form-control" placeholder="الاسم"  name="name" value="{{$category->name}}" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل اسم القسم الرئيسي
                        </div>
                        @if ($errors->has('name'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('name') }}</div>
                        @endif
                    </div>
                    
                    <div class="form-group  col-md-6">
                        <label>الترتيب<span class="starrisk">*</span></label>
                        <input type="number" class="form-control" placeholder="الترتيب"  name="order" value="{{$category->order}}" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل ترتيب القسم
                        </div>
                        @if ($errors->has('order'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('order') }}</div>
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
