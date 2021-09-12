<!DOCTYPE html>

<html>

<head>
    <title>@yield('pageTitle') | @yield('pageSubTitle')</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="dashboard website" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#636363">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}" />
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#636363">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#636363">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="{{asset('images/main/favicon.ico')}}" />




    <!-- Style sheet
         ================ -->

    <link rel="stylesheet" href="{{asset('/admin/css/bootstrap.min.css')}}" type="text/css" />
    <!--arabic-style only-->
    <link rel="stylesheet" href="{{asset('/admin/css/bootstrap-rtl.min.css')}}" type="text/css" />
    <!--end-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('/admin/css/animate.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css"
          type="text/css" />
    <link rel="stylesheet" href="{{asset('website/css/emoji.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('/admin/css/general.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/admin/css/header.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/admin/css/footer.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/admin/css/keyframes.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/admin/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/admin/colors/blue.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('/admin/css/responsive.css')}}" type="text/css" />
</head>

<body>
    
<input type="hidden" id="auth" value="{{ auth()->user()->id }}">

<section class="main-content">

    @include('admin.layouts.header')

    <div class="container">
        <div class="col-12 main-content-grid">

            @include('admin.layouts.sidebar')

            @yield('content')

        </div>
    </div>

    @include('admin.layouts.footer')

</section>

<script type="text/javascript" src="{{asset('/admin/js/html5shiv.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin/js/respond.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin/js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/admin/js/html5lightbox.js')}}"></script>

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="{{asset('/admin/js/custom-sweetalert.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js">
</script>
<script src="{{asset('/admin/js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/admin/js/custom.js')}}" type="text/javascript"></script>
{{--
<script src="{{asset('/admin/js/read_image.js')}}" type="text/javascript"></script>
<script src="{{asset('/admin/js/index_admin.js')}}" type="text/javascript"></script>
--}}
<script src="{{asset('/admin/js/main.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{ URL::asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>
<script>
    //data-tables

        //data-tables
        $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"

            },

        });

    });
    
    
    
$(document).ready(function(){
     audioElement = document.createElement('audio');
    audioElement.setAttribute('src', "{{ asset('public/website/sound.mp3') }}");
    audioElement.addEventListener('ended', function() {
        this.play();
    }, false);
 
   
   
    if($("#auth").val())
    { 
         setInterval(fun,3000);
        //  setInterval(fun2,5000);
    }


});

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

    function fun(){
        $.ajax({
            type:'get',
            url:'/unread',
            datatype:'json',
            success: function(data)
            {
                if(data['output']!=='')
                {
                    
                    $('#list_notify').prepend(data['output']);

                    if($(".login-btn-num.notify").text().length!==0){
                        audioElement.play();
                        
                        var a=parseInt($(".login-btn-num.notify").text());
                        $('.login-btn-num.notify').empty();
                        $('.login-btn-num.notify').append(a+1);
                        $('.login-btn-num.notify').show();
                        sleep(2000).then(() => { window.location.reload(); });
                    }
                    else{

                        $('.login-btn-num.notify').text('1');
                        $('.login-btn-num.notify').show();
                    }
                }
            }
        });

        // $.ajax({
        //     type:'get',
        //     url:'/unreadMsg',
        //     datatype:'json',
        //     success: function(data)
        //     {
               
               
        //         if(data['output']!=='')
        //         {
        //         $('#list_msg').prepend(data['output']);
           
        //         if($(".login-btn-num.msg").text().length!==0){
        //              audioElement.play();
        //             var a=parseInt($(".login-btn-num.msg").text());

        //             $('.login-btn-num.msg').empty();
        //             $('.login-btn-num.msg').append(a+1);
        //             $('.login-btn-num.msg').show();
        //             sleep(2000).then(() => { window.location.reload(); });
                   
        //         }
        //         else {

        //               $('.login-btn-num.msg').text('1');
        //             $('.login-btn-num.msg').show();
                   
        //         }

        //         // alert($('.login-btn-num.notify').val());
        //     }


        //     }


        // })



    }



</script>
@yield('scripts')

</body>

</html>
