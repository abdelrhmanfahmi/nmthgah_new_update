@extends('admin.index')
@section('main')
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
            <form method="POST" action="{{ url('admin/updateContact/' . $contacts->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">لينكدإن</label>
                                    <div class="input-group mb5">
                                        <input type="text" name="linkedin" value="{{$contacts->linkedin}}" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->
                        </div><!-- col6 -->
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">إنستجرام</label>
                                    <div class="input-group mb5">
                                        <input type="text" name="instagram" value="{{$contacts->instagram}}" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->
                        </div><!-- col6 -->
                    </div><!-- row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> تويتر </label>
                                    <div class="input-group mb5">
                                        <input type="text" name="twitter" value="{{$contacts->twitter}}" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->
                        </div>
                    </div>
                    <!-- end form body -->
                </div>

                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> ارسال </button>
            </form>
        </div>
    </div>
</div>
<!-- Row -->
</div>
@endsection