@extends('admin.index')
@section('main')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>المعلومات بالتفصيل عن الطلب</h3>
        </div>
    </div>
    @foreach($inboxMsg as $msg)
        <div class="row">
            <div class="col-md-6 d-flex flex-column mb-3">
            <label >رقم المستخدم</label>
            <p style="text-align:center;border:1px solid #ddd;width:250px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$inboxMsg[0]->id}}</span></p>
            </div>
            <div class="col-md-6 d-flex flex-column mb-3">
            <label>رقم الرسالة</label>
            <p style="text-align:center;border:1px solid #ddd;width:250px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$inboxMsg[0]->number_id}}</span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex flex-column mb-3">
            <label >اسم المستخدم</label>
            <p style="text-align:center;border:1px solid #ddd;width:250px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$inboxMsg[0]->first_name}} {{$inboxMsg[0]->last_name}}</span></p>
            </div>
            <div class="col-md-6 d-flex flex-column mb-3">
            <label>الرسالة</label>
            <textarea style="text-align:center;border:1px solid #ddd;border-radius:10px;width:300px;height:150px" class="form-control" rows="3" cols="50">{{$inboxMsg[0]->message}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex flex-column mb-3">
            <label>المستندات</label>
            <img style="border-radius:30px;border:2px solid #ddd;width:210px;height:140px;" class="img-fluid" src="{{asset('uploads/' . $inboxMsg[0]->files)}}"/>
            </div>
        </div>
        <br>
    <div class="col-md-12">
        <div style="border:3px solid #ddd;width:100%;height:3px;"></div>
    </div>
    <br>
         
    @endforeach
</div>

@endsection
