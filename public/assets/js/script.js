$(function () {
	$(".owl1").owlCarousel({
		autoPlay: 4000,
		items: 1,
		navigation: true,
// 		transitionStyle: "fade",
		navigationText: [
			"<i class='fa fa-chevron-left'></i>",
			"<i class='fa fa-chevron-right'></i>"
		],
	});
	$(".owl2").owlCarousel({
		autoPlay: 4000,
		items: 1,
		navigation: true,
		transitionStyle: "fade",
		navigationText: [
			"<i class='fa fa-chevron-left'></i>",
			"<i class='fa fa-chevron-right'></i>"
		],
	});
	$(".owl3").owlCarousel({
		autoPlay: 4000,
		items: 4,
		responsive: true,
		itemsTablet: [768, 2],
		itemsTablet: [1024, 2],
		itemsMobile: [600, 1],
		navigation: true,
		navigationText: [
			"<i class='fa fa-chevron-left'></i>",
			"<i class='fa fa-chevron-right'></i>"
		],
	});
	$(".owl22").owlCarousel({
		autoPlay: 4000,
		items: 2,
		responsive: true,
		itemsTablet: [768, 1],
		itemsTablet: [1024, 1],
		itemsMobile: [600, 1],
		navigation: true,
		navigationText: [
		"<i class='fa fa-chevron-left'></i>",
		"<i class='fa fa-chevron-right'></i>"
		],
	});
	$(".owl33").owlCarousel({
		autoPlay: 4000,
		items: 3,
		responsive: true,
		itemsTablet: [768, 2],
		itemsTablet: [1024, 2],
		itemsMobile: [600, 1],
		navigation: true,
		navigationText: [
		"<i class='fa fa-chevron-left'></i>",
		"<i class='fa fa-chevron-right'></i>"
		],
	});
	$(".owl4").owlCarousel({
		autoPlay: 4000,
		items: 1,
		navigation: true,
		transitionStyle: "fade",
		navigationText: [
			"<i class='fa fa-chevron-left'></i>",
			"<i class='fa fa-chevron-right'></i>"
		],
	});

	$(window).scroll(function () {
		if ($(this).scrollTop() > 200 && window.innerWidth > 767) {
			$('.fixednav').addClass('fixed-nav');
		} else {
			$('.fixednav').removeClass('fixed-nav');
		}
		if ($(this).scrollTop() > 200) {
			$('.up').fadeIn();
		} else {
			$('.up').fadeOut();
		}
	});
	var hash = window.location.hash;
	if (hash) {
		$("html, body").animate({ scrollTop: $(hash).offset().top - 100 }, 1000);
	}
	$('.tlink').click(function (e) {
		var target = $(this).attr('href');
		if (target != 'undefined') {
			$('.tlink').removeClass('navact')
			$(this).addClass('navact')
			$("html, body").animate({ scrollTop: $(target).offset().top - 100 }, 1000);
		}
	});


	$('.navicon, .closenav').click(function (e) {
		$('nav').fadeToggle(300)
	});
	$('.openvideo, .video-preview > i').click(function (e) {
		e.preventDefault();
		/*if(e.target == '' || e.target == 'undefined'){
		    return false;
		}
		if($(e.target).attr('class') == 'openvideo'){
		    $('.video-preview-co').html('<iframe src="https://www.youtube.com/embed/N8bf_AwRV64" frameborder="0"></iframe>')
		}else{
		    $('.video-preview-co').html('')
		}
		$('.video-preview').fadeToggle(300)*/
	});

	$('#orders').submit(function (event) {
		event.preventDefault();
		var request = new XMLHttpRequest();
		request.onreadystatechange = function () {
			$('.load-icon').fadeIn(100);
		}
		request.addEventListener("load", function () {
			var income = JSON.parse(request.responseText)
			$('.error-area').html('<div class="alert alert-' + income.status + '"><p>' +
				income.msg + '</p></div>');
			$("#orders").get(0).reset();
			$('.load-icon').fadeOut(300);
		});
		request.addEventListener("error", function () {
			$('.error-area').html(
				'<div class="alert alert-danger"><p>هناك خطأ ما ، برجاء المحاولة مره أخرى.</p></div>'
			)
			$('.load-icon').fadeOut(300);
		});
		//request.addEventListener("abort", transferCanceled);
		request.open('POST', '/send');
		var formData = new FormData(document.getElementById('orders'));
		request.send(formData);

	});

	$('.login-tab-head a').click(function (e) {
		e.preventDefault();
		var target = $(this).attr('href');
		$('.login-tab-head a').removeClass('htab');
		$(this).addClass('htab');
		$('.tabitem').removeClass('btab');
		$(target).addClass('btab');
	});


});

