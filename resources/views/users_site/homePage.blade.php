@extends('layout_nmthgah.app')
@section('content')
<div class="bg">
    <nav style="direction: rtl;margin-right:150px;" class="navbar navbar-expand-lg navbar-light bg-transparent">
        <a class="navbar-brand navbar logo"><img src="assets/images/logo.png" width="100px;" height="50px;" alt=""></a>
        <button style="background-color: goldenrod" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="margin-left:140px;margin-top:50px;">
                <!-- <img src="assets/images/logo.png" width="100px;" height="50px;" alt=""> -->
                <li class="nav-item">
                    <a class="nav-link">من نحن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">مجالات اعمالنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">مؤشرات نمذجة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">دورات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">شركاء النجاح</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">فريق الاستشارة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">طلب خدمة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">اتصل بنا</a>
                </li>

                <li style="background-color: goldenrod" class="nav-item" style="margin-right: 30px;">
                    <a class="nav-link"><i class="fab fa-instagram"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fab fa-facebook"></i></a>
                </li>

            </ul>
        </div>
    </nav>
    <br>
    <br>
    <div class="row section2">
        <div class="col-md-6">
            <img class="image1 img-fluid" src="{{url('assets/images/hlogo.png')}}" width="250px" alt="">
        </div>
        <div class="col-md-6" style="margin-top: 30px;">
            <div class="col-md-12">
                <h1>شركة نمذجة الابتكار</h1>
            </div>
            <br>
            <div class="col-md-12">
                <h3 style="direction: rtl">شركة استشارية متخصصة في صناعة وابتكار <br> الحلول النموذجية, وتحويل ما تفكر به <br> منظمات العملاء إلي واقع طموح</h3>
            </div>
            <br>
            <div class="col-md-12"><button class="btn btn-warning"> <i class="fas fa-play-circle"></i> فيديو تعريفي</button></div>
        </div>
    </div>
</div>

<br>
<div class="container-fluid">
    <div class="row" style="direction: rtl;margin-right:90px;">
        <span>
            <p style="font-size: 18px;color:goldenrod">من نحن</p>
        </span> &nbsp; &nbsp; <span style="width:14%;border-top: 5px solid gray;margin-top:21px;"></span>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-6 pt-4">
            <div class="card">
                <br>
                <i class="fas fa-low-vision d-flex justify-content-center"></i>
                <div class="card-body">
                    <h3 class="card-title d-flex justify-content-center">رؤيتنا</h3>
                    <p class="card-text d-flex justify-content-center">Some quick example text to build on the card title </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 pt-4">
            <div class="card">
                <br>
                <i class="fas fa-low-vision d-flex justify-content-center"></i>
                <div class="card-body">
                    <h3 class="card-title d-flex justify-content-center">رسالتنا</h3>
                    <p class="card-text d-flex justify-content-center">Some quick example text to build on the card title </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pt-4">
            <div class="card">
                <br>
                <i class="fas fa-low-vision d-flex justify-content-center"></i>
                <div class="card-body">
                    <h3 class="card-title d-flex justify-content-center">لماذا نمذجة الابتكار</h3>
                    <p class="card-text d-flex justify-content-center">Some quick example text to build on the card title </p>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<div class="container-fluid">
    <div class="row">
        <div class="image img-responsive w-100">
            <div class="row" style="direction: rtl;margin-right:120px;margin-top:120px;">
                <span>
                    <p class="span1">مجالات اعمالنا</p>
                </span> &nbsp; &nbsp; <span class="span2"></span>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex justify-content-center pt-4">
                    <div class="card card1">
                        <div class="card-body">
                            <br>
                            <h3 class="card-title d-flex justify-content-center">الاستشارات</h3>
                            <p>lsndslnldnslsd</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center pt-4">
                    <div class="card card2">
                        <div class="card-body">
                            <br>
                            <h3 class="card-title d-flex justify-content-center">الدراسات</h3>
                            <p>skansdknsdksdn</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center pt-4">
                    <div class="card card3">
                        <i class="far fa-comment-dots d-flex justify-content-center"></i>
                        <div class="card-body">
                            <br>
                            <h3 class="card-title d-flex justify-content-center">الابحاث</h3>
                            <p>lkxnksnknkxs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<div class="container">
    <div class="row" style="direction: rtl;margin-right:90px;">
        <span>
            <p style="font-size: 18px;color:goldenrod">مؤشرات نمذجة</p>
        </span> &nbsp; &nbsp; <span style="width:14%;border-top: 5px solid gray;margin-top:21px;"></span>
    </div>

    <br>
    <br>
    <br>
    <div class="row">
        
    </div>

</div>

@endsection