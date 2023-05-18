@extends('layouts.web.app')

    <style>
        html {
            height: 100%;
            margin: 0;
        }

        .chat {
            margin-top: auto;
            margin-bottom: auto;
        }

        .card {
            height: 600px;
            border-radius: 15px !important;
            background-color: rgba(0, 0, 0, 0.4) !important;
        }

        .msg_card_body {
            overflow-y: auto;
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
            border-bottom: 0 !important;
        }

        .card-footer {
            border-radius: 0 0 15px 15px !important;
            border-top: 0 !important;
        }

        .type_msg {
            width: 700px;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            border-radius: 15px !important;
            color: white !important;
            height: 60px !important;
            overflow-y: auto;
        }

        .type_msg:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .attach_btn {
            width: 65px;
            border-radius: 15px !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            cursor: pointer;
            margin-left: 10px;
        }

        .send_btn {
            width:65px ;
            margin-right: 10px;
            border-radius: 15px !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .user_img {
            height: 60px;
            width: 60px;
            border: 1.5px solid #f5f6fa;
        }

        .user_img_msg {
            height: 40px;
            width: 40px;
            border: 1.5px solid #f5f6fa;
        }

        .img_cont {
            position: relative;
            height: 70px;
            width: 70px;
            margin-right: 20px;
        }

        .img_cont_msg {
            height: 40px;
            width: 40px;
        }

        .online_icon {
            position: absolute;
            height: 15px;
            width: 15px;
            background-color: #4cd137;
            border-radius: 50%;
            bottom: 8px;
            right: 8px;
            border: 1.5px solid white;
        }

        .offline {
            background-color: #c23616 !important;
        }

        .user_info {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 15px;
        }

        .user_info span {
            font-size: 20px;
            color: white;
        }

        .user_info p {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.6);
        }

        .video_cam {
            position: absolute;
            left: 50px;
            margin-top: 20px;
        }

        .video_cam span {
            color: white;
            font-size: 20px;
            cursor: pointer;
            margin-right: 20px;
        }

        .msg_cotainer {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 10px;
            border-radius: 25px;
            background-color: #82ccdd;
            padding: 10px;
            position: relative;
        }

        .msg_cotainer_send {
            margin-top: auto;
            margin-bottom: auto;
            margin-right: 10px;
            border-radius: 25px;
            background-color: #78e08f;
            padding: 10px;
            position: relative;
        }

        .msg_time {
            position: absolute;
            left: 0;
            bottom: -15px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 10px;
        }

        .msg_time_send {
            position: absolute;
            right: 0;
            bottom: -15px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 10px;
        }

        .msg_head {
            position: relative;
        }

        #action_menu_btn {
            position: absolute;
            right: 15px;
            top: 25px;
            color: white;
            cursor: pointer;
            font-size: 20px;
        }

        .action_menu {
            z-index: 1;
            position: absolute;
            padding: 15px 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border-radius: 15px;
            top: 30px;
            right: 15px;
            display: none;
        }

        .action_menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .action_menu ul li {
            width: 100%;
            padding: 10px 15px;
            margin-bottom: 5px;
        }

        .action_menu ul li i {
            padding-right: 10px;
        }

        .action_menu ul li:hover {
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.2);
        }


        /* width */

        ::-webkit-scrollbar {
            width: 10px;
        }


        /* Track */

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }


        /* Handle */

        ::-webkit-scrollbar-thumb {
            background: #888;
        }


        /* Handle on hover */

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        @media(max-width: 576px) {
            .contacts_card {
                margin-bottom: 15px !important;
            }
        }
    </style>

