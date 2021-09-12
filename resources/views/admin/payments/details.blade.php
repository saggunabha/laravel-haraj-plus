@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="#"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>تفاصيل الطلب</li>
            </ul>
        </div>
        <!--end div-->



        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>  تفاصيل الطلب</span></h3>





                <form  class="needs-validation row border-form" novalidate="">

                    <div class="form-group  col-md-6">
                        <label> اسم المحول <span class="starrisk">*</span></label>
                           <a href="{{route('users.show',$payment->user_id)}}"  class=" btn form-control "
                      >
                            {{$payment->user->name}}
                        </a>
                    </div>



                    <div class="form-group  col-md-6">
                        <label> المبلغ المحول <span class="starrisk">*</span></label>
                        <input type="text" class="form-control" value="{{$payment->money_amount}}"   name="name"placeholder="الإسم  " readonly>

                    </div>



                    <div class="form-group  col-md-6">
                        <label> اسم البنك <span class="starrisk">*</span></label>
                        <input type="text" class="form-control" value="{{$bankAccount->name}}"   readonly>


                    </div>


                    <div class="form-group  col-md-6">
                        <label> رقم الحساب البنكى  <span class="starrisk">*</span></label>
                        <input type="text" class="form-control" value="{{$payment->bank_no}}"   readonly>

                    </div>

                    <div class="form-group  col-md-6">
                        <label>  نوع الباكدج <span class="starrisk">*</span></label>
                        <input type="text" class="form-control" value="{{ isset($payment->pakage)?$payment->pakage->type :'غير محدد'}}"   readonly>

                    </div>

                    <div class="form-group  col-md-6">
                        <label> الحاله <span class="starrisk">*</span></label>
                        @if($payment->is_accepted==2)
                        <input type="text" class="form-control" value="قيد الانتظار"   readonly>
                            @elseif($payment->is_accepted==0)
                            <input type="text" class="form-control" value="تم الرفض"   readonly>
                        @else
                            <input type="text" class="form-control" value="تم القبول"   readonly>
                        @endif

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

                        @if($payment->is_accepted ==2)
                            <a href="{{route('businessmen.action',[$payment->id,1])}}" class="btn-success ">قبول</a>

                            <a href="{{route('businessmen.action',[$payment->id,0])}}" class="remove-btn">رفض</a>
                        @endif
                    </div>



                </form>

            </div>

        </div>
    </div>
    @endsection


@section('footer')

    @endsection
