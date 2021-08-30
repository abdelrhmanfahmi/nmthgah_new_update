<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
    .loginco{
        z-index:1;
    }
        ::placeholder{
            color:#00A490;
        }
        #annual_frequency{
            box-shadow:none;
            -webkit-box-shadow:none;
        }
        #target_value{
            box-shadow:none;
            -webkit-box-shadow:none;
        }
        #audit_result{
            box-shadow:none;
            -webkit-box-shadow:none;
        }
        #gap_sizes{
             box-shadow:none;
            -webkit-box-shadow:none;
        }
        #results2{
            box-shadow:none;
            -webkit-box-shadow:none;
        }
        .percentageInput1{
            color:#CCCCCC;
            position:relative;
            right:-120px;
            top:38px;
            z-index:20;
        }
        .percentageInput2{
            color:#CCCCCC;
            position:relative;
            right:-160px;
            top:38px;
            z-index:20;
        }
        @media screen and (min-width:1000px) and (max-width:1190px) {
            .percentageInput1{
                right:-10px;
                top:13px;
            }
            .percentageInput2{
                right:23px;
                top:13px;
            }
        }
        @media screen and (min-width:600px) and (max-width:991px) {
            .percentageInput1{
                right:-35px;
                top:50px;
            }
            .percentageInput2{
                right:-5px;
                top:85px;
            }
        }
        
        @media (max-width: 500px){
            .percentageInput1{
                right:-105px;
                top:50px;
            }
            .percentageInput2{
                right:-73px;
                top:86px;
            }
        }
        
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
        
        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
        .selectTargetValue{
            z-index:9999;
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
                        <a id="mainPagesConsultantEvaluation" href="/consultant"><i style="margin-left:10px;" class="fa fa-home"></i> الرئيسية </a>
                        <a id="logoutConsultantEvaluation" href="{{route('consultant.logout')}}">تسجيل خروج <i class="fas fa-sign-out-alt"></i></a>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                </nav>
                
                <div class="loginco">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="consultant2-details">
                            @foreach($showPageCosnlt as $show)
                            <div class="row">
                                <div class="col-md-6"><h3 class=home-title>{{$show->standard_name}}</h3></div>
                                <div class="col-md-6">
                                    <button class="btnProjectConsultantDetails2">ملفات مساعدة</button>
                                    <a href="/adminConsultantMessages/{{auth()->guard('consultant')->user()->id}}/{{request()->id1}}/{{Session::get('projectID')}}"><img class="ImageBackgroundIcon2" src="{{asset('assets/images/Icon material-chat.png')}}"></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 txts">
                                    <p class="txt1">{{$show->name}}</p>
                                    <p class="txt2">{{$show->explain}}</p>
                                    <input type="hidden" value="{{$show->id}}" id="idOfRequirement" />
                                    <input type="hidden" value="{{$show->target_value_type}}" id="TypeOfTargetValue" />
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4 indicTxt1">
                                    <p class="txtIndic1">مؤشر القياس</p>
                                    <p class="txtIndic2">{{$show->measure_cursor}}</p>
                                </div>
                                <div class="col-md-8 indicTxt2">
                                    <p class="txtIndic1">تقدير المؤشر</p>
                                    <p class="txtIndic2">{{$show->indicator_estimation_method}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <form id="registerProjectResult" autocomplete="off">
                                    @csrf
                                    <div class="col-md-3 forma1">
                                        <label>التكرار السنوي</label>
                                        <select id="annual_frequency" name="annual_frequency" class="form-control">
                                            <option disabled selected>اختر التكرار السنوي</option>
                                            <option value="سنوي">سنوي</option>
                                            <option value="نصف سنوي">نصف سنوي</option>
                                            <option value="ربع سنوي">ربع سنوي</option>
                                            <option value="قبل بدء المشروع">قبل بدء المشروع</option>
                                            <option value="مرة واحدة فقط">مرة واحدة فقط</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 forma2">
                                        <label>القيمة المستهدفة</label>
                                        @if($show->target_value_type == 0)
                                            <select id="target_value" name="target_value" class="form-control selectTargetValue">
                                                <option disabled selected>نعم أو لا</option>
                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>
                                            </select>
                                        @elseif($show->target_value_type == 1)
                                            
                                            <input type="number" id="target_value" size="4" maxlength="3" min="0" oninput="changeHandler1(this)" name="target_value" placeholder="رقم مئوي">
                                            <span class="percentageInput1">%</span>
                                        @else
                                            <input type="number" id="target_value" name="target_value" min="0" oninput="changeHandler3(this)" placeholder="رقم صحيح">
                                        @endif
                                    </div>
                                    <div class="col-md-3 forma3">
                                        <label>نتيجة التدقيق</label>
                                        @if($show->audit_result_type == 0)
                                            <select id="audit_result" name="audit_result" class="form-control selectAuditResult">
                                                <option disabled selected>نعم أو لا</option>
                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>
                                            </select>
                                        @elseif($show->audit_result_type == 1)
                                            
                                            <input type="number" id="audit_result" size="4" maxlength="3" min="0" oninput="changeHandler2(this)" name="audit_result" placeholder="رقم مئوي">
                                            <span class="percentageInput2">%</span>
                                        @else
                                            <input type="number" id="audit_result" name="audit_result" min="0" oninput="changeHandler4(this)" placeholder="رقم صحيح">
                                        @endif
                                    </div>
                                    <div class="col-md-3 forma4">
                                        <img id="image0" src="{{asset('assets/images/whiteImageNmthgah.jpg')}}" width="40px" height="40px">
                                        <img id="image1" style="display:none;" src="{{asset('assets/images/Group 330.png')}}" width="40px" height="40px">
                                        <img id="image2" style="display:none" src="{{asset('assets/images/Group 3308.png')}}" width="40px" height="40px">
                                        <input type="hidden" id="results" name="likes" class="formaP1 form-control" value="منتظر النتيجة" />
                                        <input id="results2"  style="background-color:#fff" class="formaP1 form-control" value="" />
                                        <input id="gap_sizes"  style="background-color:#fff" name="gap_size" class="formaP2 form-control" value="" />
                                        
                                    </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12 buttonsGroupConsultant">
                                    
                                    <button type="submit" onclick="storeOrUpdate()" class="btnGroupConslt2">حفظ</button>
                                    <input type="hidden" id="standard" name="standard" value="{{$show->standard_name}}" />
                                    <input type="hidden" id="requirement" name="requirement" value="{{$show->name}}" />
                                    <input type="hidden" id="requirement_id" name="requirement_id" value="{{$show->id}}" />
                                    <input type="hidden" id="standard_id" name="standard_id" value="{{$show->standard_pillar_id}}" />
                                    <input type="hidden" id="targetResult" name="target_value_type" value="{{$show->target_value_type}}" />
                                    <input type="hidden" id="pillar_id" name="pillar_id" value="{{$show->pillar_id}}" />
                                    <input type="hidden" id="request_id" name="request_id" value="{{request()->id}}" />
                                    <input type="hidden" id="projectos_id" name="projectos_id" value="{{request()->id1}}" />
                                    <input type="hidden" id="consultant_id" name="consultant_id" value="{{auth()->guard('consultant')->user()->id}}" />
                                    <input type="hidden" id="url" value="{{request()->url()}}"/>
                                </form>
                                    @if($showPageCosnlt->previousPageUrl() != null)
                                        <button id="backos" class="btnGroupConslt1">السابق</button>
                                    @endif
                                    @if($showPageCosnlt->nextPageUrl() != null)
                                        <button id="nextos" onclick="updateOrInsertNex()" class="btnGroupConslt3">التالي</button>
                                    @endif
                                    @if($showPageCosnlt->hasMorePages() == false)
                                        <button class="sendToAdmin" onclick="SendProjectUpdatesToManager()">إرسال</button>
                                    @endif
                                    
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                
                            <div class="modal-body text-center" style="padding: 40px">
                                <h3 style="font-family:cr;color:#808080;">جاري إرسال التقييم</h3>
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function(){
            //   $('#nextos').on('click' , function(){
            //       location.href="{{$showPageCosnlt->nextPageUrl()}}";
            //   });
              $('#backos').on('click' , function(){
                  location.href="{{$showPageCosnlt->previousPageUrl()}}";
              });
               
               var valueOfTargetValue="";
               var valueOfAuditResult="";
               
              $(window).on('load' , function(){
                  var idRequirement = $('#idOfRequirement').val();
                  var projectos_idFirst = $('#projectos_id').val();
                  $.ajax({
                      url:'/getDataOfRequirementsWhenBackToPageAgain/'+idRequirement+'/'+projectos_idFirst,
                      method:'GET',
                      success:function(response){
                          if(response != 0){
                              $('#annual_frequency').val(response.annual_frequency);
                              $('#target_value').val(response.target_value);
                              valueOfTargetValue = response.target_value;
                              $('#audit_result').val(response.audit_result);
                              valueOfAuditResult = response.audit_result;
                              if(response.likes == 0){
                                  $('#results2').val('مطابق');
                                  $('#results').val(response.likes);
                                  $('#image1').css('display' , 'block');
                                  $('#image2').css('display' , 'none');
                                  $('#image0').css('display' , 'none');
                              }else{
                                  $('#results2').val('غير مطابق');
                                  $('#results').val(response.likes);
                                  $('#image2').css('display' , 'block');
                                  $('#image1').css('display' , 'none');
                                  $('#image0').css('display' , 'none');
                              }
                              if(response.gap_size == 'null'){
                                  $('#gap_sizes').val('لا يوجد حجم فجوة');
                                  $('#gap_sizes').css('width' , '200px');
                              }else{
                                  $('#gap_sizes').val(response.gap_size);
                              }
                          }else{
                              console.log('Empty Data From Server');
                              $('#image0').css('display' , 'block');
                          }
                      }
                  });
              });
               
               
               $('#target_value').on('input' , function(e){
                   valueOfTargetValue = e.target.value;
               });
               
               $('#audit_result').on('input' , function(e){
                   valueOfAuditResult = e.target.value;
               });
               
               $('#target_value').on('input' , function(){
                   if(valueOfTargetValue == "نعم" && valueOfAuditResult == "لا"){
                      document.getElementById('results').value = "1";
                      document.getElementById('results2').value = "غير مطابق";
                      document.getElementById('gap_sizes').value = 'لا يوجد حجم فجوة';
                      document.getElementById('gap_sizes').style.width="200px";
                      $('#image2').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image1').css('display' , 'none');
                  }else if(valueOfTargetValue == "لا" && valueOfAuditResult == "نعم"){
                      document.getElementById('results').value = "1";
                      document.getElementById('results2').value = "غير مطابق";
                      document.getElementById('gap_sizes').value = 'لا يوجد حجم فجوة';
                      document.getElementById('gap_sizes').style.width="200px";
                      $('#image2').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image1').css('display' , 'none');
                  }else if(valueOfTargetValue == "نعم" && valueOfAuditResult == "نعم"){
                      $('.buttonsGroupConsultant .btnGroupConslt2').css({'background-color':'#00A490'});
                      document.getElementById('results').value = "0";
                      document.getElementById('results2').value = "مطابق";
                      document.getElementById('gap_sizes').value = 'لا يوجد حجم فجوة';
                      document.getElementById('gap_sizes').style.width="200px";
                      $('#image1').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image2').css('display' , 'none');
                  }else if(valueOfTargetValue == "لا" && valueOfAuditResult == "لا"){
                      $('.buttonsGroupConsultant .btnGroupConslt2').css({'background-color':'#00A490'});
                      document.getElementById('results').value = "0";
                      document.getElementById('results2').value = "مطابق";
                      document.getElementById('gap_sizes').value = 'لا يوجد حجم فجوة';
                      document.getElementById('gap_sizes').style.width="200px";
                      $('#image1').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image2').css('display' , 'none');
                  }else if(valueOfTargetValue == "لا" || valueOfTargetValue == "نعم"){
                      document.getElementById('results').value = "1";
                      document.getElementById('results2').value = "غير مطابق";
                      document.getElementById('gap_sizes').value = 'لا يوجد حجم فجوة';
                      document.getElementById('gap_sizes').style.width="200px";
                      $('#image2').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image1').css('display' , 'none');
                  }else if(valueOfTargetValue == valueOfAuditResult){
                      $('.buttonsGroupConsultant .btnGroupConslt2').css({'background-color':'#00A490'});
                      document.getElementById('results').value = "0";
                      document.getElementById('results2').value = "مطابق";
                      document.getElementById('gap_sizes').value = Math.abs(valueOfTargetValue - valueOfAuditResult);
                      $('#image1').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image2').css('display' , 'none');
                  }else{
                      document.getElementById('results').value = "1";
                      document.getElementById('results2').value = "غير مطابق";
                      document.getElementById('gap_sizes').value = Math.abs(valueOfTargetValue - valueOfAuditResult);
                      $('#image2').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image1').css('display' , 'none');
                  }
               });
               $('#audit_result').on('input' , function(){
                   if(valueOfTargetValue == "نعم" && valueOfAuditResult == "لا"){
                      document.getElementById('results').value = "1";
                      document.getElementById('results2').value = "غير مطابق";
                      document.getElementById('gap_sizes').value = 'لا يوجد حجم فجوة';
                      document.getElementById('gap_sizes').style.width="200px";
                      $('#image2').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image1').css('display' , 'none');
                  }else if(valueOfTargetValue == "لا" && valueOfAuditResult == "نعم"){
                      document.getElementById('results').value = "1";
                      document.getElementById('results2').value = "غير مطابق";
                      document.getElementById('gap_sizes').value = 'لا يوجد حجم فجوة';
                      document.getElementById('gap_sizes').style.width="200px";
                      $('#image2').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image1').css('display' , 'none');
                  }else if(valueOfTargetValue == "نعم" && valueOfAuditResult == "نعم"){
                      $('.buttonsGroupConsultant .btnGroupConslt2').css({'background-color':'#00A490'});
                      document.getElementById('results').value = "0";
                      document.getElementById('results2').value = "مطابق";
                      document.getElementById('gap_sizes').value = 'لا يوجد حجم فجوة';
                      document.getElementById('gap_sizes').style.width="200px";
                      $('#image1').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image2').css('display' , 'none');
                  }else if(valueOfTargetValue == "لا" && valueOfAuditResult == "لا"){
                      $('.buttonsGroupConsultant .btnGroupConslt2').css({'background-color':'#00A490'});
                      document.getElementById('results').value = "0";
                      document.getElementById('results2').value = "مطابق";
                      document.getElementById('gap_sizes').value = 'لا يوجد حجم فجوة';
                      document.getElementById('gap_sizes').style.width="200px";
                      $('#image1').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image2').css('display' , 'none');
                  }else if(valueOfAuditResult == "لا" || valueOfAuditResult == "نعم"){
                      document.getElementById('results').value = "1";
                      document.getElementById('results2').value = "غير مطابق";
                      document.getElementById('gap_sizes').value = 'لا يوجد حجم فجوة';
                      document.getElementById('gap_sizes').style.width="200px";
                      $('#image2').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image1').css('display' , 'none');
                  }else if(valueOfTargetValue == valueOfAuditResult){
                      $('.buttonsGroupConsultant .btnGroupConslt2').css({'background-color':'#00A490'});
                      document.getElementById('results').value = "0";
                      document.getElementById('results2').value = "مطابق";
                      document.getElementById('gap_sizes').value = Math.abs(valueOfTargetValue - valueOfAuditResult);
                      $('#image1').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image2').css('display' , 'none');
                  }else{
                      document.getElementById('results').value = "1";
                      document.getElementById('results2').value = "غير مطابق";
                      document.getElementById('gap_sizes').value = Math.abs(valueOfTargetValue - valueOfAuditResult);
                      $('#image2').css('display' , 'block');
                      $('#image0').css('display' , 'none');
                      $('#image1').css('display' , 'none');
                  }
               });
               $('#target_value').on('keyup' , function(){
                   $('.percentageInput1').css('color','#00A490');
               });
               $('#audit_result').on('keyup' , function(){
                   $('.percentageInput2').css('color','#00A490');
               });
               
               $('#audit_result').on('input' , function(){
                   $('.buttonsGroupConsultant .btnGroupConslt2').css({'background-color':'#00A490'});
               });
               $('#annual_frequency').on('change' , function(){
                   $('.buttonsGroupConsultant .btnGroupConslt2').css({'background-color':'#00A490'});
               });
               setTimeout(function(){
               $('.limitTime1').fadeOut(1000);// or fade, css display however you'd like.
            }, 2000);
            
               setTimeout(function(){
               $('.limitTime2').fadeOut(1000);// or fade, css display however you'd like.
            }, 2000);
            
            //code added
            
            $('#target_value').on('keyup input' , function(e){
                if(e.target.value == ""){
                  document.getElementById('results2').value = "";
                  document.getElementById('gap_sizes').value = "";
                  $('#image2').css('display' , 'none');
                  $('#image0').css('display' , 'block');
                  $('#image1').css('display' , 'none');
               }
            });
            
            $('#audit_result').on('keyup input' , function(e){
                if(e.target.value == ""){
                  document.getElementById('results2').value = "";
                  document.getElementById('gap_sizes').value = "";
                  $('#image2').css('display' , 'none');
                  $('#image0').css('display' , 'block');
                  $('#image1').css('display' , 'none');
               }
            });
            
            //ends here
            
            // $(document).on('click' , 'body' , function(){
            //     $('#variableModal2').hide();
            // });
            
            });
            
            //action="/GetToProjectResult/{{request()->id}}" method="POST"
            
            function storeOrUpdate(){
                $('#registerProjectResult').on('submit' , function(e){
                    e.preventDefault();
                });
                
                var standard = $('#standard').val();
                var requirement = $('#requirement').val();
                var requirement_id = $('#requirement_id').val();
                var standard_id = $('#standard_id').val();
                var pillar_id = $('#pillar_id').val();
                var request_id = $('#request_id').val();
                var projectos_id = $('#projectos_id').val();
                var gap_sizes = $('#gap_sizes').val();
                var results = $('#results').val();
                var target_value = $('#target_value').val();
                var audit_result = $('#audit_result').val();
                var annual_frequency = $('#annual_frequency').val();
                var targetResultType = $('#targetResult').val();
                var consultant_id = $('#consultant_id').val();
                
                if(target_value == "" || audit_result == "" || target_value == null || audit_result == null || annual_frequency == null || results == "" || gap_sizes == ""){
                    $('#modal_message2').text('من فضلك أدخل البيانات بصورة صحيحة').css('font-family', 'cr');
                    $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                    $('#variableModal2').fadeIn().show();
                    setTimeout(function (){
                        $('#variableModal2').fadeOut("slow").hide();
                    },4000);
                }else{
                    $.ajax({
                        url:'/GetToProjectResult/'+ requirement_id+'/'+projectos_id,
                        method:'POST',
                        data:{_token: "{{ csrf_token() }}" , standard:standard, requirement:requirement, target_value:target_value, audit_result:audit_result, annual_frequency:annual_frequency, likes:results, gap_size:gap_sizes, target_value_type:targetResultType, requirement_id:requirement_id, standard_id:standard_id, request_id:request_id, projectos_id:projectos_id, pillar_id:pillar_id, consultant_id:consultant_id},
                        success:function(response){
                            if(response == 1){
                                $('#modal_message2').text('تم تعديل البيانات بنجاح').css('font-family' , 'cr');
                                $('.modal-header2').empty().html('<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
                                $('#variableModal2').fadeIn(450).show();
                                setTimeout(function (){
                                    $('#variableModal2').fadeOut("slow").hide();
                                    },4000);
                            }else if(response == 2){
                                $('#modal_message2').text('تم حفظ البيانات بنجاح').css('font-family' , 'cr');
                                $('.modal-header2').empty().html('<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
                                $('#variableModal2').fadeIn(450).show();
                                setTimeout(function (){
                                    $('#variableModal2').fadeOut("slow").hide();
                                    },4000);
                            }else{
                                console.log('something wrong in function');
                            }
                        },error:function(error){
                            console.log(error);
                        }
                    });
                }
                
            }
            
            function updateOrInsertNex(){
                var standard = $('#standard').val();
                var requirement = $('#requirement').val();
                var requirement_id = $('#requirement_id').val();
                var standard_id = $('#standard_id').val();
                var pillar_id = $('#pillar_id').val();
                var request_id = $('#request_id').val();
                var projectos_id = $('#projectos_id').val();
                var gap_sizes = $('#gap_sizes').val();
                var results = $('#results').val();
                var target_value = $('#target_value').val();
                var audit_result = $('#audit_result').val();
                var annual_frequency = $('#annual_frequency').val();
                var targetResultType = $('#targetResult').val();
                var consultant_id = $('#consultant_id').val();
                
                if(target_value == "" || audit_result == "" || target_value == null || audit_result == null || annual_frequency == null || results == "" || gap_sizes == ""){
                    console.log('not Changed');
                    location.href="{{$showPageCosnlt->nextPageUrl()}}";
                }else{
                    $.ajax({
                        url:'/GetToProjectResult/'+ requirement_id+'/'+projectos_id,
                        method:'POST',
                        data:{_token: "{{ csrf_token() }}" , standard:standard, requirement:requirement, target_value:target_value, audit_result:audit_result, annual_frequency:annual_frequency, likes:results, gap_size:gap_sizes, target_value_type:targetResultType, requirement_id:requirement_id, standard_id:standard_id, request_id:request_id, projectos_id:projectos_id, pillar_id:pillar_id, consultant_id:consultant_id},
                        success:function(response){
                            if(response == 1){
                                location.href="{{$showPageCosnlt->nextPageUrl()}}";
                            }else if(response == 2){
                                location.href="{{$showPageCosnlt->nextPageUrl()}}";
                            }else{
                                console.log('something wrong in function');
                            }
                        },error:function(error){
                            console.log(error);
                        }
                    });
                }
            }
            
            function SendProjectUpdatesToManager(){
                var request_id = $('#request_id').val();
                
                var standard = $('#standard').val();
                var requirement = $('#requirement').val();
                var requirement_id = $('#requirement_id').val();
                var standard_id = $('#standard_id').val();
                var pillar_id = $('#pillar_id').val();
                var request_id = $('#request_id').val();
                var projectos_id = $('#projectos_id').val();
                var gap_sizes = $('#gap_sizes').val();
                var results = $('#results').val();
                var target_value = $('#target_value').val();
                var audit_result = $('#audit_result').val();
                var annual_frequency = $('#annual_frequency').val();
                var targetResultType = $('#targetResult').val();
                var consultant_id = $('#consultant_id').val();
                
                if(target_value == "" || audit_result == "" || target_value == null || audit_result == null || annual_frequency == null || results == "" || gap_sizes == ""){
                    console.log('not Changed');
                    $('#modal_message2').text('من فضلك تأكد من إتمامك للتعديلات').css('font-family', 'cr');
                    $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                    $('#variableModal2').fadeIn().show();
                    setTimeout(function (){
                        $('#variableModal2').fadeOut("slow").hide();
                    },4000);
                    // location.href="{{$showPageCosnlt->nextPageUrl()}}";
                }else{
                    $.ajax({
                        url:'/GetToProjectResult/'+ requirement_id+'/'+projectos_id,
                        method:'POST',
                        data:{_token: "{{ csrf_token() }}" , standard:standard, requirement:requirement, target_value:target_value, audit_result:audit_result, annual_frequency:annual_frequency, likes:results, gap_size:gap_sizes, target_value_type:targetResultType, requirement_id:requirement_id, standard_id:standard_id, request_id:request_id, projectos_id:projectos_id, pillar_id:pillar_id, consultant_id:consultant_id},
                        success:function(response){
                            if(response == 1){
                                console.log('done');
                            }else if(response == 2){
                                console.log('done');
                            }else{
                                console.log('something wrong in function');
                            }
                        },error:function(error){
                            console.log(error);
                        }
                    });
                    console.log(projectos_id);
                    $.ajax({
                    url:'/changeStatusRequest/' + projectos_id + '/' + pillar_id,
                    method:'GET',
                    success:function(response){
                        if(response == 1){
                            $('#uploadingModal').show();
                            setTimeout(function(){
                                    window.location.href="https://nmthgah.com/consultant";
                                },5000);
                        }else if(response == 0){
                            $('#modal_message2').text('من فضلك تأكد من إتمامك للتعديلات').css('font-family', 'cr');
                            $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                            $('#variableModal2').fadeIn().show();
                            setTimeout(function (){
                                $('#variableModal2').fadeOut("slow").hide();
                            },4000);
                        }else{
                            console.log('something wrong in function');
                        }
                    },error:function(error){
                        console.log(error);
                    }
                });
                }
            }
            
            function changeHandler1(val){
                if (Number(val.value) > 100){
                  val.value = 100;
                }
                var patt=/^[0-9]+$/;
                if(patt.test(val.value)){
                    document.getElementById('target_value').value = val.value;
                  }
                  else{
                    var txt = val.value.slice(0, -1);
                    document.getElementById('target_value').value = txt;
                  }
            }
            
            function changeHandler2(val){
                if (Number(val.value) > 100){
                  val.value = 100;
                }
                var patt=/^[0-9]+$/;
                if(patt.test(val.value)){
                    document.getElementById('audit_result').value = val.value;
                  }
                  else{
                    var txt = val.value.slice(0, -1);
                    document.getElementById('audit_result').value = txt;
                  }
            }
            
            function changeHandler3(val){
                var patt=/^[0-9]+$/;
                if(patt.test(val.value)){
                    document.getElementById('target_value').value = val.value;
                  }
                  else{
                    var txt = val.value.slice(0, -1);
                    document.getElementById('target_value').value = txt;
                  }
            }
            
            function changeHandler4(val){
                var patt=/^[0-9]+$/;
                if(patt.test(val.value)){
                    document.getElementById('audit_result').value = val.value;
                  }
                  else{
                    var txt = val.value.slice(0, -1);
                    document.getElementById('audit_result').value = txt;
                  }
            }
            
        </script>
    </div>