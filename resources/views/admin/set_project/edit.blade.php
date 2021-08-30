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
                <form method="POST" action="{{ url('admin/updateProject_Maker/' . $proj->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">عنوان المشروع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="project_address" value="{{$proj->project_address}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">وصف المشروع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="description" value="{{$proj->description}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                            </div><!-- col6 -->
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">نتيجة المشروع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-email"></i></div>
                                            <input type="text" name="project_result" value="{{$proj->project_result}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">مدير النظام التابع للمشروع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-key"></i></div>
                                            <select id="admin_id" name="admin_id" style="width: 500px;" class="form-control">
                                                @foreach($admins as $admin)
                                                <option value="{{$admin->id}}">{{$admin->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                            </div>
                        </div><!-- row -->
                        <!--************-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">المدير التابع للمشروع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <select id="project_manager_id" name="project_manager_id" style="width: 500px;" class="form-control">
                                                @foreach($project_managers as $project_manager)
                                                <option value="{{$project_manager->id}}">{{$project_manager->first_name}} {{$project_manager->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">المستخدم التابع للمشروع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-user-circle"></i></div>
                                            <select id="user_id" name="user_id" style="width: 500px;" class="form-control">
                                                @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col6 -->
                            <div class="col-md-6">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">المستشار التابع للمشروع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-user-circle"></i></div>
                                            <select id="consultant_id" name="consultant_id" style="width: 500px;" class="form-control">
                                                @foreach($consultants as $consultant)
                                                <option value="{{$consultant->id}}">{{$consultant->first_name}} {{$consultant->last_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div style="float:left;margin-top:40px;">
                                    <label>الركن التابع للمشروع</label>
                                    @foreach($pillars as $pillar)
                                    <input type="checkbox" name="pillar_id[]" value="{{$pillar->id}}" id="pillar">{{$pillar->name}}</input>
                                    @endforeach
                                </div>
                            </div><!-- col6 -->

                            <div class="col-md-6">
                                <div>
                                    <label>معيار الركن التابع للمشروع</label>
                                    <div class="standard_pillar_ajax"></div>
                                </div>
                                <div>
                                    <label>متطلب معيار الركن التابع للمشروع</label>
                                    <div class="requirement_standard_ajax"></div>
                                </div>
                            </div><!-- col6 -->
                        </div>

                    </div>
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> حفظ </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function() {
var id1;
var id2;

/********* */
$('input[name="pillar_id[]"]').click(function(e) {
if ($(this).prop("checked") == true) {
id1 = e.target.value;
console.log(id1);
$.ajax({
type: "GET",
url: "{{ url('admin/pillarsStandard/') }}/" + id1,
success: function(data) {
// $('#standard_pillar_ajax').empty();
if (data) {
$.each(data, function(key, value) {
    $('.standard_pillar_ajax').append(`
<input type="checkbox"  name="standard_pillar_id[]" value="` + data[key].id + `" id="` + data[key].id + `" >` + data[key].name + `</input>
`);
$('input[id="'+data[key].id+'"]').click(function(e) {
if ($(this).prop("checked") == true) {
id2 = $(this).val();
console.log(id2);
$.ajax({
type: "GET",
url: "{{ url('admin/StandardRequirements/') }}/" + id2,
success: function(datas) {
// $('#standard_pillar_ajax').empty();
if (datas) {
$.each(datas, function(key, value) {
$('.requirement_standard_ajax').append(`
<input type="checkbox"  name="requirement_standard_pillar_id[]" value="` + datas[key].id + `" id="` + datas[key].id + `" >` + datas[key].name + `</input>
`);
});
}
},
});
} else {
$('#requirement_standard_ajax').empty();
}
});
});
}

},
});
} else {
$('#standard_pillar_ajax').empty();
}

});
/************ */
});
</script>
@endsection