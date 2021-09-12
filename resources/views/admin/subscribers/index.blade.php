

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle') مشتركي القائمة البريدية
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>القائمة البريدية</li>
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
                    <th>الاسم</th>
                    <th>الايميل</th>
                    <th>تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($subscribers as $subscriber)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$subscriber->name}}</td>
                        <td>{{$subscriber->email}}</td>
                        <td>
                            <a title="delete" onclick="return true;" object_id="{{ $subscriber->id }}" delete_url="/subscribers/" class="edit-btn-table remove-alert" href="#">
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



