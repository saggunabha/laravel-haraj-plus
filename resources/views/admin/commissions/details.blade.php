@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>تفاصيل العمولة</li>
            </ul>
        </div>
        <!--end div-->



        <div class="col-md-12 clients-grid margin-bottom-div">
            <div class="main-white-box">
                <h3 class="sec-title color-title"><span>  تفاصيل العمولة</span></h3>




                <form  class="needs-validation row border-form" novalidate="">

                    <div class="form-group  col-md-6">
                        <label> اسم المحول <span class="starrisk">*</span></label>
                        <a href="{{route('users.show', $data->user_id)}}"  class="btn form-control">
                            {{isset($data->transferee_name) ? $data->transferee_name:''}}
                        </a>
                    </div>




                    <div class="form-group  col-md-6">
                        <label> المبلغ المحول <span class="starrisk">*</span></label>
                        <input type="text" class="form-control" value="{{$data->money_amount}}"   name="name"placeholder="الإسم  " readonly>

                    </div>



                    <div class="form-group  col-md-6">
                        <label> اسم البنك <span class="starrisk">*</span></label>
                        <input type="text" class="form-control" value="{{$bankAccount->name}}"   readonly>


                    </div>


                    {{--<div class="form-group  col-md-6">--}}
                        {{--<label> رقم الحساب البنكى  <span class="starrisk">*</span></label>--}}
                        {{--<input type="text" class="form-control" value="{{$data->bank_no}}"   readonly>--}}

                    {{--</div>--}}

                    <div class="form-group  col-md-6">
                        <label>  رقم الاعلان <span class="starrisk">*</span></label>
                        <input type="text" class="form-control" value="{{$data->product->name}}"   readonly>

                    </div>

                    <div class="form-group  col-md-6">
                        <label> الحالة <span class="starrisk">*</span></label>
                        <input type="text" class="form-control" @if($data->is_accepted == 1) value="تم القبول" @elseif($data->is_accepted == 0) value="تم الرفض" @else value="قيد الانتظار" @endif  readonly>

                    </div>

                    <div class="form-group  col-md-6">
                        <label> تاريخ التحويل<span class="starrisk">*</span></label>
                        <input type="date" class="form-control" value="{{$data->transfer_date}}"    readonly>

                    </div>

                    {{--

                                        <div class="form-group  col-md-6">
                                            <label> تاريخ التحويل<span class="starrisk">*</span></label>
                                            <input type="date" class="form-control" value="{{$payment->transfer_date}}"    readonly>

                                        </div>
                    --}}




                    <div class="form-group  col-md-6">
                        <label> صوره الحواله<span class="starrisk">*</span></label>
                        <img src="{{asset('storage/'.$data->image)}}">

                    </div>







                    {{-- <div class="form-group  col-md-6">
                         <label>الصوره<span class="starrisk">*</span></label>
                         <input type="tel" class="form-control" name="image" id="image" minlength="10"
                                maxlength="14" required>

                     </div>--}}

                    {{--<div class="form-group  margin-top-div text-center col-12">--}}

                        {{--@if($commission->is_accepted ==2)--}}
                            {{--<a href="{{route('businessmen.action',[$payment->id,1])}}" class="btn-success ">قبول</a>--}}

                            {{--<a href="{{route('businessmen.action',[$payment->id,0])}}" class="remove-btn">رفض</a>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    <div class="form-group  margin-top-div text-center col-12">

                        @if($data->is_accepted ==2)
                            <a href="{{route('commissions.status', [$data->id, 1])}}"  class="btn-success ">قبول</a>

                            <a href="{{route('commissions.status', [$data->id, 0])}}"  class="remove-btn">رفض</a>
                        @endif
                    </div>



                </form>

            </div>

        </div>
    </div>
@endsection


@section('footer')

@endsection
