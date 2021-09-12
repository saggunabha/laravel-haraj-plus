

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle') الباقات
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>الباقات</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <a href="{{route('packages.create')}}" class="more-link color-bg inline-block-btn">إضافة باقة</a>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نوع الباقة</th>
                    <th>سعر الباقة</th>
                    <th>مدة الباقة</th>
                    <th>وصف الباقة</th>
                    <th> تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($packages as $package)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$package->type}}</td>
                        <td>{{$package->price . ' ريال '}}</td>
                        <td>{{$package->duration . ' يوم '}}</td>
                        <td>{{$package->body}}</td>
                        <td>
                            <a href="{{route('packages.edit', $package->id)}}" class="edit-btn-table"><i class="fa fa-edit"></i></a>
                            <a title="delete" onclick="return true;" object_id="{{ $package->id }}" delete_url="/packages/" class="edit-btn-table remove-alert" href="#">
                                <i class="fa fa-times"></i> </a>

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



