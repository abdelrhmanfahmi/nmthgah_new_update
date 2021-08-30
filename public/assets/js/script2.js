$(document).ready(function(){
    var fullLength=0;
    //pdfForJS
    if (window.File && window.FileList && window.FileReader) {
        $("#imgInp").on("change", function(e) {
            document.getElementById('uploadWaqf').style.display = "none";
            $('#imgFileUpload').css('display' , 'none');
            var urlssss = window.location.href;
            console.log(urlssss);
          var files = e.target.files,
            filesLength = files.length;
            fullLength += filesLength;
            console.log(fullLength);
            if (fullLength > 12) {
                alert("You are only allowed to upload a maximum of 12 files");
                document.getElementById('uploadWaqf').style.display="block";
                
                
                if($(window).width() < 600){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 1024 || $(window).width() == 768){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                }else{
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                }
                
                $(window).on('resize' , function(){
                    if($(window).width() < 600){
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                    }else if($(window).width() == 1024 || $(window).width() == 768){
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                    }else{
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                    }
                });
                $('#imgFileUpload').css('display' , 'block');
                document.getElementById("imgInp").value = "";
                $('.pip').remove();
                fullLength = 0;
                return false;
            }else{
                for (var i = 0; i < filesLength; i++) {
                  if(files[i].type == 'application/pdf'){
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pip\">"+
                            "<img class=\"imageThumb\" src=\"/assets/images/pdfIconMessage.png\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"remove\" data-id-file=\""+e.target.result+"\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#files");
                          $(".remove").click(function(e){
                            $(this).parent(".pip").remove();
                            
                            if($(".pip").length == 0){
                                document.getElementById('uploadWaqf').style.display="block";
                                if($(window).width() < 600){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 1024 || $(window).width() == 768){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                    });
                                $('#imgFileUpload').css('display' , 'block');
                                fullLength = 0;
                                document.getElementById("imgInp").value = "";
                            }
                            if($(".pip").length == 0 || $(window).width >= 1024){
                                document.getElementById('uploadWaqf').style.display="block";
                                if($(window).width() < 600){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 1024 || $(window).width() == 768){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                    });
                                $('#imgFileUpload').css('display' , 'block');
                                fullLength = 0;
                                document.getElementById("imgInp").value = "";
                            }
                          });
                        });
                  }else if(files[i].type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || files[i].type == 'application/msword'){
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pip\">"+
                            "<img class=\"imageThumb\" src=\"/assets/images/wordForPreview.jpg\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"remove\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#files");
                          $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                            if($(".pip").length == 0){
                                document.getElementById('uploadWaqf').style.display="block";
                                if($(window).width() < 600){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 1024 || $(window).width() == 768){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                    });
                                $('#imgFileUpload').css('display' , 'block');
                                fullLength = 0;
                                document.getElementById("imgInp").value = "";
                            }
                            
                          });
                        });
                  }else if(files[i].type == 'application/vnd.openxmlformats-officedocument.presentationml.presentation' || files[i].type == 'application/vnd.ms-powerpoint'){
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pip\">"+
                            "<img class=\"imageThumb\" src=\"/assets/images/pptxForPreview.jpg\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"remove\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#files");
                          $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                            if($(".pip").length == 0){
                                document.getElementById('uploadWaqf').style.display="block";
                                if($(window).width() < 600){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 1024 || $(window).width() == 768){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                    });
                                $('#imgFileUpload').css('display' , 'block');
                                fullLength = 0;
                                document.getElementById("imgInp").value = "";
                            }
                            
                          });
                        });
                  }else{
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pip\">"+
                            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"remove\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#files");
                          $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                            if($(".pip").length == 0){
                                document.getElementById('uploadWaqf').style.display="block";
                                if($(window).width() < 600){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 1024 || $(window).width() == 768){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                    });
                                $('#imgFileUpload').css('display' , 'block');
                                fullLength = 0;
                                document.getElementById("imgInp").value = "";
                            }
                            
                          });
                        });
                  }
                fileReader.readAsDataURL(files[i]);
              }
            }
        });
      } else {
        alert("Your browser doesn't support to File API");
        document.getElementById('uploadWaqf').style.display = "block";
            $('#imgFileUpload').css('display' , 'block');
      }
    
	try{
			var file = document.getElementById('files');
			file.addEventListener('click' , function(){
				document.getElementById('imgInp').click();
			});
    }
    catch(e){
        
    }
    
    try{
        var phone = document.getElementById('phoneRegister');
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
    
    try{
        var phone = document.getElementById('phoneFormRequestsssss');
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
    
    
    $(window).on('load' , function(){
       $("#containers").animate({ scrollTop: $('#containers').prop("scrollHeight")}, 1000); 
    });
   
    $(window).on('load' , function(){
       $(".containersManager7").animate({ scrollTop: $('.containersManager7').prop("scrollHeight")}, 1000); 
    });
    
    updateList = function() {
    var input = document.getElementById('imgInputUploadedMessages');
    var output = document.getElementById('fileList');
    var children = "";
    var arr=[];
    for (var i = 0; i < input.files.length; ++i) {
        children += "<li>" + input.files.item(i).name + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='removes'>x</span></li>";
        arr.push(input.files[i]);
    }
    $('.removes').on('click' , function(){
        console.log('fahmy');
        arr.splice(index,1);
    });
    console.log(arr);
    output.innerHTML = "<ul>"+children+"</ul>";
}
    
    
    $('#img1FileUploadMessages11').on('click' , function(e){
        
		var modal = document.getElementById("myModalIndicator");
		
        var btn = document.getElementById('img1FileUploadMessages11');
        
            modal.style.display = "block";
            $('.loginco').css('z-index' , '0');

        var span = document.getElementsByClassName("closeIndicator")[0];
        
        var loginco = document.getElementsByClassName("loginco");

        // btn.onclick = function () {
        //     modal.style.display = "block";
        //     $(loginco).css('z-index' , '0');
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
    $('#imgInputUploadedMessages').on('change' , function(e){
        // console.log(e.target.files);
        if( e.target.files.length > 0 ){
            $('#buttonUploadImageMessages').prop('disabled' , false);
        }
    });
    
    
    setTimeout(function(){
       $('#messageErrorُEvaluate').fadeOut(3000);// or fade, css display however you'd like.
    }, 10000);
    
    $('.btnRequestProjectUser').on('click' , function(e){
        
        let RequestUserId = e.target.getAttribute('dataRows');
        
         location.href = "/detailsProjectUser/"+RequestUserId ;
        
// 		var modal = document.getElementById("myModalIndicatorFahmy");
// 		var rows = document.getElementsByClassName('btnRequestProjectUser')[0].getAttribute('dataRows');
//         for(let i = 0 ; i < rows ; i++){
//         var btn = document.getElementsByClassName('btnRequestProjectUser')[i];

//         var span = document.getElementsByClassName("closeIndicatorFahmy")[0];
        
//         var loginco = document.getElementsByClassName("loginco")[0];

//         btn.onclick = function () {
//             modal.style.display = "block";
//             $(loginco).css('z-index' , '0');
//         }

//         span.onclick = function () {
//             modal.style.display = "none";
//         }

//         window.onclick = function (event) {
//             if (event.target == modal) {
//                 modal.style.display = "none";
//             }
//         }
//         }
        
	});
	$('.btnRequestProjectUser2').on('click' , function(e){
	    var project_id = e.target.getAttribute('dataRows2');
	    var project_id2 = e.target.getAttribute('dataRows3');
	    location.href = '/showMainPageProjectManager/'+project_id+'/'+project_id2;
// 		var modal2 = document.getElementById("myModalIndicatorFahmy2");
// 		var rows2 = document.getElementsByClassName('btnRequestProjectUser2')[0].getAttribute('dataRows2');
// 		console.log(rows2);

// 		for(let i = 0 ; i < rows2 ; i++){
//             var btn2 = document.getElementsByClassName('btnRequestProjectUser2')[i];

//         var span2 = document.getElementsByClassName("closeIndicatorFahmy2")[0];
        
//         var loginco = document.getElementsByClassName("loginco")[0];

//         btn2.onclick = function () {
//             modal2.style.display = "block";
//             $(loginco).css('z-index' , '0');
//         }

//         span2.onclick = function () {
//             modal2.style.display = "none";
//         }

//         window.onclick = function (event) {
//             if (event.target == modal2) {
//                 modal2.style.display = "none";
//             }
//         }
// 		}
	});
	$('.btnRequestProjectUser3').on('click' , function(e){
	    
	    let RequestConsultantId = e.target.getAttribute('dataRows3');
	   // console.log(RequestConsultantId);
        location.href = "/showConsultantProject/"+RequestConsultantId ;
        //  location.href = "/detailsProjectUser/"+RequestUserId ;
// 		var modal3 = document.getElementById("myModalIndicatorFahmy3");
// 		var rows3 = document.getElementsByClassName('btnRequestProjectUser3')[0].getAttribute('dataRows3');
//         for(let i = 0 ; i < rows3 ; i++){
//         var btn3 = document.getElementsByClassName('btnRequestProjectUser3')[i];

//         var span3 = document.getElementsByClassName("closeIndicatorFahmy3")[0];
        
//         var loginco = document.getElementsByClassName("loginco")[0];

//         btn3.onclick = function () {
//             modal3.style.display = "block";
//             $(loginco).css('z-index' , '0');
//         }

//         span3.onclick = function () {
//             modal3.style.display = "none";
//         }

//         window.onclick = function (event) {
//             if (event.target == modal3) {
//                 modal3.style.display = "none";
//             }
//         }
//         }
	});
	
	$('#btnHomeUser').on('click' , function(){
	    location.href="/showFormRequest";
	});
	
	$('#btnHomeUser2').on('click' , function(){
	    location.href="/request";
	});
    
    $('.btnProjectUserDetails').on('click' , function(e){
        // let user_id = e.target.getAttribute('user-id');
        // let request_id = e.target.getAttribute('request-id');
        location.href="/adminUserMessages/"+idFromUrl;
    });
    $('#textareaMessageId').on('input' , function(e){
        if(e.target.value != ""){
          document.getElementById('imageForDisabled').disabled = false;
        }else{
            document.getElementById('imageForDisabled').disabled = true;
        }
          
    });
    try{
        document.getElementById("textareaMessageId").addEventListener("keyup", function(e) {
            if (e.keyCode === 13) {
            	document.getElementById("myFormID").submit();
            	document.getElementById("textareaMessageId").value="";
        		return false;
            }
        });
    }catch(e){
        
    }
    
    try{
        document.getElementById("textareaMessageId").addEventListener("keyup", function(e) {
            if (e.keyCode === 13) {
            	document.getElementById("formID2").submit();
            	document.getElementById("textareaMessageId").value="";
        		return false;
            }
        });
    }catch(e){
        
    }
   
    //user Messages
//     try{
// 			var fileInputMessages = document.getElementById('img1FileUploadMessages');
// 			fileInputMessages.addEventListener('click' , function(){
// 				document.getElementById('imgInputUploadedMessages').click();
// 			});
//     }
//     catch(e){
        
//     }
    
    
    
    $('.form1 input').on('focus' , function(){
        $('.waqf_names1').css('color' , '#1BA590');
    });
    $('.form1').on('focusout' , function(){
        $('.waqf_names1').css('color' , '#919191');
    });
    
    $('.form2 input').on('focus' , function(){
        $('.waqf_names2').css('color' , '#1BA590');
    });
    $('.form2').on('focusout' , function(){
        $('.waqf_names2').css('color' , '#919191');
    });
    
    $('.form3 input').on('focus' , function(){
        $('.waqf_names3').css('color' , '#1BA590');
    });
    $('.form3').on('focusout' , function(){
        $('.waqf_names3').css('color' , '#919191');
    });
    
    $('.form4 input').on('focus' , function(){
        $('.waqf_names4').css('color' , '#1BA590');
    });
    $('.form4').on('focusout' , function(){
        $('.waqf_names4').css('color' , '#919191');
    });
    
    $('.form5 input').on('focus' , function(){
        $('.waqf_names5').css('color' , '#1BA590');
    });
    $('.form5').on('focusout' , function(){
        $('.waqf_names5').css('color' , '#919191');
    });
    
    $('.form6 input').on('focus' , function(){
        $('.waqf_names6').css('color' , '#1BA590');
    });
    $('.form6').on('focusout' , function(){
        $('.waqf_names6').css('color' , '#919191');
    });
    
    $('.form7 textarea').on('focus' , function(){
        $('.waqf_names7').css('color' , '#1BA590');
    });
    $('.form7').on('focusout' , function(){
        $('.waqf_names7').css('color' , '#919191');
    });
    
    //sidebar active ornot active
    try{
    var header = document.getElementById("sidebars");
    var btns = header.getElementsByClassName("btnss");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
      });
    }
    }catch(e){
        
    }
    
    
    /******/
    //consultantFiles
    try{
			var fileInputConsultant = document.getElementById('imgFileUploadConsultant');
			fileInputConsultant.addEventListener('click' , function(){
			    if($(this).data('clicked', true)){
				    document.getElementById('imgInpConsultant').click();
			    }else{
			        console.log('false');
			    }
			});
    }
    catch(e){
        
    }
    
    try{
			var fileInputConsultant1 = document.getElementById('filess');
			fileInputConsultant1.addEventListener('click' , function(){
				if($(this).data('clicked', true)){
				    document.getElementById('imgInpConsultant').click();
			    }else{
			        console.log('false');
			    }
			});
    }
    catch(e){
        
    }
    /********/
    
    //consultant messages
    try{
			var fileInputMessages2 = document.getElementById('img2FileUploadMessages');
			fileInputMessages2.addEventListener('click' , function(){
				document.getElementById('imgInputUploadedMessages2').click();
			});
    }
    catch(e){
        
    }
    /*********/
    
    try{
        var modalConsultant = document.getElementById("myModaConsultantProject");
        
        var btnConsultant = document.getElementsByClassName('btnProjectConsultantDetails')[0];

        var spanButtonConsultant = document.getElementsByClassName("closeConsultantProject")[0];
        
        var loginco = document.getElementsByClassName("loginco")[0];
    
        btnConsultant.onclick = function () {
            modalConsultant.style.display = "block";
            $(loginco).css('z-index' , '0');
        }

        spanButtonConsultant.onclick = function () {
            modalConsultant.style.display = "none";
        }
}
    catch(e){
        
    }
    
    var urls =window.location.href;
    var dataID = (urls.match(/(\d+)/g) || []);
    var idFromUrl = dataID[0];
    var idFromUrl2 = dataID[1];
    console.log(urls);
    console.log(idFromUrl);
    console.log(idFromUrl2);
    if(urls == "https://nmthgah.com/showEvaluationPage/"+idFromUrl+"/"+idFromUrl2+"?page=1" || urls == "https://nmthgah.com/showEvaluationPage/"+idFromUrl+"/"+idFromUrl2){
            $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'right' : '570px'});
        $(window).on('load' , function(){
          if($(window).width() == 1024){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'0px' , 'right' : '480px'});
          }else if($(window).width() == 768){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'0px' , 'right' : '360px'});
          }else if($(window).width() == 411 || $(window).width() == 414){
            $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'125px' , 'right' : '-150px'});
          }else if($(window).width() == 412){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'90px' , 'right' : '15px'});
          }else if($(window).width() == 393){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'90px' , 'right' : '15px'});
          }else if($(window).width() == 375){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'85px' , 'right' : '15px'});
          }else if($(window).width() == 360){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'85px' , 'right' : '15px'});
          }else if($(window).width() == 320){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'70px' , 'right' : '15px'});
          }else{
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'0px' , 'right' : '570px'});
          }
        });
        $(window).on('resize' , function(){
          if($(window).width() == 1024){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'0px' , 'right' : '480px'});
          }else if($(window).width() == 768){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'0px' , 'right' : '360px'});
          }else if($(window).width() == 411 || $(window).width() == 414){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'125px' , 'right' : '-150px'});
          }else if($(window).width() == 412){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'90px' , 'right' : '15px'});
          }else if($(window).width() == 393){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'90px' , 'right' : '15px'});
          }else if($(window).width() == 375){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'85px' , 'right' : '15px'});
          }else if($(window).width() == 360){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'85px' , 'right' : '15px'});
          }else if($(window).width() == 320){
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'70px' , 'right' : '15px'});
          }else{
              $('.buttonsGroupConsultant .btnGroupConslt3').css({'position':'relative' , 'top':'0px' , 'right' : '570px'});
          }
        });
    }
    
    $('#downloadAllConsultant').on('click' , function(e){
        var idForDownload = e.target.getAttribute('data-idDownload');
        console.log(idForDownload);
        location.href="/downloadAllFilesConsultant/"+idForDownload;
    });
    
    try{
        var modalConsultant = document.getElementById("myModaConsultantProject");
        
        var btnConsultant = document.getElementsByClassName('btnProjectConsultantDetails2')[0];

        var spanButtonConsultant = document.getElementsByClassName("closeConsultantProject")[0];
        
        var loginco = document.getElementsByClassName("loginco")[0];
    
        btnConsultant.onclick = function () {
            modalConsultant.style.display = "block";
            $(loginco).css('z-index' , '0');
        }

        spanButtonConsultant.onclick = function () {
            modalConsultant.style.display = "none";
        }
}
    catch(e){
        
    }
        
        $('.login-tab-head a').click(function (e) {
		e.preventDefault();
		var target = $(this).attr('href');
		$('.login-tab-head a').removeClass('htab');
		$(this).addClass('htab');
		$('.tabitem').removeClass('btab');
		$(target).addClass('btab');
	});
	
	$('.btnEvaluationConsultant').on('click' , function(e){
	    var projId = e.target.getAttribute('data-id');
	    var projId2 = e.target.getAttribute('data-id2');
	    location.href = '/showEvaluationPage/'+projId+'/'+projId2;
	});
