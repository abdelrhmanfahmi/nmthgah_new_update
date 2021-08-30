<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
    .loginco{
        z-index:1;
    }
        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        
        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        }
        
        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }
        
        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes scale {
            0%, 100% {
                transform: none;
            }
            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }
        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142;
            }
        }
        
        @keyframes floating {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(10px);
        }
        100% {
            transform: translateY(0px);
        }
        }
    
        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }
    
        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }
        
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }
    
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    
    
        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }
    
        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }
        .option-heading:hover {
        color: #15bdce;
    }.option-heading:before           { content: "\f063";
                 font-family: FontAwesome;
                 color: #15bdce;}
    .option-heading.is-active:before { content: "\f062";
        font-family: FontAwesome;}

    /* Helpers */
    .is-hidden { display: none; }
    .lds-hourglass {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-roller {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;

    }
    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;
        color:#1BA590;
    }
    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #1BA590;
        margin: -4px 0 0 -4px;

    }
    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }
    .lds-roller div:nth-child(1):after {
        top: 63px;
        left: 63px;
    }
    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }
    .lds-roller div:nth-child(2):after {
        top: 68px;
        left: 56px;
    }
    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }
    .lds-roller div:nth-child(3):after {
        top: 71px;
        left: 48px;
    }
    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }
    .lds-roller div:nth-child(4):after {
        top: 72px;
        left: 40px;
    }
    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }
    .lds-roller div:nth-child(5):after {
        top: 71px;
        left: 32px;
    }
    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }
    .lds-roller div:nth-child(6):after {
        top: 68px;
        left: 24px;
    }
    .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
    }
    .lds-roller div:nth-child(7):after {
        top: 63px;
        left: 17px;
    }
    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }
    .lds-roller div:nth-child(8):after {
        top: 56px;
        left: 12px;
    }
    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    </style>
