<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{url('')}}/assets/images/favicon.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('')}}/assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{url('')}}/assets/css/fontawsome.css" >
    <link rel="stylesheet" href="{{url('')}}/assets/js/owl-carousel/owl.transitions.css">
    <link rel="stylesheet" href="{{url('')}}/assets/js/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{url('')}}/assets/css/login.css" >
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
            <a href="/manager"><i class="fa fa-home"></i> الرئيسية </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            </nav>
            <div class="loginco">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="login-form">
                            <h3 class="login-title">تسجيل الدخول للمدير</h3>
                            <div class="login-tab">
                                
                                
                                        <form id="submitForProjectManager">
                                            @csrf
                                            <div class="tab-form-item">
                                                <input type="email" id="emailProject" name="email" placeholder="اسم المستخدم">
                                                <i class="fa fa-user"></i>
                                            </div><!-- tab-form-item -->
                                            <div class="tab-form-item">
                                                <input type="password" id="passwordProject" name="password" placeholder="كلمة المرور">
                                                <i class="fa fa-lock"></i>
                                            </div><!-- tab-form-item -->
                                            <div class="tab-form-item">
                                                <button type="submit">تسجيل دخول</button>
                                            </div><!-- tab-form-item -->
                                        </form>
                                    
                            </div><!-- login-tab -->
                        </div><!-- login-form -->
                    </div><!-- col -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="logo">
                            <img src="{{asset('assets/images/Namthga-06.png')}}" alt="">
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
        <a href="https://cmark.sa" id="LinkFooterProjectLoginPage">جميع الحقوق محفوظة لشركة <span>CMark</span> © 2020</a>
    </footer>
    <script src="{{url('')}}/assets/js/jquery.min.js"></script>
    <script src="{{url('')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{url('')}}/assets/js/owl-carousel/owl.carousel.js"></script>
    <script src="{{url('')}}/assets/js/script.js"></script>
    <script>
        $(document).ready(function(){
            $('#submitForProjectManager').on('submit' , function(e){
                e.preventDefault();
                var email = $('#emailProject').val();
                var password = $('#passwordProject').val();
                if(email == "" || password == ""){
                    $('#modal_message2').text('من فضلك أدخل البريد الإلكتروني والرقم السري بصورة صحيحة').css('font-family', 'cr');
                    $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                    $('#variableModal2').fadeIn().show();
                    setTimeout(function (){
                        $('#variableModal2').fadeOut("slow").hide();
                    },4000);
                }else{
                    $.ajax({
                        url:"{{route('project.login.submit')}}",
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
                                location.href = "https://nmthgah.com/manager";
                            }else{
                                console.log('something wrong in function server');
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
        //action="{{ route('project.login.submit') }}" method="POST"
    </script>
  </body>
</html>