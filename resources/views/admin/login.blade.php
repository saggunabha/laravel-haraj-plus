<!DOCTYPE html>

<html>

<head>
    <title>لوحة التحكم</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="dashboard website" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#636363">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#636363">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#636363">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" type="image/png" href="{{asset("website/images/main/logo.png")}}" />




    <!-- Style sheet
         ================ -->

    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}" type="text/css"/>
    <!--arabic-style only-->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap-rtl.min.css')}} "type="text/css" />
    <!--end-->
    <link rel="stylesheet" href="{{asset('admin/css/animate.min.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('admin/css/general.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/css/header.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/css/footer.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/css/keyframes.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/colors/blue.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/css/responsive.css')}}" type="text/css" />
</head>

<body class="login-body">

<!-- start login
     ================ -->
<section class="login-pg">
    <div class="container">
        <div class="row">
            <div class="login-form col-12 text-center">
                <div class="login-div wow slideInDown">
                    <img src="{{asset('website/images/main/logo.png')}}" alt="img" />

                    <form class="needs-validation row border-form" novalidate=""   method="post" action="{{route('login')}}" >
           @csrf
                        <div class="form-group  col-12">
                            <input type="email"  name='email'class="form-control" placeholder="البريد الإلكتروني" required="">
                          <div class="invalid-feedback">
                                من فضلك أدخل بريد إلكتروني صحيح
                            </div>
                            @if($errors->has('email'))
                                <div class="invalid-feedback" style="display: block">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                          {{--  @if( isset($error))
                                <div class="invalid-feedback" style="display: block">
                                    {{ $error}}
                                </div>
                                @endif--}}
                        </div>


                        <div class="form-group  col-12">
                            <input type="password"  name='password'class="form-control pass-input" placeholder="كلمة المرور"
                                   psswd-shown="false" required="">
                            <div class="invalid-feedback">
                                من فضلك أدخل كلمة مرور صحيحة
                            </div>
                            @if($errors->has('password'))
                                <div class="invalid-feedback" style="display: block">
                                    من فضلك أدخل كلمة مرور صحيحة
                                </div>
                            @endif
                            <span class="pasword-show"></span>
                        </div>



                       @if (isset($error))
                            <div id="sweet_warning" class="invalid-feedback" style="display: block">

                                    <span>{{ $error}}</span><br/>

                            </div>
                                @endif

                        <div class="form-group  col-12">
                            <button type="submit" class="custom-btn">تسجيل
                                الدخول</button>
                        </div>



                    </form>
                </div>
            </div>


        </div>
    </div>
</section>
<!--end login-->




<!-- scripts
     ================ -->
<script type="text/javascript" src="{{asset('admin/js/html5shiv.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/respond.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/js/custom.js')}}" type="text/javascript"></script>

</body>

</html>