</head>
<div id="app">
    <section class="login-page">
        <div class="container">
            <nav>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <a id="mainPage-project-manager7" href="/project"><i style="margin-left:10px;" class="fa fa-home"></i> الرئيسية </a>
            <a id="logout-project-manager7" href="{{route('project.logout')}}">تسجيل خروج <i class="fas fa-sign-out-alt"></i></a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            </nav>
            <div class="loginco">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 resize">
                        <div class="project-manager7">
                            
                            <nav id="sidebar6">
                                    <div class="sidebar-header">
                                        <h3>{{Session::get('waqf_name')}}</h3>
                                    </div>
                            
                                    <ul class="list-unstyled components" id="sidebars">
                                        <li class="btnss">
                                            <a href="/showMainPageProjectManager/{{Session::get('projectos_ids')}}/{{Session::get('id')}}">تفاصيل المشروع</a>
                                        </li>
                                        
                                        <li class="btnss">
                                            <a href="/pillarsProjectManager/{{Session::get('projectos_ids')}}/{{Session::get('id')}}">أركان المشروع</a>
                                        </li>
                                        <li class="btnss">
                                            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">إعادة التقييم</a>
                                            <ul class="collapse list-unstyled" id="pageSubmenu">
                                                @foreach($getPillarsOfProjectManager as $manage)
                                                    <li>
                                                        <a href="/reEvaluationForPillar/{{Session::get('projectos_ids')}}/{{Session::get('id')}}/{{$manage->id}}">{{$manage->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="btnss">
                                            <a href="/filesProjectManager/{{Session::get('projectos_ids')}}/{{Session::get('id')}}">ملفات المشروع</a>
                                        </li>
                                        <li class="btnss active">
                                            <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">المراسلات</a>
                                            <ul class="collapse list-unstyled" id="pageSubmenu1">
                                                <li>
                                                    <a href="/getMessagesAdminToProjectV/{{Session::get('projectos_ids')}}/{{Session::get('id')}}/{{auth()->guard('manager')->user()->id}}">رسائل الادارة</a>
                                                </li>
                                                @foreach($getPillarsOfProjectManager as $manage)
                                                    <li>
                                                        <a href="/getMessagesProjectConsultants/{{Session::get('projectos_ids')}}/{{$manage->consultant_id}}/{{$manage->id}}">{{$manage->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                         <li>
                                            <a></a>
                                        </li>
                                         <li>
                                            <a></a>
                                        </li>
                                         <li>
                                            <a></a>
                                        </li>
                                        <li class="btnProjectManager7">
                                            <button id="sendProjectToAdmin">إرسال المشروع</button>
                                        </li>
                                    </ul>
                                </nav>
                                <h4 class="detail-project-manager7">مدير الادارة {{Session::get('adminName')}}</h4>
                                <div class="col-md-12 containersManager7">
                                    @if(count($inboxMessageProjectToAdmins) > 0)
                                    @foreach($inboxMessageProjectToAdmins as $msg)
                                    @if($msg->isAdmin == 1)
                                    <div class="messagesManager7">
                                        <img src="{{asset('assets/images/Group 3291.png')}}" alt="Avatar" class="imgAdmin" style="width:100%;">
                                        <!--<p>اهلا بك في نمذجة .. يمكنك ترك رسالتك وسوف نقوم بالرد عليك في أقرب وقت ممكن<span class="time-left">11:03pm|2020/06/21</span></p>-->
                                        @if($msg->message != null)
                                        <p>{{$msg->message}} <span class="time-right">{{$msg->created_at}}</span></p>
                                        @else
                                        
                                        @endif
                                        
                                        @if($msg->files != null)
                                        @if(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pdf')
                                            <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="secondDownAdmin far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan2Admin">تحميل</span> <p class="pSecondMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><embed class="imgRightMessages2" src="{{asset('uploads/' . $msg->files)}}" /> </a> <span class="time-right">{{$msg->created_at}}</span></p>
                                        @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'docx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'doc')
                                            <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessagesAdmin far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1Admin">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/wordForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pptx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'ppt')
                                            <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessagesAdmin far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1Admin">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/pptxForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @else
                                            <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessagesAdmin far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1Admin">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('uploads/' . $msg->files)}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @endif
                                        @else
                                        
                                        @endif
                                    </div>
                                    @else
                                    <div class="messagesManager7 darkerMessagesManager7">
                                        <img src="{{asset('assets/images/Group 3292.png')}}" alt="Avatar" class="right imgUser" style="width:100%;">
                                        @if($msg->message != null)
                                        <p>{{$msg->message}} <span class="time-right">{{$msg->created_at}}</span></p>
                                        @else
                                        
                                        @endif
                                        
                                        
                                        @if($msg->files != null)
                                        @if(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pdf')
                                            <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="secondDown far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan2">تحميل</span> <p class="pSecondMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><embed class="imgRightMessages2" src="{{asset('uploads/' . $msg->files)}}" /> </a> <span class="time-right">{{$msg->created_at}}</span></p>
                                        @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'docx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'doc')
                                            <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessages far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/wordForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pptx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'ppt')
                                            <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessages far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/pptxForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @else
                                            <a href="/downloadImageProjectManager/{{$msg->id}}"> <i class="firstDownMessages far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1">تحميل</span> <p class="pFirstMessages"><a href="/showImageProjectManager/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('uploads/' . $msg->files)}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @endif
                                        @else
                                        
                                        @endif
                                    </div>
                                    @endif
                                    @endforeach
                                    @else
                                    
                                    @endif
                                    
                                </div>
                            
                            <div class="row allformsInOne">
                                <div class="col-md-12 textareaMessageManager7">
                                    <form action="{{route('ProjectStoreMsg')}}" method="POST">
                                        @csrf
                                        <!--<img src="{{asset('assets/images/ic_send_24px.png')}}" class="img2">-->
                                        <textarea name="message" id="textareaMessageId" class="form-control" wrap="physical" cols="70" rows="50" placeholder="اكتب مراسلتك هنا..."></textarea>
                                        <input type="hidden" name="project_manager_id" value="{{auth()->guard('manager')->user()->id}}" >
                                        <input type="hidden" name="request_id" value="{{Session::get('request_id')}}" >
                                        <input type="hidden" name="projectos_id" value="{{Session::get('projectos_id')}}" >
                                        <input type="image" id="imageForDisabled" disabled src="{{asset('assets/images/ic_send_24px.png')}}" class="img2">
                                    </form>
                                    <!--<form action="{{route('ProjectStoreFile')}}" method="POST" enctype="multipart/form-data">-->
                                    <!--    @csrf-->
                                        <img src="{{asset('assets/images/ic_link_24px.png')}}" style="cursor:pointer" id="img1FileUploadMessages11" class="img1">
                                    <!--    <input type="hidden" name="project_manager_id" value="{{auth()->guard('manager')->user()->id}}" >-->
                                    <!--    <input type="hidden" name="request_id" value="{{Session::get('request_id')}}" >-->
                                    <!--    <input type="hidden" name="pillar_id" value="{{Session::get('pillar_id')}}" >-->
                                    <!--    <input type="hidden" name="consultant_id" value="{{Session::get('consultant_id')}}" >-->
                                    <!--    <input type="hidden" name="projectos_id" value="{{Session::get('projectos_id')}}" >-->
                                    <!--    <input type="file" style="width: 0px;height:0px;overflow: hidden;" name="files[]" multiple onchange="this.form.submit()" src="{{asset('assets/images/ic_link_24px.png')}}" id="imgInputUploadedMessages">-->
                                    <!--</form>-->
                                </div>
                            </div> 
                        
                        </div>
                    </div>
            </div>
            
        </div><!-- container -->
        
    </section>
</div>