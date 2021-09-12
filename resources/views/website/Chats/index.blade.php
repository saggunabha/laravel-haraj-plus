@extends('website.layouts.app')

@section('content')
<!-- start chat-pg !-->
<section class="order-div page-order-div test-1" >
    <div class="chat-pg  margin-div responsive-margin-div">
        <div class="container">
            <div class="row">
                <!--start chat-content-grid-->
                <div class="col-xl-9 col-lg-9">
                    <!--start chat-content-list-->
                    <div class="chat-content-list">
                        <h2 class="chat-head text-center">المحادثات</h2>
                        <!--start search-form-->
                        <form class="needs-validation text-center" onsubmit="return false;" id="search"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="chat-search">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="txt_search" id="filter-input"
                                        placeholder="البحث في  المحادثات" required />
                                    <div class="invalid-feedback">
                                        من فضلك أدخل كلمات بحث صحيحة
                                    </div>
                                    <button type="submit" class="pos-search-btn"><i class="fa fa-search"></i></button>

                                </div>
                            </div>
                        </form>
                        <!--end search-form-->
                        <div id="content-meassages">
                        </div>
                    
                    </div>
                </div>
                <div class="col-lg-3 d-lg-block d-none chat-content-grid wow fadeIn text-left-dir">
                        <a href="{{isset($adv_left)?$adv_left->link:'#'}}">
                            <img src="{{isset($adv_left->image)&&file_exists('storage/'.$adv_left->image)?asset('storage/'.$adv_left->image):asset('website/images/main/banner2.png')}}" alt="banner" />
                        </a>
                </div>
            </div>
        </div>
</section>
<!--end chat-pg-->
@endsection
@section('scripts')

<!-- End emoji-picker JavaScript -->



