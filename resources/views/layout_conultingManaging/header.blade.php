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
      color: goldenrod;
    }
    
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
      color: goldenrod;
    }
    
    ::placeholder {
      color: goldenrod;
    }
    .loginco{
        z-index:1;
    }
    .checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: goldenrod;
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
        box-shadow: inset 0px 0px 0px goldenrod;
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
            box-shadow: inset 0px 0px 0px 30px goldenrod;
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

    .evaluat-request{
        background: #fff;
        padding: 30px;
        height: 450px;
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
        right:60px;
    }
    
    .formas2 img{
        position:relative;
        right:60px;
        top:-50px;
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
        right:90px;
    }
    
    .formas4 img{
        position:relative;
        right:90px;
        top:-52px;
    }
    
    .formas6 select{
        border:none;
        outline:0;
        border-bottom:1px solid #ddd;
        position:relative;
        top:20px;
        width:250px;
        right:0px;
        padding:1px;
        color:goldenrod;
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
        top:120px;
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
        margin-bottom:0px;
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
    
    .buttonForSubmitInfo{
        position:relative;
        right:100px;
    }
    .buttonForSubmitInfo:hover{
        background:  goldenrgoldenrod;
        color:#fff;
    }
    .btnForResult{
        border:2px solid goldenrgoldenrod;
        width: 150px;
        padding: 10px;
        border-radius: 50px;
        color:#fff;
        transition: all .5s;
        background: goldenrgoldenrod;
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
        
        .evaluat-request h4{
            position:relative;
            right:-50px;
        }
        .evaluat-request h3{
            margin-right:20px;
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
    
    
    .formas2 input{
        position:relative;
        right:10px;
        width:180px;
    }
    
    .formas2 img{
        position:relative;
        right:10px;
        top:-50px;
    }
    
    .formas4 input{
        position:relative;
        right:80px;
        width:180px;
    }
    
    .formas4 img{
        position:relative;
        right:80px;
        top:-52px;
    }
    .formas6 select{
        position:relative;
        right:-60px;
        top:20px;
    }
    
    .formsInputsAll{
        width:800px;
    }
    .buttonForSubmitInfo{
        position:relative;
        right:100px;
        top:90px;
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
        margin-bottom:80px;
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
            height:500px;
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
        right:-70px;
        width:180px;
    }
    
    .formas1 img{
        position:relative;
        right: -255px;
        top: -2px;
    }
    
    
    .formas2 input{
        position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas2 img{
        position:relative;
        right: -254px;
        top: 1px;
    }
    
    
    .formas4 input{
        position:relative;
        right:-70px;
        width:180px;
    }
    
    .formas4 img{
        position:relative;
        right: -255px;
        top: -1px;
    }
    
    .formas6 select{
        position:relative;
        top:30px;
        right:-50px;
    }
    .formsInputsAll{
        width:600px;
    }
    .buttonForSubmitInfo{
        position:relative;
        right:0px;
        top:80px;
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
        margin-bottom:0px;
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
            height:550px;
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
    
    .formas6 select{
        position:relative;
        right:-70px;
        top:-5px;
    }
    .formsInputsAll{
        width:200px;
    }
    .buttonForSubmitInfo{
        position:relative;
        right:-30px;
        width:200px;
        top:50px;
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
        margin-bottom:80px;
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
            height:550px;
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
            height:550px;
            right:-10px;
            overflow-x:hidden;
            margin-top:50px;
        }
        .buttonForSubmitInfo{
            right:-50px;
            top:40px;
        }
        .formas6 select{
            position:relative;
            right:-70px;
            top:-10px;
        }
    }
    
    @media only screen and (width: 320px){
        .evaluat-request{
            width:320px;
            height:500px;
            right:-40px;
            margin-top:50px;
        }
        .formsInputsAll{
           width:150px;
        }
        .formas6 select{
            position:relative;
            right:-70px;
            top:-20px;
        }
        .buttonForSubmitInfo{
            right:-40px;
            top:20px;
        }
        #footerInEvaluationSystem{
            position:relative;
            margin-bottom:70px;
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
                            <h3>خدمة الاستشارة الإدراية</h3>
                            <form id="registerConsultingManaging" class="formsInputsAll">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 formas1">
                                        <input type="text" name="name" class="input1" id="name" placeholder="@error('name') {{$message}} @else الاسم @enderror"/>
                                        <img src="{{asset('assets/images/Group 2980.png')}}"/>
                                    </div>
                                    
                                    <div class="col-md-3 formas2">
                                        <input type="email" name="email" class="input2" id="email" placeholder="@error('email') {{$message}} @else البريد الإلكتروني @enderror"/>
                                        <img src="{{asset('assets/images/emailNmthgah.png')}}"/>
                                    </div>
                                    
                                    <div class="col-md-3 formas4">
                                        <input type="text" name="city" class="input4" id="city" placeholder="@error('city') {{$message}} @else المدينة @enderror"/>
                                        <img src="{{asset('assets/images/Icon awesome-flag.png')}}"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 formas6">
                                        <select id="type" name="type" class="form-control">
                                            <option disabled selected>-- اختر نوع خدمة الإستشارة الإدارية --</option>
                                            @foreach($conuslTypes as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" onclick="saveDataConsultingMnaager();" class="buttonForSubmitInfo">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- container -->
            <div class="modal" id="variableModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </section>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#registerConsultingManaging').on('submit' , function(e){
            e.preventDefault();
        });
        // $(document).on('click' , 'body' , function(){
        //     $('#variableModal2').hide();
        //     $('#uploadingModal').hide();
        // });
    });
    function saveDataConsultingMnaager(){
        var name = $('#name').val();
        var email = $('#email').val();
        var city = $('#city').val();
        var type = $('#type').val();
        
        if(name == "" || email == "" || city == "" || type == null){
            $('#modal_message2').text('من فضلك تأكد من إدخال البيانات بصورة صحيحة').css('font-family' , 'cr');
            $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>');
            $('#variableModal2').fadeIn().show();
            setTimeout(function (){
                $('#variableModal2').fadeOut("slow").hide();
            },4000);
        }else{
            $.ajax({
                url:'/saveDataOfConsultingManaging',
                method:'POST',
                data:{_token: "{{ csrf_token() }}" , name:name, email:email, city:city, type:type},
                success:function(response){
                    if(response == 1){
                        $('#name').val("");$('#email').val("");$('#city').val("");
                        
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
</script>