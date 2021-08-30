@extends('admin.index') 
@section('main')
<!-- Row -->
<style>
    .selectBox1{
        position:relative;
        float:left;
        top:-30px;
        right:-100px;
        height: 40px;
        border-radius: 10px;
        background: #fff;
        /*color:#727677;*/
    }
    .selectBox2{
        position: relative;
        float: left;
        top: -30px;
        height: 40px;
        right: -120px;
        border-radius: 10px;
        background: #fff;
        /*color:#727677;*/
    }
    .consultant_id{
          -webkit-appearance: none;
          -moz-appearance: none;
          appearance: none;
    }
    .pillar_id
        {
          /* Double-sized Checkboxes */
          -ms-transform: scale(1); /* IE */
          -moz-transform: scale(1); /* FF */
          -webkit-transform: scale(1); /* Safari and Chrome */
          -o-transform: scale(1); /* Opera */
          transform: scale(1.6);
          padding: 10px;
          position:relative;
          top:10px;
          right:4px;
          width:140px;
        }
        .standard_id{
            /* Double-sized Checkboxes */
          -ms-transform: scale(1); /* IE */
          -moz-transform: scale(1); /* FF */
          -webkit-transform: scale(1); /* Safari and Chrome */
          -o-transform: scale(1); /* Opera */
          transform: scale(1.6);
          padding: 10px;
          position:relative;
          right:10px;
        }
        .requirement_id{
             /* Double-sized Checkboxes */
          -ms-transform: scale(1); /* IE */
          -moz-transform: scale(1); /* FF */
          -webkit-transform: scale(1); /* Safari and Chrome */
          -o-transform: scale(1); /* Opera */
          transform: scale(1.6);
          padding: 10px;
          position:relative;
          
        }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"></h4>
            </div>
            <div class="card-block">
                 
                 <form method="POST" action="{{route('projectos.store')}}" class="onSubmittedDataProject" enctype="multipart/form-data">
                   @csrf
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">المستخدمين</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-account"></i></div>
                                            <select name="user_id" id="user_id" class="form-control">
                                                
                                                @foreach($userFromRequest as $user)
                                                    <option value="{{$user->usersRequest->id}}">{{$user->usersRequest->first_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">مدير المشروع</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-account-star"></i></div>
                                        <select name="project_id" id="projectr_id" class="form-control">
                                            
                                            @foreach($projectManager as $project)
                                                <option value="{{$project->id}}">{{$project->first_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                           <!--here code of request_id-->
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">المشروع</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                        <select name="request_id" id="request_id" class="form-control">
                                            
                                            @foreach($requestToProject as $request)
                                                <option value="{{$request->id}}">{{$request->waqf_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                           <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">اختر اركان المشروع الخاصة بالمشروع</label>
                                    <div class="input-group mb5">
                                        @foreach($pillarsFromProject as $pillar)
                                            <input type="checkbox" id="unChecked" class="pillar_id" data-name="{{$pillar->name}}" name="pillar_id[]" value="{{$pillar->id}}" /> <span style="position:relative;right:-40px;top:2px;">{{$pillar->name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                                <div class="card col-md-12 putStandardHere">
                                  
                                  <ul style="list-style:none;width: 940px;position: relative;right: 2px;" class="list-group list-group-flush standardHere">
                                    
                                  </ul>
                                </div>
                            
                        </div>

                    </div><!--form-body-->
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> إنشاء </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
var pillarID = "";
var pillarName = "";
var idStandard = "";

    $(document).ready(function(){
       $('.pillar_id').on('change' , function(e){

               $('.standardHere').css('border' , '2px solid goldenrod');
           pillarID = e.target.value;
           pillarName = e.target.getAttribute('data-name');
        //   $('.standardHere').empty();

       var xhr = $.ajax({
          url:'/admin/getRequirementsPillar/'+pillarID,
          method:'GET',
          success:function(data){
            //   console.log(data[0]);
            //   var nameConsul="";
            //   var idConsul = "";

            for(var i = 0 ; i < data[0].length ; i++){
                if(data[0][i].pillar_standard__pillar != ""){
                    $('.standardHere').append(`
                        <div class="card-header pushHere cards`+pillarID+`" id="pushHere" style="color:white;cursor:pointer;">
                            <span data-id-forSlider="`+pillarID+`" onclick="sliderDown(this)">معايير `+pillarName+`</span>
                            <select style="position:relative;right:420px;width:265px;color:#727677" class="form-control consultant_id" data-pillars="`+pillarID+`" onchange="whenChangeConsultant(this)" name="consultant_id[]" id="consultant_id`+pillarID+`" >
                                   <option selected disabled>--- اختر مستشار اولا ---</option>

                            </select>

                        </div>
                    `);
                    $.each(data[0][i].pillar_standard__pillar , function(key , value){
                        $('.standardHere').append(`
                        <div class="standard_id`+pillarID+` fahmico" id="`+pillarID+`" style="margin-top:10px;">
                            <li style=""><input type="checkbox" disabled class="standard_id standard_fahmy`+pillarID+`" value="`+data[0][i].pillar_standard__pillar[key].id+`" /><span style="position:relative;right:25px;">`+data[0][i].pillar_standard__pillar[key].standard_name+` </span></li>
                            <div class="card">
                              <ul style="list-style:none;" class="requirements`+data[0][i].pillar_standard__pillar[key].id+`">

                              </ul>
                            </div>
                        </div>
                        `);
                    });
    		    }else{
    		        $('.standardHere').append(`
    		            <li>لا توجد معايير أركان</li>
    		        `);
    		    }
            }

            var appendText = [];
              for(var j=0 ; j<data[1].length ; j++){
                  appendText.push('<option value="'+data[1][j].id+'">'+data[1][j].first_name+'</option>');
              }
              appendText.join(" ");
              $('#consultant_id'+pillarID).append(appendText);
              
            //   $('#consultant_id'+pillarID).on('change' , function(){
            //      $('.standard_id').prop('disabled' , false);
            //   });
              
              },
            });

            // $('.standardHere').empty();

            if(this.checked){
                console.log('fahmy');

            }else{
                $('.standard_id' + pillarID).remove();
                $('.cards' + pillarID).remove();
                xhr.abort();
            }
            // if ($("div.standard_id"+pillarID+":has(li)").length == 0 || $(".pillar_id").prop('checked') == false) {
            //     $(".standardHere").css('border' , 'none');   // or remove()
            // }


           });
            
           $(document).on('change' , '.standard_id' , function(e){
                idStandard = e.target.value;
                if(this.checked){
                  //var consultant_id = $(this).parents().find(".pushHere").find('select[name="consultant_id"]').val();
                //   console.log($(this).parent().parent().attr('id'));
                  var cclass = $(this).parent().parent().attr('id');
                //   var cid = cclass.replace('standard_id','');
                  var consultant_id = $("#consultant_id"+cclass).val();
                console.log(consultant_id);
                    // $('.standard_id' + pillarID).css('height' , '158px');
                console.log(idStandard);
                $.ajax({
                    url:'/admin/getRequirementsStandardPillar/'+idStandard,
                    method:'GET',
                    success:function(data2){

                        for(var i = 0 ; i < data2.length ; i++){
                            console.log(data2[i].standard_pillar__requirement__standard__pillar);
                            if(data2[i].standard_pillar__requirement__standard__pillar != ""){
                                $.each(data2[i].standard_pillar__requirement__standard__pillar , function(key , value){
                                     var newKey = Date.now();
                                    $('.requirements'+idStandard).append(`
                                    <br>
                                        <li><input type='hidden' id='conulId`+data2[i].standard_pillar__requirement__standard__pillar[key].id+`' name='requirmentsType[`+newKey+`][consultant_id]' value='`+consultant_id+`' />
                                        <li><input type='hidden' id='standardIDs`+data2[i].standard_pillar__requirement__standard__pillar[key].id+`' name='requirmentsType[`+newKey+`][standard_id]' value='`+idStandard+`' />
                                        <li><input type='checkbox' onchange='ifChangedReq(event)' checked id='requirement_id`+data2[i].standard_pillar__requirement__standard__pillar[key].id+`' class='requirement_id' name='requirmentsType[`+newKey+`][requirement_id]' value='`+data2[i].standard_pillar__requirement__standard__pillar[key].id+`' ><span style="position:relative;right:15px;">`+data2[i].standard_pillar__requirement__standard__pillar[key].name+`</span><li>
                                        <select name='requirmentsType[`+newKey+`][audit_result_type]' class='selectBox1' id='audit_result_type`+data2[i].standard_pillar__requirement__standard__pillar[key].id+`'>
                                            <option disabled selected>نوع نتيجة التدقيق</option>
                                        </select>
                                        
                                        <select name='requirmentsType[`+newKey+`][target_value_type]' data-ids=`+data2[i].standard_pillar__requirement__standard__pillar[key].id+` class='selectBox2' id='target_value_type`+data2[i].standard_pillar__requirement__standard__pillar[key].id+`' onchange="whenUserChangedSelect(event)">
                                            <option disabled selected>نوع القيمة المستهدفة</option>
                                            <option value="0">نعم ام لا</option>
                                            <option value="1">نسبة مئوية</option>
                                            <option value="2">رقم صحيح</option>
                                        </select>

                                    <br>
                                    `);
                                });

                		    }else{
                		        $('.requirements' + idStandard).append(`
                		            <li>لا توجدمتطلبات معايير أركان</li>
                		        `);
                		    }
                        }

                    },
                });

                }else{
                    // $('.standard_id' + pillarID).css('height' , '198px');
                    $('.requirements' + idStandard).empty();
                }
        });

    });
    function ifChangedReq(e){
        var idOfPillarChecked = e.target.value;
        
        var ifChecked = e.target.getAttribute('checked');
        
        console.log(ifChecked);
        
        if(ifChecked == "" || ifChecked == "checked"){
            $('#requirement_id'+idOfPillarChecked).attr('checked' , false);
            $('#target_value_type'+idOfPillarChecked).attr('disabled' , true);
            $('#audit_result_type'+idOfPillarChecked).attr('disabled' , true);
            $('#conulId'+idOfPillarChecked).attr('disabled' , true);
            $('#standardIDs'+idOfPillarChecked).attr('disabled' , true);
        }else{
            console.log('notChecked');
            $('#requirement_id'+idOfPillarChecked).attr('checked' , true);
            $('#target_value_type'+idOfPillarChecked).attr('disabled' , false);
            $('#audit_result_type'+idOfPillarChecked).attr('disabled' , false);
            $('#conulId'+idOfPillarChecked).attr('disabled' , false);
            $('#standardIDs'+idOfPillarChecked).attr('disabled' , false);
        }
        
    }
    
    function whenUserChangedSelect(e){
        var optionSelected = e.target.value;
        var numberOfid = e.target.getAttribute('data-ids');
        console.log(numberOfid);
        if(optionSelected == 0){
            $('#audit_result_type'+numberOfid).css('width' , '90px');
            $('#target_value_type'+numberOfid).css('width' , '90px');
            $('#audit_result_type'+numberOfid).html("<option value='0'>نعم أم لا</option>");
        }else if(optionSelected == 1){
            $('#audit_result_type'+numberOfid).css('width' , '90px');
            $('#target_value_type'+numberOfid).css('width' , '90px');
            $('#audit_result_type'+numberOfid).html("<option value='1'>نسبة مئوية</option>");
        }else{
            $('#audit_result_type'+numberOfid).css('width' , '90px');
            $('#target_value_type'+numberOfid).css('width' , '90px');
            $('#audit_result_type'+numberOfid).html("<option value='2'>رقم صحيح</option>");
        }
    }
    
    function sliderDown(e){
        idOfPillarSlider = e.getAttribute('data-id-forSlider');
        $(".standard_id"+idOfPillarSlider).slideToggle();
    }
    
    function whenChangeConsultant(e){
        var pillarsIDs = e.getAttribute('data-pillars');
        $('.standard_fahmy'+pillarsIDs).prop('disabled' , false);
    }
</script>
<!-- Row -->
@endsection