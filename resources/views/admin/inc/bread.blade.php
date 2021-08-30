@if(Request::segment(2) != '')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
    </div>
    <div class="col-md-6 col-4 align-self-center">
        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        @if(isset($showadd) && $showadd ==1)
        <a href="{{url('/')}}/admin/{{$parentroute}}/create" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> اضافة </a>
        @endif
    </div>
</div>
@else
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
    </div>
    <div class="col-md-6 col-4 align-self-center">
        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        
    </div>
</div>
@endif
