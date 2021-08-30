<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<div id="app">


        <section class="login-page">
            <div class="container">
                <nav>
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                        <a id="mainPagesUserMessages" href="/consultant"><i style="margin-left:10px;" class="fa fa-home"></i> الرئيسية </a>
                        <a id="logoutUserMessages" href="{{route('consultant.logout')}}">تسجيل خروج <i class="fas fa-sign-out-alt"></i></a>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                </nav>
                
                <div class="loginco">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="messages-form">
                                <div class="col-md-12 containers" id="containers">
                                    @if(count($inboxMessageConsultant) > 0)
                                    @foreach($inboxMessageConsultant as $msg)
                                    @if($msg->isManager == 1)
                                    <div class="messages">
                                        <img src="{{asset('assets/images/Group 3291.png')}}" class="imgAdmin" alt="Avatar">
                                        <!--<p>أهلا بك في نمذجة .. يمكنك ترك رسالتك وسوف نقوم بالرد عليك في أقرب وقت:)<span class="time-left">11:03pm|2020/06/21</span></p>-->
                                        @if($msg->message != null)
                                        <p>{{$msg->message}} <span class="time-right">{{$msg->created_at}}</span></p>
                                        @else
                                        
                                        @endif
                                        
                                        @if($msg->files != null)
                                        @if(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pdf')
                                            <a href="/downloadImageConsultant/{{$msg->id}}"> <i class="secondDownAdmin far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan2Admin">تحميل</span> <p class="pSecondMessages"><a href="/showImageConsultant/{{$msg->id}}" target="_blank"><embed class="imgRightMessages2" src="{{asset('uploads/' . $msg->files)}}" /> </a> <span class="time-right">{{$msg->created_at}}</span></p>
                                        @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'docx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'doc')
                                            <a href="/downloadImageConsultant/{{$msg->id}}"> <i class="firstDownMessagesAdmin far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1Admin">تحميل</span> <p class="pFirstMessages"><a href="/showImageConsultant/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/wordForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pptx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'ppt')
                                            <a href="/downloadImageConsultant/{{$msg->id}}"> <i class="firstDownMessagesAdmin far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1Admin">تحميل</span> <p class="pFirstMessages"><a href="/showImageConsultant/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/pptxForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @else
                                            <a href="/downloadImageConsultant/{{$msg->id}}"> <i class="firstDownMessagesAdmin far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1Admin">تحميل</span> <p class="pFirstMessages"><a href="/showImageConsultant/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('uploads/' . $msg->files)}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @endif
                                        @else
                                        
                                        @endif
                                    </div>
                                    @else
                                    <div class="messages darkerMessages">
                                        <img src="{{asset('assets/images/Group 3292.png')}}" alt="Avatar" class="right imgUser">
                                        @if($msg->message != null)
                                        <p>{{$msg->message}} <span class="time-right">{{$msg->created_at}}</span></p>
                                        @else
                                        
                                        @endif
                                        
                                        @if($msg->files != null)
                                        @if(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pdf')
                                            <a href="/downloadImageConsultant/{{$msg->id}}"> <i class="secondDown far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan2">تحميل</span> <p class="pSecondMessages"><a href="/showImageConsultant/{{$msg->id}}" target="_blank"><embed class="imgRightMessages2" src="{{asset('uploads/' . $msg->files)}}" /> </a> <span class="time-right">{{$msg->created_at}}</span></p>
                                        @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'docx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'doc')
                                            <a href="/downloadImageConsultant/{{$msg->id}}"> <i class="firstDownMessages far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1">تحميل</span> <p class="pFirstMessages"><a href="/showImageConsultant/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/wordForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @elseif(pathinfo($msg->files, PATHINFO_EXTENSION) == 'pptx' || pathinfo($msg->files, PATHINFO_EXTENSION) == 'ppt')
                                            <a href="/downloadImageConsultant/{{$msg->id}}"> <i class="firstDownMessages far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1">تحميل</span> <p class="pFirstMessages"><a href="/showImageConsultant/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('assets/images/pptxForPreview.jpg')}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @else
                                            <a href="/downloadImageConsultant/{{$msg->id}}"> <i class="firstDownMessages far fa-arrow-alt-circle-down"></i> </a><span class="downloadSpan1">تحميل</span> <p class="pFirstMessages"><a href="/showImageConsultant/{{$msg->id}}" target="_blank"><img class="imgRightMessages" src="{{asset('uploads/' . $msg->files)}}" width="60px" height="30px"></a> <span class="time-right newTimeRight">{{$msg->created_at}}</span></p>
                                        @endif
                                        @else
                                        
                                        @endif
                                    </div>
                                    @endif
                                    @endforeach
                                    @else
                                    
                                    @endif
                                    
                                </div>
                            
                            <div class="row">
                                <div class="col-md-12 textareaMessage">
                                    <form action="{{route('consultMsgStore')}}" id="formID2" method="POST">
                                        @csrf
                                        <!--<img src="{{asset('assets/images/ic_send_24px.png')}}" class="img2">-->
                                        <textarea name="message" id="textareaMessageId" class="form-control" wrap="physical" cols="70" rows="50" placeholder="اكتب مراسلتك هنا..."></textarea>
                                        <input type="hidden" name="consultant_id" value="{{auth()->guard('consultant')->user()->id}}" >
                                        <input type="hidden" name="projectos_id" value="{{request()->id2}}">
                                        <input type="hidden" name="project_manager_id" value="{{request()->id3}}">
                                        <input type="image" id="imageForDisabled" disabled src="{{asset('assets/images/ic_send_24px.png')}}" class="img2">
                                    </form>
                                    <!--<form action="{{route('consultMsgStoreFile')}}" method="POST" enctype="multipart/form-data">-->
                                    <!--    @csrf-->
                                        <img src="{{asset('assets/images/ic_link_24px.png')}}" style="cursor:pointer" id="img1FileUploadMessages11" class="img1">
                                    <!--    <input type="hidden" name="consultant_id" value="{{auth()->guard('consultant')->user()->id}}" >-->
                                    <!--    <input type="file" style="width: 0px;height:0px;overflow: hidden;" name="files[]" multiple onchange="this.form.submit()" src="{{asset('assets/images/ic_link_24px.png')}}" id="imgInputUploadedMessages2">-->
                                    <!--</form>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- container -->
            
        </section>

    </div>