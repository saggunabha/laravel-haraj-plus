
@extends('admin.layouts.app')

@section('pageTitle')
    لوحة التحكم
@endsection

@section('pageSubTitle')
   اضافة قسم فرعي
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>اضافة قسم فرعي</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>اضافة قسم فرعي</span></h3>
                @include('alert')
                <form class="needs-validation row border-form" id="myform" novalidate="" method="post" enctype="multipart/form-data" action="{{route('sub-categories.store')}}"
                >
                    @csrf

                    <div class="form-group  col-md-6">
                        <label>الاسم<span class="starrisk">*</span></label>
                        <input type="text" class="form-control"  placeholder="الاسم"  value="{{old('name')}}"  name="name" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل اسم القسم الفرعي
                        </div>
                        @if ($errors->has('name'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('name') }}</div>
                        @endif
                    </div>
                    
                    <div class="form-group  col-md-6">
                        <label>الترتيب<span class="starrisk">*</span></label>
                        <input type="number" class="form-control" placeholder="الترتيب"  value="{{old('order')}}"  name="order" required>
                        <div class="invalid-feedback">
                            من فضلك أدخل التريب
                        </div>
                        @if ($errors->has('order'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('order') }}</div>
                        @endif
                    </div>



                    <div class="form-group  col-md-6">
                        <label>الصورة<span class="starrisk">*</span></label>
                        <input type="file" class="form-control"  name="image" required>
                        <div class="invalid-feedback">
                            من فضلك ارفع صورة
                        </div>
                        @if ($errors->has('image'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('image') }}</div>
                        @endif
                    </div>

                    <div class="form-group  col-md-6">
                        <label>اختر القسم الرئيسي <span class="starrisk">*</span></label>
                        <select class="form-control" name ="parent_id" required >
                            <option value="" selected disabled >اختر القسم الرئيسي</option>
                            @foreach($categories as $category)
                                @if($category->parent_id==null)
                                <option value="{{ $category->id }}">{{  $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            من فضلك اختر قسم رئيسي
                        </div>
                        @if ($errors->has('parent_id'))
                            <div style="display:block;" class="invalid-feedback">{{$errors->first('parent_id') }}</div>
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
