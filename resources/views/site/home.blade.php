@extends('site.index')

@section('main')
<header id="home">
    <div class="navbar">
        <div class="fixednav">
            <div class="container">
                <div class="row">
                    <div class="video-preview">
                        <i>&times;</i>
                        <div class="video-preview-co"></div><!-- video-preview-co -->
                    </div><!-- video-preview -->
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <div class="logo">
                            @foreach($settings as $set)
                            <a href="{{url('/')}}"><img src="{{ asset('uploads/' . $set->logo) }}" alt=""></a>
                            <span class="navicon"><i></i><i></i><i></i></span>
                        </div><!-- logo -->
                    </div><!-- col -->
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 ">
                        <nav>
                            
                            <span class="closenav"></span>
                            <ul>
                                <li><a href="#home" class="tlink navact">الرئيسية</a></li>
                                <li><a href="#" class="tlink">من نحن</a></li>
                                <li><a class="tlink" href="#portfolio">مجالات أعمالنا</a></li>
                                <li><a class="tlink" href="#indicators">خدمات نمذجة</a></li>
                                @if(countCourses() != 0) <li><a class="tlink" href="#courses">دورات</a></li>  @else  @endif
                                <li><a class="tlink" href="#partners">شركاء النجاح</a></li>
                                <li><a class="tlink" href="#consultant">فريق العمل</a></li>
                                <li><a class="tlink" href="#serv-form">تواصل معنا</a></li>
                            </ul>
                        </nav>
                    </div><!-- col -->
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="nav-social">
                            <a target="_blank" href="{{$set->instagram}}"><i class="fab fa-instagram"></i></a>
                            <a target="_blank" href="{{$set->twitter}}"><i class="fab fa-twitter"></i></a>
                            <a target="_blank" href="{{$set->linkedin}}"><i class="fab fa-linkedin"></i></a>
                            <a target="_blank" href="{{$set->facebook}}"><i class="fab fa-facebook"></i></a>
                            <a target="_blank" href="{{$set->youtube}}"><i class="fab fa-youtube"></i></a>
                            <a target="_blank" href="{{$set->whatsapp}}"><i class="fab fa-whatsapp"></i></a>
                        </div><!-- nav-social -->
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </div><!-- fixed-nav -->
    </div><!-- navbar -->

    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="header-r">
                        <h3>{{$set->title}}</h3>
                        <p>{{$set->breif}}</p>
                        <a href="#videoIntroduction" class="openvideo">فيديو تعريفي <i class="fa fa-play-circle"></i></a>
                    </div><!-- header-r -->
                </div><!-- col -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="header-view">
                        <img src="{{ asset('uploads/' . $set->image) }}" alt="{{$set->title}}">
                    </div><!-- header-view -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- header -->
</header>

<section class="about-us" id="videoIntroduction" style="display:none;">
    <div class="container">
        <h3 class="about-head">الفيديو</h3>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="about-us-block">
                    <video width="420" height="240" controls id="videoNmthgah">
                      <source src="uploads/WhatsApp Video 2021-04-14 at 12.04.37.mp4" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about-us" class="about-us">
    <div class="container">
        <!--<h3 class="about-head">من نحن</h3>-->
        <!--<div class="row">-->
            <!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
            <!--    <div class="about-us-block">-->
            <!--        <p style="font-size:25px;text-align:justify;">{{$set->breif}}</p>-->
            <!--    </div><!-- about-us-block -->
            <!--</div><!-- col -->
        <!--</div>-->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="about-us-block">
                    <img src="assets/images/demo/about-icon-2.png" alt="">
                    <h3>رؤيتنا</h3>
                    <p>{{$set->vision}}</p>
                </div><!-- about-us-block -->
            </div><!-- col -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="about-us-block">
                    <img src="assets/images/demo/about-icon-1.png" alt="">
                    <h3>رسالتنا</h3>
                    <p>{{$set->mission}}</p>
                </div><!-- about-us-block -->
            </div><!-- col -->
        </div><!-- row -->
        
        <div class="row">
            <h3 class="about-head">قيمنا</h3>
            @foreach($values as $value)
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="portfolio-block">
                    <h3>{{$value->title}}</h3>
                    <p>{{$value->value}}</p>
                </div>
            </div>
            @endforeach
        </div>
        

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="about-us-block">
                    <img src="assets/images/demo/about-icon-3.png" alt="">
                    <h3>لماذا نمذجة الابتكار ؟</h3>
                    <p>{{$set->why}}</p>
                </div><!-- about-us-block -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</section>
