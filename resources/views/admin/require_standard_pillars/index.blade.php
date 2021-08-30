@extends('admin.index')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"></h4>
            </div>
             <form method="GET" id="formsGet2">
                        <div class="row">
                        <div style="position:relative;right:60px;top:10px;" class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">الفلترة بواسطة الركن</label>
                                <div class="input-group mb5">
                                    <select name="pillar_id" class="form-control" id="pillar_idForms2"  style="width:100%">
                                        @foreach($pillars as $pillar)
                                            <option value="{{$pillar->id}}">{{$pillar->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div><!-- col4 -->
                        <div style="position:relative;right:80px;top:10px;" class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">الفلترة بواسطة معيار الركن</label>
                                <div class="input-group mb5">
                                    <select name="standard_pillar_id" class="form-control" id="standard_pillar_idForms2"  style="width:100%">
                                        <option value="" @if(request()->get('standard_pillar_id') == '') selected  @endif>الكل</option>
                                        @foreach($standards as $standard)
                                            <option value="{{$standard->id}}">{{$standard->standard_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div><!-- col4 -->
                    </div><!-- row -->
                </form>
            <div class="card-block">
                <h6 class="card-subtitle"></h6>
                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list  footable-loaded footable" data-page-size="10">
                        متطلبات معايير الأركان
                        <thead>
                            <tr>
                                <th>الرقم المسلسل</th>
                                <th width="30%">اسم المتطلب</th>
                                <th>معيار الركن التابع له</th>
                                <th>اعدادات</th>
                            </tr>
                        </thead>
                        <tbody id="datasHere2">
                            
                        </tbody>
                    </table>
                </div>
                <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
            
                        <div class="modal-body text-center" style="padding: 40px">
                            <h3 class="afterShow" style="font-family:dr;color:#808080;">هل تريد حذف هذا المتطلب؟</h3>
                            
                        </div>
            
            
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
        var standard_pillar_id = "";
        
        $('#pillar_idForms2').on('change' , function(e){
            var pillar_id = e.target.value;
            $.ajax({
              method:'GET',
              url:'/admin/getStandardFromPillar/'+pillar_id,
              success:function(data){
                for(var i = 0 ; i < data.length ; i++){
                    for(var j = 0 ; j < data[i].length ; j++){
                        $('#standard_pillar_idForms2').append(`
                            <option value=`+data[i][j].id+`>`+data[i][j].standard_name+`</option>
                        `);
                    }
                }
              },
           });
           $('#standard_pillar_idForms2').empty();
        });
        
        $('#standard_pillar_idForms2').on('change' , function(e){
            standard_pillar_id = e.target.value;
        });
        $(window).on('load' , function(){
            $.get('getRequirementFromStandard'  , {standard_pillar_id:standard_pillar_id} , function(response , status){
                console.log(response.data);
                $('#datasHere2').empty();
    		    if(response.data != ""){
                    $.each(response.data , function(key , value){
                        $('#datasHere2').append(`
                            <tr align="center">
                                <td>`+(key+1)+`</td>
                                <td>`+response.data[key].name+`</td>
                                <td>`+response.data[key].Standard_name+`</td>
                                <td>
                                    <a href="showReq_Stand_Pillars/`+response.data[key].id+`" class="btn btn-primary">التفاصيل</a>
                                    <a href="editReq_Stand_Pillars/`+response.data[key].id+`" class="btn btn-success">تعديل</a>
                                    <a style="cursor:pointer;" onclick="whenDeleteFile(this)" data-id-image="`+response.data[key].id+`" class="btn btn-danger text-white">حذف</a>
                                </td>
                            </tr>
                        `);
                    });
                    
    		    }else{
    		        $('#datasHere2').append(`
    		            <tr><td colspan="6" class="text-center">لا توجد بيانات</td></tr>
    		        `);
    		    }
            });
        });
        $('#formsGet2').on('change' , function(e){
            $.get('getRequirementFromStandard'  , {standard_pillar_id:standard_pillar_id} , function(response , status){
                console.log(response.data);
                $('#datasHere2').empty();
    		    if(response.data != ""){
                    $.each(response.data , function(key , value){
                        $('#datasHere2').append(`
                            <tr align="center">
                                <td>`+(key+1)+`</td>
                                <td>`+response.data[key].name+`</td>
                                <td>`+response.data[key].Standard_name+`</td>
                                <td>
                                    <a href="showReq_Stand_Pillars/`+response.data[key].id+`" class="btn btn-primary">التفاصيل</a>
                                    <a href="editReq_Stand_Pillars/`+response.data[key].id+`" class="btn btn-success">تعديل</a>
                                    <a style="cursor:pointer;" onclick="whenDeleteFile(this)" data-id-image="`+response.data[key].id+`" class="btn btn-danger text-white">حذف</a>
                                </td>
                            </tr>
                        `);
                    });
                    
    		    }else{
    		        $('#datasHere2').append(`
    		            <tr><td colspan="6" class="text-center">لا توجد بيانات</td></tr>
    		        `);
    		    }
            });
        });
    });
    function whenDeleteFile(e){
        $('#dataOfDelation').empty();
        var idOfFile = e.getAttribute('data-id-image');
        $('#uploadingModal').show();
        $('<div id="dataOfDelation"><br><a onclick="closeWindow()" href="/admin/deleteReq_Stand_Pillars/'+idOfFile+'" class="btn btn-danger">نعم</a> &nbsp;&nbsp; <a class="btn btn-success text-white" onclick="closeWindow()">لا</a></div>').insertAfter(".afterShow");
        // $('#uploadingModal').hide();
    }
    
    function closeWindow(){
        $('#uploadingModal').hide();
    }
</script>

@endsection