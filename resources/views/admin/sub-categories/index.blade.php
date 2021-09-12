

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle') الأقسام الفرعية
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>الأقسام الفرعية</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <a href="{{route('sub-categories.create')}}" class="more-link color-bg inline-block-btn">إضافة قسم فرعي</a>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>صورة القسم الفرعي</th>
                    <th>القسم الفرعي</th>
                    <th>القسم الرئيسي</th>
                    <th>الترتيب</th>
                    <th> تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    @if($category->parent_id != null && count(\App\Models\Category::where('id',$category->parent_id)->get()))
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{asset( '/storage/'. $category->image)}}" alt="sub-category" style="width:200px; height:100px"></td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->category->name}}</td>
                        <td>{{$category->order}}</td>
                        <td>
                            <a href="{{route('sub-categories.edit', $category->id)}}" class="edit-btn-table"><i class="fa fa-edit"></i></a>
                            <a title="delete" onclick="return true;" object_id="{{$category->id}}" delete_url="/sub-categories/" class="edit-btn-table remove-alert" href="#">
                                <i class="fa fa-times"></i> </a>

                        </td>
                    </tr>
                    @endif
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



