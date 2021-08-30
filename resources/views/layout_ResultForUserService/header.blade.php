<style>
    .result-request{
        background: #fff;
        padding: 30px;
        height: 650px;
        width:1100px;
        position:relative;
        right:-65px;
        box-shadow: 3px 3px 5px 3px rgba(232,232,232,0.3);
        z-index:1;
    }
    
    .result-request h3{
        color:goldenrod;
        font-family: cr;
        margin: auto;
        margin-bottom: 70px;
        width:79%;
        position: relative;
        margin-right: 80px;
    }
    
    .result-request h3:after{
        content: "";
        width:50px;
        height: 5px;
        background: goldenrod;
        position: absolute;
        right:0;
        bottom: -30px;
        border-radius: 30px;
    }
    #footerInEvaluationSystem{
        position:relative;
        margin-bottom:80px;
        left:300px;
    }
    #footerSpecialInEvaluationService{
        position:relative;
        right:0px;
        top:0px;
        color:#919191;
    }
    #forScroll{
        height:350px;
        overflow-x:hidden;
        overflow-y:scroll;
    }
    
    @media screen and (min-width:1025px) and (max-width:1190px) {
        .result-request{
            height: 650px;
            width:1100px;
            position:relative;
            right:-170px;
        }
    }
    @media only screen and (width: 1024px){
        .result-request{
            height: 650px;
            width:1000px;
            position:relative;
            right:-125px;
        }
    }
    @media screen and (min-width:600px) and (max-width:991px) {
        .result-request{
            height: 650px;
            width: 650px;
            position: relative;
            right: 0px;
            margin-top: 50px;
            overflow-x: hidden;
        }
    }
    @media (max-width: 500px){
        .result-request{
            height: 750px;
            width: 370px;
            position: relative;
            right: -10px;
            margin-top: 50px;
            overflow-x:hidden;
        }
        #footerInEvaluationSystem{
            position:relative;
            margin-bottom:130px;
            left:300px;
        }
    }
    
    @media only screen and (width: 393px){
        .result-request{
            width: 360px;
        }
    }
    @media only screen and (width: 375px){
        .result-request{
            width: 340px;
        }
    }
    @media only screen and (width: 360px){
        .result-request{
            width: 320px;
        }
    }
    @media only screen and (width: 320px){
        .result-request{
            width: 280px;
        }
    }

</style>
<div id="app">
        <section style="background: goldenrod radial-gradient(white, goldenrod);background-position: 46% 29%;height: 400px;">
            <div class="container">
                <nav>
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                </nav>
                
                <div class="loginco">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="result-request">
                            <h3>النتيجة</h3>
                            <div class="col-md-12" id="forScroll">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                          <th width="50%">السؤال</th>
                                          <th width="50%">النتيجة</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                      @if(count($dataResults) > 0)
                                      @foreach($dataResults as $result)
                                        <tr>
                                            <td>{{$result->getQuestions->question}}</td>
                                            @if($result->result == 0)
                                            <td style="display:flex">
                                                <i class="fa fa-check-circle fa-2x img1-project-manager4" style="color: goldenrod;"></i>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <p class="PInproj1detect">مطابق</p>
                                            </td>
                                            @else
                                            <td style="display:flex">
                                                <i class="fa fa-times-circle fa-2x img1-project-manager4" style="color: #e1215d;"></i>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <p class="PInproj1detect">غير مطابق</p>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    @else
                                    
                                    @endif
                                  </tbody>
                                </table>
                            </div>
                            <br>
                            
                            <hr style="width:950px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center" style="line-height:1.6;">عزيزي صاحب الوقف لاستكمال عملية التقييم وتطبيق مواصفة الكفاءة الوقفية يرجي التسجيل في النظام وتم إرسال نسخة من النتيجة علي الايميل المرفق</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center" style="font-family:cr;"><a href="/registerIndicator" style="font-family:cr;color:goldenrod;text-decoration:underline">التسجيل</a>
                                    </h4>
                                </div>
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
            
        });
    </script>