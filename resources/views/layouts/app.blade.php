<!doctype html>
<html>
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="assets/css/fontawsome.css" >
    <link rel="stylesheet" href="assets/js/owl-carousel/owl.transitions.css">
    <link rel="stylesheet" href="assets/js/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/login.css" >
    <title>Indicator</title>
    <style>
        .loginco{
            z-index:1;
        }
    </style>
  </head>
  <body>
    

    <section class="login-page">
        <div class="container">
            <nav>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <a href="/login"><i class="fa fa-home"></i> الرئيسية </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            </nav>
            <div class="loginco">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="login-form">
                            <h3 class="login-title">تسجيل الدخول للنظام</h3>
                            <div class="login-tab">
                                
                                <div class="login-tab-head">
                                    <a href=".tab1" class="htab">العملاء</a>
                                    <a href=".tab2">المستشارين</a>
                                </div><!-- login-tab-head -->
                                <div class="login-tab-body">
                                    <div class="tabitem btab tab1">
                                        <form id="submitFormForUser">
                                            @csrf
                                            <div class="tab-form-item">
                                                <input type="text" id="emailUsers" name="email" placeholder="البريد الإلكترونى">
                                                <i class="fa fa-user"></i>
                                            </div><!-- tab-form-item -->
                                            <div class="tab-form-item">
                                                <input type="password" id="passwordUsers" name="password" placeholder="كلمة المرور">
                                                <i class="fa fa-lock"></i>
                                            </div><!-- tab-form-item -->
                                                <p style="font-family:cr;color:#00A490">ليس لديك حساب؟ <span style="font-family:cr"><a href="/registerIndicator" style="font-family:cr;color:#00A490;text-decoration:underline">سجل الآن</a></span></p>
                                            <div class="tab-form-item">
                                                <button type="submit">تسجيل دخول</button>
                                            </div><!-- tab-form-item -->
                                        </form>
                                    </div><!-- tabitem -->
                                    <div class="tabitem tab2">
                                        <form id="submitFormForConsultants">
                                        @csrf
                                        <div class="tab-form-item">
                                            <input type="text" id="emailConsultants" name="email" placeholder="البريد الالكتروني">
                                            <i class="fa fa-user"></i>
                                        </div><!-- tab-form-item -->
                                        <div class="tab-form-item">
                                            <input type="password" id="passwordConsultants" name="password" placeholder="كلمة المرور">
                                            <i class="fa fa-lock"></i>
                                        </div><!-- tab-form-item -->
                                        <div class="tab-form-item">
                                            <button type="submit">تسجيل دخول</button>
                                        </div><!-- tab-form-item -->
                                        </form>
                                    </div><!-- tabitem -->
                                </div><!-- login-tab-body -->
                            </div><!-- login-tab -->
                        </div><!-- login-form -->
                    </div><!-- col -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="logo">
                            <img src="{{asset('assets/images/Namthga-06.png')}}" style="position:relative;top:30px;" alt="">
                        </div>
                    </div><!-- col -->
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                </div><!-- row -->
            </div>
            
            <div class="modal" id="variableModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:9999">
                <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat;z-index: 9999;">
            
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <footer>
            <a href="https://cmark.sa" id="LinkLoginUserAndConsultant">جميع الحقوق محفوظة لشركة CMark © 2020</a>
        </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl-carousel/owl.carousel.js"></script>
    <script src="assets/js/script.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#submitFormForUser').on('submit' , function(e){
                e.preventDefault();
                var email = $('#emailUsers').val();
                var password = $('#passwordUsers').val();
                if(email == "" || password == ""){
                    $('#modal_message2').text('من فضلك أدخل البريد الإلكتروني والرقم السري بصورة صحيحة').css('font-family', 'cr');
                    $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                    $('#variableModal2').fadeIn().show();
                    setTimeout(function (){
                        $('#variableModal2').fadeOut("slow").hide();
                    },4000);
                }else{
                    $.ajax({
                        url:'/loginUser',
                        method:'POST',
                        data:{_token: "{{ csrf_token() }}" , email:email, password:password},
                        success:function(response){
                            console.log(response);
                            if(response == 0){
                                $('#modal_message2').text('البريد الإلكتروني أو الرقم السري غير صحيح').css('font-family', 'cr');
                                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                                $('#variableModal2').fadeIn().show();
                                setTimeout(function (){
                                    $('#variableModal2').fadeOut("slow").hide();
                                },4000);
                            }else if(response == 1){
                                location.href = "https://nmthgah.com/home";
                            }else{
                                console.log('something wrong in function server');
                            }
                        },error:function(error){
                            console.log(error);
                        },
                    });
                }
            });
            
            $('#submitFormForConsultants').on('submit' , function(e){
                e.preventDefault();
                var email = $('#emailConsultants').val();
                var password = $('#passwordConsultants').val();
                if(email == "" || password == ""){
                    $('#modal_message2').text('من فضلك أدخل البريد الإلكتروني والرقم السري بصورة صحيحة').css('font-family', 'cr');
                    $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                    $('#variableModal2').fadeIn().show();
                    setTimeout(function (){
                        $('#variableModal2').fadeOut("slow").hide();
                    },4000);
                }else{
                    $.ajax({
                        url:"{{route('consultant.login.submit')}}",
                        method:'POST',
                        data:{_token: "{{ csrf_token() }}" , email:email, password:password},
                        success:function(response){
                            // console.log(response);
                            if(response == 0){
                                $('#modal_message2').text('البريد الإلكتروني أو الرقم السري غير صحيح').css('font-family', 'cr');
                                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                                $('#variableModal2').fadeIn().show();
                                setTimeout(function (){
                                    $('#variableModal2').fadeOut("slow").hide();
                                },4000);
                            }else {
                                location.href = "https://nmthgah.com/consultant";
                            }
                        },error:function(error){
                            console.log(error);
                        },
                    });
                }
            });
            $(document).on('click' , 'body' , function(){
                $('#variableModal2').hide();
            });
        });
        //action="{{route('login')}}" method="POST"
        //action="{{route('consultant.login.submit')}}" method="POST"
    </script>
  </body>
</html>