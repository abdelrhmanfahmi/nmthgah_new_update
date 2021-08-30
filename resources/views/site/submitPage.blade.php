<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawsome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/owl-carousel/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!--<link rel="stylesheet" href="{{asset('style/assets/plugins/dropify/dist/css/dropify.css')}}">-->
    <link rel="stylesheet" href="{{asset('style/assets/plugins/dropify/dist/css/dropify.css')}}">
    <!--<link rel="stylesheet" href="{{url('style/assets/plugins/dropify/dropify.css')}}">-->

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <title>نمذجــــة</title>
    
        <style>
         .borda {
             -webkit-box-shadow: 3px 3px 5px 3px rgba(232, 232, 232, 0.7);
            -moz-box-shadow: 3px 3px 5px 3px rgba(232, 232, 232, 0.7);
            box-shadow: 3px 3px 5px 3px rgba(232, 232, 232, 0.7);
            border-radius: 13px;
            width: 600px;
            margin-right: 270px;
            height: 190px;
            cursor: pointer;
        }

        .files {
            border: 2px dashed goldenrod;
            width: 573px;
            /*margin-right: 5px;*/
            padding: 20px;
            position: relative;
            top: 10px;
            height: 170px;
            border-radius: 10px;
            cursor: pointer;
        } 
        
        @media only screen and (width: 768px){
            
           .borda{
            -webkit-box-shadow: 3px 3px 5px 3px rgba(232, 232, 232, 0.7);
            -moz-box-shadow: 3px 3px 5px 3px rgba(232, 232, 232, 0.7);
            box-shadow: 3px 3px 5px 3px rgba(232, 232, 232, 0.7);
            border-radius: 13px;
            width:315px;
            height:140px;
            position: relative;
            left:100px;
           }
           .files{
            border: 2px dashed goldenrod;
            width:287px;
            height: 120px;
            position:relative;
            /*left:10px;*/
            /*margin-left:50px;*/
           }
           #imgFileUpload{
               width:50px;
               height:50px;
               position:relative;
               bottom:7px;
               left:125px;
            }
        } 
  
  @media only screen and (max-width: 400px){
      
    .borda{
     /* margin:0;
     padding:0; */
     width:230px;
     height: 80px;
     position: relative;
     left:220px;
     /* margin-left:100px; */
    }
    .files{
     /* margin:0;
     padding:0; */
     width:208px;
     height: 60px;
     position:relative;
     left:6px; 
    }
    #imgFileUpload{
       width:30px;
       height:30px;
       position:relative;
       left:150px;
       bottom:20px;
    }
    #imgInp{
        margin-right:200px;
    }
 }
 
    </style>
</head>

<body>
    <div class="navbar" style="background-color:#191919">
        <div class="fixednav">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <div class="logo">
                            @foreach($settings as $set)
                            <a href="{{url('/nmthgah')}}"><img src="{{ asset('uploads/' . $set->logo) }}" alt=""></a>
                            <span class="navicon"><i></i><i></i><i></i></span>
                        </div><!-- logo -->
                    </div><!-- col -->
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 ">
                        <nav>
                            <span class="closenav"></span>
                            <ul>
                                <li><a href="{{route('main.homePage')}}" class="tlink navact">الرئيسية</a></li>
                                <li><a href="{{route('main.homePage')}}" class="tlink">من نحن</a></li>
                                <li><a class="tlink" href="{{route('main.homePage')}}">مجالات أعمالنا</a></li>
                                <li><a class="tlink" href="{{route('main.homePage')}}">مؤشرات نمذجة</a></li>
                                <li><a class="tlink" href="#courses">دورات</a></li>
                                <li><a class="tlink" href="{{route('main.homePage')}}">شركاء النجاح</a></li>
                                <li><a class="tlink" href="{{route('main.homePage')}}">فريق الإستشارة</a></li>
                                <li><a class="tlink" href="#serv-form">طلب خدمة</a></li>
                            </ul>
                        </nav>
                    </div><!-- col -->
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <div class="nav-social">
                            <a target="_blank" href="{{$set->instagram}}"><i class="fab fa-instagram"></i></a>
                            <a target="_blank" href="{{$set->twitter}}"><i class="fab fa-twitter"></i></a>
                            <a target="_blank" href="{{$set->linkedin}}"><i class="fab fa-linkedin"></i></a>
                        </div><!-- nav-social -->
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </div><!-- fixed-nav -->
    </div><!-- navbar -->
    @endforeach
    
    <section class="payment">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="pay">تأكيد الدفع</h3>
                     <p class="pay1"></p>
                </div>
            </div>
        @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                    @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                    @endforeach
               </ul>
             </div>
        @endif
            <br>
            <br>
            <br>
            <br>
            
            <form action="/storeCourseGuest" method="POST" id="myBtn" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 serv-form-item nameInput">
                        <input type="text" style="width:220px;margin-right:20px" value="{{Session::get('name')}}" placeholder="الاسم المسجل" required>
                        <i style="margin-right:30px" class="fa fa-address-book book"></i>
                    </div>
                    <div class="col-md-4 serv-form-item emailInput">
                         <input type="text" style="width:220px;margin-right:20px" value="{{Session::get('email')}}" placeholder="الايميل المسجل" required>
                         <i style="margin-right:30px" class="fa fa-envelope emails"></i>
                     </div>
                     <div class="col-md-4 serv-form-item accountInput">
                         <input type="text" id="account" name="account" style="width:200px;margin-right:20px" placeholder="اسم الحساب المحول منه" >
                         <i style="margin-right:30px" class="fas fa-money-check-alt account"></i>
                         <input type="hidden" value="{{Session::get('user-course-id')}}" name="id" id="id">
                     </div>
                </div>
                    <p style="color:goldenrod;font-size:20px;margin-right:30px;">رفع الايصال</p>
                    <br>
                    <br>
                <div class="row">
                    <div class="col-md-12 borda">
                        <div class="files" id="files">
                            <input type="file" id="imgInp" style="width: 0px;height:0px;overflow: hidden;" name="bankImage"/>
                            <img src="{{asset('assets/images/Namthga-05.png')}}" id="imgFileUpload" style="margin-right:220px;margin-top:15px;" width="70px" height="70px"/>
                        </div>
                    </div>
                </div>
                <!---->
                <div id="myModal2" class="modal2">
                 <div class="modal-content2">
                    <span class="close2">&times;</span>
                    <p>تم تأكيد الدفع بنجاح , وسيتم مراجعتها من قبل الإدارة وشكرا</p>
                 </div>
                </div>
                <!---->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" id="buttonConfirm" style="outline:0;margin-top:30px;border-radius:20px;width:240px;background-color: goldenrod;color:white;margin-left:20px" class="btn btn-default">التأكيد</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
 
    <br>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="copyright">
                        <a href="http://cmark.sa" target="_blank">جميع الحقوق محفوظة لشركة <span>CMark</span> © 2020</a>
                    </div><!-- copyright -->
                </div><!-- col -->
            </div><!-- row -->
            <a class="tlink up" href="#home"><i class="fa fa-chevron-up"></i></a>
        </div><!-- container -->
    </footer>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/hover.js')}}"></script>
    <script src="{{asset('style/assets/plugins/dropify/dist/js/dropify.min.js')}}"></script>
</body>

</html>