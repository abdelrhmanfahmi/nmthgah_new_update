
@extends('admin.index')
@section('main')
<!-- Row -->
<style>
    .ck-file-dialog-button {
        display: none;
    }
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
            <div class="card-block">
                <form method="POST" action="{{ url('admin/updateStand_Pillars/' . $standard_pillars->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">اسم معيار الركن</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-note"></i></div>
                                            <input type="text" name="standard_name" value="{{$standard_pillars->standard_name}}" class="form-control">
                                        </div>
                                    </div>
                                </div><!-- col12 -->
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">الركن التابع له</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-pillar"></i></div>
                                            <select id="pillar_id" name="pillar_id" style="width: 500px;" class="form-control">
                                                @foreach($pillars as $pillar)
                                                    <option value="{{$pillar->id}}" {{old('pillar_id',$pillar->id) == $standard_pillars->pillar_id ? 'selected' : ''}}>{{$pillar->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
@endsection