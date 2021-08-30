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
            <a id="mainPage-project-manager5" href="/manager"><i style="margin-left:10px;" class="fa fa-home"></i> الرئيسية </a>
            <a id="logout-project-manager5" href="{{route('project.logout')}}">تسجيل خروج <i class="fas fa-sign-out-alt"></i></a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            </nav>
            <div class="loginco">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 resize">
                        @if ($errors->any())
                            <div id="messageErrorُEvaluate2" class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (Session::has('message'))
                                   <div id="messageErrorُEvaluate" class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif
                        <div class="project-manager5">
                                
                            <nav id="sidebar4">
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
                                        <li class="btnss active">
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
                                        <li class="btnss">
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
                                        <li class="btnProjectManager1">
                                            <button id="sendProjectToAdmin">إرسال المشروع</button>
                                        </li>
                                    </ul>
                                </nav>
                                
                                
                                <form id="registerRefuseForPillar" style="width:0px;height:0px">
                                    @csrf
                                @foreach($getReEvaluationPillar as $ReEvalutionPillar)
                                <h4 class="detail-project-manager5">{{$ReEvalutionPillar->first_name}} {{$ReEvalutionPillar->last_name}}</h4>
                                <div class="bigDivInProjectManager5">
                                    <label class="labelInProjectManager5">السبب</label>
                                    <textarea cols="40" rows="5" id="reason" name="reason" placeholder="أدخل سببك في رفض التقييم"  class="textareaInProjectManager5"></textarea>
                                    <input type="hidden" id="pillar_id" name="pillar_id" value="{{$ReEvalutionPillar->pillar_id}}">
                                    <input type="hidden" id="projectos_id" name="projectos_id" value="{{$ReEvalutionPillar->ProjectID}}">
                                    <input type="hidden" id="consultant_id" name="consultant_id" value="{{$ReEvalutionPillar->id}}">
                                </div>
                                <button type="submit" onclick="whenClickForRefusePillar()" class="btnInProjectManager5">رفض التقييم</button>
                        @endforeach
                        </form>
                        </div>
                    </div>
            </div>
            <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                
                            <div class="modal-body text-center" style="padding: 40px">
                                <h3 style="font-family:cr;color:#808080;">جاري إرسال المشروع لمدير النظام</h3>
                                <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                            </div>
                
                
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
            setTimeout(function(){
               $('#messageErrorُEvaluate').fadeOut(1000);// or fade, css display however you'd like.
            }, 1000);
            setTimeout(function(){
               $('#messageErrorُEvaluate2').fadeOut(1000);// or fade, css display however you'd like.
            }, 1000);
            $('#sendProjectToAdmin').on('click' , function(){
                var urls =window.location.href;
                var dataID = (urls.match(/(\d+)/g) || []);
                var idProject = dataID[0];
                var idRequest = dataID[1];
                $.ajax({
                    url:'/checkIfProjectCompletedOrNot/'+idProject+'/'+idRequest,
                    method:'GET',
                    success:function(response){
                        if(response == 0){
                                $('#modal_message2').text('من فضلك تأكد من إكمال  نتائج جميع الأركان').css('font-family', 'cr');
                                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                                $('#variableModal2').fadeIn().show();
                                setTimeout(function (){
                                    $('#variableModal2').fadeOut("slow").hide();
                                },4000);
                        }else if(response == 1){
                            $('#uploadingModal').show();
                            setTimeout(function(){
                                    window.location.href="https://nmthgah.com/manager";
                                },5000);
                        }else{
                            $('#modal_message2').text('من فضلك تأكد من إكمال  نتائج جميع الأركان').css('font-family', 'cr');
                                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                                $('#variableModal2').fadeIn().show();
                                setTimeout(function (){
                                    $('#variableModal2').fadeOut("slow").hide();
                                },4000);
                                console.log("-1");
                        }
                    },
                });
            });
        });
        
        function whenClickForRefusePillar(){
            $('#registerRefuseForPillar').on('submit' , function(e){
                e.preventDefault();
            });
            
            var urlsss =window.location.href;
            var dataID = (urlsss.match(/(\d+)/g) || []);
            var idOfProject = dataID[0];
            var idOfRequest = dataID[1];
            
            var reason = $('#reason').val();
            var pillar_id = $('#pillar_id').val();
            var projectos_id = $('#projectos_id').val();
            var consultant_id = $('#consultant_id').val();
            
            if(reason == ""){
                $('#modal_message2').text('من فضلك أدخل سببك لرفض التقييم بصورة صحيحة').css('font-family', 'cr');
                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                $('#variableModal2').fadeIn().show();
                setTimeout(function (){
                    $('#variableModal2').fadeOut("slow").hide();
                },4000);
            }else{
                $.ajax({
                   url:'/reEvaluationForPillarPost',
                   method:'POST',
                   data:{_token: "{{ csrf_token() }}", pillar_id:pillar_id, projectos_id:projectos_id, consultant_id:consultant_id, reason:reason},
                   success:function(response){
                       if(response == 1){
                            $('#modal_message2').text('تم رفض متطلبات ومعايير هذا الركن للمراجعة مرة آخري').css('font-family' , 'cr');
                            $('.modal-header2').empty().html('<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
                            $('#variableModal2').fadeIn(450).show();
                            setTimeout(function (){
                                $('#variableModal2').fadeOut("slow").hide();
                                },4000);
                                
                                setTimeout(function (){
                                    window.location.href = "https://nmthgah.com/showMainPageProjectManager/"+idOfProject+"/"+idOfRequest;
                                },3000);
                                
                       }else{
                           console.log('something wrong in function server');
                       }
                   },error:function(error){
                       console.log(error);
                   }
                });
            }
        }
        
        //action="{{route('reEvalutionProjectConsultant')}}" method="POST"
</script>
    
    
    