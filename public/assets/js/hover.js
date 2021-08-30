// var div = document.getElementsByTagName('image');
$(document).ready(function(){
    var div1 = document.getElementsByClassName('btnDownload');
    var div2 = document.getElementsByClassName('btnShow');

    $('.card-img').on('mouseover' , function(){
        // console.log('success');
        
        for(let i = 0 ; i < div1.length ; i++){
            div1[i].style.display = "block";
        }
        for(let j = 0 ; j < div2.length ; j++){
            div2[j].style.display = "block";
        }

    });

    $('.card-img').on('mouseleave' , function(){
        // console.log('success out');
        for(let i = 0 ; i < div1.length ; i++){
            div1[i].style.display = "none";
        }
        for(let j = 0 ; j < div2.length ; j++){
            div2[j].style.display = "none";
        }
    });
    
        
        // $(window).on("resize", function() {
            if($(window).width() <= 400){
                // console.log('fahmy121221');
                $('#buttonConfirm').css({
                    'width':'170px',
                    'height':'30px',
                    'margin-left':'60px'
                });
            }
            if($(window).width() == 768){
                // console.log('fahmy121221');
                $('#buttonConfirm').css({
                    'width':'250px',
                    'height':'30px',
                    'margin-left':'120px'
                });
            }
            if($(window).width() == 1024){
                // console.log('fahmy121221');
                $('#buttonConfirm').css({
                    'width':'350px',
                    'height':'30px',
                    'margin-right':'250px'
                });
            }
            
            // block that will be upload

    $('#indicatorButton').on('click', function () {
        
        // alert('الموقع تحت التطوير');
        
        // console.log('fahmjy');
        var modal = document.getElementById("myModalIndicator");

        var btn = document.getElementById('indicatorButton');
        
        modal.style.display = "block";
        
        var span = document.getElementsByClassName("closeIndicator")[0];

        // btn.onclick = function () {
        //     modal.style.display = "block";
        // }

        span.onclick = function () {
            modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });

    $('#loginButton').on('click', function () {
        location.href = "https://nmthgah.com/login";
    });
            
            if ($(window).width() <= 414) {
                $('.cardIndicatorImg').attr('width' , '180px');
                $('.cardIndicatorImg').attr('height' , '170px');
            }
            if ($(window).width() == 768) {
                $('.cardIndicatorImg').attr('width' , '180px');
                $('.cardIndicatorImg').attr('height' , '170px');
            }
            if ($(window).width() == 1024) {
                $('.cardIndicatorImg').attr('width' , '180px');
                $('.cardIndicatorImg').attr('height' , '170px');
            }
        // });
            var btn1 = document.getElementById("BTNS");
            var nameRequest = document.getElementById('nameRequest');
            var emailRequest = document.getElementById('emailRequest');
            var phoneRequest = document.getElementById('phoneRequest');
            var serviceRequest = document.getElementById('serviceRequest');
            var affiliateRequest = document.getElementById('affiliateRequest');
            var messageRequest = document.getElementById('messageRequest');
            
            var modal3 = document.getElementById("myModal3");
            var span3 = document.getElementsByClassName("close3")[0];
            
            var modal4 = document.getElementById("myModal4");
            var span4 = document.getElementsByClassName("close4")[0];
            
            $(btn1).on('submit' , function(e){
                // e.preventDefault();
                if(nameRequest.value.length == 0 || emailRequest.value.length == 0 || phoneRequest.value.length == 0 || serviceRequest.value.length == 0 || affiliateRequest.value.length == 0 || messageRequest.value.length == 0){
                    modal4.style.display = "block";
                    span4.onclick = function() {
                      modal4.style.display = "none";
                      nameRequest.value="";
                      emailRequest.value="";
                      phoneRequest.value="";
                      serviceRequest.value="";
                      affiliateRequest.value="";
                      messageRequest.value="";
                      location.href="http://test3.nmthgah.com/nmthgah#serv-form";
                      return false;
                    }
                }else{
                    
                    modal3.style.display = "block";
                      span3.onclick = function() {
                      modal3.style.display = "none";
                      return true;
                      nameRequest.value="";
                      emailRequest.value="";
                      phoneRequest.value="";
                      serviceRequest.value="";
                      affiliateRequest.value="";
                      messageRequest.value="";
                      location.href = "http://test3.nmthgah.com/nmthgah#serv-form";
                    }
                }
            });
            
            // console.log($('#courseNameInPage').text().length);
            if($('#courseNameInPage').text().length <= 37 && $('#courseNameInPage').text().length >= 30){
                console.log('fahmy1');
                $('#lineDetailsInPage').css('width' , '110px');
                if($(window).width() == 768){
                    $('#lineDetailsInPage').css({
                        'width':'90px',
                        'position':'relative',
                        'right':'450px',
                        'bottom':'54px'
                    });
                }
                if($(window).width() <= 400){
                    $('#lineDetailsInPage').css({
                        'width':'130px',
                        'position':'relative',
                        'right':'90px',
                        'bottom':'50px'
                    });
                }
            }
            if($('#courseNameInPage').text().length <= 29 && $('#courseNameInPage').text().length >= 25){
                console.log('fahmy2');
                $('#lineDetailsInPage').css({
                    'width':'120px',
                    'position':'relative',
                    'left':'91px'
                });
                 if($(window).width() == 768){
                    $('#lineDetailsInPage').css({
                        'width':'90px',
                        'position':'relative',
                        'right':'350px',
                        'bottom':'54px'
                    });
                }
                if($(window).width() <= 400){
                    $('#lineDetailsInPage').css({
                        'width':'50px',
                        'position':'relative',
                        'right':'50px',
                        'bottom':'30px'
                    });
                }
            }
            if($('#courseNameInPage').text().length <= 24 && $('#courseNameInPage').text().length >= 20){
                console.log('fahmy3');
                $('#lineDetailsInPage').css({
                    'width':'110px',
                    'position':'relative',
                    'left':'120px'
                });
                if($(window).width() == 768){
                    $('#lineDetailsInPage').css({
                        'width':'130px',
                        'position':'relative',
                        'right':'270px',
                        'bottom':'50px'
                    });
                }
                if($(window).width() <= 400){
                    $('#lineDetailsInPage').css({
                        'width':'50px',
                        'position':'relative',
                        'right':'260px',
                        'bottom':'50px'
                    });
                }
            }
            if($('#courseNameInPage').text().length <= 19 && $('#courseNameInPage').text().length >= 15){
                console.log('fahmy4');
                $('#lineDetailsInPage').css({
                    'width':'170px',
                    'position':'relative',
                    'left':'190px'
                });
                if($(window).width() == 768){
                    $('#lineDetailsInPage').css({
                        'width':'130px',
                        'position':'relative',
                        'right':'220px',
                        'bottom':'54px'
                    });
                }
                if($(window).width() <= 400){
                    $('#lineDetailsInPage').css({
                        'width':'70px',
                        'position':'relative',
                        'right':'230px',
                        'bottom':'51px'
                    });
                }
            }
            if($('#courseNameInPage').text().length <= 14 && $('#courseNameInPage').text().length >= 10){
                console.log('fahmy5');
                $('#lineDetailsInPage').css({
                    'width':'190px',
                    'position':'relative',
                    'left':'225px'
                });
                if($(window).width() == 768){
                    $('#lineDetailsInPage').css({
                        'width':'130px',
                        'position':'relative',
                        'right':'190px',
                        'bottom':'54px'
                    });
                }
                if($(window).width() <= 400){
                    $('#lineDetailsInPage').css({
                        'width':'100px',
                        'position':'relative',
                        'right':'190px',
                        'bottom':'51px'
                    });
                }
            }
            if($('#courseNameInPage').text().length <= 9 && $('#courseNameInPage').text().length >= 5){
                console.log('fahmy6');
                $('#lineDetailsInPage').css({
                    'width':'230px',
                    'position':'relative',
                    'left':'270px'
                });
                if($(window).width() == 768){
                    $('#lineDetailsInPage').css({
                        'width':'140px',
                        'position':'relative',
                        'right':'120px',
                        'bottom':'54px'
                    });
                }
                if($(window).width() <= 400){
                    $('#lineDetailsInPage').css({
                        'width':'100px',
                        'position':'relative',
                        'right':'130px',
                        'bottom':'51px'
                    });
                }
                // if($(window).width() == 1024){
                //     $('#lineDetailsInPage').css({
                //         'width':'150px',
                //         'position':'relative',
                //         // 'right':'40px'
                //     });
                // }
            }
            if($('#courseNameInPage').text().length <= 4 && $('#courseNameInPage').text().length >= 1){
                // console.log('fahmy7');
                $('#lineDetailsInPage').css({
                    'width':'200px',
                    'position':'relative',
                    'left':'340px'
                });
                if($(window).width() == 768){
                    $('#lineDetailsInPage').css({
                        'width':'150px',
                        'position':'relative',
                        'right':'120px',
                        'bottom':'54px'
                    });
                }
                if($(window).width() <= 400){
                    $('#lineDetailsInPage').css({
                        'width':'150px',
                        'position':'relative',
                        'right':'90px',
                        'bottom':'49px'
                    });
                }
                if($(window).width() == 1024){
                    $('#lineDetailsInPage').css({
                        'width':'150px',
                        'position':'relative',
                    });
                }
            }
            
});