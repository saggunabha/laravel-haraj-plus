@extends('website.layouts.app')

@section('content')
    <!--start chat-pg
          ================-->
    <section class="order-div page-order-div">
        <div class="chat-pg  margin-div responsive-margin-div">
            <div class="container">
                <div class="row">
                    <!--start chat-content-grid-->
                    <div class="col-xl-3 col-lg-4 chat-content-grid wow fadeIn">
                        <!--start chat-content-list-->
                        <div class="chat-content-list">
                            <h2 class="chat-head text-center">المحادثات</h2>
                            <!--start search-form-->
                            <form class="needs-validation text-center" onsubmit="return false;" id="search" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="chat-search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="txt_search" id="filter-input"
                                               placeholder="البحث في  المحادثات" required />
                                        <div class="invalid-feedback">
                                            من فضلك أدخل كلمات بحث صحيحة
                                        </div>
                                        <button type="submit" class="pos-search-btn"><i
                                                    class="fa fa-search"></i></button>

                                    </div>
                                </div>
                            </form>
                            <!--end search-form-->
                            <ul class="list-unstyled chat-users" id="chat_users">
                                @if(isset($messages_receives )&&$messages_receives->isNotEmpty())
                                    @foreach($messages_receives as $messages_receive)
                                        <li @if( $messages_receive->getSender->connected==1)class="active" @else @endif>
                                            <a  href="{{route('chat_user',$messages_receive->id)}}">
                                                <div class="chat-img full-width-img">
                                                    <img src="{{isset($messages_receive->getSender->image)&&file_exists('storage/'.$messages_receive->getSender->image)?asset('storage/'.$messages_receive->getSender->image):asset('website/images/avatar.png')}}" class="converted-img" alt="person" />
                                                </div>
                                                <div class="side-contact-chat">
                                                    <h3>{{$messages_receive->getSender->name}} <span class="login-time">{{date("h:i A", strtotime($messages_receive->created_at))}}</span></h3>
                                                    <p>{{$messages_receive->content}}</p>
                                                </div>
                                            </a>
                                        </li>


                                    @endforeach


                                @else
                                    <li>لا يوجد رسائل</li>
                                @endif

                            </ul>
                        </div>
                        <!--end chat-content-list-->
                    </div>
                    <!--end chat-content-grid-->

                    <!--start main-chat-grid-->
                    <div class="col-xl-7 col-lg-6 main-chat-grid wow fadeIn">
                        <div class="main-chat-div">
                            <!--start chat-conver-->
                            <div class="chat-conver chat-owner {{isset($receiver_user) && $receiver_user->connected==1?'active':''}}">
                                <div class="responsive-chat-icon auto-icon"><i class="fa fa-comments"></i></div>

                                <div class="chat-img full-width-img">
                                    <img src="{{isset($receiver_user)&&isset($receiver_user->image)&&file_exists('storage/'.$receiver_user->image)?asset('storage/'.$receiver_user->image):asset('website/images/avatar.png')}}" class="converted-img" alt="person" />
                                </div>
                                <h3>{{isset($receiver_user)?$receiver_user->name:''}}</h3>
                            </div>
                            <!--end chat-conver-->

                            <div class="inner-chat-div">

                            @if(isset($messages)&&$messages->isNotEmpty() && isset($receiver_user))
                                @foreach($messages as $key =>$message)
                                    @php $next = count($messages) != $key + 1 ? $messages[$key+1] : null; @endphp
                                    @if($message->sender_id==Auth::Id())

                                        <!--start chat-conver-->
                                            <div @if($message->getSender->connected==1)class="chat-conver reciever_msg active" @else class="chat-conver reciever_msg " @endif >
                                                @if($next && $next->sender_id != $message->sender_id)
                                                    <div class="chat-img full-width-img">
                                                        <img src="{{isset(Auth::User()->image)&&file_exists('storage/'.\Illuminate\Support\Facades\Auth::user()->image)?asset('storage/'.Auth::User()->image):asset('website/images/avatar.png')}}" class="converted-img" alt="person" />
                                                    </div>
                                                @elseif(! $next)
                                                    <div class="chat-img full-width-img">
                                                        <img src="{{isset(Auth::User()->image)&&file_exists('storage/'.\Illuminate\Support\Facades\Auth::user()->image)?asset('storage/'.Auth::User()->image):asset('website/images/avatar.png')}}" class="converted-img" alt="person" />
                                                    </div>
                                                @endif


                                                <div class="chat-bubble">
                                                    <div>
                                                        {{$message->content}}
                                                        <span class="login-time">{{date("h:i A", strtotime($message->created_at))}}</span>

                                                    </div>

                                                </div>



                                            </div>
                                            <!--end chat-conver-->
                                    @endif
                                    @if($message->sender_id==$receiver_user->id)

                                        <!--start chat-conver-->
                                            <div @if($message->getSender->connected==1) class="chat-conver sender_msg active" @else class="chat-conver sender_msg" @endif>
                                                @if($next && $next->sender_id != $message->sender_id)
                                                    <div class="chat-img full-width-img">
                                                        <img src="{{isset($message->getSender->image)&&file_exists('storage/'.$message->getSender->image)?asset('storage/'.$message->getSender->image):asset('website/images/avatar.png')}}" class="converted-img" alt="person" />
                                                    </div>
                                                @elseif(! $next)
                                                    <div class="chat-img full-width-img">
                                                        <img src="{{isset($message->getSender->image)&&file_exists('storage/'.$message->getSender->image)?asset('storage/'.$message->getSender->image):asset('website/images/avatar.png')}}" class="converted-img" alt="person" />
                                                    </div>
                                                @endif


                                                <div class="chat-bubble">
                                                    <div>
                                                        {{$message->content}}
                                                        <span class="login-time">{{date("h:i A", strtotime($message->created_at))}}</span>

                                                    </div>

                                                </div>



                                            </div>
                                            <!--end chat-conver-->
                                    @endif
                                    @if($message->recevier_id==$receiver_user->id)
                                        <!--start chat-conver-->
                                            <div @if($message->getReceiver->connected==1) class="chat-conver sender_msg active" @else class="chat-conver sender_msg" @endif>
                                                @if($next && $next->recevier_id != $message->recevier_id)
                                                    <div class="chat-img full-width-img">
                                                        <img src="{{isset($message->getReceiver->image)&&file_exists('storage/'.$message->getReceiver->image)?asset('storage/'.$message->getReceiver->image):asset('website/images/avatar.png')}}" class="converted-img" alt="person" />
                                                    </div>
                                                @elseif(! $next)
                                                    <div class="chat-img full-width-img">
                                                        <img src="{{isset($message->getReceiver->image)&&file_exists('storage/'.$message->getReceiver->image)?asset('storage/'.$message->getReceiver->image):asset('website/images/avatar.png')}}" class="converted-img" alt="person" />
                                                    </div>
                                                @endif


                                                <div class="chat-bubble">
                                                    <div>
                                                        {{$message->content}}
                                                        <span class="login-time">{{date("h:i A", strtotime($message->created_at))}}</span>

                                                    </div>

                                                </div>



                                            </div>
                                            <!--end chat-conver-->
                                        @endif




                                    @endforeach
                                @else
                                    <p>لا يوجد رسائل</p>
                                @endif





                            </div>


                            <form action="{{route('sendMsgSeller')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="reciever_id" value="{{isset($receiver_user)?$receiver_user->id:''}}">
                                @if(isset($product)||isset($message))
                                    <input type="hidden" name="product_id" value="{{isset($product)?$product->id:$message->product_id}}">
                                @endif
                                <div class="ch-attch">
                                    <div class="ch-att">
                                    <textarea class="form-control" name="content" id="chat-area"
                                              data-emojiable="true" placeholder="إكتب رسالتك"></textarea>
                                        <div class="up-div">
                                            <input type="file" name="file" id="img-up1">
                                            <label for="img-up1" class="chat-label"><i class="fa fa-link"></i></label>
                                        </div>
                                        <button type="submit" class="custom-btn sm-btn auto-icon"><span>إرسال</span> <i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!--end login-form-grid-->


                    <!--start chat-content-grid-->
                    <div class="col-lg-2 d-lg-block d-none chat-content-grid wow fadeIn">
                        <a  href="{{isset($adv_left)?$adv_left->link:'#'}}">
                            <img src="{{isset($adv_left->image)&&file_exists('storage/'.$adv_left->image)?asset('storage/'.$adv_left->image):asset('website/images/main/banner2.png')}}" alt="banner" />
                        </a>
                    </div>
                    <!--end chat-content-grid-->

                </div>
            </div>
        </div>
    </section>
    <!--end chat-pg-->
