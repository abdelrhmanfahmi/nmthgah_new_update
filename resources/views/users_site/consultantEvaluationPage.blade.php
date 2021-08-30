@extends('layout_consultantDetailsProject.app')
@section('content')

<div id="myModaConsultantProject" class="modalConsultantProject">
    <div class="modal-contentConsultantProject">
        <div class="row">
            <div class="col-md-6">
                <h3 id="pModalConsultantProject">الملفات المساعدة</h3>
            </div>
            <div class="col-md-6">
                <button class="closeConsultantProject">إغلاق</button>
            </div>
        </div>
        <br>
    <div class="login-tab-head">
        <a href=".tab1" class="htab">رفع ملفات</a>
        <a href=".tab2">تحميل ملفات</a>
    </div>
    <div class="login-tab-body">
        <div class="row tabitem btab tab1">
            <div class="col-md-8">
                <form id="registerNewFilesConsultant11" enctype="multipart/form-data">
                    @csrf
                    <div class="bords">
                        <div class="files" id="filess">
                            <input type="hidden" name="consultant_id" value="{{auth()->guard('consultant')->user()->id}}" />
                            <input type="hidden" name="request_id" value="{{request()->id}}" />
                            <input type="file" onclick="removePreviousImages(this)" id="imgInpConsultant" style="width: 0px;height:0px;overflow: hidden;" accept="image/jpg,image/jpeg,image/png,.doc, .docx,.ppt, .pptx,.pdf" name="files[]" multiple/>
                            <img src="{{asset('assets/images/Group 3345.png')}}" id="imgFileUploadConsultant" style="" width="30px" height="30px" />
                            <span id="uploadWaqfConsultant">رفع مرفقات</span>
                        </div>
                    </div>
                        <button type="submit" class="btn" id="buttonUploadImageMessagesConsultant">إرسال<span class="loader_area"></span></button>
                </form>
            </div>
            <div class="col-md-4">
            <h3 id="pModalConsultantProjectTable">الملفات المساعدة</h3>
            <ul class="ListConsultantTable-tab1 conslt-tab-scroll-tab1">
                @foreach($showRequestConsultant2 as $files)
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>{{Str::limit($files->files,10)}}</p>
                    <span><?php echo ceil(filesize('uploads/' . $files->files)/1000) . ' kB'; ?></span>
                </li>
                <br>
                @endforeach
                @foreach($showRequestConsultant3 as $files)
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>{{Str::limit($files->files,10)}}</p>
                    <span><?php echo ceil(filesize('uploads/' . $files->files)/1000) . ' kB'; ?></span>
                </li>
                <br>
                @endforeach
            </ul>
        </div>
        </div>
        
        <div class="row tabitem tab2">
            
            <div class="btnTableConsultantDownload">
                <img class="" src="{{asset('assets/images/Group 3368.png')}}"><span id="downloadAllConsultant" data-idDownload="{{request()->id}}" class="btnTableCosnultantWord">تحميل الجميع</span>
            </div>
            <ul class="ListConsultantTable conslt-tab-scroll">
                @foreach($showRequestConsultant2 as $files)
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>{{Str::limit($files->files,10)}}</p>
                    <a href="/downloadFilesConsultants2/{{$files->id}}"><img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px"></a>
                    <span><?php echo ceil(filesize('uploads/' . $files->files)/1000) . ' kB'; ?></span>
                </li>
                <br>
                @endforeach
                @foreach($showRequestConsultant3 as $files)
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>{{Str::limit($files->files,10)}}</p>
                    <a href="/downloadFilesConsultants3/{{$files->id}}"><img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px"></a>
                    <span><?php echo ceil(filesize('uploads/' . $files->files)/1000) . ' kB'; ?></span>
                </li>
                <br>
                @endforeach
            </ul>
        </div>
    </div>
        
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
var fullLength=0;
    if (window.File && window.FileList && window.FileReader) {
        $("#imgInpConsultant").on("change", function(e) {
            document.getElementById('uploadWaqfConsultant').style.display = "none";
            $('#imgFileUploadConsultant').css('display' , 'none');
            var urlssss = window.location.href;
            console.log(urlssss);
          var files = e.target.files,
            filesLength = files.length;
            fullLength += filesLength;
            console.log(fullLength);
            if (fullLength > 12) {
                alert("You are only allowed to upload a maximum of 12 files");
                document.getElementById('uploadWaqfConsultant').style.display="block";
                
                
                if($(window).width() < 600){
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 1024 || $(window).width() == 768){
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                }else{
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                }
                
                $(window).on('resize' , function(){
                    if($(window).width() < 600){
                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                    }else if($(window).width() == 1024 || $(window).width() == 768){
                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                    }else{
                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                    }
                });
                $('#imgFileUploadConsultant').css('display' , 'block');
                document.getElementById("imgInpConsultant").value = "";
                $('.pipss').remove();
                fullLength = 0;
                return false;
            }else{
                for (var i = 0; i < filesLength; i++) {
                  if(files[i].type == 'application/pdf'){
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pipss\">"+
                            "<img class=\"imageThumbss\" src=\"/assets/images/pdfIconMessage.png\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"removess\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#filess");
                          $(".removess").click(function(){
                            $(this).parent(".pipss").remove();
                            if($(".pipss").length == 0){
                                document.getElementById('uploadWaqfConsultant').style.display="block";
                                if($(window).width() < 600){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 1024 || $(window).width() == 768){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                    });
                                $('#imgFileUploadConsultant').css('display' , 'block');
                                fullLength = 0;
                                document.getElementById("imgInpConsultant").value = "";
                            }
                            if($(".pipss").length == 0 || $(window).width >= 1024){
                                document.getElementById('uploadWaqfConsultant').style.display="block";
                                if($(window).width() < 600){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 1024 || $(window).width() == 768){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                    });
                                $('#imgFileUploadConsultant').css('display' , 'block');
                                fullLength = 0;
                                document.getElementById("imgInpConsultant").value = "";
                            }
                          });
                        });
                  }else if(files[i].type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || files[i].type == 'application/msword'){
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pipss\">"+
                            "<img class=\"imageThumbss\" src=\"/assets/images/wordForPreview.jpg\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"removess\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#filess");
                          $(".removess").click(function(){
                            $(this).parent(".pipss").remove();
                            if($(".pipss").length == 0){
                                document.getElementById('uploadWaqfConsultant').style.display="block";
                                if($(window).width() < 600){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 1024 || $(window).width() == 768){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                    });
                                $('#imgFileUploadConsultant').css('display' , 'block');
                                fullLength = 0;
                                document.getElementById("imgInpConsultant").value = "";
                            }
                            
                          });
                        });
                  }else if(files[i].type == 'application/vnd.openxmlformats-officedocument.presentationml.presentation' || files[i].type == 'application/vnd.ms-powerpoint'){
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pipss\">"+
                            "<img class=\"imageThumbss\" src=\"/assets/images/pptxForPreview.jpg\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"removess\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#filess");
                          $(".removess").click(function(){
                            $(this).parent(".pipss").remove();
                            if($(".pipss").length == 0){
                                document.getElementById('uploadWaqfConsultant').style.display="block";
                                if($(window).width() < 600){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 1024 || $(window).width() == 768){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                    });
                                $('#imgFileUploadConsultant').css('display' , 'block');
                                fullLength = 0;
                                document.getElementById("imgInpConsultant").value = "";
                            }
                            
                          });
                        });
                  }else{
                      var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                          var file = e.target;
                          $("<span class=\"pipss\">"+
                            "<img class=\"imageThumbss\" src=\"" + e.target.result + "\" title=\"file\"/>" +
                            "&nbsp;&nbsp;<span class=\"removess\">x</span>&nbsp;&nbsp;" +
                            "</span>").insertAfter("#filess");
                          $(".removess").click(function(){
                            $(this).parent(".pipss").remove();
                            if($(".pipss").length == 0){
                                document.getElementById('uploadWaqfConsultant').style.display="block";
                                if($(window).width() < 600){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                }else if($(window).width() == 1024 || $(window).width() == 768){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                }else{
                                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                                    }
                                    });
                                $('#imgFileUploadConsultant').css('display' , 'block');
                                fullLength = 0;
                                document.getElementById("imgInpConsultant").value = "";
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
        document.getElementById('uploadWaqfConsultant').style.display = "block";
            $('#imgFileUploadConsultant').css('display' , 'block');
      }
      
      $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#registerNewFilesConsultant11').submit(function(e) {
            e.preventDefault();
            
            let TotalImages = $('#imgInpConsultant')[0].files.length; //Total Images
            let files = $('#imgInpConsultant')[0];
            
            if(TotalImages == ""){
                $('#modal_message2').text('من فضلك أدخل الملفات بصورة صحيحة').css('font-family', 'cr');
                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                $('#variableModal2').fadeIn().show();
                setTimeout(function (){
                    $('#variableModal2').fadeOut("slow").hide();
                },4000);
            }else{
                $('.loader_area').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
                $(".remove").remove();
                $('#buttonUploadImageMessagesConsultant').attr('disabled' , true);
                $('#buttonUploadImageMessagesConsultant').css('pointer-events','none');
                var formData = new FormData(this);
                for (let i = 0; i < TotalImages; i++) {
                    formData.append('files' + i, files.files[i]);
                }
                $.ajax({
                    type:'POST',
                    url: "/insertFilesConsultants",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#imgInpConsultant').attr('readonly' , true);
                        if(response == 1){
                            setTimeout(function(){
                                    location.reload();
                                },5000);
                        }else{
                            console.log('Something Wrong In Request')
                        }
                    },
                    error: function(response){
                        console.log(response);
                        $('.loader_area').empty();
                        $('#buttonUploadImageMessagesConsultant').attr('disabled' , false);
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
            document.getElementById("imgInpConsultant").value = "";
            $('.pipss').remove();
            document.getElementById('uploadWaqfConsultant').style.display = "block";
            $('#imgFileUploadConsultant').css('display' , 'block');
            $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'60px' , 'right':'240px'});
            if($(window).width() > 1200){
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'60px' , 'right':'240px'});
            }else if($(window).width() == 1025 || $(window).width() == 1200){
                $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'40px' ,  'left':'0px'});
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'220px'});
            }else if($(window).width() == 1024){
                $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'40px' ,  'left':'0px'});
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'220px'});
            }else if($(window).width() == 768){
                $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'40px' ,  'left':'20px'});
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'210px'});
            }else if($(window).width() == 414){
                $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'140px'});
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'80px'});
            }else if($(window).width() == 412){
                $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'140px'});
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'80px'});
            }else if($(window).width() == 411){
                $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'140px'});
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'80px'});
            }else if($(window).width() == 393){
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'70px'});
            }else if($(window).width() == 375){
                $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'120px'});
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'70px'});
            }else if($(window).width() == 360){
                $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'110px'});
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'50px'});
            }else if($(window).width() == 320){
                $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'110px'});
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'50px'});
            }else{
                console.log('no width');
            }
            
            $(window).on('resize' , function(){
                console.log('fahmy');
                if($(window).width() > 1200){
                $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'60px' , 'right':'240px'});
                }else if($(window).width() == 1025 || $(window).width() == 1200){
                    $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'40px' ,  'left':'0px'});
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'220px'});
                }else if($(window).width() == 1024){
                    $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'40px' ,  'left':'0px'});
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'220px'});
                }else if($(window).width() == 768){
                    $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'40px' ,  'left':'20px'});
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'40px' , 'right':'210px'});
                }else if($(window).width() == 414){
                    $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'140px'});
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'80px'});
                }else if($(window).width() == 412){
                    $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'140px'});
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'80px'});
                }else if($(window).width() == 411){
                    $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'140px'});
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'80px'});
                }else if($(window).width() == 393){
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'70px'});
                }else if($(window).width() == 375){
                    $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'120px'});
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'70px'});
                }else if($(window).width() == 360){
                    $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'110px'});
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'50px'});
                }else if($(window).width() == 320){
                    $('#imgFileUploadConsultant').css({'position':'relative' , 'top':'0px' ,  'left':'110px'});
                    $('#uploadWaqfConsultant').css({'position':'relative' , 'top':'0px' , 'right':'50px'});
                }else{
                    console.log('no width');
                }
            });
        }
</script>
@endsection