@section('site_content')
{{--          ============================================= -->--}}
<section id="tabs-1" class="pb-5 tabs-section division">
    <div class="container">
        <!-- TABS NAVIGATION -->
        <div id="tabs-nav" class="list-group text-center">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <!-- TAB-1 LINK -->
                <li class="nav-item icon-xs mb-2" >
                    <a class="nav-link active" id="tab1-list" data-toggle="pill" href="#tab-1" role="tab" aria-controls="tab-1"
                       aria-selected="true" >
                        <span class="flaticon-083-stethoscope"></span> مراسلة @if(auth()->check())الدكتور @else المريض @endif
                    </a>
                </li>
                <!-- TAB-2 LINK -->
                <li class="nav-item icon-xs mb-2" >
                    <a class="nav-link" id="tab2-list" data-toggle="pill" href="#tab-2" role="tab" aria-controls="tab-2"
                       aria-selected="false">
                        <span class="flaticon-005-blood-donation-3"></span>متابعة مع @if(auth()->check())الدكتور @else المريض @endif
                    </a>
                </li>

            </ul>
        </div> <!-- END TABS NAVIGATION -->
        <!-- TABS CONTENT -->
        <div class="tab-content p-0" id="pills-tabContent">
            <!-- TAB-1 CONTENT -->
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1-list">
                <section class="contact-section ">
                    <div class="row justify-content-center h-100">
                        <div class="col-md-10 col-xl-10 chat">
                            <div class="card">
                                <div class="card-header msg_head">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont" >
                                            <img src="{{$reservation->doctor?$reservation->doctor->image:''}}" class="rounded-circle user_img">
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>{{$reservation->doctor?$reservation->doctor->name:''}}</span>
                                            <p>نشط الأن</p>
                                        </div>
{{--                                        @if(doctor()->check())--}}
{{--                                            <div class="video_cam" >--}}
{{--    --}}{{--                                            <a></a>--}}
{{--                                                <a href="tel: +201004834728" ><i class="fas fa-phone"></i></a>--}}
{{--    --}}{{--                                            <span><i class="fas fa-video"></i></span>--}}

