<!DOCTYPE html>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>حراج بلس</title>

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="monsabat website" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#2b3e4f">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#2b3e4f">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#2b3e4f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="images/main/favicon.ico" />



    <!-- Style sheet
         ================ -->

    <link rel="stylesheet" href="css/bootstrap-rtl.min.css" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="css/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css"
          type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css" />
    <link rel="stylesheet" href="css/price.css" type="text/css" />
    <link rel="stylesheet" href="css/emoji.css" type="text/css" />
    <link rel="stylesheet" href="css/general.css" type="text/css" />
    <link rel="stylesheet" href="css/header.css" type="text/css" />
    <link rel="stylesheet" href="css/footer.css" type="text/css" />
    <link rel="stylesheet" href="css/keyframes.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
</head>

<body class="full-dark-gray-bg">


<!--start popup-->
<div class="popup">
    <!--start login-model -->
    <div class="modal fade login-modal-style" id="login-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-div">
                        <div class="login-shape-shadow"></div>

                        <div class="login-shape text-center">
                            <div class="inner-login-shape">
                                <img src="images/main/logo3.png" alt="logo" />
                                <div class="form-group  login-text">
                                    <span class="login-text-link">ليس لديك حساب؟</span>
                                    <a href="#" data-toggle="modal" data-target="#register-modal"
                                       class="login-text-link register-modal-open">انشاء حساب جديد</a>
                                </div>
                            </div>
                        </div>


                        <div class="login-form">
                            <div class="inner-login-form">
                                <h2>أهلا وسهلا بك في سوق حراج</h2>
                                <p>
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                                    مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص
                                </p>

                                <form class="needs-validation" method="" action="" novalidate>
                                    <div class="form-group">
                                        <label>البريد الإلكتروني</label>
                                        <input type="text" class="form-control" required />
                                        <div class="invalid-feedback">
                                            من فضلك أدخل بريد إلكتروني صحيح
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>كلمة المرور</label>
                                        <input type="password" class="form-control" required />
                                        <div class="invalid-feedback">
                                            من فضلك أدخل كلمة مرور صحيحة
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <a href="#" data-toggle="modal" data-target="#forget-modal"
                                           class="forget-password">هل نسيت كلمة
                                            المرور؟</a>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="custom-btn big-btn">تسجيل الدخول</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <!-- end login-model -->


    <!--start register-model -->
    <div class="modal fade login-modal-style" id="register-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="login-div">
                        <div class="login-shape-shadow"></div>
                        <div class="login-shape text-center">
                            <div class="inner-login-shape">
                                <img src="images/main/logo3.png" alt="logo" />
                                <div class="form-group  login-text">
                                    <span class="login-text-link"> لديك حساب؟</span>
                                    <a href="#" data-toggle="modal" data-target="#login-modal"
                                       class="login-text-link login-modal-open">تسجيل دخول </a>
                                </div>
                            </div>
                        </div>


                        <div class="login-form">
                            <div class="inner-login-form">
                                <h2>أهلا وسهلا بك في سوق حراج</h2>
                                <p>
                                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                                    مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص
                                </p>

                                <form class="needs-validation" method="" action="" novalidate>

                                    <div class="form-group">
                                        <select class="form-control" required>
                                            <option disabled selected>نوع الحساب</option>
                                            <option value="">رجل أعمال</option>
                                            <option value="">مستخدم عادي</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            من فضلك إختر نوع الحساب
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="إسم المستخدم "
                                               required>
                                        <div class="invalid-feedback">
                                            من فضلك أدخل إسم صحيح
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="البريد الإلكتروني"
                                               required>
                                        <div class="invalid-feedback">
                                            من فضلك أدخل بريد إلكتروني صحيح
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="رقم الجوال"
                                               minlength="10" maxlength="14" required>
                                        <div class="invalid-feedback">
                                            من فضلك أدخل رقم جوال صحيح
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" required>
                                            <option disabled selected>الدولة</option>
                                            <option value="">الدولة</option>
                                            <option value="">الدولة</option>
                                            <option value="">الدولة</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            من فضلك إختر دولة
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" required>
                                            <option disabled selected>المدينة</option>
                                            <option value="">المدينة</option>
                                            <option value="">المدينة</option>
                                            <option value="">المدينة</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            من فضلك إختر المدينة
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="العنوان" required>
                                        <div class="invalid-feedback">
                                            من فضلك أدخل عنوان صحيح
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="كلمة المرور"
                                               required>
                                        <div class="invalid-feedback">
                                            من فضلك أدخل كلمة مرور صحيحة
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="custom-btn big-btn">تسجيل </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>


    <!-- end register-model -->


    <!--start forget-model -->
    <div class="modal fade login-modal-style" id="forget-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="login-div">
                            <div class="login-shape-shadow"></div>

                            <div class="login-shape text-center">
                                <div class="inner-login-shape">
                                    <img src="images/main/logo3.png" alt="logo" />
                                    <div class="form-group  login-text">
                                        <a href="#" data-toggle="modal" data-target="#login-modal"
                                           class="login-text-link login-modal-open">تسجيل دخول</a>
                                        <br>
                                        <a href="#" data-toggle="modal" data-target="#register-modal"
                                           class="login-text-link register-modal-open">انشاء حساب جديد</a>
                                    </div>
                                </div>
                            </div>


                            <div class="login-form">
                                <div class="inner-login-form">
                                    <h2>أهلا وسهلا بك في سوق حراج</h2>
                                    <p>
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                                        مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص
                                    </p>

                                    <form class="needs-validation" method="" action="" novalidate>
                                        <div class="form-group">
                                            <label>البريد الإلكتروني</label>
                                            <input type="text" class="form-control" required />
                                            <div class="invalid-feedback">
                                                من فضلك أدخل بريد إلكتروني صحيح
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <button type="submit" class="custom-btn big-btn">إرسال</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
    <!-- end forget-model -->
