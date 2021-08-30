@extends('admin.index') 
@section('main')
<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white"></h4>
            </div>
            <div class="card-block">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">المستخدمين</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-account"></i></div>
                                        @foreach($userOfProjecto as $user)
                                            <input type="text" disabled style="background-color:white" class="form-control" value="{{$user->usersProjecto->first_name}} {{$user->usersProjecto->last_name}}" />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">مدير المشروع</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-account-star"></i></div>
                                        @foreach($projectOfProjecto as $project)
                                            <input type="text" disabled style="background-color:white" class="form-control" value="@if($project->project_id != '') {{$project->projectManagersProjecto->first_name}} {{$project->projectManagersProjecto->last_name}} @else 'لم تختار مدير مشروع بعد' @endif" />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <!--here code request_id-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">المشروع</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                        @foreach($requestOfProjecto as $request)
                                            <input type="text" disabled style="background-color:white" class="form-control" value="@if($request->request_id != '') {{$request->ProjectoRequests->waqf_name}} @else 'لم تختار مشروع بعد' @endif" />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label class="control-label">اركان المشروع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-pillar"></i></div>
                                            @foreach($pillarOfProjecto as $pillar)
                                                <input type="text" value="@if($pillar->id != '') {{$pillar->pillarsByRequest_Pillar->name}} @else  'Not Found Pillars' @endif" disabled style="background-color:white" class="form-control"/><br>
                                            @endforeach
                                        </div>
                                 </div>
                            </div>
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                            <label class="control-label">مستشاري المشروع</label>
                                            <div class="input-group mb5">
                                                <div class="input-group-addon"><i class="mdi mdi-account"></i></div>
                                                @foreach($consultantsOfProjectPillar as $consult)
                                                    <input type="text" value="@if($consult->id != '') {{$consult->consultantsProjectoPillar->first_name}} {{$consult->consultantsProjectoPillar->last_name}} @else  'Not Found Consultants' @endif" disabled style="background-color:white" class="form-control"/><br>
                                                @endforeach
                                            </div>
                                     </div>
                                </div>
                            </div>
                            <label class="control-label">متطلبات اركان المشروع</label>
                        @foreach($requirementsProjectsPillars as $require)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <div class="input-group mb5">
                                                <div class="input-group-addon"><i class="mdi mdi-pillar"></i></div>
                                                    <input type="text" value="@if($require->id != '') {{$require->requirementsByProjectoTypes->name}} @else  'Not Found Pillars' @endif" disabled style="background-color:white" class="form-control"/><br>
                                            </div>
                                     </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
        </div>
    </div>
</div>
<!-- Row -->
@endsection