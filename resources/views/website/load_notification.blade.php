@if(auth()->user()->unReadNotifications->isNotEmpty())

    @foreach(auth()->user()->unReadNotifications as $notification )
        @if(in_array($notification->created_at->diffInSeconds(Carbon\Carbon::now(), false),range(0,5)))
        <li >
            <a  href="{{isset($notification->data['actionUrl'])?$notification->data['actionUrl']:''}}">
                <img src="{{isset($notification->data['image'])?asset('storage/'.$notification->data['image']):asset('admin/images/main/avatar.png')}}" alt="img" />
                {{--@endif--}}

                <div class="side-login">

                    <h3>{{isset($notification->data['message'])?$notification->data['message']:''}} </h3>

                    <span class="login-time"><i class="far fa-clock"></i> {{$notification->data['message']?$notification->created_at->diffForHumans(Carbon\Carbon::now(), false):''}}</span>
                </div>
            </a>
        </li>
        @endif
        @endforeach



@endif