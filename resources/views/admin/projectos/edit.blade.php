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
    }
    .selectBox2{
        position: relative;
        float: left;
        top: -30px;
        height: 40px;
        right: -120px;
        border-radius: 10px;
        background: #fff;
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
                
                 <form method="POST" action="{{ url('admin/updateProjectos/' . $projectos->id) }}" enctype="multipart/form-data">
                   @method('PUT')
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
                                                
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}" {{old('user_id',$user->id) == $projectos->user_id ? 'selected' : ''}}>{{$user->first_name}}</option>
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
                                        <select name="project_id" id="project_id" class="form-control">
                                            
                                            @foreach($projects as $project)
                                                <option value="{{$project->id}}" {{old('project_id',$project->id) == $projectos->project_id ? 'selected' : ''}}>{{$project->first_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">المشروع</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                        <select name="request_id" id="request_id" class="form-control">
                                            
                                            @foreach($requests as $request)
                                                <option value="{{$request->id}}" {{old('request_id',$request->id) == $projectos->request_id ? 'selected' : ''}}>{{$request->waqf_name}}</option>
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
                                        @foreach($pillars as $pillar)
                                            <input type="checkbox" id="unChecked" class="pillar_id pillarsID{{$pillar->id}}" data-name="{{$pillar->name}}" name="pillar_id[]" value="{{$pillar->id}}" /> <span style="position:relative;right:-40px;top:2px;">{{$pillar->name}}</span>
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
                    </div>
                    
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> حفظ </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
var pillarID = "";
var pillarName = "";
var idStandard = "";

var projectID = "";
var arrFahmy=[];
var idStandard2 = "";

    $(document).ready(function(){
        var pillarID2 = "";
        var pillarName2 = "";
        
        $(window).on('load' , function(){
            var urls = window.location.href;
            var dataID = (urls.match(/(\d+)/g) || []);
            projectID = dataID[0];
            
            $.ajax({
                url:'/admin/getStandardsIdd/'+projectID,
                method:'GET',
                success:function(data66){
                    for(var i = 0 ; i < data66.length ; i++){
                        arrFahmy.push(data66[i].standard_id);
                    }
                }
            });
            
            $.ajax({
                url:'/admin/getPillarSelected/'+projectID,
                method:'GET',
                success:function(data88){
                    for(var i = 0 ; i < data88.length ; i++){
                        pillarID2 = data88[i].pillar_id;
                        pillarName2 = $('.pillarsID'+data88[i].pillar_id).attr('data-name');
                        $('.pillarsID'+pillarID2).attr('checked' , 'checked');
                        $('.standardHere').css('border' , '2px solid goldenrod');
                        $('.standardHere').append(`
                            <div class="card-header pushHere cards`+data88[i].pillar_id+`" data-id-forSlider="`+pillarID2+`" id="pushHere" style="color:white;cursor:pointer;" onclick="sliderDown(this)">
                                معايير `+pillarName2+`
                                <select style="position:relative;right:420px;width:265px;color:#727677" class="form-control consultant_id" name="consultant_id[]" id="consultant_id" >
                                        <option value="`+data88[i].consultants_projecto_pillar.id+`">`+data88[i].consultants_projecto_pillar.first_name+`</option>
                                </select>
    
                            </div>
                        `);
                        var xhr = $.ajax({
                          url:'/admin/getRequirementsPillar/'+data88[i].pillar_id,
                          method:'GET',
                          success:function(data99){
                                for(var i = 0 ; i < data99[0].length ; i++){
                                    consulId = data99[0][i].id;
                                    if(data99[0][i].pillar_standard__pillar != ""){
                                        
                                        $.each(data99[0][i].pillar_standard__pillar , function(key , value){
                                            $(`<div class="standard_id`+data99[0][i].id+` fahmico" id="`+data99[0][i].id+`" style="margin-top:10px;">
                                                <li style=""><input type="checkbox" class="standard_id standardsIDs`+data99[0][i].pillar_standard__pillar[key].id+`" value="`+data99[0][i].pillar_standard__pillar[key].id+`" /><span style="position:relative;right:25px;">`+data99[0][i].pillar_standard__pillar[key].standard_name+` </span></li>
                                                <div class="card">
                                                  <ul style="list-style:none;" class="requirements`+data99[0][i].pillar_standard__pillar[key].id+`">
                    
                                                  </ul>
                                                </div>
                                            </div>
                                            `).insertAfter('.cards'+data99[0][i].id);
                                        });
                                        
                        		    }else{
                        		        $('.standardHere').append(`
                        		            <li>لا توجد معايير أركان</li>
                        		        `);
                        		    }
                                }
                                var appendText33 = [];
                                  for(var j=0 ; j<data99[1].length ; j++){
                                      appendText33.push('<option value="'+data99[1][j].id+'">'+data99[1][j].first_name+'</option>');
                                  }
                                  appendText33.join(" ");
                                  $('#consultant_id'+consulId).append(appendText33);
                                  
                              },
                        });
                    }
                },
            });
            
            setTimeout(function(){
                for(var e = 0 ; e < arrFahmy.length ; e++){
                    idStandard2 = arrFahmy[e];
                    console.log(idStandard2);
                    $.ajax({
                        url:'/admin/getStandardsOnly/'+projectID+'/'+idStandard2,
                        method:'GET',
                        success:function(data77){
                            for(var i = 0 ; i < data77.length ; i++){
                                // console.log(data77[i]);
                                $('.standardsIDs'+data77[i].standard_id).attr('checked' , 'checked');
                                var newKey = Date.now();
                                var data1 = "";
                                var d1 = "";
                                
                                if(data77[i].target_value_type == 0){
                                    data1 = "<option selected value='0'>نعم أو لا</option><option value='1'>نسبة مئوية</option><option value='2'>رقم صحيح</option>";
                                    d1 = "<option value='0'>نعم أو لا</option>";
                                }else if(data77[i].target_value_type == 1){
                                    data1 = "<option value='0'>نعم أو لا</option><option selected value='1'>نسبة مئوية</option><option value='2'>رقم صحيح</option>";
                                    d1 = "<option value='1'>نسبة مئوية</option>";
                                }else{
                                    data1 = "<option value='0'>نعم أو لا</option><option value='1'>نسبة مئوية</option><option selected value='2'>رقم صحيح</option>";
                                    d1 = "<option value='2'>رقم صحيح</option>";
                                }
                                
                                $('.requirements'+data77[i].standard_id).append(`
                                    <br>
                                        <li><input type='hidden' id='conulId`+data77[i].requirement_id+`' name='requirmentsType[`+newKey+`][consultant_id]' value='`+data77[i].consultant_id+`' />
                                        <li><input type='hidden' id='standardIDs`+data77[i].requirement_id+`' name='requirmentsType[`+newKey+`][standard_id]' value='`+data77[i].standard_id+`' />
                                        <li><input type='checkbox' onchange='ifChangedReq(event)' checked id='requirement_id`+data77[i].requirement_id+`' class='requirement_id' name='requirmentsType[`+newKey+`][requirement_id]' value='`+data77[i].requirement_id+`' ><span style="position:relative;right:15px;">`+data77[i].requirements_by_projecto_types.name+`</span><li>
                                        <select name='requirmentsType[`+newKey+`][audit_result_type]' style='width:90px' class='selectBox1' id='audit_result_type`+data77[i].requirement_id+`'>
                                            `+d1+`
                                        </select>
                                        
                                        <select name='requirmentsType[`+newKey+`][target_value_type]' style='width:90px' class='selectBox2' data-ids=`+data77[i].requirement_id+` id='target_value_type`+data77[i].requirement_id+`' onchange="whenUserChangedSelect(event)">
                                            `+data1+`
                                        </select>
                                    <br>
                                `);
                            }
                        },
                    });
                }
            },2000);
            
        });
        
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
              
              $('#consultant_id'+pillarID).on('change' , function(){
                 $('.standard_id').prop('disabled' , false);
              });
              
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
                                        
                                        <select name='requirmentsType[`+newKey+`][target_value_type]' class='selectBox2' data-ids=`+data2[i].standard_pillar__requirement__standard__pillar[key].id+` id='target_value_type`+data2[i].standard_pillar__requirement__standard__pillar[key].id+`' onchange="whenUserChangedSelect(event)">
                                            <option disabled selected >نوع القيمة المستهدفة</option>
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
@endsection