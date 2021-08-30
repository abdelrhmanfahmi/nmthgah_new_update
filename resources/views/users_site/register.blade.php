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
        ::-webkit-input-placeholder { /* Edge */
          color: red;
          font-size:10px;
        }
        
        :-ms-input-placeholder { /* Internet Explorer 10-11 */
          color: red;
          font-size:10px;
        }
        
        ::placeholder {
          color: red;
          font-size:10px;
        }
        .countryCode{
            color:#1BA590;
            position:relative;
            top:30px;
            right:130px;
        }
        @media screen and (min-width:600px) and (max-width:991px) {
            .countryCode{
                top: -45px;
                right: 115px;
                z-index: 9999;
            }
        }
        @media (max-width: 500px){
            .countryCode{
                top: -115px;
                right: 120px;
                z-index: 9999;
            }
        }
        @media only screen and (width: 393px){
            .countryCode{
                top: -110px;
                z-index: 9999;
            }
        }
        @media only screen and (width: 320px){
            .countryCode{
                top: -105px;
                z-index: 9999;
            }
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
                        <div class="register-form">
                            <h3 class="login-title">تسجيل حساب عميل جديد</h3>
                            <div class="login-tab">
                                <div class="row">
                                    <form action="{{route('register')}}" method="POST">
                                        @csrf
                                    <div class="col-md-4 serv-form-item1 fahmy1">
                                        <label>الاسم الاول</label>
                                        <input type="text" name="first_name" placeholder="@error('first_name') {{ $message }} @enderror" value="{{old('first_name')}}">
                                        <!--<i class="fa fa-user"></i>-->
                                        <img src="{{asset('assets/images/Group 2980.png')}}"/>
                                    </div>
                                     <div class="col-md-4 serv-form-item2 fahmy2">
                                        <label>الاسم الثاني</label>
                                        <input type="text" name="last_name" placeholder="@error('last_name') {{ $message }} @enderror" value="{{old('last_name')}}">
                                        <!--<i class="fa fa-user"></i>-->
                                        <img src="{{asset('assets/images/Group 2980.png')}}"/>
                                    </div>
                                    <div class="col-md-4 serv-form-item3 fahmy3">
                                        <label>البريد الالكتروني</label>
                                        <input type="email" name="email" placeholder="@error('email') {{ $message }} @enderror">
                                        <!--<i class="fa fa-user"></i>-->
                                        <img src="{{asset('assets/images/emailNmthgah.png')}}"/>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 serv-form-item1 fahmy4">
                                        <label>كلمة المرور</label>
                                        <input type="password" name="password" placeholder="@error('password') {{ $message }} @enderror">
                                        <!--<i class="fa fa-user"></i>-->
                                        <img src="{{asset('assets/images/change-password.png')}}"/>
                                    </div>
                                     <div class="col-md-4 serv-form-item2 fahmy5">
                                        <label>رقم الجوال</label>
                                        <span class="countryCode">966+</span>
                                        <input type="text" id="phoneRegister" name="phone" placeholder="@error('phone') {{ $message }} @enderror">
                                        <!--<i class="fa fa-user"></i>-->
                                        <img src="{{asset('assets/images/Icon awesome-phone-alt.png')}}"/>
                                    </div>
                                    <div class="col-md-4 serv-form-item3 fahmy6">
                                        <label>المنطقة</label>
                                        <input type="text" name="city" placeholder="@error('city') {{ $message }} @enderror" value="{{old('city')}}">
                                        <!--<i class="fa fa-user"></i>-->
                                        <img src="{{asset('assets/images/Icon awesome-flag.png')}}"/>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 serv-form-item1 fahmy7">
                                        <label>الشركة</label>
                                        <input type="text" name="company" placeholder="@error('company') {{ $message }} @enderror" value="{{old('company')}}">
                                        <!--<i class="fa fa-user"></i>-->
                                        <img src="{{asset('assets/images/Icon awesome-building.png')}}"/>
                                    </div>
                                     <div class="col-md-4 serv-form-item2 fahmy8">
                                        <label>المسمي الوظيفي</label>
                                        <input type="text" name="job_title" placeholder="@error('job_title') {{ $message }} @enderror" value="{{old('job_title')}}">
                                        <!--<i class="fa fa-user"></i>-->
                                        <img src="{{asset('assets/images/Group 3258.png')}}"/>
                                    </div>
                                    <div class="tab-form-item" style="display: none;">
                                        <input type="text" value="1" name="admin_id">
                                    </div><!-- tab-form-item -->
                                </div>
                                    <div class="tab-form-itemsResponsive">
                                        <button id="btnFahmy" type="submit">تسجيل</button>
                                    </div><!-- tab-form-item -->
                                    <p id="pInResponsiveReg" style="text-align:center;font-family:cr;color:#00A490">لديك حساب بالفعل؟ <span><a href="/login" style="font-family:cr;color:#00A490;text-decoration:underline">سجل دخول</a></span></p>
                                </form>
                            </div><!-- login-tab -->
                        </div><!-- login-form -->
                    </div><!-- col -->
                    
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                </div><!-- row -->
            </div>
        </div><!-- container -->
    </section>
    
        


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <footer id="footerRegisterUser">
        <a href="https://cmark.sa" id="linkResponsiveReg">جميع الحقوق محفوظة لشركة CMark © 2020</a>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl-carousel/owl.carousel.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/script2.js"></script>
  </body>
</html>