@extends('website.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center margin-div">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">اضافة رقم الجوال</div>

                    <div class="card-body text-center">
                        <div class="verfication-style">
                        <form method="post" action="{{route('add_user_phone',$id)}}" id="verify">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="hidden"  name="token" id="code" style="display: none" value="{{$token}}">
                                <input type="hidden"  name="user" id="user_id" style="display: none" value="{{$id}}">
                                <input type="text"  name="phone"  />
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-12 text-center">
                                    <button type="submit" class="custom-btn">
                                        اضافة
                                    </button>
                                </div>
                            </div>
                            <br><br>


                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@include('website.layouts.footer')
@section('scripts')
    <script>
        $(document).ready(function(){

            //create row for sms in user_sms table
            $.ajax({
                url: "{{route('user_sms')}}",
                type: "GET",
                dataType: 'json',
                data: {"_token": "{{ csrf_token() }}", user_id: $('#user_id').val(), code: $('#code').val() },
                success: function(data){
                }
            });

            //Resend code after 5 minutes
            setInterval(function(){
                $('#resend').removeAttr('hidden');
            }, 300000);

        })

        $(function() {
            'use strict';

            var body = $('body');

            function goToNextInput(e) {
                var key = e.which,
                    t = $(e.target),
                    sib = t.next('.vr');

                if (key != 9 && (key < 48 || key > 57)) {
                    e.preventDefault();
                    return false;
                }

                if (key === 9) {
                    return true;
                }

                if (!sib || !sib.length) {
                    sib = body.find('input').eq(0);
                }
                sib.select().focus();
            }

            function onKeyDown(e) {
                var key = e.which;

                if (key === 9 || (key >= 48 && key <= 57)) {
                    return true;
                }

                e.preventDefault();
                return false;
            }

            function onFocus(e) {
                $(e.target).select();
            }

            body.on('keyup', '.vr', goToNextInput);
            body.on('keydown', '.vr', onKeyDown);
            body.on('click', '.vr', onFocus);

        })
    </script>
@endsection
