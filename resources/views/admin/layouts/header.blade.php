<!-- start header
     ================ -->
<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div class="container">
        <div class="row">
            <!--start div-->
            <div class="col-lg-8  col-md-7 sm-center main-search-grid">
                <div class="main-search">
                    <form class="needs-validation" method="post"  action="{{route('admin.search')}}" novalidate>
                        @csrf
                        <div class="form-group">
                            <input class="form-control main-input"  name="name" placeholder="بحث..." required />
                            <div class="invalid-feedback">
                                من فضلك إدخل نص صحيح
                            </div>


                            <button type="submit" class="color-bg-hover"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end div-->


            <!--start div-->
            <div class="col-lg-4 col-md-5 left-text-dir sm-center  main-user-grid">
                <div class="user-div">
                    <!--<span class="user-title color-hover"><i class="fa fa-bell"></i>الرسائل @if($count_clientMsg>0)<b>{{$count_clientMsg}}</b> @endif</span>-->
                    
                    <!--<span  class="user-title color-hover" id="message_count"><i class="fa fa-bell"></i>الرسائل</span>-->
 <a  href="{{route('adminChat.index')}}" class="white-btn second_bg_hover"><i class="fa fa-bell"></i>الرسائل

                                <span  class="login-btn-num msg" id="message_count"></span>

                            </a>



                </div>

                <div class="user-div">
                    <!--<a  href="#" class="white-btn second_bg_hover"><i class="fa fa-bell"></i>-->
                    <!--<span class="login-btn-text">الإشعارات</span>-->
                    
                    <!--<span  id="btn-num" -->
                    <!--@if(auth()->user()->Notifications->count()==0)-->
                    <!--style="display: none"-->
                    <!--@endif class="login-btn-num notify">-->
                    <!--{{auth()->user()->Notifications->count()!=0?auth()->user()->unReadNotifications->count():''}}-->
                    <!--</span>-->
                    
                    <!--</a>-->
                    <span id="notify"  class="user-title login-btn-num notify"><i class="fa fa-bell"></i>الإشعارات
                            @if(auth()->user()->unreadNotifications->count()!=0)
                          <b> {{auth()->user()->unreadNotifications->count()}}</b>
                        @endif
                       </span>
                    <div class="user-list notifications-div" id="dark-scroll">
                        <ul id="list_notify" class="list-unstyled">
                            @if(auth()->user()->Notifications->isNotEmpty())
                            @foreach(auth()->user()->Notifications as $notification)

                            <li>
                                <a href="{{isset($notification->data['actionUrl'])?$notification->data['actionUrl']:''}}">
                                    <div class="full-width-img main-notify-img">

                                        <img src="{{isset($notification->data['image'])?asset('storage/'.$notification->data['image']):asset('admin/images/main/avatar.png')}}" class="converted-img" alt="img" />
                                    </div>
                                {{--    <h3>{{$notification->data['user_name']}}</h3>--}}
                                    <span class="time">{{$notification->created_at->diffForHumans(Carbon\Carbon::now(), false)}}</span>
                                    <p>{{isset($notification->data['message'])?$notification->data['message']:''}}</p>
                                </a>
                            </li>
@endforeach
                                @endif
                        </ul>
                    </div>

                </div>

                <div class="user-div">
                            <span class="user-title color-hover"><img src="{{ asset('admin/images/main/avatar.png') }}" alt="img">
{{auth()->user()->name}}
                                </span>
                    <div class="user-list">
                        <ul class="list-unstyled">
                           
                            <li><a href="#"><i class="fa fa-bell"></i>الإشعارات</a></li>
                            <li><a href="{{route('products.index')}}"><i class="fa fa-box"></i>المنتجات</a></li>
                            <li><a href="{{route('users.edit',auth()->id())}}"><i class="fa fa-user"></i>الملف الشخصي</a></li>
                            <li><a href="{{route('Logout')}}"><i class="fa fa-sign-out-alt"></i>خروج</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <!--end div-->

        </div>
    </div>
</header>
<!--end header-->
