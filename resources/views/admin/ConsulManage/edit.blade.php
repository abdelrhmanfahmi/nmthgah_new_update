@extends('admin.index')
@section('main')
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
</style>
<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"></h4>
            </div>
            <div class="card-block">

                <form method="POST" action="{{ url('admin/updateConsulManage/' . $consulManag->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">الاسم</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="name" value="{{$consulManag->name}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">اسم الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                            <input type="text" name="waqf" value="{{$consulManag->waqf}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                            </div><!-- col6 -->
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">البريد الإلكتروني</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-email"></i></div>
                                            <input type="email" name="email" value="{{$consulManag->email}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">المدينة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-city"></i></div>
                                            <input type="city" name="city" value="{{$consulManag->city}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                            </div>
                        </div><!-- row -->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">نوع خدمة الاستشارة الإدارية</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-comment"></i></div>
                                            <select name="type" id= "type" class="form-control">
                                                <option disabled selected>-- اختر نوع الاستشارة --</option>
                                                @foreach($typesOfConul as $type)
                                                    <option @if(@$consulManag->type == $type->id) selected  @endif value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">وصف الاستشارة الإدراية للوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-pen"></i></div>
                                            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$consulManag->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
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
    $(document).ready(function(){
       
    });
</script>
@endsection