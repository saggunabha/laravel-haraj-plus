

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle') البلاغات
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>البلاغات</li>
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

                    <th>ايميل مقدم البلاغ</th>
                    <th>ايميل صاحب  التعليق</th>
                    <th>التعليق المبلغ عنه</th>
                    <th>المنتج </th>
                    <th>الحاله</th>
                    <th> الاجراء المتخذ</th>
                    <th>  حذف التعليق</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                    <tr>
                        <input  type="hidden"  id="report_id"   style="display: none"  value="{{$report->rate_id}}">
                        <input type="number"  style="display:none" value={{$report->id}} class="form-control" id="block_days">
                        <td>{{$loop->iteration}}</td>
                        <td>{{(isset($report->user->email))?$report->user->email:''}}</td>
                        <td>{{(isset($report->rate->user->email))?$report->rate->user->email:''}}</td>
                        <td>{{(isset($report->rate->comment))?$report->rate->comment:''}}</td>
                        <td>
                        @if(isset($report->product->id))
                        <a href="{{route('product-details',$report->product->id.'-'.$report->product->name)}}">{{$report->product->name}}</a>
                        @endif
                        </td>
                           <td>
                            @if($user=\App\Models\DeactivateUser::where('user_id',$report->rate->user->id)->where('type',1)->first())
                            @if($user->created_at->diffInDays(Carbon\Carbon::now(), false) < $user->period)
                                محظور من البلاغات

                            @endif
                        @else
                            غير محظور
                        @endif
                        </td>
                        <td>
                            <a title="delete" onclick="return true;" object_id="{{ $report->id }}" delete_url="/reports/" class="edit-btn-table remove-alert" href="#">
                                <i class="fa fa-times"></i> </a>
                            <button type="button"  onclick="get({{$report->id}})" class="edit-btn-table btn-block" data-toggle="modal" data-target="#exampleModalBlock">
                                <i class="fa fa-ban"></i>
                            </button>

                        </td>
                        <td>
                            <a title="delete" onclick="return false;" object_id="{{ $report->rate->id }}" delete_url="/delete-comment/" class="edit-btn-table remove-alert" href="#">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalBlock" tabindex="-1" role="dialog" aria-labelledby="exampleModalBlockLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="edit-btn-table close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <div class="modal-body">
                    <form id="block-form">
                        <div  id="success"  style="display:none" >

                        </div>
                        <div class="form-group custom">
                            <label for="block_days" class="label">فترة حظر صاحب التعليق بالأيام</label>
                            <input type="number"  id="period" class="form-control">
                        </div>

                        <button id="block" type="submit" class="more-link color-bg full-width-btn m-0">ارسال</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection




@section('scripts')
<script>



    $('#block').click(function(e){
        e.preventDefault();
        var report_id=$('#report_id').val();
        var period=$('#period').val()

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            type: 'POST',
            cache: false,
            dataType: 'JSON',
            url: '/admin/block-commenter',
            data:{id:report_id,period:period},
            success: function(data) {

                /*  $(".writeinfo").empty();*/
                // alert(data['msg']);
                $("#success").show();
                $("#success").append(data['msg']);

                setTimeout(function(){ $('#link-Custom-linking').modal('hide'); }, 1000);

                //  $("#write").empty();


            }
        });

    });


</script>
    @endsection