</div>
<!--end popup-->


<!-- start header
     ================ -->
<header class="first_bg  wow fadeIn">
    <div class="container">
        <div class="row">
            <!--start div-->
            <div class="col-lg-5 col-md-7  sm-center main-search-grid">
                <div class="main-search">
                    <form class="needs-validation red-form" method="" action="" novalidate>
                        <div class="form-group">
                            <input class="form-control" placeholder="ابحث هنا" required />
                            <div class="invalid-feedback">
                                من فضلك أدخل نص صحيح
                            </div>
                            <button type="submit" class="pos-search-btn first_bg second_bg_hover auto-icon "><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end div-->

            <!--start div-->
            <!--before login
            <div class="col-lg-7 col-md-5 d-md-block d-none login-grid text-left-dir sm-center">
                <div class="main-login">
                    <div class="before-login">
                    <a href="#" data-toggle="modal" data-target="#login-modal" class="second_color_hover">تسجيل
                        الدخول</a>
                    <a href="#" data-toggle="modal" data-target="#register-modal"
                        class="white-btn second_bg_hover">إنشاء حساب</a>
                </div>
            </div>
        -->

            <!--after login-->
            <div class="col-lg-7 col-md-5  login-grid text-left-dir sm-center">
                <div class="main-login">
                    <div class="after-login">
                        <div class="after-login-div">
                            <a href="#" class="white-btn second_bg_hover"><i class="fas fa-comment-dots"></i>
                                <span class="login-btn-text">الرسائل</span>
                                <span class="login-btn-num">5</span>

                            </a>

                            <div class="arrow-list big-arrow-list">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="chat.html">
                                            <img src="images/main/user.png" alt="img" />
                                            <div class="side-login">
                                                <h3>قام محمد أحمد بإرسال رسالة لك</h3>
                                                <span class="login-time"><i class="far fa-clock"></i>منذ 24
                                                        دقيقة</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="chat.html">
                                            <img src="images/main/user.png" alt="img" />
                                            <div class="side-login">
                                                <h3>قام محمد أحمد بإرسال رسالة لك</h3>
                                                <span class="login-time"><i class="far fa-clock"></i>منذ 24
                                                        دقيقة</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="chat.html">
                                            <img src="images/main/user.png" alt="img" />
                                            <div class="side-login">
                                                <h3>قام محمد أحمد بإرسال رسالة لك</h3>
                                                <span class="login-time"><i class="far fa-clock"></i>منذ 24
                                                        دقيقة</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="chat.html">
                                            <img src="images/main/user.png" alt="img" />
                                            <div class="side-login">
                                                <h3>قام محمد أحمد بإرسال رسالة لك</h3>
                                                <span class="login-time"><i class="far fa-clock"></i>منذ 24
                                                        دقيقة</span>
                                            </div>
                                        </a>
                                    </li>


                                    <li>
                                        <a href="chat.html">
                                            <img src="images/main/user.png" alt="img" />
                                            <div class="side-login">
                                                <h3>قام محمد أحمد بإرسال رسالة لك</h3>
                                                <span class="login-time"><i class="far fa-clock"></i>منذ 24
                                                        دقيقة</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="chat.html">
                                            <img src="images/main/user.png" alt="img" />
                                            <div class="side-login">
                                                <h3>قام محمد أحمد بإرسال رسالة لك</h3>
                                                <span class="login-time"><i class="far fa-clock"></i>منذ 24
                                                        دقيقة</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="text-center">
                                    <a href="chat.html" class="show-all">عرض الكل</a>
                                </div>
                            </div>
                        </div>

                        <div class="after-login-div">
                            <a href="#" class="white-btn second_bg_hover"><i class="fa fa-bell"></i>
                                <span class="login-btn-text">الإشعارات</span>
                                <span class="login-btn-num">10</span>
                            </a>

                            <div class="arrow-list big-arrow-list">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="notifications.html">
                                            <img src="images/main/user.png" alt="img" />
                                            <div class="side-login">
                                                <h3>قام محمد أحمد بإضافة منتجك الى المفضلة </h3>
                                                <span class="login-time"><i class="far fa-clock"></i>منذ 24
                                                        دقيقة</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="notifications.html">
                                            <img src="images/main/user.png" alt="img" />
                                            <div class="side-login">
                                                <h3>قام محمد أحمد بإضافة منتجك الى المفضلة </h3>
                                                <span class="login-time"><i class="far fa-clock"></i>منذ 24
                                                        دقيقة</span>
                                            </div>
                                        </a>
                                    </li>


                                    <li>
                                        <a href="notifications.html">
                                            <img src="images/main/user.png" alt="img" />
                                            <div class="side-login">
                                                <h3>قام محمد أحمد بإضافة منتجك الى المفضلة </h3>
                                                <span class="login-time"><i class="far fa-clock"></i>منذ 24
                                                        دقيقة</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="notifications.html" class="show-all">عرض الكل</a>
                                </div>

                            </div>
                        </div>


                        <div class="after-login-div">
                            <a href="#" class="user-img full-width-img"><img src="images/main/user.png"
                                                                             class="converted-img" alt="user" /></a>

                            <div class="arrow-list">
                                <!--for user-->
                                <ul class="list-unstyled">
                                    <li><a href="profile.html"><i class="far fa-user"></i>الصفحة الشخصية</a>
                                    </li>
                                    <li><a href="edit-data.html"><i class="fa fa-edit"></i>تعديل البيانات</a>
                                    </li>

                                    <li><a href="upgrade-account.html"><i class="far fa-sun"></i>ترقية
                                            الحساب</a>
                                    </li>
                                    <li><a href="add-advertisment.html"><i class="fa fa-plus"></i>إضافة
                                            إعلان</a>
                                    </li>
                                    <li><a href="support.html"><i class="fa fa-headset"></i>الدعم الفني</a></li>
                                    <li><a href="#"><i class="fa fa-sign-out-alt"></i>تسجيل الخروج</a></li>
                                </ul>

                                <!--for bussiness-man
                                <ul class="list-unstyled">
                                        <li><a href="profile.html"><i class="far fa-user"></i>الصفحة الشخصية</a>
                                        </li>
                                        <li><a href="upgrade-account.html"><i class="fa fa-landmark"></i>متجري</a>
                                        </li>
                                        <li><a href="add-advertisment.html"><i class="fa fa-plus"></i>إضافة
                                                إعلان</a>
                                        </li>
                                        <li><a href="setting-store.html"><i class="fa fa-cog"></i>إعدادت المتجر</a></li>
                                        <li><a href="#"><i class="fa fa-sign-out-alt"></i>تسجيل الخروج</a></li>
                                    </ul>
                                -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end after login-->

        </div>
    </div>
