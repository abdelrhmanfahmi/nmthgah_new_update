@extends('admin.index')
@section('main')
<!-- Row -->
<style>
    .ck-file-dialog-button {
        display: none;
    }
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
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"></h4>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            <div class="card-block">
                <form method="POST" action="{{ url('admin/updateReq_Stand_Pillars/' . $req_standard_pillars->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">اسم متطلب معيار الركن</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-note"></i></div>
                                            <textarea class="form-control" name="name" rows="4" cols="50">{{$req_standard_pillars->name}}</textarea>
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">معيار الركن التابع له</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-pillar"></i></div>
                                            <select name="standard_pillar_id" id="standard_pillar_id" class="form-control">
                                                @foreach($standard_pillars as $stand)
                                                    <option value="{{$stand->id}}" {{old('standard_pillar_id',$stand->id) == $req_standard_pillars->standard_pillar_id ? 'selected' : ''}}>{{$stand->standard_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">مؤشر القياس</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-note-outline"></i></div>
                                            <textarea class="form-control" name="measure_cursor" rows="4" cols="50">{{$req_standard_pillars->measure_cursor}}</textarea>
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">تفسير المتطلب</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-book-open"></i></div>
                                            <textarea class="form-control" name="explain" rows="4" cols="50">{{$req_standard_pillars->explain}}</textarea>
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">طريقة تقدير المؤشر</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-book"></i></div>
                                            <textarea class="form-control" rows="4" name="indicator_estimation_method" cols="50">{{$req_standard_pillars->indicator_estimation_method}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">نماذج مساندة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-note"></i></div>
                                            <textarea class="form-control" rows="4" name="models" cols="50">{{$req_standard_pillars->models}}</textarea>
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                            </div>
                        </div><!-- row -->
                        <!--************-->

                    </div>
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> حفظ </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        var optionSelectedForTargetType = document.getElementById('target_value_type').getAttribute('data-id1');-->
<!--        console.log(optionSelectedForTargetType);-->
<!--        var optionSelectedForAuditType = document.getElementById('audit_result_type').getAttribute('data-id2');-->
<!--        console.log(optionSelectedForAuditType);-->
        
<!--        $('#target_value_type').change(function(){-->
<!--        var optionSelected = $(this).children("option:selected").val();-->
<!--        if(optionSelected == 1 || optionSelected == 2){-->
<!--            $('#target_value1').css('display' , 'none');-->
<!--            $('#target_value1').attr('name' , '');-->
<!--            $('#target_value2').css('display' , 'block');-->
<!--            $('#target_value2').attr('name' , 'target_value');-->
<!--        }else{-->
<!--            $('#target_value1').css('display' , 'block');-->
<!--            $('#target_value1').attr('name' , 'target_value');-->
<!--            $('#target_value2').css('display' , 'none');-->
<!--            $('#target_value2').attr('name' , '');-->
<!--        }-->
<!--        if(optionSelected == 1){-->
<!--            document.getElementById('target_value2').value = "{{$req_standard_pillars->target_value}}"*100;-->
<!--        }-->
<!--        });-->
        
<!--        /*****/-->
<!--        $('#audit_result_type').change(function(){-->
<!--        var optionSelectedAudit = $(this).children("option:selected").val();-->
<!--        if(optionSelectedAudit == 1 || optionSelectedAudit == 2){-->
<!--            $('#audit_result1').css('display' , 'none');-->
<!--            $('#audit_result1').attr('name' , '');-->
<!--            $('#audit_result2').css('display' , 'block');-->
<!--            $('#audit_result2').attr('name' , 'audit_result');-->
<!--        }else{-->
<!--            $('#audit_result1').css('display' , 'block');-->
<!--            $('#audit_result1').attr('name' , 'audit_result');-->
<!--            $('#audit_result2').css('display' , 'none');-->
<!--            $('#audit_result2').attr('name' , '');-->
<!--        }-->
<!--        if(optionSelectedAudit == 1){-->
<!--            document.getElementById('audit_result2').value = "{{$req_standard_pillars->audit_result}}"*100;-->
<!--        }-->
<!--        });-->
<!--        $('#audit_result1').on('change' , function(e){-->
<!--           console.log(e.target.value); -->
<!--        });-->
<!--    });-->
<!--</script>-->
@endsection