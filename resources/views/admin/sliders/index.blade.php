

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle') السلايدرز
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>السلايدرز</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <a href="{{route('sliders.create')}}" class="more-link color-bg inline-block-btn">إضافة سلايدر</a>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>صورة السلايدر</th>
                    <th>العنوان</th>
                    <th>المحتوي</th>
                    <th> تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $slider)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{asset( '/storage/'. $slider->image)}}" alt="slider" style="width:200px; height:100px"></td>
                        <td>{{$slider->title}}</td>
                        <td>{{$slider->body}}</td>
                        <td>
                            <a href="{{route('sliders.edit', $slider->id)}}" class="edit-btn-table"><i class="fa fa-edit"></i></a>
                            <a title="delete" onclick="return true;" object_id="{{ $slider->id }}" delete_url="/sliders/" class="edit-btn-table remove-alert" href="#">
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