</header>
<!--end header-->


<!-- start top-logo
     ================ -->
<section class="top-logo  wow fadeIn">
    <div class="container">
        <div class="row">
            <!--start div-->
            <div class="col-lg-4  col-md-4 col-7  logo-grid">
                <div class="logo-div">
                    <a href="index.html">
                        <img src="images/main/logo.png" alt="logo" />
                    </a>
                </div>
            </div>
            <!--end div-->

            <!--start div-->
            <div class="col-5 resonsive-icons-grid text-left-dir">
                <a href="favourites.html"><i class="fa fa-heart"></i></a>
                <!--before login-only--><a href="#" data-toggle="modal" data-target="#login-modal"><i
                        class="fa fa-user"></i></a>
                <!--end-->
                <a href="#" class="menu-icon"><span></span></a>
            </div>
            <!--end div-->

            <!--start div-->
            <div class="col-lg-8  col-sm-8 d-md-block d-none  top-adv text-left-dir">
                <div class="logo-div">
                    <a href="#">
                        <img src="images/main/top-adv.png" alt="logo" />
                    </a>
                </div>
            </div>
            <!--end div-->
        </div>
    </div>
</section>
<!--end top-logo-->



<!-- start navbar
     ================ -->
<section class="navbar-section  wow fadeIn">
    <div class="container">
        <div class="row">
            <!--start nav-->
            <div class="navbar-grid col-lg-9 md-center">
                <nav>
                    <div class="responsive-logo">
                        <img src="images/main/logo.png" alt="logo" />
                    </div>
                    <ul class="list-inline">
                        <li class="active"><a href="index.html"><i class="fa fa-home"></i>الرئيسية</a></li>
                        <li><a href="categories.html"><i class="fa fa-book-open"></i>الأقسام</a></li>
                        <li><a href="types.html"><i class="fa fa-th"></i>التصنيفات</a></li>
                        <li><a href="products.html"><i class="fa fa-box"></i>المنتجات</a></li>
                        <li><a href="about.html"><i class="fa fa-question"></i>من نحن</a></li>
                        <li><a href="contact.html"><i class="fa fa-phone"></i>اتصل بنا</a></li>
                    </ul>
                </nav>
            </div>
            <!--end nav-->

            <!--start div-->
            <div class="navbar-grid col-lg-3 d-lg-block d-none text-left-dir">
                <a href="favourites.html" class="custom-btn"><i class="far fa-heart"></i>المفضلة</a>
            </div>
            <!--end div-->

        </div>
    </div>
