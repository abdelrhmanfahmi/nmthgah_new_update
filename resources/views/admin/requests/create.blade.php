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
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"></h4>
            </div>
            <div class="card-block">
                
                 <form method="POST" action="{{route('requests.store')}}" enctype="multipart/form-data">
                   @csrf
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                            <input type="text" name="waqf_name" class="form-control" />
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم صاحب الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-account"></i></div>
                                            <input type="text" name="waqf_ownerName" class="form-control">
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
                                            <input type="text" name="waqf_charger"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">المدينة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-city"></i></div>
                                            <input type="text" name="city"  class="form-control">
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
                                            <input type="text" name="street"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">الجوال</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-phone"></i></div>
                                            <input type="text" name="phone"  class="form-control">
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
                                        <textarea name="desc" style="height:200px" class="form-control" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        <label class="control-label">الملفات المرفقة للمشروع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-folder"></i></div>
                                            <input type="file" accept="image/jpg,image/jpeg,image/png,.doc, .docx,.ppt, .pptx,.pdf" name="files[]" multiple class="dropify">
                                        </div>
                                 </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">المستخدمين</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-account"></i></div>
                                            <select name="user_id" id="user_id" class="form-control">
                                                <option>بدون</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->first_name}}</option>
                                                @endforeach
                                            </select>
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
@endsection