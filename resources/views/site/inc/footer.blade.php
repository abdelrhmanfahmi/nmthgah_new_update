<footer>
    <div class="map-area">
        <div class="map_area" id="maker_gmap"></div><!-- map_area -->
        <script id="gmapscript" src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyBYJJZJ2wKXqDjkdNRAkzL01HGCYheNaKM"></script>
        
        <script>
            var markers = [];
            var latlng = new google.maps.LatLng('24.840160', '46.676296');
            var mapOptions = {
                center: new google.maps.LatLng('24.840160', '46.506296'),
                zoom: (Number('12')) ? Number('12') : 5,
            }
            var map = new google.maps.Map(document.getElementById("maker_gmap"), mapOptions);
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                zoom: Number('{zmap}'),
                animation: google.maps.Animation.DROP,
            });
            infowindow = new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', function(event) {
                infowindow.setContent('نمذجة');
                infowindow.open(map, marker);
            });
      </script>


    </div>
    <div id="myModal3" class="modal3">
    <div class="modal-content3">
    <span class="close3">&times;</span>
    <p>لقد تم ارسال الطلب وسوف تتم مراجعته من خلال الإدارة</p>
    </div>
    </div>
    <!---->
    <div id="myModal4" class="modal4">
    <div class="modal-content4">
    <span class="close4">&times;</span>
    <p>تأكد من إدخال البيانات بشكل صحيح</p>
    </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                <div class="flogo col-xs-12 col-sm-4 col-md-12 col-lg-12">
                    <a href=""><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
                </div><!-- flogo -->
                <div class="faddress col-xs-12 col-sm-8 col-md-12 col-lg-12">
                    <a href="tel:"><span><i class="fa fa-phone"></i></span> <strong class="tel_number">+966 59 987 6600</strong> </a>
                    <a href="emailto:"><span><i class="fa fa-envelope"></i></span>hello@nmthgah.com</a>
                    <a><span><i class="fa fa-map-marker-alt"></i></span>Riyadh, Saudi Arabia</a>
                </div><!-- faddress -->
            </div><!-- col -->
            <!--<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">-->
            <!--    <form  action="{{route('messages.store')}}" method="POST" id="BTNS" enctype="multipart/form-data">-->
            <!--        <span class="load-icon"></span>-->
            <!--        @csrf-->
                <!--    @if ($errors->any())-->
                <!--<div class="alert alert-danger">-->
                <!--    <ul>-->
                <!--        @foreach ($errors->all() as $error)-->
                <!--        <li>{{ $error }}</li>-->
                <!--        @endforeach-->
                <!--    </ul>-->
                <!--</div>-->
                <!--@endif-->
            <!--        <div class="serv-form" id="serv-form">-->
            <!--            <div class="serv-form-head">-->
            <!--                <h3>طلب خدمة</h3>-->
            <!--            </div><!-- erv-form-head -->
            <!--            <div class="serv-form-body">-->

            <!--                <div class="error-area">-->
            <!--                </div><!-- error-area -->
            <!--                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">-->
            <!--                    <div class="serv-form-item">-->
            <!--                        <input type="text" name="name" id="nameRequest" placeholder="الاسم الثلاثى">-->
            <!--                        <i class="fa fa-address-book"></i>-->
            <!--                    </div><!-- serv-form-item -->
            <!--                </div><!-- col -->
            <!--                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">-->
            <!--                    <div class="serv-form-item">-->
            <!--                        <input type="text" name="email" id="emailRequest" placeholder="البريد الإلكترونى">-->
            <!--                        <i class="fa fa-envelope"></i>-->
            <!--                    </div><!-- serv-form-item -->
            <!--                </div><!-- col -->
            <!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
            <!--                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 np">-->
            <!--                        <div class="serv-form-item">-->
            <!--                            <input type="text" name="phone" id="phoneRequest" placeholder="رقم الجوال">-->
            <!--                            <i class="fa fa-phone"></i>-->
            <!--                        </div><!-- serv-form-item -->
            <!--                    </div><!-- col -->
            <!--                </div><!-- col -->
            <!--                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">-->
            <!--                    <div class="serv-form-item serv-noicon">-->
            <!--                        <input type="text" name="service" id="serviceRequest" placeholder="نوع الخدمة">-->
            <!--                    </div><!-- serv-form-item -->
            <!--                </div><!-- col -->
            <!--                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">-->
            <!--                    <div class="serv-form-item serv-noicon">-->
            <!--                        <input type="text" name="affiliate" id="affiliateRequest" placeholder="الجهة التابعة">-->
            <!--                    </div><!-- serv-form-item -->
            <!--                </div><!-- col -->
            <!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
            <!--                    <div class="serv-form-item">-->
            <!--                        <textarea name="message" id="messageRequest" placeholder="الرسالة"></textarea>-->
            <!--                    </div><!-- serv-form-item -->
            <!--                </div><!-- col -->
            <!--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">-->
            <!--                    <div class="serv-form-item">-->
            <!--                        <button type="submit">إرسال</button>-->
            <!--                    </div><!-- serv-form-item -->
            <!--                </div><!-- col -->
            <!--            </div><!-- erv-form-head -->
            <!--        </div><!-- serv-form -->
            <!--    </form>-->
            <!--</div><!-- col -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="serv-form">
                <div class="copyright">
                    <a href="http://cmark.sa" target="_blank">جميع الحقوق محفوظة لشركة <span>CMark</span> © 2020</a>
                </div><!-- copyright -->
            </div><!-- col -->
        </div><!-- row -->
        <a class="tlink up" href="#home"><i class="fa fa-chevron-up"></i></a>
    </div><!-- container -->
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('.openvideo').on('click' , function(e){
            e.preventDefault();
            $('#videoIntroduction').css('display' , 'block');
            document.getElementById('videoNmthgah').play();
            var aid = $(this).attr("href");
            $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
        });
    });
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-13XQB5RHQZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-13XQB5RHQZ');
</script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script src="{{asset('assets/js/hover.js')}}"></script>

</body>

</html>