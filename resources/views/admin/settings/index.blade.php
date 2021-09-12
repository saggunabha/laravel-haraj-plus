

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle') تعديل الاعدادات
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
                <form class="row border-form" id="myform" novalidate="" action="{{route('update2')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   @method('put')
                    @foreach($settings as $setting)

                        {{--<div class="form-group  col-md-6">--}}
                            {{--<label>الاسم<span class="starrisk">*</span></label>--}}
                            {{--<input type="text" class="form-control" name="{{$setting->value}}"   placeholder="الرابط" value="{{$setting->name}}" required>--}}
                            {{--<div class="invalid-feedback">--}}
                                {{--من فضلك أدخل رابط مناسب--}}
                            {{--</div>--}}

                        {{--</div>--}}

                    @if($setting->type == 'url')
                        <div class="form-group  col-md-6">
                            <label>{{$setting->name}}<span class="starrisk">*</span></label>
                            <input type="url" class="form-control" name="{{$setting->key}}"   placeholder="الرابط" value="{{$setting->value}}" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل رابط مناسب
                            </div>

                        </div>

                    @elseif($setting->type == 'tel')
                        <div class="form-group  col-md-6">
                            <label>{{$setting->name}}<span class="starrisk">*</span></label>
                            <input type="tel" class="form-control" name="{{$setting->key}}"   placeholder="الجوال" value="{{$setting->value}}" min="10" max="14" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل رقم جوال مناسب
                            </div>

                        </div>

                    @elseif($setting->type == 'email')
                        <div class="form-group  col-md-6">
                            <label>البريد الاليكتروني<span class="starrisk">*</span></label>
                            <input type="email" class="form-control" name="{{$setting->key}}"     placeholder="البريد الاليكتروني" value="{{$setting->value}}"  required>
                            <div class="invalid-feedback">
                                من فضلك أدخل بريد اليكتروني مناسب
                            </div>

                        </div>

                    @elseif($setting->type == 'text')
                        <div class="form-group  col-md-6">
                            <label>{{$setting->name}}<span class="starrisk">*</span></label>
                            <input type="text" class="form-control" name="{{$setting->key}}"     placeholder="أدخل نص مناسب" value="{{$setting->value}}" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل نص مناسب
                            </div>

                        </div>

                    @elseif($setting->type == 'number')
                        <div class="form-group  col-md-6">
                            <label>{{$setting->name}}<span class="starrisk">*</span></label>
                            <input type="{{$setting->type}}" class="form-control" name="{{$setting->key}}"     placeholder="أدخل رقم مناسب" value="{{$setting->value}}" step="any" required>
                            <div class="invalid-feedback">
                                من فضلك أدخل رقم مناسب
                            </div>

                        </div>

                    @elseif($setting->type == 'file')
                        <div class="form-group  col-md-6">
                            {{--<img src="{{isset($logo)&&asset('storage/' . $logo)?asset('storage/' . $logo):asset('website/images/main/logo2.png')}}" alt="logo" style="width:200px; height:100px">--}}
                            <label>{{$setting->name}}<span class="starrisk">*</span></label>
                            <img src="{{asset('storage/' . $setting->value)}}" alt="logo" style="width:200px; height:100px"/>


                                من فضلك ارفع صورة مناسبة


                        </div>


                    @endif



                    @endforeach
                  {{--  <div class="form-group col-12 map-form-group">
                        @include('admin.map')
                    </div>--}}
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
    <script src="{{asset('website/js/mapPlace.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWZCkmkzES9K2-Ci3AhwEmoOdrth04zKs&libraries=places&callback=initMap&language={{ App::getLocale() }}"
            async defer></script>
@endsection



<!-- scripts
     ================ -->



