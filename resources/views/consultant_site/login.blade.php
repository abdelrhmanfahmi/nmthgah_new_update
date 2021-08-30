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
                                    <a href=".tab2">المستشاريين</a>
                                </div><!-- login-tab-head -->
                                
                                        <form action="{{ route('consultant.login.submit') }}" method="POST">
                                            <div class="tab-form-item">
                                                <input type="text" name="email" placeholder="البريد الإلكترونى">
                                                <i class="fa fa-user"></i>
                                            </div><!-- tab-form-item -->
                                            <div class="tab-form-item">
                                                <input type="password" name="password" placeholder="كلمة المرور">
                                                <i class="fa fa-lock"></i>
                                            </div><!-- tab-form-item -->
                                            <div class="tab-form-item">
                                                {!! csrf_field()!!}
                                                <button type="submit">تسجيل دخول</button>
                                            </div><!-- tab-form-item -->
                                        </form>
                                    
                            </div><!-- login-tab -->
                        </div><!-- login-form -->
                    </div><!-- col -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="logo">
                            <img src="{{url('')}}/assets/images/kf2a.png" alt="">
                            @include('admin.errors')
                        </div>
                    </div><!-- col -->
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                </div><!-- row -->
            </div>
        </div><!-- container -->
    </section>

    <footer>
        <a href="">جميع الحقوق محفوظة لشركة <span>CMark</span> © 2019</a>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{url('')}}/assets/js/jquery.min.js"></script>
    <script src="{{url('')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{url('')}}/assets/js/owl-carousel/owl.carousel.js"></script>
    <script src="{{url('')}}/assets/js/script.js"></script>
  </body>
</html>