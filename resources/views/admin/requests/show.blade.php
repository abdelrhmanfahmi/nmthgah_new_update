@extends('admin.index') 
@section('main')
<!-- Row -->
<style>
    body{
        font-family:dr;
    }
</style>
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
                                        <label class="control-label">اسم الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                            <input type="text" name="waqf_name" disabled style="background-color:white;font-family:dr;" value="{{$requests->waqf_name}}" class="form-control" />
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم صاحب الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-account"></i></div>
                                            <input type="text" name="waqf_ownerName" disabled style="background-color:white;font-family:dr;" value="{{$requests->waqf_ownerName}}" class="form-control">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم المسؤول عن الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-account-star"></i></div>
                                            <input type="text" name="waqf_charger" disabled style="background-color:white;font-family:dr;" value="{{$requests->waqf_charger}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">المدينة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-city"></i></div>
                                            <input type="text" name="city" disabled style="background-color:white;font-family:dr;" value="{{$requests->city}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">الشارع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-street-view"></i></div>
                                            <input type="text" name="street" disabled style="background-color:white;font-family:dr;" value="{{$requests->street}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">الجوال</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="mdi mdi-phone"></i></div>
                                            <input type="text" name="phone" disabled style="background-color:white;font-family:dr;direction:ltr;" value="{{$requests->phone}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">وصف الوقف</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-comment"></i></div>
                                        <textarea name="desc" class="form-control" disabled style="background-color:white;font-family:dr;" rows="4" cols="50">{{$requests->desc}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">الملفات المرفقة للمشروع</label>
                                @foreach($data as $d)
                                <ul class="list-group">
                                    @if(pathinfo($d->files, PATHINFO_EXTENSION) == 'pptx' || pathinfo($d, PATHINFO_EXTENSION) == 'ppt')
                                        <li class="list-group-item"><img src="{{asset('assets/images/pptxForPreview.jpg')}}" width="40px;" height="40px;"> <span style="position:relative;right:270px;font-family:dr;"><a class="downloadFileAdmin" href="{{url('uploads')}}/{{@$d->files}}" target="_blank">عرض</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="downloadFileAdmin1" href="/admin/admin/downloadImagesFilesFromRequestAdmin/{{$d->id}}" target="_blank">تحميل</a></span></li>
                                    @elseif(pathinfo($d->files, PATHINFO_EXTENSION) == 'docx' || pathinfo($d, PATHINFO_EXTENSION) == 'doc')
                                        <li class="list-group-item"><img src="{{asset('assets/images/wordForPreview.jpg')}}" width="40px;" height="40px;"> <span style="position:relative;right:270px;font-family:dr;"><a class="downloadFileAdmin" href="{{url('uploads')}}/{{@$d->files}}" target="_blank">عرض</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="downloadFileAdmin1" href="/admin/downloadImagesFilesFromRequestAdmin/{{$d->id}}" target="_blank">تحميل</a></span></li>
                                    @elseif(pathinfo($d->files, PATHINFO_EXTENSION) == 'pdf')
                                        <li class="list-group-item"><img src="{{asset('assets/images/pdfIconMessage.png')}}" width="40px;" height="40px;"> <span style="position:relative;right:270px;font-family:dr;"><a class="downloadFileAdmin" href="{{url('uploads')}}/{{@$d->files}}" target="_blank">عرض</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="downloadFileAdmin1" href="/admin/downloadImagesFilesFromRequestAdmin/{{$d->id}}" target="_blank">تحميل</a></span></li>
                                    @else
                                        <li class="list-group-item"><img src="{{asset('uploads/' . $d->files)}}" width="40px;" height="40px;"> <span style="position:relative;right:270px;font-family:dr;"><a class="downloadFileAdmin" href="{{url('uploads')}}/{{@$d->files}}" target="_blank">عرض</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="downloadFileAdmin1" href="/admin/downloadImagesFilesFromRequestAdmin/{{$d->id}}" target="_blank">تحميل</a></span></li>
                                    @endif
                                  <br>
                                </ul>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">المستخدمين</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-account"></i></div>
                                        @foreach($userOfRequesto as $user)
                                            <input type="text" disabled style="background-color:white;font-family:dr;" class="form-control" value="{{$user->usersRequest->first_name}} {{$user->usersRequest->last_name}}" />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
<!-- Row -->
@endsection