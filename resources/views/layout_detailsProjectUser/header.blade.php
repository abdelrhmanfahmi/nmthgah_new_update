<style>
    .page-header{
        position: relative;
        bottom: 0;
        width: 100%;
        height:100px;
        background: black !important;
    }
    
    .imgInPrint{
        position:relative;
        top:10px;
    }
    .page-footer{
        position: relative;
        top: 0mm;
        width: 100%;
        height:100px;
        background: black !important;
    }
</style>
<div id="app">


        <section class="login-page">
            <div class="container">
                <nav>
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                        <a id="mainPagesUserDetails" href="/home"><i style="margin-left:10px;" class="fa fa-home"></i> الرئيسية </a>
                        <a id="logoutUserDetails" href="{{route('user.logout')}}">تسجيل خروج <i class="fas fa-sign-out-alt"></i></a>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                </nav>
                
                <div class="loginco">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="details-request">
                            <div class="row">
                                <div class="col-md-6"><h3 class=home-title>تفاصيل المشروع</h3></div>
                                <div class="col-md-6">
                                    <button user-id="{{auth()->user()->id}}" class="btnProjectUserDetails">المراسلات</button>
                                </div>
                            </div>
                            @foreach($showRequest as $showReq)
                            <div class="row">
                                <div class="col-md-6 rowDataWaqf">
                                    <div class="row rowDataWaqfInside">
                                        <div class="col-md-6">
                                            <div class="col-md-12 class1">
                                                <label>اسم المشروع</label>
                                                <p>{{$showReq->waqf_name}}</p>
                                            </div>
                                            <div class="col-md-12 class2">
                                                <label>اسم صاحب الوقف</label>
                                                <p>{{$showReq->waqf_ownerName}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12 class3">
                                                <label>اسم المسؤول</label>
                                                <p>{{$showReq->waqf_charger}}</p>
                                            </div>
                                            <div class="col-md-12 class4">
                                                <label>عنوان المشروع</label>
                                                <p>{{$showReq->city}} , {{$showReq->street}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 descriptionProject">
                                    <label>وصف الوقف</label>
                                    <textarea disabled cols="20" rows="5">{{$showReq->desc}}</textarea>
                                </div>
                            </div>
                            @endforeach
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="progressbar">
                                        <li class="1">الإرسال</li>
                                        <li class="2">المراجعة</li>
                                        <li class="3">التعاقد</li>
                                        <li class="4">التقييم</li>
                                        <li class="5">الشهادة</li>
                                    </ul>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-6 resultProjectUser">
                                    <label>النتائج</label>
                                    <p id="resultForUser">لا يوجد نتائج حتي الآن</p>
                                </div>
                                <div class="col-md-6 resultProjectUserButton">
                                    <button id="loadResult" onclick="printDiv('printableArea')">تحميل النتيجة</button>
                                </div>
                            </div>
                            
                            <!-- start result -->
                            
                            <div id="printableArea" style="display:none;">
                                
                            </div>
                            
                            <!--end result-->
                            
                        </div>
                    </div>
                </div>
            </div><!-- container -->
        </section>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            var project_id = "";
            $(window).on('load' , function(){
                var urls =window.location.href;
                var dataID = (urls.match(/(\d+)/g) || []);
                var request_id = dataID[0];
                
                $('#printableArea').empty();
                
                $.ajax({
                    url:'/progressBarRequest/'+request_id,
                    method:'GET',
                    success:function(response){
                        if(response == 0){
                            $('.progressbar .1').addClass('active');
                        }else if(response == 1){
                            $('.progressbar .1').addClass('active');
                            $('.progressbar .2').addClass('active');
                        }else if(response == 2){
                            $('.progressbar .1').addClass('active');
                            $('.progressbar .2').addClass('active');
                            $('.progressbar .3').addClass('active');
                        }else if(response == 3){
                            $('.progressbar .1').addClass('active');
                            $('.progressbar .2').addClass('active');
                            $('.progressbar .3').addClass('active');
                            $('.progressbar .4').addClass('active');
                        }else{
                            
                            if(response == 'not_found'){
                                console.log('project_Not_Found');
                                $('.progressbar .1').addClass('active');
                                $('.progressbar .2').addClass('active');
                                $('.progressbar .3').addClass('active');
                            }else{
                                $('.progressbar .1').addClass('active');
                                $('.progressbar .2').addClass('active');
                                $('.progressbar .3').addClass('active');
                                $('.progressbar .4').addClass('active');
                                $('.progressbar .5').addClass('active');
                                
                                project_id = response;
                                console.log(project_id);
                                
                                $('.resultProjectUserButton #loadResult').css({'background-color' : '#1ba590' , 'color' : 'white'});
                                $('.resultProjectUser #resultForUser').text('اضغط تحميل النتيجة').css('color' , '#1ba590');
                                $.ajax({
                                    url:'/getResultsForPageUser/'+request_id+'/'+project_id,
                                    method:'GET',
                                    success:function(data){
                                        $('#printableArea').html(data);
                                    },
                                });
                            }
                        }
                    },error:function(error){
                        console.log(error);
                    },
                });
            });
        });
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
    
            document.body.innerHTML = printContents;
    
            window.print();
    
            document.body.innerHTML = originalContents;
        }
    </script>