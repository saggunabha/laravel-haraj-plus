@extends('admin.layouts.app')

@section('pageTitle', 'لوحة التحكم')


@section('pageSubTitle', 'الرسائل')


@section('content')
<div class=" mages12" >
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
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
            <div id="content-meassages2">
            </div>
            </div>
          </div>

            <div class="col-lg-8">
                    <!-- BEGIN: Content-->
                    <div class="app-content content">
                            <div class="content-overlay"></div>
                            <div class="header-navbar-shadow"></div>
                            <div class="content-wrapper">
                                <div class="content-header row">
                                    <div class="content-header-left col-md-12 col-12 mb-2">
                                        <div class="row breadcrumbs-top">
                                            <div class="col-12">
                                                <div class="breadcrumb-wrapper">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item active"> الرسائل
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-body">
                                <div class="card-body" id="content-meassages">


                                </div>
                                <div class="card-footer main-chat-div">
                                    <form id="chat-form" action="{{route('upload-image-chat')}}" onsubmit="return false;" enctype="multipart/form-data">
                                        @csrf
                                        <div id="typingWithUser" ></div>
                                        <div class="input-group">
                                            <input type="text" name="content" style="border-radius: 30px;" id="file-input" class="form-control input-chat1" placeholder="اكتب رسالتك ..."  autocomplete="off">
                                            <input type="file" name="image" id="image" class="form-control uploud2" accept=".gif, .jpg, .png, .webp">
                                            <label for="image"> <i class="fas fa-file-upload"></i> </label>

                                                <button class="custom-btn sm-btn auto-icon" id="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>

</div>
  

@endsection
@section('scripts')

<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>



<script>

