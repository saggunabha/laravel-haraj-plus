

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle') العمولات
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>العمولات</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>اسم العميل</th>
                    <th>جوال العميل</th>
                    <th>اسم المحول</th>
                    <th>مبلغ العمولة</th>
                    <th>تاريخ التحويل</th>
                    <th>البنك المحول اليه</th>
                    <th>رقم الاعلان</th>
                    <th>صورة الحوالة</th>
                    <th>ملاحظات</th>
                    <th>الحالة</th>
                    <th>تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($commissions as $commission)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{isset($commission->user->name)?$commission->user->name:''}}</td>
                        <td>{{isset($commission->user->phone)?$commission->user->phone:''}}</td>
                        <td>{{isset($commission->transferee_name)?$commission->transferee_name:''}}</td>
                        <td>{{isset($commission->money_amount)?$commission->money_amount:''}}</td>
                        <td>{{isset($commission->transfer_date)?$commission->transfer_date:''}}</td>
                        <td>{{isset($commission->bankAccount->name)?$commission->bankAccount->name:''}}</td>
                        <td>{{isset($commission->product->name)?$commission->product->name:''}}</td>
                        <td><img src="{{asset( '/storage/'. $commission->image)}}" alt="ad" style="width:200px; height:100px"></td>
                        <td>{{$commission->notes}}</td>
                        @if($commission->is_accepted==1)
                            <td>تم القبول</td>
                        @elseif($commission->is_accepted==0)
                            <td>تم الرفض</td>
                        @else
                            <td>قيد الانتظار </td>
                        @endif

                        <td>
                            <a href="{{route('commissions.show',$commission->id)}}"  class="more-link color-bg">  التفاصيل</a>

                        <!-- <a title="delete" onclick="return false;" object_id="{{ $commission->id }}" delete_url="/payments/"
                               class="edit-btn-table remove-alert" href="#">
                                <i class="fa fa-times"></i> </a> -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <!--end div-->

    </div>
    <!--end row-->




@endsection







<!-- scripts
     ================ -->



