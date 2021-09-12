@if($client_messages->isNotEmpty())

    @foreach($client_messages as $client_message)

            @if($client_message->seen==0)
                @if(in_array($client_message->created_at->diffInSeconds(Carbon\Carbon::now(), false),range(0,2)))
                    <li>
            <a href="{{route('chat_user',$client_message->id)}}">
                <img src="{{isset($client_message->getSender->image)&&file_exists('storage/'.$client_message->getSender->image)?asset('storage/'.$client_message->getSender->image):asset('website/images/avatar.png')}}" alt="img" />
                <div class="side-login">
                    {{--                                                <h3> {{$client_message->content.'بإرسال'.$client_message->getReceiver->name.'لقد قام'}}  </h3>--}}
                    {{--                                                <h3> بإرسال رساله لك{{$client_message->getReceiver->name}} لقد قام </h3>--}}
                    <h3>قام {{$client_message->getSender->name}} بإرسال رسالة لك</h3>

                    <span class="login-time"><i class="far fa-clock"></i>{{$client_message->created_at->diffForHumans()}}
                                                        </span>
                </div>
            </a>
        </li>
        @endif
        @endif
        @endforeach
    @endif