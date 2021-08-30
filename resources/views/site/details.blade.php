<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
<style>
    @media only screen and (max-width: 400px) {
    .ff {
        position: relative;
        left:30px;
        width:100px;
    }
    .ff2{
        position: relative;
        left:30px;
        width:250px;
    }
    #pInResponsive{
        position: relative;
        left:2px;
    }
    .responsive{
        margin-right: 120px;
        position: relative;
        bottom: 90px;
    }
    .textOnSite{
        position:relative;
        bottom:10px;
        left:35px;
        font-size:13px;
        /*margin-left:25px;*/
    }
    
  }
  @media only screen and (width: 375px) {
  .textOnSite{
        position:relative;
        bottom:10px;
        left:35px;
        font-size:13px;
        /*margin-left:25px;*/
    }
  }
  @media only screen and (max-width: 770px) {
    .responsive{
        margin-right: 120px;
        position: relative;
        bottom: 70px;
    }
    
  }
  @media only screen and (max-width: 1024px) {
    .price{
        margin-top:27px;
    }
    
  }
</style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawsome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/owl-carousel/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <title>نمذجــــة</title>
</head>

<body>

    <div class="navbar" style="background-color:#292828">
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

    <section id="details">
        <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div>
                @if(Session::has('Message'))
                    <p class="alert alert-info">{{ Session::get('Message') }}</p>
                @endif
            </div>
            <div>
                @if(Session::has('alertMessage'))
                    <p class="alert alert-danger">{{ Session::get('alertMessage') }}</p>
                @endif
            </div>
            <div class="row">
                <div class="col-md-5">
                 <h3 class="course1-head" id="courseNameInPage">{{$courseDetail->courseName}}</h3>
                </div>
                <div class="col-md-1">
                    <p class="lineDetails" id="lineDetailsInPage"></p>
                </div>
                <div class="col-md-6 information">
                    <div class="card" style="max-width: 410px;">
                        <div class="row">
                            <div class="col-md-4 mr-auto">
                                <img src="{{ asset('uploads/' . $courseDetail->instructorImage) }}" style="border-radius: 110px;margin-right: 90px;" class="card-img" width="100px" height="100px" alt="">
                            </div>
                            <div class="col-md-8 mr-auto ">
                                <div class="card-body" style="margin-right: 70px;">
                                    <h4 class="card-title"></h4>
                                    <h4 class="card-text">{{$courseDetail->instructor}}</h4>
                                    <p class="card-text">{{$courseDetail->instructorDesc}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form">
                    <form action="{{route('guest.store')}}" id="myBtn" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <br>
                            <div class="serv-form-item nameInput">
                                <input type="text" id="name" name="name" placeholder="الاسم">
                                <i class="fa fa-address-book book"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <div class="serv-form-item emailInput">
                                <input type="email" id="email" name="email" placeholder="الايميل">
                                <i class="fa fa-envelope emails"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="serv-form-item phoneInput">
                                <input type="tel" id="phone" name="phone" placeholder="الهاتف">
                                <i class="fa fa-phone phones"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="serv-form-item degreeInput">
                                <input type="text" id="scientific_degree" name="scientific_degree" placeholder="الدرجة العلمية">
                                <i class="fas fa-user-graduate degrees"></i>
                            </div>
                            <input type="hidden" name="course_id" value="{{request()->id}}">
                        </div>
                    
                </div>
                <div class="col-md-6 pillar">
                    <h3 style="margin-right:90px;">المحاور</h3>
                    <?php
                    $data = $courseDetail->pillars;
                    $splitData = explode(',', $data);
                    array_pop($splitData);
                    for ($i = 0; $i < count($splitData); $i++) {
                        //  echo $splitData[$i];
                    ?>
                        <ul id="colorListType">
                            <li style="margin-right:90px;">&nbsp;&nbsp;<?php echo $splitData[$i] ?> </li>
                        </ul>
                    <?php
                    }
    
                    ?>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="col-md-4 price">
                        <h3 style="color:goldenrod;position: relative;bottom:20px;padding-top:15px;">السعر</h3>
                        <h3 style="position:relative;bottom:12px" class="box">{{$courseDetail->price}} <span style="color:goldenrod;position:relative;right:10p;top:16px;font-size:20px">ريال</span></h3>
                    </div>
                    <div class="col-md-4 payments">
                        <h3 style="color:goldenrod;position: relative;bottom:20px;padding-top:15px">طريقة الدفع</h3>
                        <div class="card">
                            <div class="row box1">
                                <div class="col-md-4">
                                    <img src="{{ asset('uploads/' . $courseDetail->image_bank) }}" width="100px" height="70px" style="border-radius: 20px;" class="card-img" alt="">
                                </div>
                                
                                <div class="col-md-8 p-4">
                                    <div class="card-body responsive">
                                        <h5 class="card-title" style="margin-right: 5px;margin-bottom:1px;">{{$courseDetail->payment_method}}</h5>
                                        <p class="card-text" style="margin-right: 5px;margin-bottom:1px;">{{$courseDetail->international_account}}</p>
                                        <p class="card-text" style="margin-right: 5px;margin-bottom:1px;">{{$courseDetail->local_account}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 on_site">
                    <h3 style="position: relative;bottom:20px;margin-right:90px;padding-top:15px">على منصة</h3>
                    <img src="https://d24cgw3uvb9a9h.cloudfront.net/static/93994/image/new/ZoomLogo.png" class="ff2" style="border:1px solid #ddd;padding-top:30px; padding-bottom:30px; padding-left:70px; padding-right:70px;margin-right:110px" alt="">
                    <h3 class="textOnSite" style="position:relative;margin-right:170px;font-weight:500px;"><?php 
                        $date = Carbon\Carbon::parse($courseDetail->courseDate)->format('m');
                        $date2 = Carbon\Carbon::parse($courseDetail->courseDate);
                        $date3 = Carbon\Carbon::parse($courseDetail->timeCourse)->format('A');
                        // echo $date3;
                        // echo $date2->englishDayOfWeek;
                        $arr1 = array(
                            '01'=>'يناير',
                            '02'=>'فبراير',
                            '03'=>'مارس',
                            '04'=>'ابريل',
                            '05'=>'مايو',
                            '06'=>'يونيو',
                            '07'=>'يوليو',
                            '08'=>'أغسطس',
                            '09'=>'سبتمبر',
                            '10'=>'أكتوبر',
                            '11'=>'نوفمبر',
                            '12'=>'ديسمبر'
                        );
                        $arr2 = array(
                            'Saturday'=>'السبت',
                            'Sunday'=>'الاحد',
                            'Monday'=>'الاتنين',
                            'Tuesday'=>'الثلاثاء',
                            'Wednesday'=>'الاربعاء',
                            'Thursday'=>'الخميس',
                            'Friday'=>'الجمعة',
                        );
                        $arr3 = array(
                            'AM'=>'صباحا',
                            'PM'=>'مساءا'
                            );
$day = "";
$month = "";
$time = "";
                        foreach ($arr1 as $key => $value) {
                            if($date == $key){
                                $month = $value;
                            }
                        }
                        foreach ($arr2 as $key => $value) {
                            if($date2->englishDayOfWeek == $key){
                                $day = $value;
                            }
                        }
                        foreach ($arr3 as $key => $value) {
                            if($date3 == $key){
                                $time = $value;
                            }
                        }
                        // echo $time;
                        // echo $day;
                        // echo $month;
                        echo "يوم ". $day . " الموافق " . $date2->day . " ".$month . "<br>" . "&nbsp; &nbsp; &nbsp;الساعة " . Carbon\Carbon::parse($courseDetail->timeCourse)->format('H:i'). " ". $time;
                    ?></h3>
                    <br>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-default ff" style="outline:0;position:relative;bottom:10px;background-color:goldenrod;color:white;border-radius:20px;width:250px;margin-right:80px;">تسجيل</button>
                </div>
            </div>
            </form>
        </div>
    </section>
<br>
<section id="courses" class="course" style="background-color:#f6f6f6">
    <div class="container">
        <h3 class="course-head">الدورات التدريبية</h3>
        <div class="row">
            <div class="owl33 owl-theme" style="direction:ltr">
                @foreach($courses as $course)
                <div class="item">
                    <div class="course-block">
                        <div class="course-card">
                            <h3>{{$course->courseName}}</h3>
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ asset('uploads/' . $course->instructorImage) }}" class="card-img" style="border-radius: 110px;" width="120px" height="120px" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body" style="margin-top:57px">
                                            <h5 class="card-text">{{$course->instructor}}</h5>
                                            <h5 id="cardInResponsive" class="card-text cardInResponsive">{{$course->instructorDesc}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <ul id="listStyleBullet">
                                <li style="display:inline-flex">&nbsp;&nbsp;{{Carbon\Carbon::parse($course->courseDate)->format('d-m-Y')}}</li>
                                <li style="display:inline-flex">&nbsp;&nbsp;{{$course->courseTime}} ساعات</li>
                                <li style="display:inline-flex">&nbsp;&nbsp;{{$course->price}}</li>
                            </ul>
                            <a href="/showCourses/{{$course->id}}" style="background-color:goldenrod;border-radius:30px;color:white;width:290px;" class="btn btn-default">التفاصيل</a>
                        </div><!-- partner-card -->
                    </div><!-- consultant-block -->
                </div><!-- item -->
                @endforeach
            </div><!-- owl3 -->
        </div><!-- row -->
    </div><!-- container -->
</section>

    <footer style="height: 100px;">
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
</body>

</html>