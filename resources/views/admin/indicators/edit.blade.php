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
                    <form method="POST" action="{{ url('admin/updateIndicator/' . $indicators->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> العنوان </label>
                                    <div class="input-group mb5">
                                        <input type="text" name="title" value="{{$indicators->title}}" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> الوصف </label>
                                    <div class="input-group mb5">
                                        <textarea class="form-control" name="desc">{{$indicators->desc}}</textarea>
                                    </div>
                                </div>
                            </div><!-- col12 -->
                                
                            </div><!-- col6 -->
                            <div class="col-md-6">
                                <div class="col-12">
                                    <input type="file" name="image" class="dropify" @if(@$indicators->image != '') data-default-file="{{url('uploads')}}/{{@$indicators->image}}" @endif/>
                                </div><!-- col12 -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"> عنوان الموقع </label>
                                        <div class="input-group mb5">
                                            <input type="text" name="url" value="{{$indicators->url}}" class="form-control" placeholder="https://nmthgah.com/">
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