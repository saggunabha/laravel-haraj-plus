@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="#"><i class="fa fa-home"></i>الرئيسيه</a></li>
                <li>طلبات الترقيه</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            @if(Session::has('success'))
                <div class="alert alert-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    {{ Session::get('success') }}
                </div>
            @endif
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>اسم المحول</th>
                    <th>رقم الحساب البنكى</th>
                    <th>صاحب الطلب</th>
                    <th>تاريخ التحويل</th>
                    <th>نوع الباقه</th>
                    <th>الحاله</th>
                    <th>الاجراء المتخذ</th>

                </tr>
                </thead>
                <tbody>
                @php $i=1;@endphp

                @foreach($payments as $payment)
                    <tr>
                        <td>{{$i++}}</td>
                        {{--<a href="profile.html">--}}
                        <td>{{$payment->transferee_name}}</td>
                        <td>{{$payment->bank_no}}</td>
                        <td>{{isset($payment->user)?$payment->user->email:''}}</td>
                        <td>{{$payment->transfer_date}}</td>
                        @if(isset($payment->pakage))
                        <td>{{$payment->pakage->type}}</td>
                        @else
                        <td>غير محدد</td>
                        @endif
                        @if($payment->is_accepted==1)
                            <td>تم القبول</td>
                            @elseif($payment->is_accepted==0)
                        @else
                            <td>قيد الانتظار </td>
                        @endif

                        <td>
                            <a href="{{route('payments.show',$payment->id)}}"  class="more-link color-bg inline-block-btn m-0">  التفاصيل</a>

                           <!-- <a title="delete" onclick="return false;" object_id="{{ $payment->id }}" delete_url="/payments/"
                               class="edit-btn-table remove-alert" href="#">
                                <i class="fa fa-times"></i> </a> -->
                        </td>
                    </tr>
                @endforeach





                </tbody>
            </table>

        </div>
        <!--end div-->


        <!--end row-->

    </div>
    @endsection

@section('footer')


