<style>
    body{
        background-color:#eee;
    }
    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus
    input:-webkit-autofill, 
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus {
      -webkit-text-fill-color: goldenrod;
      -webkit-box-shadow: 0 0 0px 1000px #fff inset;
    }
    ::-webkit-input-placeholder { /* Edge */
      color: red;
      font-size:12px;
    }
    
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
      color: red;
      font-size:12px;
    }
    
    ::placeholder {
      color: red;
      font-size:12px;
    }
    .loginco{
        z-index:1;
    }
    
    label{
        color:#919191;
    }
    
    .evaluat-request{
        background: #fff;
        padding: 30px;
        height: 1770px;
        width:1100px;
        position:relative;
        right:-65px;
        box-shadow: 3px 3px 5px 3px rgba(232,232,232,0.3);
        z-index:1;
    }
    
    .evaluat-request h3{
        color:goldenrod;
        font-family: cr;
        margin: auto;
        margin-bottom: 70px;
        width:79%;
        position: relative;
        margin-right: 80px;
    }
    
    .evaluat-request h3:after{
        content: "";
        width:50px;
        height: 5px;
        background: goldenrod;
        position: absolute;
        right:0;
        bottom: -30px;
        border-radius: 30px;
    }
    
    .evaluat-request h4{
        color:goldenrod;
        font-family: cr;
        margin: auto;
        margin-bottom: 70px;
        width:79%;
        position: relative;
        margin-right: 80px;
        right:-60px;
    }
    
    .evaluat-request h4:after{
        content: "";
        width:50px;
        height: 5px;
        background: goldenrod;
        position: absolute;
        right:0;
        bottom: -30px;
        border-radius: 30px;
    }
    
    .formas1 input{
        border:none;
        border-bottom: 1px solid #ddd;
        padding: 5px;
        margin-bottom: 25px;
        width:220px;
        text-indent: 23px;
        color:goldenrod;
        transition: all .5s;
    }
    
    .formas1 img{
        position:relative;
        right:0px;
        top:-53px;
    }
    
    .formas1 label{
        position:relative;
        right:20px;
        top:0px;
    }
    
    
    .formas2 input{
        border:none;
        border-bottom: 1px solid #ddd;
        padding: 5px;
        margin-bottom: 25px;
        width:220px;
        text-indent: 23px;
        color:goldenrod;
        transition: all .5s;
        position:relative;
        right:-20px;
    }
    
    .formas2 img{
        position:relative;
        right:-20px;
        top:-50px;
    }
    
    .formas2 label{
        position:relative;
        right:10px;
        top:0px;
    }
    
    .formas3 input{
        border:none;
        border-bottom: 1px solid #ddd;
        padding: 5px;
        margin-bottom: 25px;
        width:220px;
        text-indent: 23px;
        color:goldenrod;
        transition: all .5s;
        position:relative;
        right:-40px;
    }
    
    .formas3 img{
        position:relative;
        right:-40px;
        top:-54px;
    }
    
    .formas3 label{
        position:relative;
        right:-10px;
        top:0px;
    }
    
    
    .formas4 input{
        border:none;
        border-bottom: 1px solid #ddd;
        padding: 5px;
        margin-bottom: 25px;
        width:220px;
        text-indent: 23px;
        color:goldenrod;
        transition: all .5s;
        position:relative;
        right:-60px;
    }
    
    .formas4 img{
        position:relative;
        right:-60px;
        top:-52px;
    }
    
    .formas4 label{
        position:relative;
        right:-30px;
        top:0px;
    }
    
    .formas5 textarea{
        margin: 0px 0px 25px;
        position:relative;
        resize:none;
        text-align:justify;
        line-height:1.6;
        border:none;
        border-bottom: 1px solid #ddd;
        padding: 5px;
        margin-bottom: 35px;
        text-indent: 23px;
        transition: all .5s;
        color:goldenrod;
        right:-60px;
    }
    
    .formas5 label{
        position:relative;
        right:25px;
        top:-120px;
    }
    
    .formsInputsAll{
        position:relative;
        right:80px;
    }
    .buttonForSubmitInfo{
        border:2px solid goldenrod;
        width: 450px;
        padding: 10px;
        border-radius: 50px;
        color:goldenrod;
        transition: all .5s;
        background: #fff;
        position:relative;
        right:200px;
        top:50px;
        z-index:9999;
    }
    .buttonForSubmitInfo:hover{
        background:  goldenrod;
        color:#fff;
    }
    .btnForResult{
        border:2px solid goldenrod;
        width: 150px;
        padding: 10px;
        border-radius: 50px;
        color:#fff;
        transition: all .5s;
        background: goldenrod;
        position:relative;
        top:50px;
    }
    
    #pillar_id{
        width:400px;
    }
    #footerInEvaluationSystem{
        position:relative;
        margin-bottom:1190px;
        left:300px;
    }
    #footerSpecialInEvaluationService{
        position:relative;
        right:0px;
        top:0px;
        color:#919191;
    }
    @media screen and (min-width:1025px) and (max-width:1190px) {
        .evaluat-request{
            width:900px;
            right:-20px;
        }
        .evaluat-request h3{
            margin-right:50px;
        }
        .evaluat-request h4{
            position:relative;
            right:-50px;
        }
        
    .formas1 input{
        position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas1 img{
        position:relative;
        right:-70px;
        top:-54px;
    }
    
    .formas1 label{
        position:relative;
        right:-50px;
        top:0px;
    }
    
    
    .formas2 input{
        position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas2 img{
        position:relative;
        right:-70px;
        top:-50px;
    }
    
    .formas2 label{
        position:relative;
        right:-40px;
        top:0px;
    }
    
    .formas3 input{
       position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas3 img{
        position:relative;
        right:-70px;
        top:-54px;
    }
    
    .formas3 label{
        position:relative;
        right:-40px;
        top:0px;
    }
    
    
    .formas4 input{
        position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas4 img{
        position:relative;
        right:-70px;
        top:-52px;
    }
    
    .formas4 label{
        position:relative;
        right:-40px;
        top:0px;
    }
    
    .formas5 textarea{
        position:relative;
        right:-120px;
        top:0px;
    }
    
    .formas5 label{
        position:relative;
        right:-45px;
        top:-120px;
    }
    
    .buttonForSubmitInfo{
        position:relative;
        right:100px;
    }
    .buttonForSubmitInfo:hover{
        background:  goldenrod;
        color:#fff;
    }
    .btnForResult{
        border:2px solid goldenrod;
        width: 150px;
        padding: 10px;
        border-radius: 50px;
        color:#fff;
        transition: all .5s;
        background: goldenrod;
        position:relative;
        top:50px;
    }
    
    #pillar_id{
        width:400px;
    }
    #footerInEvaluationSystem{
        position:relative;
        margin-bottom:1180px;
        left:300px;
    }
    #footerSpecialInEvaluationService{
        position:relative;
        right:0px;
        top:0px;
        color:#919191;
    }
    }
    @media only screen and (width: 1024px){
        .evaluat-request{
            width:900px;
            right:-65px;
        }
        
        .evaluat-request h3{
            margin-right:50px;
        }
        
        .evaluat-request h4{
            position:relative;
            right:-50px;
        }
        
    .formas1 input{
        position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas1 img{
        position:relative;
        right:-70px;
        top:-54px;
    }
    
    .formas1 label{
        position:relative;
        right:-50px;
        top:0px;
    }
    
    .formas2 input{
        position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas2 img{
        position:relative;
        right:-70px;
        top:-50px;
    }
    
    .formas2 label{
        position:relative;
        right:-40px;
        top:0px;
    }
    
    .formas3 input{
       position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas3 img{
        position:relative;
        right:-70px;
        top:-54px;
    }
    
    .formas3 label{
        position:relative;
        right:-40px;
        top:0px;
    }
    
    
    .formas4 input{
        position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas4 img{
        position:relative;
        right:-70px;
        top:-52px;
    }
    
    .formas4 label{
        position:relative;
        right:-40px;
        top:0px;
    }
    
    .formas5 textarea{
        position:relative;
        right:-120px;
        top:0px;
    }
    
    .formas5 label{
        position:relative;
        right:-45px;
        top:-120px;
    }
    
    .formsInputsAll{
        width:800px;
    }
    .buttonForSubmitInfo{
        position:relative;
        right:100px;
    }
    .buttonForSubmitInfo:hover{
        background:  goldenrod;
        color:#fff;
    }
    .btnForResult{
        border:2px solid goldenrod;
        width: 150px;
        padding: 10px;
        border-radius: 50px;
        color:#fff;
        transition: all .5s;
        background: goldenrod;
        position:relative;
        top:50px;
    }
    
    #pillar_id{
        width:400px;
    }
    #footerInEvaluationSystem{
        position:relative;
        margin-bottom:1180px;
        left:300px;
    }
    #footerSpecialInEvaluationService{
        position:relative;
        right:0px;
        top:0px;
        color:#919191;
    }
    }
    @media screen and (min-width:600px) and (max-width:991px) {
        .evaluat-request{
            width:700px;
            height:1900px;
            right:0px;
            margin-top:50px;
        }
        
        .evaluat-request h3{
            position:relative;
            right:-70px;
        }
        
        .evaluat-request h4{
            position:relative;
            right:-80px;
        }
        
    .formas1 input{
        position:relative;
        right: -70px;
        top: -20px;
        width: 180px;
    }
    
    .formas1 img{
        position:relative;
        right: -255px;
        top: -20px;
    }
    
    .formas1 label{
        position:relative;
        right:-10px;
        top:-45px;
    }
    
    .formas2 input{
        position:relative;
        right: -120px;
        top: -10px;
        width:180px;
    }
    
    .formas2 img{
        position:relative;
        right: -310px;
        top: -10px;
    }
    
    .formas2 label{
        position:relative;
        right: -10px;
        top: -35px;
    }
    
    .formas3 input{
       position:relative;
        right: -95px;
        top: 5px;
        width:180px;
    }
    
    .formas3 img{
        position:relative;
        right: -290px;
        top: 3px;
    }
    
    .formas3 label{
        position:relative;
        right: -5px;
        top: -25px;
    }
    
    
    .formas4 input{
        position:relative;
        right: -70px;
        top: 10px;
        width:180px;
    }
    
    .formas4 img{
        position:relative;
        right: -260px;
        top: 7px;
    }
    
    .formas4 label{
        position:relative;
        right: 0px;
        top: -15px;
    }
    
    
    .formas5 textarea{
        position:relative;
        right: -60px;
        top: 20px;
    }
    
    .formas5 label{
        position:relative;
        right: 0px;
        top: -100px;
    }
    
    .formsInputsAll{
        width:600px;
    }
    .buttonForSubmitInfo{
        position:relative;
        right:0px;
    }
    .buttonForSubmitInfo:hover{
        background:  goldenrod;
        color:#fff;
    }
    .btnForResult{
        border:2px solid goldenrod;
        width: 150px;
        padding: 10px;
        border-radius: 50px;
        color:#fff;
        transition: all .5s;
        background: goldenrod;
        position:relative;
        top:50px;
    }
    
    #pillar_id{
        width:400px;
    }
    #footerInEvaluationSystem{
        position:relative;
        margin-bottom:1300px;
        left:300px;
    }
    #footerSpecialInEvaluationService{
        position:relative;
        right:0px;
        top:0px;
        color:#919191;
    }
    }
    @media (max-width: 500px){
        .evaluat-request{
            width:370px;
            height:2130px;
            right:0px;
            margin-top:50px;
        }
        
        .evaluat-request h3{
            position:relative;
            right:-70px;
        }
        
        .evaluat-request h4{
            position:relative;
            right:-130px;
        }
        
    .formas1 input{
        position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas1 img{
        position:relative;
        right: -70px;
        top: -53px;
    }
    
    .formas1 label{
        position:relative;
        right:-40px;
        top:0px;
    }
    
    
    .formas2 input{
        position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas2 img{
        position:relative;
        right: -70px;
        top: -51px;
    }
    
    .formas2 label{
        position:relative;
        right:-40px;
        top:0px;
    }
    
    .formas3 input{
       position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas3 img{
        position:relative;
        right: -70px;
        top: -54px;
    }
    
    .formas3 label{
        position:relative;
        right:-40px;
        top:0px;
    }
    
    
    .formas4 input{
        position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas4 img{
        position:relative;
        right: -70px;
        top: -52px;
    }
    
    .formas4 label{
        position:relative;
        right:-40px;
        top:0px;
    }
    
    .formas5 textarea{
        position:relative;
        right:-60px;
        top:0px;
        width:250px;
    }
    
    .formas5 label{
        position:relative;
        right:-40px;
        top:0px;
    }
    
    .formsInputsAll{
        width:200px;
    }
    .buttonForSubmitInfo{
        position:relative;
        right:20px;
        width:200px;
    }
    .buttonForSubmitInfo:hover{
        background:  goldenrod;
        color:#fff;
    }
    .btnForResult{
        border:2px solid goldenrod;
        width: 150px;
        padding: 10px;
        border-radius: 50px;
        color:#fff;
        transition: all .5s;
        background: goldenrod;
        position:relative;
        top:50px;
    }
    
    #pillar_id{
        width:400px;
    }
    #footerInEvaluationSystem{
        position:relative;
        margin-bottom:1300px;
        left:300px;
    }
    #footerSpecialInEvaluationService{
        position:relative;
        right:0px;
        top:0px;
        color:#919191;
    }
    }
    @media only screen and (width: 393px){
        .evaluat-request{
            width:350px;
            margin-top:50px;
        }
    }
    
    @media only screen and (width: 375px){
        .evaluat-request{
            width:350px;
            right:-20px;
            margin-top:50px;
        }
    }
    
    @media only screen and (width: 360px){
        .evaluat-request{
            width:320px;
            height:1930px;
            right:-10px;
            overflow-x:hidden;
            margin-top:50px;
        }
        .buttonForSubmitInfo{
            right:0px;
        }
    }
    
    @media only screen and (width: 320px){
        .evaluat-request{
            width:320px;
            height:2150px;
            right:-40px;
            margin-top:50px;
        }
        .formsInputsAll{
           width:150px;
        }
        .formas5 textarea{
            width:220px;
        }
        .formas5 label{
            top:-10px;
        }
        .buttonForSubmitInfo{
            right:0px;
        }
        #footerInEvaluationSystem{
            position:relative;
            margin-bottom:1500px;
            left:300px;
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
                        <div class="evaluat-request">
                            <h3>خدمة التقييم الذاتي</h3>
                            <form action="{{route('result.store')}}" method="POST" id="registerUserResults" class="formsInputsAll">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 formas1">
                                        <label>الاسم</label>
                                        <input type="text" name="name" class="input1" id="name" placeholder="@error('name') {{$message}} @enderror"/>
                                        <img src="{{asset('assets/images/Group 2980.png')}}"/>
                                    </div>
                                    
                                    <div class="col-md-3 formas2">
                                        <label>البريد الإلكتروني</label>
                                        <input type="email" name="email" class="input2" id="email" placeholder="@error('email') {{$message}} @enderror"/>
                                        <img src="{{asset('assets/images/emailNmthgah.png')}}"/>
                                    </div>
                                    
                                    <div class="col-md-3 formas3">
                                        <label>اسم الوقف</label>
                                        <input type="text" name="waqf" class="input3" id="waqf" placeholder="@error('waqf') {{$message}} @enderror"/>
                                        <img src="{{asset('assets/images/Icon awesome-building.png')}}"/>
                                    </div>
                                    
                                    <div class="col-md-3 formas4">
                                        <label>المدينة</label>
                                        <input type="text" name="city" class="input4" id="city" placeholder="@error('city') {{$message}} @enderror"/>
                                        <img src="{{asset('assets/images/Icon awesome-flag.png')}}"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 formas5">
                                        <label>وصف الوقف</label>
                                        <textarea name="description" cols="50" rows="3" class="input5"></textarea>
                                    </div>
                                </div>
                                
                                <br>
                                
                                <h4>أسئلة التقييم</h4>
                                
                                <p style="color:red;">@error('ResultsService.*.result') {{$message}} @enderror</p>
                                <ul id="myUL" class="myUL" style="list-style-type: none;padding:10px" class="list-group">
                                
                                </ul>
                                
                            </form>
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
            $.ajax({
                url:'/getQuestionsFromPillars',
                method:'GET',
                success:function(data){
                    $('#myUL').html(data);
                },error:function(error){
                    console.log(error);
                }
            });
        });
    });
</script>