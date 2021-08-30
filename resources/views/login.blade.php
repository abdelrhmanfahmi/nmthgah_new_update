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
  </head>
  <body>
    

    <section class="login-page">
        <div class="container">
            <nav>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <a href="{{url('indicator')}}"><i class="fa fa-home"></i> الرئيسية </a>
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
                                        <form action="{{route('login')}}" method="POST">
                                            @csrf
                                            <div class="tab-form-item">
                                                <input type="text" name="email" placeholder="البريد الإلكترونى">
                                                <i class="fa fa-user"></i>
                                            </div><!-- tab-form-item -->
                                            <div class="tab-form-item">
                                                <input type="password" name="password" placeholder="كلمة المرور">
                                                <i class="fa fa-lock"></i>
                                            </div><!-- tab-form-item -->
                                                <p style="font-family:cr;color:#00A490">ليس لديك حساب؟ <span style="font-family:cr"><a href="/registerIndicator" style="font-family:Pass Through;color:#00A490">سجل الآن</a></span></
                                            <div class="tab-form-item">
                                                <button type="submit">تسجيل دخول</button>
                                            </div><!-- tab-form-item -->
                                        </form>
                                    </div><!-- tabitem -->
                                    <div class="tabitem tab2">
                                        <form action="{{route('consultant.login.submit')}}" method="POST">
                                        @csrf
                                        <div class="tab-form-item">
                                            <input type="text" name="email" placeholder="البريد الالكتروني للمستشارين">
                                            <i class="fa fa-user"></i>
                                        </div><!-- tab-form-item -->
                                        <div class="tab-form-item">
                                            <input type="password" name="password" placeholder="كلمة المرور">
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
                            <img src="{{asset('assets/images/Namthga-06.png')}}" alt="">
                            @include('admin.errors')
                        </div>
                    </div><!-- col -->
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                </div><!-- row -->
            </div>
        </div><!-- container -->
    </section>

    <footer>
        <a href="">جميع الحقوق محفوظة لشركة <span>CMark</span> © 2020</a>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl-carousel/owl.carousel.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>