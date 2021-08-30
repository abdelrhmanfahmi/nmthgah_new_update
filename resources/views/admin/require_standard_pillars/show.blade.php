@extends('admin.index')
@section('main')
<!-- Row -->
<style>
    .ck-file-dialog-button {
        display: none;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"></h4>
            </div>
            <div class="card-block">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">اسم متطلب معيار الركن</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-note"></i></div>
                                            <textarea class="form-control" name="name" rows="4" cols="50" disabled style="background-color:white;">{{$req_standard_pillars->name}}</textarea>
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">معيار الركن التابع له</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-pillar"></i></div>
                                            <input type="text" disabled style="background-color:white;" value="{{$req_standard_pillars->requirement_standard_pillar_Standard_Pillar->standard_name}}" class="form-control" />
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
                                            <textarea class="form-control" name="measure_cursor" rows="4" cols="50" disabled style="background-color:white;">{{$req_standard_pillars->measure_cursor}}</textarea>
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">تفسير المتطلب</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-book-open"></i></div>
                                            <textarea class="form-control" name="explain" rows="4" cols="50" disabled style="background-color:white;">{{$req_standard_pillars->explain}}</textarea>
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
                                            <textarea class="form-control" rows="4" name="indicator_estimation_method" cols="50" disabled style="background-color:white;">{{$req_standard_pillars->indicator_estimation_method}}</textarea>
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
                                            <textarea class="form-control" rows="4" name="models" cols="50" disabled style="background-color:white;">{{$req_standard_pillars->models}}</textarea>
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                            </div>
                        </div><!-- row -->
            </div>
        </div>
    </div>
</div>
<!-- Row -->
@endsection