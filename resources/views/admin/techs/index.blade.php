

@extends('admin.layouts.app')

@section('pageTitle')لوحة التحكم
@endsection

@section('pageSubTitle')  رسائل الدعم الفني
@endsection

@section('content')
    <!--start row-->
    <div class="row">
        <!--start div-->
        <div class="breadcrumbes col-12">
            <ul class="list-inline">
                <li><a href="{{route('main')}}"><i class="fa fa-home"></i>الرئيسية</a></li>
                <li> رسائل الدعم الفني</li>
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
                    <th>التاريخ</th>
                    <th>الاسم</th>
                    <th>الايميل</th>
                    <th>عنوان الطلب</th>
                    <th>نص الطلب</th>
                    <th>تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($techs as $subscriber)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ date('j M Y, h:i A', strtotime($subscriber->created_at)) }}</td>
                        <td>{{$subscriber->name}}</td>
                        <td>{{$subscriber->email}}</td>
                        <td>{{$subscriber->subject}}</td>
                        <td>{{$subscriber->message}}</td>
                        <td>
                        <a title="delete" onclick="return true;" object_id="{{ $subscriber->id }}" delete_url="/techs/" class="edit-btn-table remove-alert" href="#">
                                <i class="fa fa-times"></i> </a>
                        <a class="watch" href="#" onclick="return true;" data-url="{{ route('tech-replay',$subscriber->id) }}"  data-subject="{{ $subscriber->subject }}"
                            data-message="{{ $subscriber->message }}" data-all="{{ $subscriber->replay }}" data-recipient="{{ $subscriber->user_id }}"  data-toggle="modal" data-target="#order-modal">
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
                        <input type="hidden" name="user_id" value="" id="show_user_id">
                        <input type="hidden" id="action-url" value="">
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
    var action = element.data('url');
    
    var modal = $(this);
    $('#show-subject').text(subject);
    $('#show-message').text(message);
    $('#show_user_id').val(recipient);
    $('#action-url').val(action);
    if(element.data('all').length !=0){
    var replies = element.data('all');
    
    $(this).find(".techs").append('</p>'+replies['message']+'</p>')
    // for(var x= 0;x<replies.length;x++){
    // $(this).find(".techs").append('</p>'+replies[x]['message']+'</p>');
    // }
};
$('#submit-replay').click(function(event){
	event.preventDefault();
    var replay = $('#tech-message').val();
    var token=$('meta[name="csrf-token"]').attr('content');

    $.ajax({
    url : action,
    type:'POST',
    dataType: "json",
    data:{"user_id":recipient , "message":replay,"_token":token},
    success: function(response) {
        if(response['success']){
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



