<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    

    <!-- Styles -->
    <!-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> -->
</head>
<body>
    <div id="app">
        

        <section class="login-page">
        <div class="container">
            <nav>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <a href="#"><i class="fa fa-home"></i> الرئيسية </a>
            <a href="#"><i class="fa fa-address-card"></i> من نحن </a>
            <a href="#"><i class="fa fa-phone"></i> تواصل معنا </a>
            <a  href="{{ route('project.logout')}}" ><i class="fa fa-sign-out-alt"></i>
              تسجيل خروج
               </a>
            <!-- <form id="logout-form" action="{{ route('project.logout')}}"
                method="POST" style="display: none;">
                @csrf
            </form> -->
            </div>
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            </nav>
            <div class="loginco">
                <div class="row">
                    
                </div><!-- row -->
            </div>
        </div><!-- container -->
    </section>

    </div>
</body>
</html>
