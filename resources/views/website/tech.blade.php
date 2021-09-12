@extends("website.layouts.app")

@section('content')



    <!-- start technical support
         ================ -->
         <section class="tech-support">
            <div class="title">
                <h5>نظام الدعم الفنى و المساعدة</h5>
            </div>
    
            <div class="prev-orders">
                <h5>الطلبات السابقة</h5>
            </div>
    
            <div class="div-contain">
    
                <div class="orders">
                    @if(isset($techs))
                    @foreach ($techs as $tech)
                        
                    <div class="order">
                        <p class="techsubject">{{ $tech->subject }}</p>
                        <p class="techmessage">{{ $tech->message }}</p>
                        <a class="watch" href=""  data-subject="{{ $tech->subject }}" data-url="{{ route('send-tech',$tech->id) }}" 
                            data-message="{{ $tech->message }}" data-all="{{ $tech->replay }}" data-recipient="{{ $tech->user_id }}" data-toggle="modal" data-target="#order-modal">مشاهدة</a>
                       
                        <a class="watch" href="#" onclick="return true;" data-url="{{ route('send-tech',$tech->id) }}"  data-subject="{{ $tech->subject }}"
                            data-message="{{ $tech->message }}" data-all="{{ $tech->replay }}"  data-recipient="{{ $tech->user_id }}"  data-toggle="modal" data-target="#order-modal">
                            رد
                        </a>
                    </div>
                    @endforeach

                 @else 
              
                    <h5>لا يوجد طلبات او تذاكر دعم فنى سابقة</h5>
                    <p>قم بكتابة طلبك و سوف يتم المساعدة فى مدة اقصاها 24 ساعة</p>
               

                 @endif
                </div>
                
                <div class="form">
                    <form class="needs-validation" method="POST">
                        @csrf
                        <input type="text" id="name"  class="form-control" value="{{ Auth::user()?Auth::user()->name:'' }}" {{ Auth::user()?'readonly':'' }} placeholder="اسم المستخدم" required>
                        <div class="invalid-feedback" id="user-name">
                            من فضلك أدخل إسم صحيح
                        </div>
                        <input type="email" id="email"  class="form-control" value="{{ Auth::user()?Auth::user()->email:'' }}" {{ Auth::user()?'readonly':'' }} placeholder="البريد الالكتروني" required>
                        <div class="invalid-feedback" id="user-email">
                            من فضلك أدخل بريد الكتروني صحيح
                        </div>
                        <input type="text" id="subject"  class="form-control" placeholder="الموضوع" required>
                        <div class="invalid-feedback" id="user-subject">
                            من فضلك أدخل عنوان صحيح
                        </div>
                        <textarea id="message" class="form-control" placeholder="الرسالة" required></textarea>
                        <div class="invalid-feedback" id="user-message">
                            من فضلك أدخل نص صحيح
                        </div>
                        <input type="submit" id="contact-form" attr-url="{{ route('tech') }}" value="ارسال طلب">
                    </form>
                </div>
    
            </div>
        </section>
    
        <div class="modal o-modal fade" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title col-sm" id="exampleModalLongTitle"> نظام الدعم الفنى - متابعة الرد </h5>
                        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </a>
                    </div>
                    <div class="modal-body" id="popup">
                        <img id="logo" src="{{ asset('website/images/main/logo.png') }}" alt="">
                        <h3>عنوان الطلب</h3>
                        <p id="show-subject"> </p>
                        <h3>الطلب</h3>
                        <p id="show-message"> </p>
                        <br/>
                        <br/>
                        <div style="display: flex;">
                            <p style="margin-bottom: 0;">رد الدعم الفنى </p> 
                            <div style=" display:none" id="display-replay">
                            <span class="cheked"><i class="fas fa-check"></i></span>
                            <span style="color: #2b3b66" >تم الرد</span>
                            </div>
                        </div> 
                        <p style="color: #2b3b66; font-weight: 600;"  class="techs" id="show-replay"></p>
                        <button id="addReply">اضف رد</button>  
                   
                        <form action=""  id="reply">
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
@section('footer')
@include('website.layouts.footer')
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
                //    
        if(element.data('all').length !=0)
        {
        var replies = element.data('all');
        $(this).find(".techs").append(replies['message']);
        $('#display-replay').show();
    
        }else{
            $(this).find(".techs").append('تم استلام طلبك و بانتظار مراجعة الدعم الفنى الخاص بحراج بلص');
            $('#display-replay').hide();
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
                    $('#tech-message').val('');
                    $('#order-modal').modal('toggle');
        }else{
            Swal.fire({
                        type: 'error',
                        title: 'تم الرد مسبقا',
                        showConfirmButton: false,
                        timer: 1500
                    })
                   
                    location.reload();
                    $('#tech-message').val('');
                    $('#order-modal').modal('toggle');
        }

    }

});
});



});



 $("#contact-form").click(function(event){
	event.preventDefault();
    var name = $('#name').val();
    var email = $('#email').val();
    var subject = $('#subject').val();
    var message = $('#message').val();
    var url =  $(this).attr('attr-url');
    
    var token=$('meta[name="csrf-token"]').attr('content');



if($('#name').val() && $('#email').val() && $('#message').val() && $('#subject').val() != null){
$.ajax({
    url : url,
    type:'POST',
    dataType: "json",
    data:{"name":name ,"email":email ,"subject":subject, "message":message,"_token":token},
    success: function(response) {
        if(response['success']){
               Swal.fire({
                        type: 'success',
                        title: 'تم إرسال الرسالة بنجاح',
                        showConfirmButton: false,
                        timer: 1500
                    })
                       location.reload();
                    $('#subject').val('') ;
                    $('#message').val('');
        }else{
            Swal.fire({
                        type: 'error',
                        title: 'عفوا انت غير مسجل علي الموقع',
                        showConfirmButton: false,
                        timer: 1500
                    })
                       location.reload();
                    $('#subject').val('');
                    $('#message').val('');
        }

    }

});
}else{
    $('.invalid-feedback').show();
}
});
</script>   
@endsection