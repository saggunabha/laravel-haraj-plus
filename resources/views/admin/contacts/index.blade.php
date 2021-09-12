

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle') الرسائل
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li>الرسائل</li>
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
                    <th>اسم العميل</th>
                    <th>ايميل العميل</th>
                    <th>موضوع الرسالة</th>
                    <th>محتوي الرسالة</th>
                    <th> تعديل</th>
                    <th> رد</th>

                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->subject}}</td>
                        <td>{{$contact->body}}</td>
                        <td>
                            <a title="delete" onclick="return true;" object_id="{{ $contact->id }}" delete_url="/contacts/" class="edit-btn-table remove-alert" href="#">
                                <i class="fa fa-times"></i> </a>

                        </td>
                        <td>
                        <a class="watch" href="#" onclick="return true;" data-url="{{ route('contact-replay') }}"  data-subject="{{ $contact->subject }}"
                            data-message="{{ $contact->body }}" data-all="{{ $contact->replay }}" data-email="{{$contact->email}}" data-toggle="modal" data-target="#order-modal">
                            <i class="fas fa-reply"></i>
                        </a>

                        </td>                        
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <!--end div-->

    </div>
    <!--end row-->
    
    
    
    <div class="modal o-modal fade" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body" id="popup">
                    <h3>عنوان الطلب</h3>
                    <p id="show-subject"> </p>
                    <h3>الطلب</h3>
                    <p id="show-message"> </p>
                    <br/>
                    <br/>
                   <p>
                       رد الدعم 
                   </p>
              <div class="techs"></div>
                   
                    <form action="" >
                        <input type="text" name="message" id="tech-message" required>
                        <input type="hidden" name="user_message" id="user-message" required>
                        <input type="submit" value="رد" id="submit-replay" >
                    </form>
                </div>
            </div>
        </div>
    </div>    




@endsection

@section('scripts')
    <script>
 $('#order-modal').on('show.bs.modal', function (event) {
    $(this).find(".techs").empty();
    var element = $(event.relatedTarget); 
    var recipient = element.data('recipient'); 
    var message = element.data('message');
    var subject = element.data('subject');
    var email = element.data('email');
    var action = element.data('url');
    
    var modal = $(this);
    $('#show-subject').text(subject);
    $('#show-message').text(message);
    $('#show_user_id').val(recipient);
    $('#user-message').val(message);
    $('#action-url').val(action);

$('#submit-replay').click(function(event){
	event.preventDefault();
    var replay = $('#tech-message').val();
    var message = $('#user-message').val();
    var token=$('meta[name="csrf-token"]').attr('content');
   

    $.ajax({
    url : action,
    type:'POST',
    dataType: "json",
    data:{"email":email , "subject":subject, "messageAdmin":replay, "messageUser":message, "_token" : token},
    success: function(response) {
        if(response['success'] == 'true'){
               Swal.fire({
                        type: 'success',
                        title: 'تم إرسال الرسالة بنجاح',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    location.reload();
                    $('#subject').val('');
                    $('#message').val('');
                    $('#order-modal').modal('toggle');
        }else{
            Swal.fire({
                        type: 'error',
                        title: 'تم الرد مسبقا',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#subject').val('');
                    $('#message').val('');
        }

    }

});
});



});
</script>





@endsection





<!-- scripts
     ================ -->



