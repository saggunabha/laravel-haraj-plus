

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle')الحسابات البنكية
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>الحسابات البنكية</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            <a href="{{route('bank-accounts.create')}}" class="more-link color-bg inline-block-btn">اضافة حساب بنكي</a>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>لوجو البنك</th>
                    <th>اسم البنك</th>
                    <th>رقم الحساب</th>
                    <th>رقم الايبان</th>
                    <th> تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($bankAccounts as $bankAccount)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{asset( '/storage/'. $bankAccount->logo)}}" alt="ad" style="width:200px; height:100px"></td>
                        <td>{{$bankAccount->name}}</td>
                        <td>{{$bankAccount->number}}</td>
                        <td>{{$bankAccount->iban_number}}</td>
                        <td>
                            <a href="{{route('bank-accounts.edit', $bankAccount->id)}}" class="edit-btn-table"><i class="fa fa-edit"></i></a>
                            <!--<a title="delete" onclick="return true;" object_id="{{$bankAccount->id}}" delete_url="/bank-accounts/" class="edit-btn-table remove-alert" href="#">-->
                            <!--    <i class="fa fa-times"></i> </a>-->

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
