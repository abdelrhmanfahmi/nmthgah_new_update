@extends('layout_adminUserMessages.app')
@section('content')
<div id="myModalIndicator" class="modalIndicator">
    <div class="modal-contentIndicator">
        <span class="closeIndicator">&times;</span>
        <form id="registerFilesHere" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4 borda">
                <div class="filesss" id="files">
                    <input type="file" onclick="removePreviousImages(this)" id="imgInp" accept="image/jpg,image/jpeg,image/png,.doc, .docx,.ppt, .pptx,.pdf" style="width: 0px;height:0px;overflow: hidden;" name="files[]" multiple />
                    <img src="{{asset('assets/images/Group 3277@2x.png')}}" id="imgFileUpload" class="ImageCenterMessages" width="30px" height="30px" />
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}" >
                    <input type="hidden" name="request_id" value="{{request()->id2}}" >
                    <span id="uploadWaqf">إرسال ملفات</span>
                    <p style="text-align:center;" id="appends"></p>
                </div>
            </div>
            <button type="submit" class="btn" id="buttonUploadImageMessages">إرسال<span class="loader_area"></span></button>
        </form>
    </div>
</div>
<div class="modal" id="variableModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat;z-index: 1;">

            <div class="modal-content text-center" style="background:white";>

            <div class="modal-header2 d-flex justify-content-center text-center ">

            </div>

            <div class="modal-body">
                <h6 class="heading text-center" id="modal_message2"></h6>
            </div>

        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    //action="{{route('request.storeMessageUserFiles')}}" method="POST"
    
    $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#registerFilesHere').submit(function(e) {
            e.preventDefault();
            
            let TotalImages = $('#imgInp')[0].files.length; //Total Images
            let files = $('#imgInp')[0];
            
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
                $('#buttonUploadImageMessages').attr('disabled' , true);
                $('#buttonUploadImageMessages').css('pointer-events','none');
                var formData = new FormData(this);
                for (let i = 0; i < TotalImages; i++) {
                    formData.append('files' + i, files.files[i]);
                }
                $.ajax({
                    type:'POST',
                    url: "/storeAdminUserMessagesFiles",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#imgInp').attr('readonly' , true);
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
                        $('#buttonUploadImageMessages').attr('disabled' , false);
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
            if($(window).width() > 1200){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
            }else if($(window).width() == 1025 || $(window).width() == 1200){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
            }else if($(window).width() == 1024){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
            }else if($(window).width() == 768){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'100px'});
            }else if($(window).width() == 414){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 412){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 411){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 393){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 375){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 360){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
            }else if($(window).width() == 320){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'20px'});
            }else{
                console.log('no width');
            }
            
            $(window).on('resize' , function(){
                console.log('fahmy');
                if($(window).width() > 1200){
                $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'240px'});
                }else if($(window).width() == 1025 || $(window).width() == 1200){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                }else if($(window).width() == 1024){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'120px'});
                }else if($(window).width() == 768){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'100px'});
                }else if($(window).width() == 414){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 412){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 411){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 393){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 375){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 360){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'50px'});
                }else if($(window).width() == 320){
                    $('#uploadWaqf').css({'position':'relative' , 'top':'40px' , 'right':'20px'});
                }else{
                    console.log('no width');
                }
            });
        }
</script>
@endsection