@extends('website.layouts.app')

@section('content')
 <div class="container">
        <div class="row justify-content-center margin-div">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ضع كود التفعيل المكون من اربع خانات الذي تم ارساله الى جوالك برسالة نصية  </div>
                    <div class="card-body text-center">
                        <form method="post" action="{{route('verify')}}" id="verify">
                            @csrf
                            <div class="verfication-style">
                                <input type="hidden"  name="token" id="code" style="display: none" value="{{$token}}">
                                <input type="hidden"  name="user" id="user_id" style="display: none" value="{{$id}}">
                                        <input type="text"  name="code[]" maxlength="4" />
                                    </div>
                                       <div class="form-group row mb-0">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary" id="activate">
                                       تفعيل
                                    </button>
                                </div>
                            </div>
                                   <br><br>

                                </form>
                                   
                    <button  type="submit" href="{{url("/resend")}}" user-id="{{ $id }}" class="custom-btn" id="resend" style="display:none">إعادة ارسال كود التحقيق</button>
                              
                                    <br><br>
                                  <h4 class="ch-ver">إنتظر قليلاً لوصول كود التحقق</h4>


                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@include('website.layouts.footer')
@section('scripts')
   
<script>
   $( document ).ready(function() {
    setTimeout(function() {
        $('#resend').show()
        }, 60000);

        $('#resend').click(function(e){
            e.preventDefault();
            var user = $(this).attr('user-id');
            var url = $(this).attr('href');
            $.ajax({
            url :$(this).attr('href'),
            type:'get',
            dataType: "json",
            data:{'id':user},
            success: function(data) {
                $('#resend').hide();
            }
            });

            });
});
</script>
@endsection
