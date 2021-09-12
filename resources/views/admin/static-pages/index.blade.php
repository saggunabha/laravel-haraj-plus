

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle') الصفحات الثابتة
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>الصفحات الثابتة</li>
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
                    <th>اسم الصفحة</th>
                    <th> تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($staticPages as $staticPage)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$staticPage->name}}</td>
                        <td>
                            <a href="{{route('static-pages.edit', $staticPage->id)}}" class="edit-btn-table"><i class="fa fa-edit"></i></a>

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



