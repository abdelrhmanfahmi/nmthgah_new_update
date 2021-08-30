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
                <form method="POST" action="{{route('admin.store')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"> اسم المدير </label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"> البريد الإلكترونى </label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-email"></i></div>
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                
                            </div><!-- col6 -->
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"> كلمة المرور </label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-key"></i></div>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">الهاتف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-phone"></i></div>
                                            <input type="number" name="phone" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                               
                            </div>
                        </div><!-- row -->
                    </div>
                    
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> حفظ </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
@endsection