<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
<script>
$(document).ready(function() {

    function searchPeerId(nameKey, myArray) {
        for (var i = 0; i < myArray.length; i++) {
            if (myArray[i].userId === nameKey) {
                return myArray[i];
            }
        }
    }

    function getYearString(year, user_lang) {
        var numbers = [];
        if (user_lang == true) {
            numbers = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        } else {
            numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '٨', '9'];
        }
        var newYearList = year.toString().split('', year);
        var newYearString = '';
        newYearList.forEach(yy => {
            newYearString += numbers[yy];
        });
        return newYearString;
    }

    function getDayString(day, user_lang) {
        if (user_lang == true) {
            var days = ['١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩', '١٠', '١١', '١٢', '١٣', '١٤', '١٥', '١٦',
                '١٧', '١٨', '١٩', '٢٠', '٢١', '٢٢', '٢٣', '٢٤', '٢٥', '٢٦', '٢٧', '٢٨', '٢٩', '٣٠', '٣١',
            ];
            return days[day];
        } else {
            var daysEn = ['1', '2', '3', '4', '5', '6', '7', '٨', '9', '10', '11', '12', '13', '14', '15', '16',
                '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31',
            ];
            return daysEn[day];
        }
    }

    function getMonthSring(month, user_lang) {
        if (user_lang == true) {
            var months = ["يناير", "فبراير", "مارس", "إبريل", "مايو", "يونيو",
                "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
            ];
            return months[month];
        } else {
            const monthEn = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            return monthEn[month];
        }
    }

    function getDateValue(timestamp) {
        const dat = new Date(timestamp.seconds * 1000);
        var month = dat.getUTCMonth(); //months from 1-12
        var day = dat.getUTCDate();
        var year = dat.getUTCFullYear();
        var user_lang = '{{auth()->user()->lang=='ar'}}';
        var newdate = '';
        if (user_lang == true) {
            newdate = getDayString(day, user_lang) + " " + getMonthSring(month, user_lang) + ' ' +
                getYearString(year, user_lang);
        } else {
            newdate = getYearString(year, user_lang) + " " + getMonthSring(month, user_lang) + " " +
                getDayString(day, user_lang);
        }
        return newdate;

    }

    function getDateAllValue(timestamp) {
        const dat = new Date(timestamp.seconds * 1000);
        return dat;
    }

    function getContentValue(content, typee) {
        var user_lang = '{{auth()->user()->lang=='
        ar '}}';
        var newContent = '';
        if (typee == 1) {
            newContent = content;
        } else if (typee == 2) {
            if (user_lang == true) {
                newContent = 'صورة';
            } else {
                newContent = 'Image';
            }
        } else if (typee == 3) {
            if (user_lang == true) {
                if (content == 'refuse') {
                    newContent = 'رفض مكالمة فيديو';
                } else {
                    newContent = 'مكالمة فيديو';
                }
            } else {
                if (content == 'refuse') {
                    newContent = 'Rejected a video call';
                } else {
                    newContent = 'Video call';
                }
            }
        } else if (typee == 4) {
            if (user_lang == true) {
                if (content == 'refuse') {
                    newContent = 'رفض مكالمة صوت';
                } else {
                    newContent = 'مكالمة صوت';
                }
            } else {
                if (content == 'refuse') {
                    newContent = 'Rejected a video call';
                } else {
                    newContent = 'Voice  call';
                }
            }
        }
        return newContent;
    }

    const firebaseConfig = {
        apiKey: "AIzaSyBeRPwLmr6bY4J5Pq1gNf_tI3nnm2G0bOg",
        authDomain: "haraj-plus-1ae1f.firebaseapp.com",
        databaseURL: "https://haraj-plus-1ae1f.firebaseio.com",
        projectId: "haraj-plus-1ae1f",
        storageBucket: "haraj-plus-1ae1f.appspot.com",
        messagingSenderId: "944069048567",
        appId: "1:944069048567:web:24a0998287fb5dc41f3bf2",
        measurementId: "G-FM4ND7G4JQ"
    };
    if (firebase.apps.length === 0) {
        firebase.initializeApp(firebaseConfig);
    }

    const db = firebase.firestore();
    var auth_id = '{{ Auth::user()? Auth::user()->id:""}}';
    var auth_name = '{{ Auth::user()? Auth::user()->name:''}}';
    var auth_email = '{{ Auth::user()? Auth::user()->email:""}}';
    var auth_image = '{{ Auth::user()? Auth::user()->image:""}}';
    var path1 ='{{asset("storage/")}}';
    var path2 = '{{asset("/website/images/main/user.png")}}';

    var allChatUsersList1 = [];
    var allMessagesList = [];
    var allMessagesListReadCount = [];


    db.collection("users").orderBy("createdAt", "desc")
        .onSnapshot(function(querySnapshot) {

            allChatUsersList1 = [];
            querySnapshot.forEach(function(doc) {
                if (doc.data().id != "userId" + auth_id) {
                    var newPhoto = '';
                    if (doc.data().photoUrl.includes('http')) {
                        newPhoto = doc.data().photoUrl;
                    } else {
                        newPhoto = '{{config('
                        app.url ')}}' + '/' + doc.data().photoUrl;
                    }
                    allChatUsersList1.push({
                        'nickname': doc.data().nickname,
                        'photoUrl': newPhoto,
                        'userId': doc.data().id,
                        'status': doc.data().status,
                        'lastSeen': doc.data().lastSeen,
                        'typingTo': doc.data().typingTo,
                    });
                }
            });


            var i = 0;

            db.collection("messages").orderBy("timestamp", "asc")
                .onSnapshot(function(querySnapshot) {
                    querySnapshot.forEach(function(doc) {

                        const myId = "userId_" + auth_id;
                        if (doc.data().idAll.includes("userId_" + auth_id)) {
                            var peerId = doc.data().idAll.replace('-', '').replace(myId, '');
                            var peerData = searchPeerId(peerId, allChatUsersList1);
                            const userMesIndex = allMessagesList.findIndex(user => user
                                .userId === peerId);
                            if (userMesIndex === -1) {
                                allMessagesList.push({
                                    'userId': peerId,
                                    'nickname': peerData.nickname,
                                    'userPhoto': peerData.photoUrl,
                                    'content': getContentValue(doc.data().content, doc
                                        .data().type),
                                    'date': getDateValue(doc.data().timestamp),
                                    'allData': getDateAllValue(doc.data().timestamp)
                                });
                                allMessagesListReadCount.push({
                                    'userId': peerId,
                                    'messageId': doc.id,
                                    'status': doc.data().idTo == myId ? doc.data()
                                        .read : true
                                });
                            } else {
                                const allMessagesListReadCountIndex = allMessagesListReadCount
                                    .findIndex(count => count.messageId === doc.id);
                                if (allMessagesListReadCountIndex === -1) {
                                    allMessagesListReadCount.push({
                                        'userId': peerId,
                                        'messageId': doc.id,
                                        'status': doc.data().idTo == myId ? doc.data()
                                            .read : true
                                    });
                                } else {
                                    const olduserId = allMessagesListReadCount[
                                        allMessagesListReadCountIndex].userId;
                                    const olduserMessageId = allMessagesListReadCount[
                                        allMessagesListReadCountIndex].messageId;
                                    allMessagesListReadCount[allMessagesListReadCountIndex] = {
                                        'userId': olduserId,
                                        'messageId': olduserMessageId,
                                        'status': doc.data().idTo == myId ? doc.data()
                                            .read : true
                                    }
                                }

                                allMessagesList[userMesIndex] = {
                                    'userId': peerId,
                                    'nickname': peerData.nickname,
                                    'userPhoto': peerData.photoUrl,
                                    'content': getContentValue(doc.data().content, doc
                                    .data().type),
                                    'date': getDateValue(doc.data().timestamp),
                                    'allData': getDateAllValue(doc.data().timestamp)
                                };
                            }
                        }
                        allMessagesList.sort(function(a, b) {
                            return new Date(b.allData) - new Date(a.allData);
                        });
                    });

                    if (allMessagesList.length == 0) {
                        var str = '';
                        str += '<div style="padding-top: 1.5rem; padding-bottom: 1.5rem; text-align:center">' +
                            'لا يوجد محادثات' +
                            '</div>';
                        $('#content-meassages').html(str);
                    } else {
                        var str = '';
                        str += '<div>' +
                            '<div>' +
                            '<ul>';
                        allMessagesList.forEach(function(message) {
                            var count = allMessagesListReadCount.filter(mess => mess.userId ===
                                message.userId && mess.status === false);
                            var img_user = '';
                            if (message.userPhoto.includes("website/images/main/user.png")) {
                                img_user += message.userPhoto;
                            } else {
                                img_user += message.userPhoto.includes("storage/") ? message
                                    .userPhoto : message.userPhoto.replace('{{config('
                                        app.url ')}}', '{{config('
                                        app.url ')}}' + '/storage');

                            }
                            var user = message.userId.split('_');
                            var user_receiver = user[1];
                            str += ' <li class="main-chat-div">' +
                                '<a href="#" class="chat_user_id" data-id="' + user_receiver +
                                '">' +
                                '<div class="img-chat-main">' +
                                '<img class="round" height="80" width="80"  src=' + img_user +
                                ' alt="" />' +
                                '</div>' +
                                '<div class="text-chat-main">' +
                                '<h6>' + message.nickname + '</h6>';
                            // console.log(count);
                            if (count.length > 0) {
                                str += '<span>' + count.length + '</span>';
                            }
                            str += '<p>' +
                                message.content +
                                '</p>' +
                                '</div>' +
                                '<div class="date">' +
                                '<p>' + message.date + '</p>' +
                                '</div>' +
                                '</a>' +
                                '</li>';
                        });
                        str += '</ul>' +
                            '</div>' +
                            '</div>';
                        $('#content-meassages').html(str);
                        i++;
                    }
                });
        });



});

$(document).on('click', '.chat_user_id', function(e) {
    e.preventDefault();
    var user_id = $(this).attr("data-id");
    window.location.replace("/chat/" + user_id);
    


});
</script>
<!-- asmaa -->


@endsection