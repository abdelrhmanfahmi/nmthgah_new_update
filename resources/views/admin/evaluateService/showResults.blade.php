@extends('admin.index')
@section('main')
<div class="row">
<div class="col-12">
<div class="card card-outline-info">
<div class="card-header">
<h4 class="m-b-0 text-white"></h4>
</div>
    <div class="card-block">
        <h6 class="card-subtitle"></h6>
        <div class="table-responsive">
            نتيجة التقييم
            <hr>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb5">
                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                            <input type="text" disabled style="background-color:white;font-family:dr;" value="{{$dataOfUser->name}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb5">
                            <div class="input-group-addon"><i class="mdi mdi-email"></i></div>
                            <input type="text" disabled style="background-color:white;font-family:dr;" value="{{$dataOfUser->email}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb5">
                            <div class="input-group-addon"><i class="fa fa-building"></i></div>
                            <input type="text" disabled style="background-color:white;font-family:dr;" value="{{$dataOfUser->waqf}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb5">
                            <div class="input-group-addon"><i class="mdi mdi-city"></i></div>
                            <input type="text" disabled style="background-color:white;font-family:dr;" value="{{$dataOfUser->city}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            @if($dataOfUser->description != null)
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group mb5">
                            <div class="input-group-addon"><i class="mdi mdi-comment"></i></div>
                            <textarea name="desc" class="form-control" disabled style="background-color:white;font-family:dr;" rows="4" cols="50">{{$dataOfUser->description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            @else
            
            @endif
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th width="50%">السؤال</th>
                      <th width="50%">النتيجة</th>
                    </tr>
                </thead>
              <tbody>
                  @if(count($results) > 0)
                  @foreach($results as $result)
                    <tr>
                        <td>{{$result->getQuestions->question}}</td>
                        @if($result->result == 0)
                        <td style="display:flex">
                            <i class="fa fa-check-circle fa-2x img1-project-manager4" style="color: #1BA590;"></i>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <p class="PInproj1detect">مطابق</p>
                        </td>
                        @else
                        <td style="display:flex">
                            <i class="fa fa-times-circle fa-2x img1-project-manager4" style="color: #e1215d;"></i>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <p class="PInproj1detect">غير مطابق</p>
                        </td>
                        @endif
                    </tr>
                @endforeach
                @else
                
                @endif
              </tbody>
            </table>
        </div>
    </div>        
</div>
</div>
</div>
@endsection