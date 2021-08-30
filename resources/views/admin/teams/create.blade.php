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
            <form method="POST" action="{{route('teams.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> الصورة </label>
                                    <div class="input-group mb5">
                                        <input type="file" name="image" class="dropify">
                                    </div>
                                </div>
                            </div><!-- col12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> الاسم </label>
                                    <div class="input-group mb5">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->

                        </div><!-- col6 -->
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> العنوان </label>
                                    <div class="input-group mb5">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> الوصف </label>
                                    <div class="input-group mb5">
                                        <input type="text" name="desc" class="form-control">
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
                                        <input type="text" name="twitter" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"> الايميل </label>
                                    <div class="input-group mb5">
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                </div>
                            </div><!-- col12 -->

                        </div><!-- col6 -->
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