$(document).ready(function () {
    
        
        // $(window).on("resize", function() {
		if ($(window).width() <= 400) {
// 			console.log('Fahmy');
			$(".form").insertAfter($(".pillar"));
			$(".on_site").insertBefore($(".form"));
			$(".payments").insertAfter($(".form"));
			$(".price").insertAfter($(".form"));
			$('.pillar').css({
			    'position': 'relative',
			    'left':'70px'
			});
			$('.on_site').css({
			    'position':'relative',
			    'left':'60px',
			    'padding-bottom':'24px'
			});
			
            $('.information').css({
                'position':'relative',
                'left':'60px'
            });
            $('.ff').on('click' , function(){
                // console.log('Fgamhy in form');
                $('#myBtn')[0].submit();
            });
		}
		if($(window).width() == 768){
		    $(".form").insertAfter($(".pillar"));
			$(".on_site").insertBefore($(".form"));
			$(".payments").insertAfter($(".form"));
			$(".price").insertAfter($(".form"));
			
		    $('.pillar').css({
			    'position': 'relative',
			    'left':'70px'
			});
			$('.on_site').css({
			    'position':'relative',
			    'left':'60px'
			});
			
            $('.information').css({
                'position':'relative',
                'left':'60px'
            });
            $('.ff').on('click' , function(){
                // console.log('Fgamhy in form');
                $('#myBtn')[0].submit();
            });
		}
		
// 		if($(window).width() <= 1366){
// 			$(".form").insertBefore($(".pillar"));
// 			$(".on_site").insertBefore($(".form"));
// 			$(".on_site").insertBefore($(".form"));
// 			$(".price").insertBefore($(".form"));
// 		}
		
// 	});
	
	$('.nameInput input').on('click' , function(){
	       // console.log('Fahmy');
	       $(this).css('border-color' , '#E2AF25');
	       //$('.book').css('color' , '#E2AF25');
	});

	$('.accountInput input').on('mouseleave' , function(){
       // console.log('Fahmy');
       $(this).css('border-color' , '#E2AF25');
    //   $('.account').css('color' , '#E2AF25')
	});
	
	$('.emailInput input').on('click' , function(){
	       // console.log('Fahmy');
	       $(this).css('border-color' , '#E2AF25');
	       //$('.emails').css('color' , '#E2AF25');
	});
	$('.phoneInput input').on('click' , function(){
	       // console.log('Fahmy');
	       $(this).css('border-color' , '#E2AF25');
	       //$('.phones').css('color' , '#E2AF25');
	});
	$('.degreeInput input').on('click' , function(){
	       // console.log('Fahmy');
	       $(this).css('border-color' , '#E2AF25');
	       //$('.degrees').css('color' , '#E2AF25');
	});

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#imgFileUpload').attr('src', e.target.result);
          $('#imgFileUpload').attr('width', '400px');
          $('#imgFileUpload').attr('height', '130px');
          $('#imgFileUpload').css('position', 'relative');
          $('#imgFileUpload').css('left' , '160px');
          $('#imgFileUpload').css('bottom' , '21px');
          
          if($(window).width() <= 400){
              $('#imgFileUpload').css('position', 'relative');
              $('#imgFileUpload').css('left' , '183px');
              $('#imgFileUpload').css('bottom' , '24px');
              $('#imgFileUpload').css('width', '75px');
              $('#imgFileUpload').css('height', '40px');
          }
          if($(window).width() == 768){
              $('#imgFileUpload').css('position', 'relative');
              $('#imgFileUpload').css('left' , '190px');
              $('#imgFileUpload').css('bottom' , '16px');
              $('#imgFileUpload').css('width', '185px');
              $('#imgFileUpload').css('height', '85px');
          }
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#imgInp").change(function() {
      readURL(this);
    });
    
    // $('#files').on('click', function(){
    //     console.log("Fahmy");
    //     $('#imgInp').click();
    // });image
    
    try{
        var file = document.getElementById('files');
        file.addEventListener('click' , function(){
            document.getElementById('imgInp').click();
        });
    }
    catch(e){
        
    }
    
    var btn = document.getElementById("myBtn");
    
    var modal2 = document.getElementById("myModal2");
    
    var span2 = document.getElementsByClassName("close2")[0];
    
    var account = document.getElementById('account');
    
    var image = document.getElementById('imgInp');
    
    
    $(btn).on('submit' , function(e){
        // e.preventDefault();
        if(!$(image).val() || account.value.length ==0){
            
        }else{
            modal2.style.display = "block";
            span2.onclick = function() {
          modal2.style.display = "none";
          return true;
          location.href = "http://test3.nmthgah.com/nmthgah";
        }
        
        window.onclick = function(event) {
          if (event.target == modal2) {
            modal2.style.display = "none";
            return true;
            location.href = "http://test3.nmthgah.com/nmthgah";
          }
        }
        }
    });
        
    try{
        var phone = document.getElementById('phone');
        phone.addEventListener('input' , function(e){
            var tel = e.target.value;
           if(tel.length != 0){
               $(this).css('direction' , 'ltr');
           }else{
               $(this).css('direction' , 'rtl');
           }
        });
    }catch(e){
        
    }
    // try{
    //     var phone2 = document.getElementById('phoneRequest');
    //     phone2.addEventListener('input' , function(e){
    //         var tel2 = e.target.value;
    //       if(tel2.length != 0){
    //           $(this).css('direction' , 'ltr');
    //       }else{
    //           $(this).css('direction' , 'rtl');
    //       }
    //     });
    // }catch(e){
        
    // }
    
    
    
	// $('.buttonAjax').on('click', function (e) {


	// $('#details').append(``);
	// $('.form1').on('submit', function (e) {
	// e.preventDefault();
	// var aid2 = $(this).attr("href");
	// $('html,body').animate({ scrollTop: $(aid2).offset().top }, 'slow');
	// var course_id = $('#course').val();
	// var science = $('#science').val();
	// console.log(course_id, science);
	// $.ajax({
	// type: "POST",
	// url: "/StoreCourse",
	// headers: {
	// 	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// },
	// data: {
	// 	'course_id': course_id,
	// 	'science': science,
	// },
	// success: function (data1) {

	// console.log(data);
	// console.log('success');
	// $('#details').empty();
	// $('#payment').css('display' , 'block');
	// document.getElementById('payment1').innerText = "You Are Successfully Saved For This Course If You Want To Take Please Confirm Your Payment"
	// $('#payment1').css('display' , 'block');
	// $('#inputHidden').append(`
	// 	<input type="hidden" value="`+data1.id+`" name="id" id="id"/>
	// `)
	// $('.form2').on('submit' , function(e){
	// console.log(e.target);
	// e.preventDefault();
	// var ids = data1.id;
	// var bankImage = document.getElementById("bankImage").files[0];
	// fd = new FormData();
	// fd.append('bankImage' , bankImage);
	// console.log(ids , bankImage , fd);
	// $.ajax({
	// 	method:'POST',
	// 	url:'/storeCourseUser',
	// 	dataType:'JSON',
	// 	contentType: false,
	// 	processData: false,
	// 	cache:false,
	// 	headers: {
	// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 	},
	// 	data: {
	// 		'id':ids,
	// 		fd:fd,
	// 	},
	// 	success:function(data2){
	// 		console.log(data2);
	// 	},
	// });
	// });
	// },

	// });

	// });

	// },
	// });
});