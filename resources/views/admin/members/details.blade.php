@extends('admin.layouts.app')

@section('pageTitle','لوحة التحكم ')

@section('pageSubTitle', isset($user)?'تعديل مستخدم':'اضافه مستخدم')



<!-- start header
     ================ -->
@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>المستخدمين</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>تفاصيل المستخدم </span></h3>
                {{--   @if($errors->any())
                       {!! implode('', $errors->all('<div>:message</div>')) !!}
                   @endif--}}

                <div class="needs-validation row border-form" >

                    <div class="form-group  col-md-6">
                        <label>الإسم بالكامل<span class="starrisk">*</span></label>
                        <input type="text"  class="form-control"   value="{{$user->name}}" readonly  name="name"placeholder="الإسم  " required>

                    </div>

                    <div class="form-group  col-md-6">
                        <label>البريد الإلكتروني<span class="starrisk">*</span></label>
                        <input type="email" class="form-control"  value="{{$user->email}}"name="email" placeholder="البريد الإلكتروني" readonly>




                    </div>

                    <div class="form-group  col-md-6">
                        <label>رقم الجوال<span class="starrisk">*</span></label>
                        <input type="tel" class="form-control" value="{{isset($user->phone)?$user->phone:'لا يوجد'}}" id="phone" minlength="10"
                               maxlength="14" readonly>

                    </div>




{{--

                    <div class="form-group  col-md-6">
                        <label>الدوله<span class="starrisk">*</span></label>
                        <input type="text" class="form-control"  value="{{isset($country)?$country->name:'لقد تم حذف البلد'}}"  readonly>
                    </div>

--}}

                    <div class="form-group  col-md-6">
                        <label>المدينه<span class="starrisk">*</span></label>
                        <input type="text" class="form-control"  value="{{isset($city)?$city->name:'لا يوجد '}}"  readonly>
                    </div>




                    <div class="form-group  col-md-6">
                        <label>الوظيفه <span class="starrisk">*</span></label>
                        <input type="text" class="form-control"  value="{{$roles[$user->type]}}"  readonly>
                    </div>

                    <div class="form-group col-md-6 ">
                      <img src="{{ ($user->image)?asset('storage/'.$user->image):asset('/admin/images/main/avatar.png')}}">
                    </div>











                    {{-- <div class="form-group  col-md-6">
                         <label>الصوره<span class="starrisk">*</span></label>
                         <input type="tel" class="form-control" name="image" id="image" minlength="10"
                                maxlength="14" required>

                     </div>--}}





                </div>
            </div>

        </div>
        <!--end div-->

    </div>
    <!--end row-->

@endsection

@section('script')
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/additional-methods.min.js')}}"></script>
    <script src="{{asset('js/messages_ar.min.js')}}"></script>
    <script>
        $( "#myform" ).validate();
    </script>

    <script>




    </script>
@endsection


@section('scripts')
    <script type="text/javascript" src="{{asset('admin/js/main.js')}}"></script>
@endsection

