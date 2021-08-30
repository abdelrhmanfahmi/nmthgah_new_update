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
                <form method="POST" action="{{ url('admin/updateMessage/' . $messages->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="control-label">الاسم الثلاثي</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="name" value="{{$messages->name}}" class="form-control">
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="control-label">الايميل</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="email" value="{{$messages->email}}" class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="control-label">رقم الجوال</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="phone" value="{{$messages->phone}}" class="form-control">
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="control-label">نوع الخدمة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="service" value="{{$messages->service}}" class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="control-label">الجهة التابعة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="affiliate" value="{{$messages->affiliate}}" class="form-control">
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                        <label class="control-label">الرسالة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <textarea name="message" cols="70" rows="8">{{$messages->message}}</textarea>
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