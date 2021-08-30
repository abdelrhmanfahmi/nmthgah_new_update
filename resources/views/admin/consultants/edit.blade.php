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

                <form method="POST" action="{{ url('admin/updateConsultants/' . $consultants->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">الاسم الاول</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="first_name" value="{{$consultants->first_name}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">الاسم الثاني</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="last_name" value="{{$consultants->last_name}}" class="form-control">
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
                                            <input type="text" name="email" value="{{$consultants->email}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"> كلمة المرور </label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-key"></i></div>
                                            <input type="password" name="password" class="form-control">
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
                                        <label class="control-label">الهاتف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input type="text" name="phone" value="{{$consultants->phone}}" id="phone" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">القسم</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <select name="departement" id="departement" class="form-control">
                                                @foreach($pillars as $pillar)
                                                    <option value="{{$pillar->id}}" {{old('departement',$pillar->id) == $consultants->departement ? 'selected' : ''}}>{{$pillar->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                            </div><!-- col6 -->
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">الدولة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-flag"></i></div>
                                            <input type="text" name="country" value="{{$consultants->country}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">المدينة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-city"></i></div>
                                            <input type="text" name="city" value="{{$consultants->city}}" class="form-control">
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
<script>
    $(document).ready(function(){
       try{
        var phonesRequests = document.getElementById('phone');
        phonesRequests.addEventListener('input' , function(e){
            var tel2 = e.target.value;
           if(tel2.length != 0){
               $(this).css('direction' , 'ltr');
           }else{
               $(this).css('direction' , 'rtl');
           }
        });
    }catch(e){
        
    } 
    });
</script>
@endsection