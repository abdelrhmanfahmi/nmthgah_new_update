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
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ url('admin/updateSetting/' . $settings->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> لوجو الصورة </label>
                                    <div class="input-group mb5">
                                        <input type="file" name="logo" class="dropify"@if(@$settings->logo != '') data-default-file="{{url('uploads')}}/{{@$settings->logo}}" @endif/>
                                    </div>
                                </div>
                            </div><!-- col12 -->
                        </div><!-- col6 -->
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">إنستجرام</label>
                                    <div class="input-group mb5">
                                        <input type="text" name="instagram" value="{{$settings->instagram}}" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">لينكدإن</label>
                                    <div class="input-group mb5">
                                        <input type="text" name="linkedin" value="{{$settings->linkedin}}" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->
                        </div><!-- col6 -->
                    </div><!-- row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">فيسبوك</label>
                                    <div class="input-group mb5">
                                        <textarea name="facebook" rows="4" cols="30" class="form-control">{{$settings->facebook}}</textarea>
                                    </div>
                                </div>
                            </div><!-- col12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">يوتيوب</label>
                                    <div class="input-group mb5">
                                        <textarea name="youtube" rows="4" cols="30" class="form-control">{{$settings->youtube}}</textarea>
                                    </div>
                                </div>
                            </div><!-- col12 -->
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">واتس آب</label>
                                    <div class="input-group mb5">
                                        <input type="text" name="whatsapp" value="{{$settings->whatsapp}}" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> تويتر </label>
                                    <div class="input-group mb5">
                                        <input type="text" name="twitter" value="{{$settings->twitter}}" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> العنوان </label>
                                    <input type="text" name="title" value="{{$settings->title}}" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> التعريف </label>
                                    <textarea rows="4" cols="30" name="breif" class="form-control">{{$settings->breif}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> الصورة </label>
                                    <input type="file" name="image" class="dropify"@if(@$settings->image != '') data-default-file="{{url('uploads')}}/{{@$settings->image}}" @endif/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> رؤيتنا </label>
                                    <textarea rows="4" cols="30" name="vision" class="form-control">{{$settings->vision}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> رسالتنا </label>
                                    <textarea rows="4" cols="30" name="mission" class="form-control">{{$settings->mission}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> لماذا نمذجة </label>
                                    <textarea name="why" id="why" class="form-control" cols="30" rows="5">{{$settings->why}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end form body -->
                </div>

                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> حفظ </button>
            </form>
        </div>
    </div>
</div>
<!-- Row -->
</div>
@endsection