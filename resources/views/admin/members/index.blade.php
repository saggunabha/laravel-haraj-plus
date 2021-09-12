
@extends('admin.layouts.app')
@section('pageTitle','حراج بلص')
@section('pageSubTitle', 'المستخدمين')
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

   
                    <button type="button" class="btn btn-primary" id="button-send" data-toggle="modal" data-target="#exampleModal"  data-whatever="العملاء">
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
                            <th>#ID</th>
                            <th>اسم العميل</th>
                            <th>الجوال</th>
                            <th>البريد الإلكتروني</th>
                            <th>النوع</th>
                            <th>الحاله</th>
                            <th>تاريخ التسجيل</th>
                            <th> الاجراء المتخد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1;@endphp

                        @foreach($users as $user)
                        <tr>
                            <td>{{$i++}}
                                <input type="checkbox" class="send-message" name="users[]" value="{{ $user->id }}"></td>

                            </td>
                            <td>
                            <a href="{{ route('user-profile',$user->id.'-'.$user->name) }}">
                            <img  @if($user->image)src="{{asset('storage/'.$user->image)}}" @else  src="{{asset('admin/images/main/avatar.png')}}" @endif  alt="client">{{$user->name}}
                            </a>
                            </td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$roles[$user->type]}}</td>
                            @if($user->is_active==1)
                            <td>مفعل</td>
                            @else
                                <td>تم تجميده</td>
                                @endif
                            <td>{{$user->created_at->format("d/m/Y")}}</td>
                            <td>
                                <a href="{{route('users.edit',$user->id)}}" class="edit-btn-table"><i class="fa fa-edit"></i></a>

                             <!--  <a title="delete" onclick="return false;" object_id="{{ $user->id }}" delete_url="/users/"
                                  class="edit-btn-table remove-alert" href="#">
                                <i class="fa fa-times"></i> </a>-->
                            </td>
                        </tr>
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
  })

</script>


<script>


$('#send-all').click(function(event){
   
   event.preventDefault();
   var arr=[];
   $.each($("input[name='users[]']:checked"), function () {
   arr.push( this.value)
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
  </script>  
@endsection