$(document).ready(function () {

    // audioElement = document.createElement('audio');
    // audioElement.setAttribute('src', "{{ asset('confident.mp3') }}");
    
    // audioElement.addEventListener('ended', function() {
    //     this.play();
    // }, false);
    // audioElement.play();

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
// firebase.initializeApp(firebaseConfig)
const db = firebase.firestore();
var auth_id =  '{{ Auth::user()? Auth::user()->id:""}}';
var auth_name =  '{{ Auth::user()? Auth::user()->name:""}}';
var auth_email =  '{{ Auth::user()? Auth::user()->email:""}}';
var auth_image =  '{{ Auth::user()->image? Auth::user()->image:"website/images/main/user.png"}}';
var path1 ='{{asset("storage/")}}';
var path2 ='{{asset("website/images/main/user.png")}}';


function initIdToSide(sId, rId){
     db.collection("users").doc(sId).update({
    'chattingWith' : rId
    });
    db.collection("messages")
    .where("idTo", "==",sId)
    .where('idFrom', "==",rId)
    .where('read', "==", false)
    .get().then(function(querySnapshot) {
        if(querySnapshot.docs.length > 0){
            var docRef = db.collection("users").doc(sId);
            docRef.get().then(function(doc) {
                if (doc.exists) {
                    var unreadcount = doc.data().unReadingCount;
                    db.collection("users").doc(sId).update({
                    'unReadingCount' : unreadcount - querySnapshot.docs.length
                    }).then(function(){
                        for (var i in querySnapshot.docs){
                            db.collection("messages").doc(querySnapshot.docs[i].id).update({
                                'read':true
                            })
                        }
                    });
                } else {

                }
            }).catch(function(error) {

            });



        }
    });
}
var receiver_id = '{{ Request::segment(3) }}';
db.collection("users").doc("userId_"+receiver_id).onSnapshot(function(reciverIds) {

    db.collection("users").doc("userId_"+auth_id).get().then(function(senderIds) {
        if( reciverIds.data().typingTo != null && reciverIds.data().typingTo == senderIds.data().id){

        $('#typingWithUser').html(reciverIds.data().nickname + 'يكتب....');
        }else{
            $('#typingWithUser').html(' ');
        }
    });

});
// get receiver (IdTo)

 db.collection("users").doc("userId_"+receiver_id).get().then(function(reciverId) {
    if (reciverId.exists) {
        // get sender (IdFrom)
        db.collection("users").doc("userId_"+auth_id).get().then(function(senderId) {
            if (senderId.exists) {
    initIdToSide(senderId.data().id ,reciverId.data().id);
    $(window).on('focus', function () {
    initIdToSide(senderId.data().id ,reciverId.data().id);
    });
    // Define an event handler for the window's `blur` event.
    $(window).on('blur', function () {
        db.collection("users").doc(senderId.data().id).update({
        'chattingWith' :null,
        'typingTo':null
        });
    });
    $("#file-input").bind({
            input : function(){

            if($('#file-input').val().trim().length >0){

                db.collection("users").doc(senderId.data().id).update({
                'typingTo':reciverId.data().id
                });
            }else{
                db.collection("users").doc(senderId.data().id).update({
                'typingTo':null
                });
            }
        },

    });

 var user_id = senderId.data().id;
 var sender = user_id.split("_");

        // get all messages
        db.collection("messages").where("idAll", "in", [
            reciverId.data().id + '-' + senderId.data().id,
            senderId.data().id + '-' + reciverId.data().id
        ])
        .orderBy('timestamp')
        .onSnapshot(function(querySnapshot) {

            var str ='';
            var allConersionDate = {};
            for (var i in querySnapshot.docs){
                var class_dir = '';
                var image ='';
                if(querySnapshot.docs[i].data().idTo == reciverId.data().id){
                 class_dir = '';
                image = senderId.data().photoUrl=='website/images/main/user.png'?path2:path1+'/'+senderId.data().photoUrl;
                }else{

                class_dir = '2';
                image=  reciverId.data().photoUrl=='website/images/main/user.png'?path2:path1+'/'+reciverId.data().photoUrl;

                }
                if(querySnapshot.docs[i].data().timestamp['seconds'] != null ){

                const options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric'};
                var d = new Date(querySnapshot.docs[i].data().timestamp['seconds'] * 1000);


                var message_date = d.toLocaleDateString('ar-EG', { year: 'numeric', month: 'long', day: 'numeric'});
                var message_time = d.toLocaleTimeString('ar-EG', {  hour: 'numeric', minute: 'numeric'});

                var isDateExist = message_date in allConersionDate;
                if(!isDateExist){
                    allConersionDate[message_date] = querySnapshot.docs[i].id;
                    str+='<p style="text-align:center">'+message_date+'</p>';
                }


                str+='<div class="chat-conver sub-chat'+class_dir+'">';
                if(i == 0){
                    str+= '<img class="chat-img" src='+image+ ' alt="">';
                }else if(querySnapshot.docs[(querySnapshot.docs.length -i ) -1].data().idFrom != user_id){
                    if((i > 0 && querySnapshot != null && querySnapshot.docs[(querySnapshot.docs.length -i ) -1].data().idFrom != user_id)){
                         str+= '<img class="chat-img" src='+image+ ' alt='+i+'>';
                    } else{
                        str+= '';
                    }

                }else if( querySnapshot.docs[(querySnapshot.docs.length -i ) -1].data().idFrom == user_id){
                    if((i > 0 && querySnapshot != null && querySnapshot.docs[(querySnapshot.docs.length -i ) -1].data().idFrom == user_id)){
                        str+= '<img class="chat-img" src='+image+' alt="">';
                    } else{
                        str+= '';
                    }

                }


                if(querySnapshot.docs[i].data().type == 1 ){
                    str+='<div class="chat-bubble"><div>'+querySnapshot.docs[i].data().content+
                '</div></div>';
                }else{
                    str+='<img class="img-chat" src='+path1+'/'+querySnapshot.docs[i].data().content+'>';
                }
                str+='<span class="time-chat">'+message_time+'</span>';
                str+='</div>';
                }

            }

            $('#content-meassages').html(str);
        });



    document.getElementById("image").onchange = function() {
    var myForm = $("#chat-form")[0];
    var action = $("#chat-form").attr('action');

    $.ajax({

            url: action,
            type: 'post',
            data: new FormData(myForm),
            processData: false,
            contentType: false,

            success: function (data) {
                $('#image').val('');
                $('#file-input').val('');
            //  audioElement.play();
            var read = false;
        if(senderId.data().id == reciverId.data().chattingWith){
            read = true;
        }

        // send message
        db.collection("messages").add({
        'idTo' : reciverId.data().id,
        'idFrom' : senderId.data().id,
        'idAll' : reciverId.data().id + '-' + senderId.data().id,
        'timestamp': firebase.firestore.FieldValue.serverTimestamp(),
        'content': data['data'],
        'type': 2,
        'read' : read
        })
        .then(function(docRef) {
            var docRef = db.collection("users").doc(reciverId.data().id);
            docRef.get().then(function(doc) {
                if (doc.exists) {
                    var unreadcount = doc.data().unReadingCount;
                    if(!read){
                // reciever
                db.collection("users").doc(reciverId.data().id).update({
                    'unReadingCount' : unreadcount + 1,
                    'typingTo':null
                });
            } else{
                db.collection("users").doc(reciverId.data().id).update({
                'typingTo':null
                });
            }   } else {

                }
            }).catch(function(error) {

            });

        })
        .catch(function(error) {
        });
            }
        })


};



$('#chat-form').on('submit',function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
     if($('#image').val() != ''){
        var action = $(this).attr('action');
        var formData = new FormData(this);

        $.ajax({

            url: action,
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,

            success: function (data) {
                $('#image').val('');
                $('#file-input').val('');

            var read = false;
        if(senderId.data().id == reciverId.data().chattingWith){
            read = true;
        }

        // send message
        db.collection("messages").add({
        'idTo' : reciverId.data().id,
        'idFrom' : senderId.data().id,
        'idAll' : reciverId.data().id + '-' + senderId.data().id,
        'timestamp': firebase.firestore.FieldValue.serverTimestamp(),
        'content': data['data'],
        'type': 2,
        'read' : read
        })
        .then(function(docRef) {
            var docRef = db.collection("users").doc(reciverId.data().id);
            docRef.get().then(function(doc) {
                if (doc.exists) {

                    var unreadcount = doc.data().unReadingCount;


                if(!read){
                // reciever
                db.collection("users").doc(reciverId.data().id).update({
                    'unReadingCount' : unreadcount + 1,
                    'typingTo':null
                });
            } else{
                db.collection("users").doc(reciverId.data().id).update({
                'typingTo':null
                });
            }   } else {

                }
            }).catch(function(error) {

            });

        })
        .catch(function(error) {

        });
            }
        })
     } else if ($('#file-input').val().trim().length >0){
        var content = $('#file-input').val();
        var read = false;
        if(senderId.data().id == reciverId.data().chattingWith){
            read = true;
        }

        // send message
        db.collection("messages").add({
        'idTo' : reciverId.data().id,
        'idFrom' : senderId.data().id,
        'idAll' : reciverId.data().id + '-' + senderId.data().id,
        'timestamp': firebase.firestore.FieldValue.serverTimestamp(),
        'content': content,
        'type': 1,
        'read' : read
        })
        .then(function(docRef) {
            $('#file-input').val('');
            var docRef = db.collection("users").doc(reciverId.data().id);
            docRef.get().then(function(doc) {
                if (doc.exists) {

                    var unreadcount = doc.data().unReadingCount;
                if(!read){
                // reciever
                db.collection("users").doc(reciverId.data().id).update({
                    'unReadingCount' : unreadcount + 1,
                    'typingTo':null
                });
            } else{
                db.collection("users").doc(reciverId.data().id).update({
                'typingTo':null
                });
            }   } else {

                }
            }).catch(function(error) {

            });

        })
        .catch(function(error) {

        });
     }


    });

    }else{
            // if reciever not exists at firebase
            window.history.back();
        }
    }).catch(function(error) {

    });

    } else {
        // if reciever not exists at firebase
        window.history.back();
    }
}).catch(function(error) {

});






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
                    str += '<div style="padding-top: 1.5rem; padding-bottom: 1.5rem">' +
                        'لا يوجد محادثات' +
                        '</div>';
                    $('#content-meassages2').html(str);
                } else {
                    var str = '';
                    str += '<div>' +
                        '<div>' +
                        '<ul class="list-unstyled  chat-users">';
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
                        str += ' <li>' +
                            '<a href="#" class="chat_user_id" data-id="' + user_receiver +
                            '">' +
                            '<div class="full-width-img chat-img" style="background-image:url(' + img_user + ')">' +
                            '</div>' +
                            '<div class="side-contact-chat">' +
                            '<h3>' + message.nickname  +'</h3>' +
                            '<span class="login-time">'  + message.date + '</span>';
                        // console.log(count);
                        if (count.length > 0) {
                            str += '<span>' + count.length + '</span>';
                        }
                        str += '<p>' +
                            message.content +
                            '</p>' +
                            '</div>' +
                            '</a>' +
                            '</li>';
                    });
                    str += '</ul>' +
                        '</div>' +
                        '</div>';
                    $('#content-meassages2').html(str);
                    i++;
                }
            });
    });

});

$(document).on('click', '.chat_user_id', function(e) {
    e.preventDefault();
    var user_id = $(this).attr("data-id");
    window.location.href = "https://haraj-plus.sa/admin/chat/" + user_id;
    


});
</script>
@endsection
