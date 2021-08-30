<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- CSRF Token -->


    <!-- Styles -->
    <!-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> -->
    <style>
        .countryCode{
            color:#1BA590;
            position:relative;
            top:30px;
            right:197px;
            z-index:9999;
        }
        @media screen and (min-width:1025px) and (max-width:1190px) {
            .countryCode{
                top: 5px;
                right: 25px;
            }
        }
        @media only screen and (width: 1024px){
            .countryCode{
                top: 5px;
                right: 25px;
            }
        }
        @media screen and (min-width:600px) and (max-width:991px) {
            .countryCode{
                top: -10px;
                right: 105px;
            }
        }
        @media (max-width: 500px){
            .countryCode{
                top: 0px;
                right: 110px;
            }
        }
        
        @media only screen and (width: 360px){
            .countryCode{
                top: -60px;
                right:107px;
            }
        }
        @media only screen and (width: 320px){
            .countryCode{
                top: -90px;
                right:105px;
            }
        }
    </style>
</head>

<body>
    <div id="app">


        <section class="login-page">
            <div class="container">
                <nav>
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                        <a id="mainPages2" href="/home"><i style="margin-left:10px;" class="fa fa-home"></i> الرئيسية </a>
                        <a id="logout2" href="{{route('user.logout')}}">تسجيل خروج <i class="fas fa-sign-out-alt"></i></a>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                </nav>
                
                <div class="loginco" style="z-index:1;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-request">
                                <h3 class=home-title>إنشاء مشروع</h3>
                                <form id="senderRequestUser" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 borderRequestForm form1">
                                            <label class="waqf_names1">اسم الوقف</label>
                                            <input type="text" placeholder="@error('waqf_name') {{ $message }} @enderror" id="waqf_name" value="{{ old('waqf_name') }}" class="waqf_name" maxlength="40" name="waqf_name">
                                            
                                            
                                            <img id="waqf_nameImage" src="{{asset('assets/images/Icon awesome-building.png')}}"/>
                                            <br>
                                        </div>
                                        <div class="col-md-4 borderRequestForm form2">
                                            <label class="waqf_names2">اسم صاحب الوقف</label>
                                            <input type="text" placeholder="@error('waqf_ownerName') {{ $message }} @enderror" id="waqf_ownerName" value="{{ old('waqf_ownerName') }}" class="waqf_ownerName" maxlength="30" name="waqf_ownerName">
                                            
                                            <img id="waqf_ownerNameImag" src="{{asset('assets/images/Group 2980.png')}}"/>
                                            <br>
                                        </div>
                                        <div class="col-md-4 borderRequestForm form3">
                                            <label class="waqf_names3">اسم المسؤول عن الوقف</label>
                                            <input type="text" placeholder="@error('waqf_charger') {{ $message }} @enderror"  id="waqf_charger" value="{{ old('waqf_charger') }}" class="waqf_charger" maxlength="30" name="waqf_charger">
                                           
                                            <img src="{{asset('assets/images/Group 2980.png')}}"/>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 borderRequestForm form4">
                                            <label class="waqf_names4">المدينة</label>
                                            <input type="text" placeholder="@error('city') {{ $message }} @enderror" id="city" value="{{ old('city') }}" class="city" maxlength="30" name="city">
                                            
                                            <img src="{{asset('assets/images/Icon awesome-flag.png')}}"/>
                                            <br>
                                        </div>
                                        <div class="col-md-4 borderRequestForm form5">
                                            <label class="waqf_names5">الشارع</label>
                                            <input type="text" placeholder="@error('street') {{ $message }} @enderror" id="street" value="{{ old('street') }}" class="street" maxlength="30" name="street">
                                            
                                            <img src="{{asset('assets/images/Icon awesome-road.png')}}"/>
                                            <br>
                                        </div>
                                        <div class="col-md-4 borderRequestForm form6">
                                            <label class="waqf_names6">هاتف الجوال</label>
                                            <span class="countryCode">966+</span>
                                            <input type="text" placeholder="@error('phone') {{ $message }} @enderror" id="phoneFormRequestsssss" value="{{ old('phone') }}" class="phone" name="phone">
                                            
                                            <img src="{{asset('assets/images/Icon awesome-phone-alt.png')}}"/>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 borderRequestForm form7">
                                            <label class="waqf_names7">وصف الوقف</label>
                                            <textarea name="desc" id="desc" class="desc" placeholder="@error('desc') {{ $message }} @enderror" cols="20" rows="5">{{ old('desc') }}</textarea>
                                        </div>
                                        <div class="col-md-4 borda">
                                            <div class="files" id="files">
                                                <input type="file" onclick="removePreviousImages(this)" class="imgsInps" id="imgInp" accept="image/jpg,image/jpeg,image/png,.doc, .docx,.ppt, .pptx,.pdf" style="width: 0px;height:0px;overflow: hidden;" name="files[]" multiple />
                                                <img src="{{asset('assets/images/Group 3277@2x.png')}}" id="imgFileUpload" style="margin-right:140px;position:relative;top:40px" width="30px" height="30px" />
                                                <span id="uploadWaqf">رفع مرفقات عن الوقف</span>
                                                <p style="text-align:center;" id="appends"></p>
                                            </div>
                                        </div>
                                         <span id="spanCountImage">@error('files') {{ $message }} @enderror</span> 
                                         <span id="spanCountImage">@error('files.*') {{ $message }} @enderror</span>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" id="btnSubmitFormRequest" class="btn btn-default">إرسال<span class="loader_area"></span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- row -->
                </div>
            </div><!-- container -->
        </section>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#waqf_name').on('input' , function(){
               $(this).css('color' , '#1BA590') ;
            });
            $('#waqf_ownerName').on('input' , function(){
               $(this).css('color' , '#1BA590') ;
            });
            $('#waqf_charger').on('input' , function(){
               $(this).css('color' , '#1BA590') ;
            });
            $('#city').on('input' , function(){
               $(this).css('color' , '#1BA590') ;
            });
            $('#street').on('input' , function(){
               $(this).css('color' , '#1BA590') ;
            });
            $('#phoneFormRequestsssss').on('input' , function(){
               $(this).css('color' , '#1BA590') ;
            });
            $('#desc').on('input' , function(){
               $(this).css('color' , '#1BA590') ;
            });
        });
        
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#senderRequestUser').submit(function(e) {
            e.preventDefault();
            
            var waqf_name = document.getElementById('waqf_name').value;
            var waqf_ownerName = document.getElementById('waqf_ownerName').value;
            var waqf_charger = document.getElementById('waqf_charger').value;
            var city = document.getElementById('city').value;
            var street = document.getElementById('street').value;
            var phone = document.getElementById('phoneFormRequestsssss').value;
            var desc = document.getElementById('desc').value;
            let TotalImages = $('#imgInp')[0].files.length; //Total Images
            let files = $('#imgInp')[0];
            
            if(waqf_name == "" ||waqf_ownerName == "" || waqf_charger == "" || city == "" || street == "" || phone == "" || desc == "" || TotalImages == ""){
                $('#modal_message2').text('من فضلك أدخل البيانات بصورة صحيحة').css('font-family', 'cr');
                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                $('#variableModal2').fadeIn().show();
                setTimeout(function (){
                    $('#variableModal2').fadeOut("slow").hide();
                },4000);
            }else{
                $('.loader_area').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
                $('#btnSubmitFormRequest').attr('disabled' , true);
                $('#uploadingModal').show();
                setTimeout(function (){
                    $('#uploadingModal').fadeOut("slow").hide();
                    },30000);
                    
                var formData = new FormData(this);
                for (let i = 0; i < TotalImages; i++) {
                    formData.append('files' + i, files.files[i]);
                }
                    formData.append('TotalImages', TotalImages);
                    formData.append('waqf_name' , waqf_name);
                    formData.append('waqf_ownerName' , waqf_ownerName);
                    formData.append('waqf_charger' , waqf_charger);
                    formData.append('city' , city);
                    formData.append('street' , street);
                    formData.append('phone' , phone);
                    formData.append('desc' , desc);
                $.ajax({
                    type:'POST',
                    url: "/request",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        if(response == 1){
                            setTimeout(function(){
                                    window.location.href="https://nmthgah.com/request";
                                },5000);
                        }else{
                            console.log('Something Wrong In Request')
                        }
                    },
                    error: function(response){
                        console.log(response);
                        $('.loader_area').empty();
                        $('#btnSubmitFormRequest').attr('disabled' , false);
                        $('#modal_message2').text('حدث خطأ من السيرفر').css('font-family', 'cr');
                        $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                        $('#variableModal2').fadeIn().show();
                        setTimeout(function (){
                            $('#variableModal2').fadeOut("slow").hide();
                        },4000);
                    }
                });
            }
        });
        
        function removePreviousImages(e){
            document.getElementById("imgInp").value = "";
            $('.pip').remove();
            document.getElementById('uploadWaqf').style.display = "block";
            $('#imgFileUpload').css('display' , 'block');
            $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
        }
        // function SendRequestOfUser(){
        //     $('#senderRequestUser').on('submit' , function(e){
        //         e.preventDefault();
        //     });
        //     var waqf_name = document.getElementById('waqf_name').value;
        //     var waqf_ownerName = document.getElementById('waqf_ownerName').value;
        //     var waqf_charger = document.getElementById('waqf_charger').value;
        //     var city = document.getElementById('city').value;
        //     var street = document.getElementById('street').value;
        //     var phone = document.getElementById('phoneFormRequestsssss').value;
        //     var desc = document.getElementById('desc').value;
            
            
        //     if(waqf_name == "" ||waqf_ownerName == "" || waqf_charger == "" || city == "" || street == "" || phone == "" || desc == "" || files == ""){
        //         $('#modal_message2').text('من فضلك أدخل البيانات بصورة صحيحة').css('font-family', 'cr');
        //         $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
        //         $('#variableModal2').fadeIn().show();
        //         setTimeout(function (){
        //             $('#variableModal2').fadeOut("slow").hide();
        //         },4000);
        //     }else{
        //         // $.ajax({
        //         //   url:'/request',
        //         //   method:'POST',
        //         //   data:{_token: "{{ csrf_token() }}" , waqf_name:waqf_name, waqf_ownerName:waqf_ownerName, waqf_charger:waqf_charger, city:city, street:street, phone:phone, desc:desc, files:JSON.stringify(arr2)},
        //         //   success:function(response){
        //         //       if(response == 1){
        //         //           console.log('data sent');
        //         //       }else if(response == 2){
        //         //           console.log('image zeft');
        //         //       }else{
        //         //           console.log('something wrong in response');
        //         //       }
        //         //   },error:function(){
        //         //         $('#modal_message2').text('حدث خطأ من السيرفر').css('font-family', 'cr');
        //         //         $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
        //         //         $('#variableModal2').fadeIn().show();
        //         //         setTimeout(function (){
        //         //             $('#variableModal2').fadeOut("slow").hide();
        //         //         },4000);
        //         //   },
        //         // });
        //     }
        // }
    </script>
</body>

</html>