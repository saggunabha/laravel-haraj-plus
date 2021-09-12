
@extends('admin.layouts.app')
@section('pageTitle','حراج بلص')
@section('pageSubTitle', 'رجال الاعمال')
<!--start main-content-->
@section('content')

    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="#"><i class="fa fa-home"></i>الرئيسيه</a></li>
                <li>العملاء</li>
            </ul>
        </div>
        <!--end div-->


        <!--start div-->
        <div class="col-md-12 clients-grid margin-bottom-div">
            @if(Session::has('success'))
                <div class="alert alert-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                    {{ Session::get('success') }}
                </div>
            @endif
         
            <button type="button" class="btn btn-primary" id="button-send" data-toggle="modal" data-target="#exampleModal"  data-whatever="رجال الاعمال">
                ارسال رسالة
            </button>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">رسالة جديدة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>  
                    <input type="hidden" class="form-control" value="{{ route('send-bussiness') }}" id="action">
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">الرسالة:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="button" class="btn btn-primary" id="send-all">إرسال</button>
                  </div>
                </div>
              </div>
            </div>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                   style="width:100%">
                <thead>
                <tr>
                    {{-- <th>#ID</th> --}}
                    <th>تحديد للمراسلة</th>
                    <th>اسم العميل</th>
                    <th>الجوال</th>
                    <th>البريد الإلكتروني</th>
                    <th>الايام المتبقيه فى الباقه الحاليه</th>
                    <th> الترقيه</th>
                    <th> الاجراء المتخد</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1;@endphp

                @foreach($promoted_users as $p)
                    @php $user = \App\User::with('promotedUser')->find($p->user_id); @endphp
                    @if($user)
                      <tr>
                        <td>{{$i++}} 
                            <input type="checkbox" class="send-message" name="users[]" value="{{ $user->id }}"></td>
                        <td>
                            <a href="{{route('business-general-profile',$user->promotedUser->link)}}">
                        <img  @if($user->image)src="{{asset('storage/'.$user->image)}}" @else  src="{{asset('admin/images/main/avatar.png')}}" @endif  alt="client">{{$user->name}}
                            </a>
                        </td>
                        
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($p->user_id == $user->id)
                                {{\Carbon\Carbon::parse($p->end_date)->diffInDays(Carbon\Carbon::now(), false)<0?substr(\Carbon\Carbon::parse($p->end_date)->diffInDays(Carbon\Carbon::now(), false),1 ):'انتهى الاشتراك'}}
                            @endif

                        </td>

                        @if($user->is_promoted==1)
                            <td>تم ترقيته</td>

                        @elseif($user->is_promoted==2)
                            <td>قيد الانتظار </td>
                            @else
                            <td></td>
                        @endif

                        <td>
                          <a href="{{route('businessmen.details',$user->id)}}"  class="more-link color-bg inline-block-btn m-0"> تفاصيل </a>
                        </td>
                        </tr>
                        @endif
                        @endforeach

                </tbody>
            </table>

        </div>
        <!--end div-->


        <!--end row-->

    </div>


@endsection
@section('scripts')

<script>
$(document).ready(function () { 
$('#button-send').click(function () {
  var atLeastOneIsChecked = $('input:checkbox').is(':checked');
  if(!atLeastOneIsChecked){
  $('#button-send').attr('disabled', true);
  Swal.fire({
                       type: 'warning',
                       title: 'قم باختيار مستخدم واحد علي الاقل',
                       showConfirmButton: false,
                       timer: 1500
                   })
  window.location.reload();
  }
});

$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var modal = $(this)
    modal.find('.modal-title').text('رسالة جديدة الي رجال الاعمال ')
  });


$('#send-all').click(function(event){
   
   event.preventDefault();
   var arr=[];
   $.each($("input[name='users[]']:checked"), function () {
   arr.push(this.value)
   });
 
   var message = $('#message-text').val();
   var action = $('#action').val();
   var token=$('meta[name="csrf-token"]').attr('content');

   $.ajax({
   url : action,
   type:'POST',
   dataType: "json",
   data:{"users":arr , "message":message,"_token":token},
   success: function(response) {
       if(response['success']){
              Swal.fire({
                       type: 'success',
                       title: 'تم إرسال الرسالة بنجاح',
                       showConfirmButton: false,
                       timer: 1500
                   })
                   $('#message-text').val('');
                   location.reload();
                   $('#exampleModal').modal('toggle');
       }else{
           Swal.fire({
                       type: 'error',
                       title: 'عفوا يوجد خطأ',
                       showConfirmButton: false,
                       timer: 1500
                   })
                   $('#message-text').val('');
                   $('#exampleModal').modal('toggle');
       }

   }

});
});
});
  </script>  
@endsection