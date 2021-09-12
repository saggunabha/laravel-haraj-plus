

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle')الاعلانات
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>الاعلانات</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <a href="{{route('ads.create')}}" class="more-link color-bg inline-block-btn">اضافة اعلان</a>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>صورة الاعلان</th>
                    <th>رابط الاعلان</th>
                    <th>وصف الاعلان</th>
                    <th>الموضع</th>
                    <th> تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($ads as $ad)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{asset( '/storage/'. $ad->image)}}" alt="ad" style="width:200px; height:100px"></td>
                            <td>{{$ad->link}}</td>
                            <td>{{$ad->description}}</td>
                            <td>{{$ad->position}}</td>
                            <td>
                                <a href="{{route('ads.edit', $ad->id)}}" class="edit-btn-table"><i class="fa fa-edit"></i></a>
                                <a title="delete" onclick="return true;" object_id="{{$ad->id}}" delete_url="/ads/" class="edit-btn-table remove-alert" href="#">
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



