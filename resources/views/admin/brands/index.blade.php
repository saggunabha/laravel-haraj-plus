

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle') الماركات
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>الماركات</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <a href="{{route('brands.create')}}" class="more-link color-bg inline-block-btn">إضافة ماركة</a>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>صورة الماركة</th>
                    <th> تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{asset( '/storage/'. $brand->image)}}" style="width:200px; height:100px"  alt="brand"> </td>
                        <td>
                            <a href="{{route('brands.edit', $brand->id)}}" class="edit-btn-table"><i class="fa fa-edit"></i></a>
                            <a title="delete" onclick="return true;" object_id="{{ $brand->id }}" delete_url="/brands/" class="edit-btn-table remove-alert" href="#">
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


@section('scripts')


@endsection
