@extends('admin.layouts.app')

@section('pageTitle','حراج بلص')
@section('pageSubTitle', ' تفاصيل رجال الاعمال')

@section('content')
    <!--start row-->
    <div class="row">

        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>البيانات الاساسيه</span></h3>
                {{--   @if($errors->any())
                       {!! implode('', $errors->all('<div>:message</div>')) !!}
                   @endif--}}

                <div class="needs-validation row border-form" >

                    <div class="form-group  col-md-6">
                        <label>الإسم بالكامل<span class="starrisk">*</span></label>
                        <input type="text" class="form-control" value="{{$user->name}}"  readonly name="name"placeholder="الإسم  " required>
                        <div class="invalid-feedback">
                            من فضلك أدخل اسم صحيح
                        </div>
                        @if ($errors->has('name'))
                            <div style="display:block;" class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
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







                    <div class="form-group  col-md-6">
                        <label>المدينه<span class="starrisk">*</span></label>
                        <input type="text" class="form-control"  value="{{isset($city)?$city->name:'لا يوجد'}}"  readonly>
                    </div>




                    <div class="form-group  col-md-6">
                        <label>الوظيفه <span class="starrisk">*</span></label>
                        <input type="text" class="form-control"  value="رجل اعمال"  readonly>
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

        <!--start div-->
        @if(isset($payment))
        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>  تفاصيل الطلب</span></h3>





                <form  class="needs-validation row border-form" novalidate="">

                    <div class="form-group  col-md-6">
                        <label> اسم المحول <span class="starrisk">*</span></label>
                        <input type="text" class="form-control" value="{{$payment->transferee_name}}"   name="name"placeholder="الإسم  " readonly>

                    </div>





                    <div class="form-group  col-md-6">
                        <label> رقم البنك <span class="starrisk">*</span></label>
                        <input type="text" class="form-control" value="{{$payment->bank_no}}"   readonly>

                    </div>

                    <div class="form-group  col-md-6">
                        <label>  نوع الباكدج <span class="starrisk">*</span></label>
                        <input type="text" class="form-control" value="{{$payment->pakage->type}}"   readonly>

                    </div>



                    <div class="form-group  col-md-6">
                        <label> تاريخ التحويل<span class="starrisk">*</span></label>
                        <input type="date" class="form-control" value="{{$payment->transfer_date}}"    readonly>

                    </div>

{{--

                    <div class="form-group  col-md-6">
                        <label> تاريخ التحويل<span class="starrisk">*</span></label>
                        <input type="date" class="form-control" value="{{$payment->transfer_date}}"    readonly>

                    </div>
--}}




                    <div class="form-group  col-md-6">
                        <label> صوره الحواله<span class="starrisk">*</span></label>
                        <img src="{{asset('storage/'.$payment->image)}}">

                    </div>







                    {{-- <div class="form-group  col-md-6">
                         <label>الصوره<span class="starrisk">*</span></label>
                         <input type="tel" class="form-control" name="image" id="image" minlength="10"
                                maxlength="14" required>

                     </div>--}}

                    <div class="form-group  margin-top-div text-center col-12">


                            <a href="{{route('businessmen.action',[$payment->id,1])}}" class="btn-success ">قبول</a>

                            <a href="{{route('businessmen.action',[$payment->id,0])}}" class="remove-btn">رفض</a>

                    </div>



                </form>

            </div>

        </div>
        <!--end div-->
@endif
        @if($payments->IsNotEmpty())
        <h3 ><span> تاريخ الطلبات</span></h3>
       

            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>اسم المحول</th>
                   <th>نوع الباكدج</th>


                    <th>تاريخ الاشتراك</th>
                    <th>  تاريخ الانتهاء</th>
<th>
    الايام المتبقيه ف الباقه الحاليه
</th>
                    <th>الاجراء المتخد</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1;@endphp

                @foreach($payments as $payment)
                    <tr>
                        <td>{{$i++}}</td>
                        {{--<a href="profile.html">--}}

                        <td>{{$payment->transferee_name}}</td>
                        <td>{{$payment->pakage->type}}</td>
                       <td>{{$payment->user->promotedUser->start_date}}</td>
                        <td>{{$payment->user->promotedUser->end_date}}</td>
                        <td>

                           {{-- $end_date =\Carbon\Carbon::parse($payment->promotedUser->end_date)--}}
                            {{\Carbon\Carbon::parse($payment->user->promotedUser->end_date)->diffInDays(Carbon\Carbon::now(), false)<0?substr(\Carbon\Carbon::parse($payment->user->promotedUser->end_date)->diffInDays(Carbon\Carbon::now(), false),1 ):'انتهى الاشتراك'}}
                        <td> <a class="more-link color-bg inline-block-btn m-0"  href="{{route('payments.show',$payment->id)}}"> التفاصيل </a></td>
                    </tr>
                @endforeach





                </tbody>
            </table>
@endif

    </div>
    <!--end row-->

@endsection


@section('footer')


    @endsection
