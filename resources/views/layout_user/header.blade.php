<!doctype html>

<head>
    
</head>
<body>
        

    <section class="login-page">
        <div class="container">
            <nav>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <a id="mainPages" href="#"><i style="margin-left:10px;" class="fa fa-home"></i> الرئيسية </a>
            <a id="logout" href="{{route('user.logout')}}">تسجيل خروج <i class="fas fa-sign-out-alt"></i></a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            </nav>
            @if(Session::has('msg'))
            <p id="timeLayouts" class="alert alert-success">{{ Session::get('msg') }}</p>
            @endif
            <div class="loginco">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="home-form">
                            <h3 class=home-title>الخدمات</h3>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="firstBorder">
                                        <img id="ImageBorderGroup" src="{{asset('assets/images/Group 3330.png')}}" width="78px" height="75px" alt="">
                                        <div class="setProject">إنشاء مشروع</div>
                                        
                                    </div>
                                    <button id="btnHomeUser">الذهاب</button>
                                </div>
                                <div class="col-md-6">
                                    <div class="secondBorder">
                                        <img id="ImageBorderGroup2" src="{{asset('assets/images/Group 3332.png')}}" width="78px" height="75px" alt="">
                                        <div class="setProject2">متابعة مشروع</div>
                                        
                                    </div>
                                    <button id="btnHomeUser2">الذهاب</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row -->
            </div>
        </div><!-- container -->
        
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            setTimeout(function(){
               $('#timeLayouts').fadeOut(3000);// or fade, css display however you'd like.
            }, 5000);
        });
    </script>
</body>
</html>