@endsection
@section('scripts')
    <script src="{{asset('website/js/config.js')}}"></script>
    <script src="{{asset('website/js/util.js')}}"></script>
    <script src="{{asset('website/js/jquery.emojiarea.js')}}"></script>
    <script src="{{asset('website/js/emoji-picker.js')}}"></script>
    <!-- End emoji-picker JavaScript -->

    <script>
        $(function () {
            // Initializes and creates emoji set from sprite sheet
            window.emojiPicker = new EmojiPicker({
                emojiable_selector: '[data-emojiable=true]',
                assetsPath: '{{asset('website/images/emo')}}',
                popupButtonClasses: 'far fa-smile'
            });
            // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
            // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
            // It can be called as many times as necessary; previously converted input fields will not be converted again
            window.emojiPicker.discover();
        });


        //file-input
        $("#img-up1").on("change", function () {
            var fileNametext = $(this).val().split("\\").pop();
            $(".emoji-wysiwyg-editor").text(fileNametext)

        });

        //chat

        $(".responsive-chat-icon").click(function () {
            $(".chat-content-grid").addClass("active")
        });

        var $winchat = $(window); // or $box parent container
        var $boxchat = $(".responsive-chat-icon,.chat-content-grid");
        $winchat.on("click.Bst", function (event) {
            if (
                $boxchat.has(event.target).length === 0 && //checks if descendants of $box was clicked
                !$boxchat.is(event.target) //checks if the $box itself was clicked
            ) {
                $(".chat-content-grid").removeClass("active")
            }
        });
    </script>
@endsection