{{--                                            </div>--}}
{{--                                        @endif--}}
                                    </div>
{{--                                    <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>--}}
{{--                                    <div class="action_menu">--}}
{{--                                        <ul>--}}
{{--                                            <li><i class="fas fa-user-circle"></i> View profile</li>--}}
{{--                                            <li><i class="fas fa-users"></i> Add to close friends</li>--}}
{{--                                            <li><i class="fas fa-plus"></i> Add to group</li>--}}
{{--                                            <li><i class="fas fa-ban"></i> Block</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="card-body msg_card_body">
                                    @foreach($reservation->chats as $chat)

                                    <div class="d-flex justify-content-{{$chat->sender_type=='doctor'?'end':'start'}} mb-4 ">
                                        @if($chat->sender_type == 'doctor')

                                            <div class="msg_cotainer_send">
                                                {{$chat->message}}
                                                <span class="msg_time_send" style="min-width: 102px!important;"> {{date('Y-m-d  h:i A',strtotime($chat->created_at))}}</span>
                                            </div>
                                            <div class="img_cont_msg" >
                                                <img src="{{$reservation->doctor?$reservation->doctor->image:url('Web').'\img\doctors\doctor13.png'}}" class="rounded-circle user_img_msg">
                                            </div>
                                        @else
                                            <div class="img_cont_msg">
                                                <img src="{{url('Web')}}\img\users-photo\user-default.jpg" class="rounded-circle user_img_msg">
                                            </div>
                                            <div class="msg_cotainer">
                                                {{$chat->message}}
                                                <span class="msg_time" style="right: 0;min-width: 102px!important;">{{date('Y-m-d ',strtotime($chat->created_at))}} &nbsp; {{date('h:i A',strtotime($chat->created_at))}}</span>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                                </div>
                                <form id="message_form" method="post" action="{{route('send_chat')}}" enctype="application/x-www-form-urlencoded">
                                    @csrf
                                        <div class="card-footer">
                                            <div class="input-group">


                                                {{--                                        <div class="input-group-append">--}}
        {{--                                            <span class="input-group-text attach_btn"><i class="fas fa-paperclip" style="margin-right: 13px"></i></span>--}}
        {{--                                        </div>--}}
                                                <textarea name="message" class="form-control type_msg" placeholder="اكتب رسالتك..."></textarea>
                                                <div class="input-group-append">
                                                    <button type="submit" class="input-group-text send_btn"><i class="fas fa-location-arrow" style="margin-right: 13px"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </section>
            </div> <!-- END TAB-1 CONTENT -->
            <!-- TAB-2 CONTENT -->
            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2-list">
                <section class="contact-section ">
                    <div class="container">
                        <div class="row my-5">
                            <div class="col-lg-12 left-contact-col">
                                <div class="contact-area">
                                    <div style="margin-right: 15px" class="contact-content" >
                                        <h3>متابعة حالة المريض</h3>
                                    </div>
                                    <div class="contact-form">
                                        @if(auth()->check())
                                            <form id="form" action="{{route('store_following')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$reservation->id}}" name="reservation_id">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="temp" id="temp" class="form-control numbersOnly"
                                                               placeholder="ادخل درجة الحرارة">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="heart" id="heart"
                                                               class="form-control numbersOnly" placeholder="ادخل مقياس نبض القلب">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                      <textarea name="message" class="form-control" id="message" cols="30" rows="6"
                                                                data-error="Write your message" placeholder="اكتب ما تشعر به"></textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="send-btn">
                                                        <button type="submit" class="default-btn">
                                                            إرسال إلي الطبيب
                                                            <i class="flaticon-right"></i>
                                                            <span></span>
                                                        </button>
                                                    </div>
                                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </form>
                                        @else
                                            @foreach($reservation->follows as $follow)
                                                <div class="badge badge-light text-danger col-12 text-center" style="font-size: 15px;display:inline-block ">
                                                    {{date('Y-m-d ',strtotime($follow->created_at))}} &nbsp; {{date('h:i A',strtotime($follow->created_at))}}
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <h5 class="col-5" style="display: inline-block">درجة الحرارة</h5>
                                                        <div class="col-6" style="display: inline-block">{{$follow->temp}}</div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <h5 class="col-5" style="display: inline-block">الضغط</h5>
                                                        <div class="col-6" style="display: inline-block">{{$follow->heart}}</div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="col-5" style="display: inline-block">ملاحظات</h5>
                                                        <div class="col-6" style="display: inline-block">{{$follow->message}}</div>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div> <!-- END TAB-2 CONTENT -->
            <!-- TAB-3 CONTENT -->
        </div> <!-- END TABS CONTENT -->
    </div> <!-- End container -->
</section> <!-- END TABS-1 -->
@endsection

@push('web_js')
<script>
    $(document).ready(function(){
        $('#action_menu_btn').click(function(){
            $('.action_menu').toggle();
        });
        $(".msg_card_body").animate({ scrollTop: $('.msg_card_body').prop("scrollHeight")}, 1000);
{{--        alert('reservation_chat'+'{{(string)$reservation->id}}')--}}
//         var url = location.href;
{{--        alert(url + '{{url('following')}}'+ '{{$reservation->id}}');--}}
        // alert(url);

    });
</script>

<script>
    $(document).on('submit',"#message_form",function (e) {
        e.preventDefault();
        // alert(1)
        var message = $('.type_msg').val();
        var reservation_id = '{{$reservation->id}}'
        var formData = new FormData(this);
        formData.append('reservation_id', reservation_id);
        if (message == ''){
            my_toaster('اكتب رسالتك','error')
        }
        else {
            $.ajax({
                url: '{{route("send_chat")}}',
                type: 'POST',
                data: formData,
                beforeSend: function () {
                    $('#global-loader').show()
                },
                success: function (data) {

                    window.setTimeout(function () {
                        $('#global-loader').hide()
                        $('#submit').attr('disabled', false);

                        if (data.success === 'true') {
                            // alert(1)
                            $("#message_form")[0].reset();
                            var html_user_content = '';

                            if ('{{auth()->check()}}'){
                                html_user_content = `
                            <div class="d-flex justify-content-start mb-4 ">
                                <div class="img_cont_msg">
                                    <img src="{{url('Web')}}/img/users-photo/user-default.jpg" class="rounded-circle user_img_msg">
                                </div>
                                <div class="msg_cotainer">${message}
                                    <span class="msg_time" style="right: 0;min-width: 102px!important;"> {{date('Y-m-d ')}} &nbsp; {{date('H:i A ')}} </span>
                                </div>
                            </div>`;
                            }else {
                                html_user_content = `
                            <div class="d-flex justify-content-end mb-4 ">
                                <div class="msg_cotainer_send">${message}
                                    <span class="msg_time_send" style="min-width: 102px!important;"> {{date('Y-m-d ')}} &nbsp; {{date('H:i A ')}} </span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="{{$reservation->doctor?$reservation->doctor->image:url('Web').'\img\doctors\doctor13.png'}}" class="rounded-circle user_img_msg">
                                </div>
                            </div>`;
                            }
                            $('.msg_card_body').append( html_user_content);
                            $(".msg_card_body").animate({ scrollTop: $('.msg_card_body').prop("scrollHeight")}, 1000);

                        }else {
                            var messages = Object.values(data.messages);
                            $( messages ).each(function(index, message ) {
                                my_toaster(message,'error')
                            });
                        }
                    }, 100);

                },
                error: function (data) {
                    $('#global-loader').hide()
                    $('#form-load > .linear-background').hide(loader)
                    $('#submit').html('حفظ').attr('disabled', false);
                    $('#form').show()
                    console.log(data)
                    if (data.status === 500) {
                        my_toaster('هناك خطأ ما','error')
                    }

                    if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);

                        $.each(errors, function (key, value) {
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    my_toaster(value,'error')
                                });

                            }
                        });
                    }
                    if (data.status == 421){
                        my_toaster(data.message,'error')
                    }

                },//end error method

                cache: false,
                contentType: false,
                processData: false
            });
        }
    });

