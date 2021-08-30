@extends('admin.index') 
@section('main')
<!-- Row -->
<style>
    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus
    input:-webkit-autofill, 
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus {
      -webkit-text-fill-color: black;
      -webkit-box-shadow: 0 0 0px 1000px #fff inset;
    }
    
    .files {
       border: 2px dashed goldenrod;
       width: 453px;
       /*margin-right: 5px;*/
       padding: 20px;
       position: relative;
       top: 0px;
       height: 170px;
       border-radius: 10px;
       cursor: pointer;
    }
    #uploadWaqf{
        position:relative;
        color:goldenrod;
        height: 50px;
        right: 170px;
        top: 45px;
    }
    input[type="file"] {

     display:block;
    }
    .imageThumb {
     border: 0.5px solid #1BA590;
     padding: 1px;
     width:50px;
     height:45px;
     }
     .pip{
         position:relative;
         top: -150px;
         right: 7px;
         display:inline-block;
         padding:0.5px;
     }
     .remove{
         font-size:18px;
         cursor:pointer;
     }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"></h4>
            </div>
            <div class="card-block">
                
                 <form method="POST" action="{{ url('admin/updateRequests/' . $requests->id) }}" enctype="multipart/form-data">
                   @method('PUT')
                   @csrf
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                            <input type="text" name="waqf_name" value="{{$requests->waqf_name}}" class="form-control" />
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم صاحب الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-account"></i></div>
                                            <input type="text" name="waqf_ownerName" value="{{$requests->waqf_ownerName}}" class="form-control">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم المسؤول عن الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-account-star"></i></div>
                                            <input type="text" name="waqf_charger" value="{{$requests->waqf_charger}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">المدينة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-city"></i></div>
                                            <input type="text" name="city" value="{{$requests->city}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">الشارع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-street-view"></i></div>
                                            <input type="text" name="street" value="{{$requests->street}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">الجوال</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-phone"></i></div>
                                            <input type="text" name="phone" style="direction:ltr;" value="{{$requests->phone}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">وصف الوقف</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-comment"></i></div>
                                        <textarea style="height:173px;" name="desc" class="form-control" rows="4" cols="50">{{$requests->desc}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">المستخدمين</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-account"></i></div>
                                            <select name="user_id" id="user_id" class="form-control">
                                                <option>بدون</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}" {{old('user_id',$user->id) == $requests->user_id ? 'selected' : ''}}>{{$user->first_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">لتعديل الملفات المرفقة للمشروع</label>
                                    <div class="files" id="files">
                                        <input type="file" onclick="removePreviousImages(this)" id="imgInp" name="files[]" style="width: 0px;height:0px;overflow: hidden;" accept="image/jpg,image/jpeg,image/png,.doc, .docx,.ppt, .pptx,.pdf" multiple />
                                        <span id="uploadWaqf">رفع ملفات</span>
                                    </div>    
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">الملفات المرفقة للمشروع</label>
                                @foreach($data as $d)
                                <ul class="list-group">
                                    @if(pathinfo($d->files, PATHINFO_EXTENSION) == 'pptx' || pathinfo($d, PATHINFO_EXTENSION) == 'ppt')
                                        <li class="list-group-item"><img src="{{asset('assets/images/pptxForPreview.jpg')}}" width="40px;" height="40px;"> <span style="position:relative;right:270px"><a class="downloadFileAdmin" href="{{url('uploads')}}/{{@$d->files}}" target="_blank">عرض</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="downloadFileAdmin1" href="/admin/downloadImagesFilesFromRequestAdmin/{{$d->id}}" target="_blank">تحميل</a>&nbsp;&nbsp;&nbsp;&nbsp;<a  style="cursor:pointer;" onclick="whenDeleteFile(this);"  data-id-image="{{$d->id}}" class="deleteImage">x</a></span></li>
                                    @elseif(pathinfo($d->files, PATHINFO_EXTENSION) == 'docx' || pathinfo($d, PATHINFO_EXTENSION) == 'doc')
                                        <li class="list-group-item"><img src="{{asset('assets/images/wordForPreview.jpg')}}" width="40px;" height="40px;"> <span style="position:relative;right:270px"><a class="downloadFileAdmin" href="{{url('uploads')}}/{{@$d->files}}" target="_blank">عرض</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="downloadFileAdmin1" href="/admin/downloadImagesFilesFromRequestAdmin/{{$d->id}}" target="_blank">تحميل</a>&nbsp;&nbsp;&nbsp;&nbsp;<a  style="cursor:pointer;" onclick="whenDeleteFile(this);"  data-id-image="{{$d->id}}"class="deleteImage">x</a></span></li>
                                    @elseif(pathinfo($d->files, PATHINFO_EXTENSION) == 'pdf')
                                        <li class="list-group-item"><img src="{{asset('assets/images/pdfIconMessage.png')}}" width="40px;" height="40px;"> <span style="position:relative;right:270px"><a class="downloadFileAdmin" href="{{url('uploads')}}/{{@$d->files}}" target="_blank">عرض</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="downloadFileAdmin1" href="/admin/downloadImagesFilesFromRequestAdmin/{{$d->id}}" target="_blank">تحميل</a>&nbsp;&nbsp;&nbsp;&nbsp;<a  style="cursor:pointer;" onclick="whenDeleteFile(this);"  data-id-image="{{$d->id}}"class="deleteImage">x</a></span></li>
                                    @else
                                        <li class="list-group-item"><img src="{{asset('uploads/' . $d->files)}}" width="40px;" height="40px;"> <span style="position:relative;right:270px"><a class="downloadFileAdmin" href="{{url('uploads')}}/{{@$d->files}}" target="_blank">عرض</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="downloadFileAdmin1" href="/admin/downloadImagesFilesFromRequestAdmin/{{$d->id}}" target="_blank">تحميل</a>&nbsp;&nbsp;&nbsp;&nbsp;<a  style="cursor:pointer;" onclick="whenDeleteFile(this);"  data-id-image="{{$d->id}}"class="deleteImage">x</a></span></li>
                                    @endif
                                  <br>
                                </ul>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <select name="statusRequest" id="statusRequest" data-val="{{$requests->statusRequest}}" class="form-control">
                                    <option disabled selected>حالة الطلب</option>
                                    <option class="review" value="1" @if(@$requests->statusRequest == 1) selected @endif>الطلب تحت المراجعة</option>
                                    <option class="trade" value="2" @if(@$requests->statusRequest == 2) selected @endif>الطلب تحت التعاقد</option>
                                </select>
                            </div>
                        </div>
                        <br>
                    </div>
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> حفظ </button>
                        <a href="/admin/ProjectFromRequest/{{request()->id}}" class="btn" style="background-color:goldenrod;color:white;">إنشاء مشروع</a>
                </form>
            </div>
            
            <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
            
                        <div class="modal-body text-center" style="padding: 40px">
                            <h3 class="afterShow" style="font-family:dr;color:#808080;">هل تريد حذف هذا الملف ؟</h3>
                            
                        </div>
            
            
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $(window).on('load' , function(){
            var counter = $('#statusRequest').attr('data-val');
            console.log(counter);
            if(counter == 3){
                $('.trade').attr('selected' , true);
            }else{
                console.log('first time');
            }
        });
        var fullLength=0;
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
                    $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
                }
                
                $(window).on('resize' , function(){
                    if($(window).width() < 600){
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                    }else if($(window).width() == 1024 || $(window).width() == 768){
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                    }else{
                        $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
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
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
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
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
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
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
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
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
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
                                    $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
                                }
                                
                                $(window).on('resize' , function(){
                                    if($(window).width() < 600){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                                    }else if($(window).width() == 1024 || $(window).width() == 768){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                                    }else if(urlssss == 'https://nmthgah.com/showFormRequest'){
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'90px'});
                                    }else{
                                        $('#uploadWaqf').css({'position':'relative' , 'top':'50px' , 'right':'170px'});
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
    });
    function whenDeleteFile(e){
        $('#dataOfDelation').empty();
        var idOfFile = e.getAttribute('data-id-image');
        $('#uploadingModal').show();
        $('<div id="dataOfDelation"><br><a onclick="closeWindow()" href="/admin/deleteDataFileImage/'+idOfFile+'" class="btn btn-danger">نعم</a> &nbsp;&nbsp; <a class="btn btn-success text-white" onclick="closeWindow()">لا</a></div>').insertAfter(".afterShow");
        // $('#uploadingModal').hide();
    }
    
    function closeWindow(){
        $('#uploadingModal').hide();
    }
    
    function removePreviousImages(e){
            document.getElementById("imgInp").value = "";
            $('.pip').remove();
            document.getElementById('uploadWaqf').style.display = "block";
            $('#imgFileUpload').css('display' , 'block');
            $('#uploadWaqf').css({'position':'relative' , 'top':'45px' , 'right':'170px'});
            // if($(window).width() > 1200){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
            // }else if($(window).width() == 1025 || $(window).width() == 1200){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
            // }else if($(window).width() == 1024){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
            // }else if($(window).width() == 768){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'100px'});
            // }else if($(window).width() == 414){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            // }else if($(window).width() == 412){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            // }else if($(window).width() == 411){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            // }else if($(window).width() == 393){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            // }else if($(window).width() == 375){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            // }else if($(window).width() == 360){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            // }else if($(window).width() == 320){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'20px'});
            // }else{
            //     console.log('no width');
            // }
            
            // $(window).on('resize' , function(){
            //     console.log('fahmy');
            //     if($(window).width() > 1200){
            //     $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
            //     }else if($(window).width() == 1025 || $(window).width() == 1200){
            //         $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
            //     }else if($(window).width() == 1024){
            //         $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
            //     }else if($(window).width() == 768){
            //         $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'100px'});
            //     }else if($(window).width() == 414){
            //         $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            //     }else if($(window).width() == 412){
            //         $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            //     }else if($(window).width() == 411){
            //         $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            //     }else if($(window).width() == 393){
            //         $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            //     }else if($(window).width() == 375){
            //         $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            //     }else if($(window).width() == 360){
            //         $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            //     }else if($(window).width() == 320){
            //         $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'20px'});
            //     }else{
            //         console.log('no width');
            //     }
            // });
        }
</script>
<!-- Row -->
@endsection