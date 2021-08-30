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
    <link rel="stylesheet" href="assets/css/indicator.css" >
    <title>Indicator</title>
  </head>
  <body>
    
    <header>
        <div class="container">
            <div class="header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="main_btn">
                            <a href="{{url('')}}">العودة إلى نمذجة الابتكار</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="logo">
                            <img src="assets/images/kf2a.png" alt="">
                        </div><!-- logo -->
                    </div><!-- col -->
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <h3>التقييم الالكتروني لمشاريع مؤشر الكفاءة الوقفية</h3>
                        <div class="header_btns">
                            <a href="{{url('logout')}}">تسجيل خروج</a>
                        </div><!-- header_btns -->
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- header -->
        </div><!-- container -->
    </header>

    <section class="projects">
        <div class="container">
            <div class="row">
                @if(!empty($projects))
                    @foreach($projects as $project)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <a href="{{url('')}}/projects/{{$project->id}}" class="project-item">
                            <h3>{{$project->title}}</h3>
                            <img src="{{url('uploads')}}/{{$project->image}}" alt="{{$project->title}}">
                        </a><!-- project-item -->
                    </div><!-- col -->
                    @endforeach
                @endif
            </div><!-- row -->
        </div><!-- container -->
    </section>

    
    <footer>
        <a href="">جميع الحقوق محفوظة لشركة <span>CMark</span> © 2019</a>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl-carousel/owl.carousel.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>