</script>

    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     alert('1')
        // });
        // Initiate the Pusher JS library
        Pusher.logToConsole = true;
        var pusher = new Pusher('f3b4db1b634ad8e962d8', {
            encrypted: true,
            cluster: 'eu'
        });

        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('reservation_chat'+'{{(string)$reservation->id}}');

        // Bind a function to a Event (the full Laravel class)
        channel.bind('reservation_chat_bind', function(data) {
            // this is called when the event notification is received...
            var html_user_content = '';
            if ('{{auth()->check()}}' && data.sender_type == 'doctor'){
                html_user_content = `
                    <div class="d-flex justify-content-end mb-4 ">
                        <div class="msg_cotainer_send">${data.message}
                            <span class="msg_time_send" style="min-width: 102px!important;"> {{date('Y-m-d ')}} &nbsp; {{date('H:i A ')}} </span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="{{$reservation->doctor?$reservation->doctor->image:url('Web').'\img\doctors\doctor13.png'}}" class="rounded-circle user_img_msg">
                        </div>
                    </div>`;
            }if ('{{doctor()->check()}}' && data.sender_type == 'user'){
                html_user_content = `
                    <div class="d-flex justify-content-start mb-4 ">
                        <div class="img_cont_msg">
                            <img src="{{url('Web')}}/img/users-photo/user-default.jpg" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">${data.message}
                            <span class="msg_time" style="right: 0;min-width: 102px!important;"> {{date('Y-m-d ')}} &nbsp; {{date('H:i A ')}} </span>
                        </div>
                    </div>`;
            }
            $('.msg_card_body').append( html_user_content);
            $(".msg_card_body").animate({ scrollTop: $('.msg_card_body').prop("scrollHeight")}, 1000);

        });
    </script>
@endpush
