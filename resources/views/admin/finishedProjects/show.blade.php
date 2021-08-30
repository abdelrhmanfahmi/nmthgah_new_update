@extends('admin.index') 
@section('main')
<!-- Row -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
    
    .imagesCentered{
        position:relative;
        object-fit:cover;
        border:1px solid #CCCCCC;
    }
    .disabled{
        pointer-events: none;
        cursor: default;
    }
    .page-header{
        position: relative;
        bottom: 0;
        width: 100%;
        height:100px;
    }
    
    .imgInPrint{
        position:relative;
        top:10px;
    }
    .page-footer{
        position: relative;
        top: 0mm;
        width: 100%;
        height:100px;
        background: black !important;
    }
    .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        
        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        }
        
        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }
        
        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes scale {
            0%, 100% {
                transform: none;
            }
            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }
        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142;
            }
        }
        
        @keyframes floating {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(10px);
        }
        100% {
            transform: translateY(0px);
        }
        }
    
        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }
    
        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }
        
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }
    
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    
    
        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }
    
        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }
        .option-heading:hover {
        color: #15bdce;
    }.option-heading:before           { content: "\f063";
                 font-family: FontAwesome;
                 color: #15bdce;}
    .option-heading.is-active:before { content: "\f062";
        font-family: FontAwesome;}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"></h4>
            </div>
            <div class="card-block">
                <div id="printableArea" style="-webkit-print-color-adjust: exact;">
                    <div class="page-header" style="-webkit-print-color-adjust: exact;">
                        <img class="imgInPrint" src="{{asset('assets/images/logo.png')}}" />
                      </div>
                      <br>
                @foreach($showFullProject as $showRequest)
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                            <input type="text" name="waqf_name" disabled style="background-color:white" value="{{$showRequest->ProjectoRequests->waqf_name}}" class="form-control" />
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم صاحب الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-account"></i></div>
                                            <input type="text" name="waqf_ownerName" disabled style="background-color:white" value="{{$showRequest->ProjectoRequests->waqf_ownerName}}" class="form-control">
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
                                            <input type="text" name="waqf_charger" disabled style="background-color:white" value="{{$showRequest->ProjectoRequests->waqf_charger}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">المدينة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-city"></i></div>
                                            <input type="text" name="city" disabled style="background-color:white" value="{{$showRequest->ProjectoRequests->city}}"  class="form-control">
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
                                            <input type="text" name="street" disabled style="background-color:white" value="{{$showRequest->ProjectoRequests->street}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">الجوال</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-phone"></i></div>
                                            <input type="text" name="phone" disabled style="background-color:white;direction:ltr" value="{{$showRequest->ProjectoRequests->phone}}"  class="form-control">
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
                                        <textarea name="desc" class="form-control" disabled style="background-color:white" rows="4" cols="50">{{$showRequest->ProjectoRequests->desc}}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">مستخدم المشروع</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-account"></i></div>
                                        <input type="text" name="user_id" disabled style="background-color:white;" value="{{@App\User::find($showRequest->ProjectoRequests->user_id)->first_name}} {{@App\User::find($showRequest->ProjectoRequests->user_id)->last_name}}"  class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            
                            
                            <!--@if(count($filesOfUserRequestProject) > 0)-->
                            <!--<label class="control-label">الملفات المرفقة للمشروع</label>-->
                            <!--<div class="row">-->
                            <!--    <div class="col-md-6" style="display:flex;">-->
                            <!--        <br>-->
                            <!--        @foreach($filesOfUserRequestProject as $d)-->
                            <!--            @if(pathinfo($d->files, PATHINFO_EXTENSION) == 'pptx' || pathinfo($d, PATHINFO_EXTENSION) == 'ppt')-->
                            <!--                <div class="text-center imagesCentered"><img src="{{asset('assets/images/pptxForPreview.jpg')}}" style="padding:10px" width="400px" height="200px"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                            <!--            @elseif(pathinfo($d->files, PATHINFO_EXTENSION) == 'docx' || pathinfo($d, PATHINFO_EXTENSION) == 'doc')-->
                            <!--                <div class="text-center imagesCentered"><img src="{{asset('assets/images/wordForPreview.jpg')}}" style="padding:10px" width="400px" height="200px"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                            <!--            @elseif(pathinfo($d->files, PATHINFO_EXTENSION) == 'pdf')-->
                            <!--                <div class="text-center imagesCentered"><embed src="{{asset('uploads/' . $d->files)}}" style="padding:10px" width="400px" height="200px"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                            <!--            @else-->
                            <!--                <div class="text-center imagesCentered"><img src="{{asset('uploads/' . $d->files)}}" style="padding:10px" width="400px" height="200px"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                            <!--            @endif-->
                            <!--          <br>-->
                            <!--        @endforeach-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--@else-->
                            
                            <!--@endif-->
                            
                            <!--<div class="row">-->
                            <!--    <div class="col-md-12">-->
                            <!--        <div class="form-group">-->
                            <!--            <label class="control-label">مدير المشروع</label>-->
                            <!--            <div class="input-group mb5">-->
                            <!--                <div class="input-group-addon"><i class="mdi mdi-account-star"></i></div>-->
                            <!--                <input type="text" name="user_id" disabled style="background-color:white;" value="{{@App\Project::find($showRequest->project_id)->first_name}} {{@App\Project::find($showRequest->project_id)->last_name}}"  class="form-control">-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            @endforeach
                            <br>
                            <br>
                            <hr>
                            <br>
                            <!--<div class="row">-->
                            <!--    <div class="col-md-6">-->
                            <!--        <div class="form-group">-->
                            <!--            <label class="control-label">مستشاري المشروع</label>-->
                            <!--            @foreach($consultantsOfProject as $consultant)-->
                            <!--                <div class="input-group mb5">-->
                            <!--                    <div class="input-group-addon"><i class="mdi mdi-account"></i></div>-->
                            <!--                    <input type="text" name="consultant" disabled style="background-color:white;" value="{{$consultant->consultantsProjectoPillar->first_name}} {{$consultant->consultantsProjectoPillar->last_name}}"  class="form-control">-->
                            <!--                </div>-->
                            <!--                <br>-->
                            <!--            @endforeach-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="col-md-6">-->
                            <!--        <div class="form-group">-->
                            <!--            <label class="control-label">أركان المشروع</label>-->
                            <!--            @foreach($pillarsOfProject as $pillar)-->
                            <!--                <div class="input-group mb5">-->
                            <!--                    <div class="input-group-addon"><i class="mdi mdi-pillar"></i></div>-->
                            <!--                    <input type="text" name="pillar_id" disabled style="background-color:white;" value="{{$pillar->pillarsByRequest_Pillar->name}}"  class="form-control">-->
                            <!--                </div>-->
                            <!--                <br>-->
                            <!--            @endforeach-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--@if(count($filesOfConsultants) > 0)-->
                            <!--<label class="control-label">الملفات المرفقة للمشروع من قبل المستشارين</label>-->
                            <!--<div class="row">-->
                            <!--    <div class="col-md-6" style="display:flex">-->
                            <!--        <br>-->
                            <!--        @foreach($filesOfConsultants as $d)-->
                            <!--            @if(pathinfo($d->files, PATHINFO_EXTENSION) == 'pptx' || pathinfo($d, PATHINFO_EXTENSION) == 'ppt')-->
                            <!--                <div class="text-center imagesCentered"><img src="{{asset('assets/images/pptxForPreview.jpg')}}" style="padding:10px" width="400px" height="200px"></div>-->
                            <!--            @elseif(pathinfo($d->files, PATHINFO_EXTENSION) == 'docx' || pathinfo($d, PATHINFO_EXTENSION) == 'doc')-->
                            <!--                <div class="text-center imagesCentered"><img src="{{asset('assets/images/wordForPreview.jpg')}}" style="padding:10px" width="400px" height="200px"></div>-->
                            <!--            @elseif(pathinfo($d->files, PATHINFO_EXTENSION) == 'pdf')-->
                            <!--                <div class="text-center imagesCentered"><img src="{{asset('assets/images/pdfIconMessage.png')}}" style="padding:10px" width="400px" height="200px"></div>-->
                            <!--            @else-->
                            <!--                <div class="text-center imagesCentered"><img src="{{asset('uploads/' . $d->files)}}" style="padding:10px" width="400px" height="200px"></div>-->
                            <!--            @endif-->
                            <!--          <br>-->
                            <!--        @endforeach-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--@else-->
                            
                            <!--@endif-->
                            <br>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach($standardsPillarsUsed as $getRequirementArray)
                                    <div style="border:1px solid #f3f1f1;">
                                        <h4 style="color:#727677;position:relative;right:20px;padding:10px">الركن: {{$getRequirementArray->name}}</h4>
                                        
                                    </div>
                                    <hr>
                                    <table class="table table-bordered table-project-manager4">
                                        <thead>
                                            <tr>
                                              <th width="20%">المعيار</th>
                                              <th width="30%">المتطلب</th>
                                              <th width="10%">التكرار السنوي</th>
                                              <th width="10%">القيمة المستهدفة</th>
                                              <th width="10%">نتيجة التدقيق</th>
                                              <th width="50%">التوافق</th>
                                            </tr>
                                        </thead>
                                      <tbody>
                                          @foreach($getRequirementArray->ProjectResultsWithItsPillar as $getRequirement)
                                            <tr>
                                                <td>{{$getRequirement->standard}}</td>
                                                <td>{{$getRequirement->requirement}}</td>
                                                <td>{{$getRequirement->annual_frequency}}</td>
                                                @if($getRequirement->target_value_type == 1)
                                                <td>%{{$getRequirement->target_value}}</td>
                                                <td>%{{$getRequirement->audit_result}}</td>
                                                @if($getRequirement->likes == 0)
                                                <td class="inResponsive">
                                                    <i class="fa fa-check-circle fa-2x img1-project-manager4" style="color: #1BA590;"></i>
                                                    <p class="PInproj1detect">مطابق</p>
                                                    <p class="p1detect">حجم الفجوة :{{$getRequirement->gap_size == 'null' ? 'لا يوجد' : $getRequirement->gap_size}}%</p>
                                                </td>
                                                @else
                                                <td class="inResponsive">
                                                    <i class="fa fa-times-circle fa-2x img1-project-manager4" style="color: #e1215d;"></i>
                                                    <p class="PInproj1detect">غير مطابق</p>
                                                    <p class="p1detect">حجم الفجوة :{{$getRequirement->gap_size == 'null' ? 'لا يوجد' : $getRequirement->gap_size}}%</p>
                                                </td>
                                                @endif
                                                @else
                                                <td>{{$getRequirement->target_value}}</td>
                                                <td>{{$getRequirement->audit_result}}</td>
                                                @if($getRequirement->likes == 0)
                                                <td class="inResponsive">
                                                    <i class="fa fa-check-circle fa-2x img1-project-manager4" style="color: #1BA590;"></i>
                                                    <p class="PInproj1detect">مطابق</p>
                                                    <p class="p1detect">حجم الفجوة :{{$getRequirement->gap_size == 'null' ? 'لا يوجد' : $getRequirement->gap_size}}</p>
                                                </td>
                                                @else
                                                <td class="inResponsive">
                                                    <i class="fa fa-times-circle fa-2x img1-project-manager4" style="color: #e1215d;"></i>
                                                    <p class="PInproj1detect">غير مطابق</p>
                                                    <p class="p1detect">حجم الفجوة :{{$getRequirement->gap_size == 'null' ? 'لا يوجد' : $getRequirement->gap_size}}</p>
                                                </td>
                                                @endif
                                                @endif
                                            </tr>
                                          @endforeach
                                      </tbody>
                                    </table>
                                    @endforeach
                                </div>
                            </div>
                            </div>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button onclick="printDiv('printableArea')" style="background-color:#14222f" class="btn text-white" >طباعه النتيجة</button>
                                    <a style="cursor:pointer;color:white" onclick="acceptProjectForUser(this)" data-request-id="{{request()->id1}}" data-project-id="{{request()->id2}}" class="btn btn-success acceptProjectsUsers{{request()->id1}}">قبول المشروع</a>
                                    <a style="cursor:pointer;color:white" onclick="whenDeleteFile(this)" data-id-image1="{{request()->id1}}" data-id-image2="{{request()->id2}}" class="btn btn-danger">رفض المشروع</a>
                                </div>
                            </div>
                            
                    
                            
                </div>
                
                <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                
                            <div class="modal-body text-center" style="padding: 40px">
                                <h3 class="afterShow" style="font-family:dr;color:#808080;">هل تريد مراجعة هذا المشروع مرة آخري لمدير المشروع؟</h3>
                                
                            </div>
                
                
                        </div>
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
                
        </div>
    </div>
</div>
<!-- Row -->
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function(){
        $(window).on('load' , function(){
            var urls =window.location.href;
            var dataID = (urls.match(/(\d+)/g) || []);
            var request_id = dataID[0];
            var projectos_id = dataID[1];
            // console.log(request_id);
            // console.log(projectos_id);
            
            $.ajax({
                url:'/admin/CheckIfCertificateExist/' + request_id,
                method:'GET',
                success:function(response){
                    if(response == 0){
                        $('.acceptProjectsUsers'+request_id).css({'pointer-events': 'none' , 'cursor': 'default'});
                        $('.acceptProjectsUsers'+request_id).text('تم قبول المشروع');
                    }else{
                        $('.acceptProjectsUsers'+request_id).css({'pointer-events': 'auto' , 'cursor': 'pointer'});
                        $('.acceptProjectsUsers'+request_id).text('قبول المشروع');
                    }
                }
            });
            
        });
        $(document).on('click' , 'body' , function(){
            $('#variableModal2').hide();
        });
    });
    function whenDeleteFile(e){
        $('#dataOfDelation').empty();
        var request_id = e.getAttribute('data-id-image1');
        var projectos_id = e.getAttribute('data-id-image2');
        $('#uploadingModal').show();
        $('<div id="dataOfDelation"><br><a onclick="closeWindow()" href="/admin/reviewProject/'+request_id+'/'+projectos_id+'" class="btn btn-danger">نعم</a> &nbsp;&nbsp; <a class="btn btn-success text-white" onclick="closeWindow()">لا</a></div>').insertAfter(".afterShow");
        // $('#uploadingModal').hide();
    }
    
    function closeWindow(){
        $('#uploadingModal').hide();
    }
    
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    
    function acceptProjectForUser(e){
        var request_id = e.getAttribute('data-request-id');
        var projectos_id = e.getAttribute('data-project-id');
        
        $('.acceptProjectsUsers'+request_id).css({'pointer-events': 'none' , 'cursor': 'default'});
        $('.acceptProjectsUsers'+request_id).text('تم قبول المشروع');
        
        $.ajax({
            url:'/admin/acceptProjectToUser/'+request_id+'/'+projectos_id,
            method:'GET',
            success:function(response){
                if(response == 1){
                    $('#modal_message2').text('تم إرسال النتيجة للمستخدم بنجاح').css('font-family' , 'dr');
                    $('.modal-header2').empty().html('<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>');
                    $('#variableModal2').fadeIn(450).show();
                    setTimeout(function (){
                        $('#variableModal2').fadeOut("slow").hide();
                        location.href="https://nmthgah.com/admin/finishedProjects";
                        },4000);
                }else{
                    console.log('error from server');
                }
            },
        });
    }
    
</script>
@endsection