<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<div id="app">


        <section class="login-page">
            <div class="container">
                <nav>
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                        <a id="mainPagesConsultantEvaluation" href="/consultant"><i style="margin-left:10px;" class="fa fa-home"></i> الرئيسية </a>
                        <a id="logoutConsultantEvaluation" href="{{route('consultant.logout')}}">تسجيل خروج <i class="fas fa-sign-out-alt"></i></a>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                </nav>
                
                <div class="loginco">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="consultant-details">
                            @foreach($showRequestConsultant as $requestConsultant)
                            <div class="row">
                                <div class="col-md-6"><h3 class=home-title>{{$requestConsultant->waqf_name}}</h3></div>
                                <div class="col-md-6">
                                    <button class="btnProjectConsultantDetails">ملفات مساعدة</button>
                                    <a href="/adminConsultantMessages/{{$requestConsultant->user_id}}/{{$requestConsultant->projectos_id}}/{{Session::get('projectID')}}"><img class="ImageBackgroundIcon" src="{{asset('assets/images/Icon material-chat.png')}}"></a>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 rowDataWaqfConsultant">
                                    <div class="row rowDataWaqfInsideConsultant">
                                        <div class="col-md-6">
                                            <div class="col-md-12 class1Consultant">
                                                <label>اسم المشروع</label>
                                                <p>{{$requestConsultant->waqf_name}}</p>
                                            </div>
                                            <div class="col-md-12 class2Consultant">
                                                <label>اسم صاحب الوقف</label>
                                                <p>{{$requestConsultant->waqf_ownerName}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12 class3Consultant">
                                                <label>اسم المسؤول</label>
                                                <p>{{$requestConsultant->waqf_charger}}</p>
                                            </div>
                                            <div class="col-md-12 class4Consultant">
                                                <label>عنوان المشروع</label>
                                                <p>{{$requestConsultant->city}} , {{$requestConsultant->street}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 descriptionProjectConsultant">
                                    <label>وصف الوقف</label>
                                    <textarea disabled cols="20" rows="5">{{$requestConsultant->desc}}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row noticeConsultant">
                                <div class="col-md-12">
                                    <label>ملاحظة</label>
                            </div>
                                    <p>لبدء التقييم يرجى الاطلاع على بيانات المشروع ثم الضغط على زر بدء التقييم ومتابعة التقييم حتى آخر متطلب</p>
                                </div>
                            
                            <br>
                            <div class="row ReasonsOfConsulant" data-counter="{{count($reasons)}}">
                            @if(count($reasons) > 0)
                                <div class="col-md-12">
                                    <label>أسباب رفض التقييم</label>
                                    <ul class="list-group listOfReasons">
                                        @foreach($reasons as $reason)
                                          <li class="list-group-item">{{$reason->reason}}</li>
                                          <br>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                            
                            @endif
                            </div>
                            <br>
                            <br>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <button data-id="{{$requestConsultant->id}}" data-id2="{{$requestConsultant->projectos_id}}" class="btnEvaluationConsultant">بدء التقييم</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal" id="variableModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat;z-index: 1;">
            
                        <div class="modal-content text-center" style="background:white";>
            
                        <div class="modal-header2 d-flex justify-content-center text-center ">
            
                        </div>
            
                        <div class="modal-body">
                            <h6 class="heading text-center" id="modal_message2"></h6>
                        </div>
            
                    </div>
            
                </div>
            </div>
            </div><!-- container -->
            
        </section>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $(window).on('load' , function(){
                var counter = $(".ReasonsOfConsulant").attr("data-counter");
                if(counter == 0){
                    $('.consultant-details').css('height' , '500px');
                    $('#LinkFooterProjectConsultant').css({'top' : '0px' , 'right' : '0px'});
                }else{
                    if($(window).width() > 1200){
                        $('.consultant-details').css('height' , '630px');
                        $('#LinkFooterProjectConsultant').css({'top' : '110px' , 'right' : '-400px'});
                    }else if($(window).width() == 1024){
                        $('.consultant-details').css('height' , '630px');
                        $('#LinkFooterProjectConsultant').css({'top' : '110px' , 'right' : '-300px'});
                    }else if($(window).width() == 768){
                        $('.consultant-details').css('height' , '900px');
                        $('#LinkFooterProjectConsultant').css({'top' : '40px' , 'right' : '0px'});
                    }else if($(window).width() < 600){
                        $('.consultant-details').css('height' , '1030px');
                        $('#LinkFooterProjectConsultant').css({'top' : '40px' , 'right' : '0px'});
                    }else{
                        console.log('no width');
                    }
                    
                    $(window).on('resize' , function(){
                        if($(window).width() > 1200){
                            $('.consultant-details').css('height' , '630px');
                            $('#LinkFooterProjectConsultant').css({'top' : '110px' , 'right' : '-400px'});
                        }else if($(window).width() == 1024){
                            $('.consultant-details').css('height' , '630px');
                            $('#LinkFooterProjectConsultant').css({'top' : '110px' , 'right' : '-300px'});
                        }else if($(window).width() == 768){
                            $('.consultant-details').css('height' , '900px');
                            $('#LinkFooterProjectConsultant').css({'top' : '40px' , 'right' : '0px'});
                        }else if($(window).width() < 600){
                            $('.consultant-details').css('height' , '1030px');
                            $('#LinkFooterProjectConsultant').css({'top' : '40px' , 'right' : '0px'});
                        }else{
                            console.log('no width');
                        }
                    });
                }
            });
        });
    </script>