</section>
<!--end navbar-->



<!--start profile-pg
      ================-->
<section class="order-div page-order-div">
    <div class="profile-pg">
        <div class="container-fluid">
            <div class="row">
                <!--start profile-images-->
                <div class="profile-images-grid col-12 no-marg-row wow fadeIn">

                    <div class="form-group profile-image-upload">
                        <input type="file" class="img-form-shape file-input form-control" value="" id="main-01"
                               required>

                        <label class="file-input-label timeline-label full-width-img " for="main-01"> <img
                                src="images/main/login-bg.png" alt="img" class="converted-img" />
                            <img id="preview-main-01" />
                        </label>


                        <div class="user-profile-img">
                            <input type="file" class="img-form-shape file-input form-control" value="" id="main-02"
                                   required>


                            <label class="file-input-label timeline-label full-width-img " for="main-02"> <img
                                    src="images/main/jadaraa.png" alt="img" class="converted-img" />
                                <img id="preview-main-02" />
                            </label>
                        </div>
                    </div>
                </div>
                <!--end profile-images-->
            </div>
        </div>

        <div class="container">
            <div class="row">


                <div class="col-12  text-center wow fadeIn">
                    <div class="store-information-text">
                        <h2 class="info-title first_color">نبذة عن معرض جدارة</h2>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                            العربى
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                            العربى
                            ، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف
                            التى ، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                            الحروف التى
                        </p>
                    </div>
                </div>

                <div class="col-12 two-btns  margin-div text-left-dir wow fadeIn">
                    <a href="show-profile.html" class="custom-btn big-btn">إعلاناتي</a>
                    <br>
                    <a href="#" data-toggle="modal" data-target="#link-Custom-linking"
                       class="custom-btn big-btn">الرابط المخصص</a>

                </div>
            </div>

        </div>

    </div>
    <!--start rate-model -->
    <div class="modal fade" id="link-Custom-linking">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Modal body -->
                <div class="profile-modal">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>الرابط المخصص</h2>
                            </div>
                            <div class="col-lg-3">
                                <h3>
                                    رابط المتجر
                                </h3>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" placeholder="اختر المتجر">
                                <i class="fas fa-paperclip"></i>
                            </div>
                            <div class="button1-profile col-lg-12 ">
                                <button class="custom-btn">اضافة</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end rate-model -->


    <!-- start products
     ================ -->
    <div class="products md-center margin-div products-pg profile-products   wow fadeIn">
        <div class="container">
            <div class="row">

                <div class="col-12 text-left-dir sm-center">
                    <a href="add-advertisment.html" class="info-title second_color_hover first_color">إضافة منتج
                    </a>

                    <div class="share-social">
                        <span class="first_color info-title"><b>|</b> مشاركة </span>
                        <ul class="list-inline auto-icon">
                            <li>
                                <a href="" target="_blank" title="تويتر"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="" target="_blank" title="فيسبوك"><i class="fab fa-facebook-f"></i></a>

                            </li>
                            <li>
                                <a href="" target="_blank" title="واتس اب"><i class="fab fa-whatsapp"></i></a>
                            </li>

                            <li>
                                <a href="" target="_blank" title="انستجرام"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="" target="_blank" title="بينترست"><i class="fab fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12">
                    <h2 class="sec-title text-center"> المنتجات </h2>
                </div>

                <div class="row no-marg-row col-12">
                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn">مفعل</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تجميد"><i class="fa fa-cube"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn frozen-btn">تم تجميده</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تفعيل المنتج"><i class="fas fa-retweet"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->
                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn">مفعل</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تجميد"><i class="fa fa-cube"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn frozen-btn">تم تجميده</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تفعيل المنتج"><i class="fas fa-retweet"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn">مفعل</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تجميد"><i class="fa fa-cube"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn frozen-btn">تم تجميده</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تفعيل المنتج"><i class="fas fa-retweet"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn">مفعل</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تجميد"><i class="fa fa-cube"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn frozen-btn">تم تجميده</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تفعيل المنتج"><i class="fas fa-retweet"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->


                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn">مفعل</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تجميد"><i class="fa fa-cube"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn frozen-btn">تم تجميده</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تفعيل المنتج"><i class="fas fa-retweet"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->


                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn">مفعل</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تجميد"><i class="fa fa-cube"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn frozen-btn">تم تجميده</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تفعيل المنتج"><i class="fas fa-retweet"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->


                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn">مفعل</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تجميد"><i class="fa fa-cube"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn frozen-btn">تم تجميده</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تفعيل المنتج"><i class="fas fa-retweet"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->


                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn">مفعل</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تجميد"><i class="fa fa-cube"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn frozen-btn">تم تجميده</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تفعيل المنتج"><i class="fas fa-retweet"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->


                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn">مفعل</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تجميد"><i class="fa fa-cube"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn frozen-btn">تم تجميده</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تفعيل المنتج"><i class="fas fa-retweet"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->


                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn">مفعل</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تجميد"><i class="fa fa-cube"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                    <!--start item-->
                    <div class="item col-xl-3 col-lg-4 col-6 load-div">
                        <!--start product-grid-->
                        <div class="product-grid">
                            <div class="product-div">

                                <a href="product-details.html">
                                    <div class="product-img">
                                        <img src="images/products/1.png" alt="logo" />
                                    </div>
                                    <div class="product-details">
                                        <h3 class="product-name first_color">سيارة أودي 2014 بيضاء </h3>
                                        <span class="new-price price">25000 ر.س</span>
                                        <span class="old-price price">25000 ر.س</span>
                                        <div class="two-btns">
                                            <button class="custom-btn sm-btn frozen-btn">تم تجميده</button>
                                            <span class="product-time second_bg first_color">منذ ساعة</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="edit-prouct-icons">
                                    <a href="edit-product.html" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a href="#" title="تفعيل المنتج"><i class="fas fa-retweet"></i></a>
                                    <a href="#" title="حذف" class="remove-alert"><i class="fa fa-times"></i></a>
                                </div>

                            </div>
                        </div>
                        <!--end product-grid-->
                    </div>
                    <!--end item-->

                </div>
            </div>
            <div class="text-center col-12 margin-div">
                <a href="#" class="custom-btn big-btn" id="loadmore">المزيد</a>
            </div>

        </div>
    </div>
    <!--end products-->

