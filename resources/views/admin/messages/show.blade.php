@extends('admin.index')
@section('main')

    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <h3>تفاصيل الرسالة</h3>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 d-flex flex-column mb-3">
                <label style="margin-right:30px">الاسم</label>
                <p style="text-align:center;border:1px solid #ddd;width:280px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$message->name}}</span></p>
            </div>
            <div class="col-md-6 d-flex flex-column mb-3">
                <label style="margin-right:30px">الايميل</label>
                <p style="text-align:center;border:1px solid #ddd;width:280px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$message->email}}</span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex flex-column mb-3">
                <label style="margin-right:30px">الجوال</label>
                <p style="direction:ltr;text-align:center;border:1px solid #ddd;width:280px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$message->phone}}</span></p>
            </div>
            <div class="col-md-6 d-flex flex-column mb-3">
                <label style="margin-right:30px">نوع الخدمة</label>
                <p style="text-align:center;border:1px solid #ddd;width:280px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$message->service}}</span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex flex-column mb-3">
                <label style="margin-right:30px">الجهة التابعة</label>
                <p style="text-align:center;border:1px solid #ddd;width:280px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$message->affiliate}}</span></p>
            </div>
            <div class="col-md-6 d-flex flex-column mb-3">
                <label style="margin-right:30px">الرسالة</label>
                <textarea style="text-align:center;border:1px solid #ddd;border-radius:10px;width:285px;height:150px;background-color:#fff" disabled class="form-control" >{{$message->message}}</textarea>
            </div>
        </div>
    </div>

@endsection