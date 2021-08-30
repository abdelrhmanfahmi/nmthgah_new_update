<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content=" 2017 © YEAR SOLUTIONS ">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/style/images/logo.jpg">
    <title></title>
    <!-- Bootstrap Core CSS -->
    <link href="{{url('')}}/style/assets//plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('')}}/style/assets//plugins/bootstrap-rtl-master/dist/css/custom-bootstrap-rtl.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('')}}/style/css/style.css" rel="stylesheet">
    <link href="{{url('')}}/style/css/main.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{url('')}}/style/css/colors/red.css" id="theme" rel="stylesheet">
    
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="z-index:1">
            <div class="login-box card">
            <div class="card-block">
                <form id="submitFormAdminPanel">
                    @csrf
                    <h3 class="box-title m-b-20">تسجيل دخول</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="email" id="emailAdmin"placeholder="البريد الالكترونى"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="passwordAdmin" autocomplete="off" name="password" placeholder="كلمة المرور"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" name="remember_token" type="checkbox">
                                <label for="checkbox-signup"> تذكرنى </label>
                            </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> هل نسيت كلمة المرور ؟</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-purple btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">تسجيل دخول</button>
                        </div>
                    </div>
                    
                    </form>

                  
            </div>
          </div>
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
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{url('')}}/style/assets//plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('')}}/style/assets//plugins/bootstrap/js/tether.min.js"></script>
    <script src="{{url('')}}/style/assets//plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('')}}/style/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="{{url('')}}/style/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{url('')}}/style/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="{{url('')}}/style/assets//plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="{{url('')}}/style/js/custom.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{url('')}}/style/assets//plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script>
        $(document).ready(function(){
            $('#submitFormAdminPanel').on('submit' , function(e){
                e.preventDefault();
                var email = $('#emailAdmin').val();
                var password = $('#passwordAdmin').val();
                if(email == "" || password == ""){
                    $('#modal_message2').text('من فضلك أدخل البريد الإلكتروني والرقم السري بصورة صحيحة').css('font-family', 'cr');
                    $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                    $('#variableModal2').fadeIn().show();
                    setTimeout(function (){
                        $('#variableModal2').fadeOut("slow").hide();
                    },4000);
                }else{
                    $.ajax({
                        url:"{{route('admin.login.submit')}}",
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
                                location.href = "https://nmthgah.com/admin";
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
    </script>
    
</body>

</html>
