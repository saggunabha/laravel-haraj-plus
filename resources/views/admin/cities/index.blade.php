

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle') المدن
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>المدن</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <a href="{{route('cities.create')}}" class="more-link color-bg inline-block-btn">إضافة مدينة</a>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المدينة</th>
                    <th>اسم الدولة</th>
                    <th> تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$city->name}}</td>
                        <td>{{$city->country->name}}</td>
                        <td>
                            <a href="{{route('cities.edit', $city->id)}}" class="edit-btn-table"><i class="fa fa-edit"></i></a>
                           {{-- <button title="delete"   value="{{$city->products->isNotEmpty()?1:0}}"  onclick="return true;" object_id="{{ $city->id }}" delete_url="/cities/" class="edit-btn-table remove-alert">
                                <i class="fa fa-times"></i> </button>--}}

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
