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
                            @foreach($showReConsultantEvaluation as $requestConsultantEvaluation)
                            <div class="row">
                                <div class="col-md-6"><h3 class=home-title>{{$requestConsultantEvaluation->waqf_name}}</h3></div>
                                <div class="col-md-6">
                                    <button class="btnProjectConsultantDetails">ملفات مساعدة</button>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6 rowDataWaqfConsultant">
                                    <div class="row rowDataWaqfInsideConsultant">
                                        <div class="col-md-6">
                                            <div class="col-md-12 class1Consultant">
                                                <label>اسم المشروع</label>
                                                <p>{{$requestConsultantEvaluation->waqf_name}}</p>
                                            </div>
                                            <div class="col-md-12 class2Consultant">
                                                <label>اسم صاحب الوقف</label>
                                                <p>{{$requestConsultantEvaluation->waqf_ownerName}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12 class3Consultant">
                                                <label>اسم المسؤول</label>
                                                <p>{{$requestConsultantEvaluation->waqf_charger}}</p>
                                            </div>
                                            <div class="col-md-12 class4Consultant">
                                                <label>عنوان المشروع</label>
                                                <p>{{$requestConsultantEvaluation->city}} , {{$requestConsultantEvaluation->street}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 descriptionProjectConsultant">
                                    <label>وصف الوقف</label>
                                    <textarea disabled cols="20" rows="5">{{$requestConsultantEvaluation->desc}}</textarea>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="row noticeConsultant">
                                <div class="col-md-12">
                                    <label>ملاحظة</label>
                                    <p>لبدء التقييم يرجى الاطلاع على بيانات المشروع ثم الضغط على زر بدء التقييم ومتابعة التقييم حتى آخر متطلب</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button data-id="{{$requestConsultantEvaluation->id}}" id="btnUniqueReEvaluation" class="btnEvaluationConsultant">إعادة التقييم</button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- container -->
            <a href="" id="LinkFooterProjectConsultant">جميع الحقوق محفوظة لشركة <span>CMark</span> © 2020</a>
        </section>

    </div>