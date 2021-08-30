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

                <form method="POST" action="{{ url('admin/updateTypesConsul/' . $typesConsul->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <hr>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">نوع خدمة الاستشارة</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-pen"></i></div>
                                        <input type="text" name="name" class="form-control" value="{{$typesConsul->name}}" />
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
       
    });
</script>
@endsection