</section>
<!--end profile-pg-->






<!-- start footer
     ================ -->
<footer>
    <div class="inner-footer wow fadeIn">
        <div class="top-arrow auto-icon"><i class="fas fa-chevron-up"></i></div>
        <div class="container">
            <div class="row">
                <!--start footer-logo-->
                <div class="footer-logo  col-xl-3 col-lg-6 col-md-6 col-sm-6 text-dir-center">
                    <img src="images/main/logo2.png" alt="logo" />

                    <p class="white-text">
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                        العربى
                    </p>


                    <!--start social-grid-->
                    <div class="social-div">
                        <ul class="list-inline footer-social auto-icon">
                            <li>
                                <a href="" target="_blank" title="يوتيوب"><img src="images/social/1.png"
                                                                               alt="img"></a>
                            </li>
                            <li>
                                <a href="" target="_blank" title="واتس اب"><img src="images/social/2.png"
                                                                                alt="img"></a>
                            </li>
                            <li>
                                <a href="" target="_blank" title="سناب شات"><img src="images/social/3.png"
                                                                                 alt="img"></a>
                            </li>
                            <li>
                                <a href="" target="_blank" title="تويتر"><img src="images/social/4.png"
                                                                              alt="img"></a>
                            </li>
                            <li>
                                <a href="" target="_blank" title="فيسبوك"><img src="images/social/5.png"
                                                                               alt="img"></a>
                            </li>
                            <li>
                                <a href="" target="_blank" title="انستجرام"><img src="images/social/6.png"
                                                                                 alt="img"></a>
                            </li>

                        </ul>
                    </div>
                    <!--end social-grid-->
                </div>
                <!--end footer-logo-->

                <!--start footer-list-grid-->
                <div class="footer-list-grid col-xl-6">
                    <div class="row no-marg-row">
                        <div class="footer-list col-lg-6 col-6">
                            <h2 class="footer-title">روابط أخرى</h2>
                            <ul class="list-unstyled">
                                <li><a href="about.html">من نحن</a></li>
                                <li><a href="privacy.html">سياسة الخصوصية</a></li>
                                <li><a href="terms.html">الشروط والأحكام</a></li>
                                <li><a href="help.html">الأسئلة الشائعة / الدعم الفني</a></li>
                                <li><a href="blog.html">المدونة</a></li>

                            </ul>
                        </div>

                        <div class="footer-list col-lg-6 col-6">
                            <h2 class="footer-title">التعاملات المالية</h2>
                            <ul class="list-unstyled">
                                <li><a href="#">Paypal</a></li>
                                <li><a href="#">مدى visa</a></li>
                                <li><a href="payment.html">التحويل البنكي</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end footer-list-grid-->


                <div class="subscribe-grid col-xl-3 col-lg-6 col-sm-6">
                    <h2 class="footer-title"> القائمة البريدية</h2>

                    <div class="subscribe-form white-holder icons-form">
                        <form class="needs-validation" novalidate>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="الاسم" required>
                                <i class="fa fa-user form-icon"></i>
                                <div class="invalid-feedback">
                                    من فضلك أدخل إسم صحيح
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="البريد الإلكتروني" required>
                                <i class="fa fa-envelope form-icon"></i>
                                <div class="invalid-feedback">
                                    من فضلك أدخل بريد إلكتروني صحيح
                                </div>
                            </div>
                            <button type="submit" class="custom-btn dark-btn big-btn full-width-btn">اشتراك</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="copyrights text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        <a href="jaadara.com" target="_blank" title="jaadara">تصميم وتطوير شركة جدارة لتقنية
                            المعلومات</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--end footer-->







<!-- scripts
     ================ -->
<script type="text/javascript" src="js/html5shiv.min.js"></script>
<script type="text/javascript" src="js/respond.min.js"></script>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js" type="text/javascript"></script>
<script src="js/custom.js" type="text/javascript"></script>

<script>
    //upload append div
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imgId = '#preview-' + $(input).attr('id');
                $(imgId).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).on('change', '.profile-image-upload input', function () {
        readURL(this);
        $(this).next("label").css("background-image", "none");
    });
    //load div
    $(function () {
        $(".load-div").slice(0, 12).fadeTo("slow", 1);
        $("#loadmore").on('click', function (e) {
            e.preventDefault();
            $(".load-div:hidden").slice(0, 12).slideDown("fast");
            if ($(".load-div:hidden").length == 0) {
                $("#loadmore").fadeOut('fast');
            } else {
                $("#loadmore").fadeIn('fast');
            }
            $('html,body').animate({
                scrollTop: $(this).offset().top - 600
            }, 1500);
        });
    });
</script>


</body>

</html>