@endforeach
<section id="portfolio" class="portfolio">
    <div class="container">
        <h3 class="portfolio-head">مجالات أعمالنا</h3>
        <div class="row">
            @foreach($services as $service)
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="portfolio-block">
                    <div class="portfolio-icon">
                        <i><img src="{{ asset('uploads/' . $service->image) }}" alt="{{$service->title}}"></i>
                    </div><!-- portfolio-ico -->
                    <h3>{{$service->title}}</h3>
                    <p>{{$service->desc}}</p>
                </div><!-- portfolio-block -->
            </div><!-- col -->
            @endforeach

        </div><!-- row -->
    </div><!-- container -->
</section>

<section id="indicators" class="indicators">
    <div class="container">
        <h3 class="indicators-head">خدمات نمذجة</h3>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="owl3 owl-theme" style="direction:ltr">
                    @foreach($indicators as $indicator)
                    <div class="item">
                        <div class="indicators-block">
                            <div class="indicators-block-body">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="brand-co"><img src="{{ asset('uploads/' . $indicator->image) }}" style="padding:15px" alt=""></div>
                                </div><!-- col -->
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <h3>{{$indicator->title}}</h3>
                                    <p style="text-align:justify;">{{$indicator->desc}}</p>
                                    <a href="{{$indicator->url}}">اطلب هذه الخدمة</a>
                                </div><!-- col -->
                            </div><!-- indicators-block-body -->
                        </div><!-- indicators-block -->
                    </div><!-- item -->
                    @endforeach
                </div><!-- owl1 -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</section>

<!-- Start Courses -->
@if(countCourses() != 0)
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
                                        <img src="{{ asset('uploads/' . $course->instructorImage) }}" class="card-img" style="border-radius: 110px;margin-right:10px;" width="110px" height="110px" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body" style="margin-top:57px">
                                            <h5 class="card-text" id="instructorCourse">{{$course->instructor}}</h5>
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
@else

@endif
<!-- End Courses -->

<section id="consultant" class="consultant">
    <div class="container">
        <h3 class="consultant-head">فريق العمل</h3>
        <div class="row">
            <div class="owl3 owl-theme" style="direction:ltr">
                @foreach($team as $t)
                <div class="item">
                    <div class="consultant-block">
                        <div class="consultant-card">
                            <img src="{{ asset('uploads/' . $t->image) }}" style="border-radius: 110px;" width="200px" height="200px" alt="{{$t->name}}">
                            <h3>{{$t->name}}</h3>
                            <h5>{{$t->title}}</h5>
                            <p>{{$t->desc}}</p>
                            <div class="tsocial">
                                <a href="{{$t->twitter}}"><i class="fab fa-twitter"></i></a>
                                <a href="mailto:{{$t->email}}"><i class="fa fa-envelope"></i></a>
                            </div>
                        </div><!-- partner-card -->
                    </div><!-- consultant-block -->
                </div><!-- item -->
                @endforeach
            </div><!-- owl3 -->
        </div><!-- row -->
    </div><!-- container -->
</section>

<section id="partners" class="partners">
    <div class="container">
        <h3 class="partners-head">شركاء النجاح</h3>
        <div class="row">
            <div class="owl2 owl-theme" style="direction:ltr">

                <div class="partner-block">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                        <div class="item">
                            @foreach($partners as $partner)
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="partner-card">
                                    <a><img src="{{ asset('uploads/' . $partner->image) }}" alt="{{$partner->title}}"></a>
                                </div><!-- partner-card -->
                            </div><!-- col -->
                            @endforeach
                        </div><!-- col -->
                        <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    </div><!-- artner-block -->
                </div><!-- item -->
            </div><!-- owl2 -->
        </div><!-- row -->
    </div><!-- container -->
</section>

<section id="partners" class="partners">
    <div class="container">
        <h3 class="agents-head">عملاء سبق التعامل معهم</h3>
        <div class="row">
            <div class="owl2 owl-theme" style="direction:ltr">

                <div class="partner-block">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                        <div class="item">
                            @foreach($agents as $agent)
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <div class="partner-card">
                                    <a><img src="{{ asset('uploads/' . $agent->logo) }}" ></a>
                                </div><!-- partner-card -->
                            </div><!-- col -->
                            @endforeach
                        </div><!-- col -->
                        <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    </div><!-- artner-block -->
                </div><!-- item -->
            </div><!-- owl2 -->
        </div><!-- row -->
    </div><!-- container -->
</section>

@endsection