// 	$('#GoNext').on('click' , function(e){
// 	    location.href = "/showEvaluationPage2/"; 
// 	});
    $('#btnUniqueReEvaluation').on('click' , function(e){
	    var projId = e.target.getAttribute('data-id');
	    location.href = '/showEvaluationPage/'+projId;
	});
	
// 	$('.list-unstyled li a').on('click', function () {
// 	    console.log('fahmy');
//         $('.list-unstyled li').toggleClass('active');
//     });
    
    // $('.btnHomeUser-project-manager2').on('click' , function(e){
    //     var pillar1 = e.target.getAttribute('dataPillar-id1');
    //     var pillar2 = 
    //     // console.log(pillar1);
    //     location.href = '/showStandardPillars/'+pillar1;
    // });
    $('#btnHomeUser2-project-manager2').on('click' , function(e){
        var pillar2 = e.target.getAttribute('dataPillar-id2');
        // console.log(pillar2);
        location.href = '/showStandardPillars/'+pillar2;
    });
    $('#btnHomeUser3-project-manager2').on('click' , function(e){
        var pillar3 = e.target.getAttribute('dataPillar-id3');
        // console.log(pillar3);
        location.href = '/showStandardPillars/'+pillar3;
    });
    $('#btnHomeUser4-project-manager2').on('click' , function(e){
        var pillar4 = e.target.getAttribute('dataPillar-id4');
        // console.log(pillar4);
        location.href = '/showStandardPillars/'+pillar4;
    });
    $('.arrow').on('click' , function(){
        $(this).toggleClass('fa-caret-down fa-caret-left');
    });
    
});