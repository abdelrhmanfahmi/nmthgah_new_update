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
                <form method="POST" action="{{ url('admin/updateInbox/' . $inboxMsgs->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">الرسالة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                            <input type="text" name="message" value="{{$inboxMsgs->message}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">المستندات</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-file-powerpoint"></i></div>
                                            <input type="file" name="files[]" multiple class="dropify">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                                
                            </div><!-- col6 -->
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">مستخدم النظام</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-phone"></i></div>
                                            <select id="user_id" name="user_id" style="width: 500px;" class="form-control">
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->first_name}}</option>
                                                @endforeach
                                            </select>
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