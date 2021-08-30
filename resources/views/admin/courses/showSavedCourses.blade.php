@extends('admin.index')
@section('main')

<div class="container">
    @if(count($courseShowSaved) < 1) <div class="row">
        <div class="col-md-12">
            <h3>لا توجد بيانات</h3>
        </div>
</div>
@else
<div class="container bg-white">
    <br>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center account_info">
            <h5 style="text-align: center">معلومات المسجل</h5>
        </div>
    </div>
    <br>
    @foreach($courseShowSaved as $courseGuest)
    <div class="row">
        <div class="col-md-6 d-flex flex-column mb-3 account_id">
            <label >رقم المسجل</label>
            <p style="text-align:center;border:1px solid #ddd;width:240px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$courseGuest->guests->id}}</span></p>
        </div>
        <div class="col-md-6 d-flex flex-column mb-3 account_name">
            <label>اسم المسجل</label>
            <p style="text-align:center;border:1px solid #ddd;width:240px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$courseGuest->guests->name}}</span></p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 d-flex flex-column mb-3 account_email">
            <label>ايميل المسجل</label>
            <p style="text-align:center;border:1px solid #ddd;width:240px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$courseGuest->email}}</span></p>
        </div>
        <div class="col-md-6 d-flex flex-column mb-3 account_phone">
            <label>هاتف المسجل</label>
            <p style="direction:ltr;text-align:center;border:1px solid #ddd;width:240px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$courseGuest->guests->phone}}</span></p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 d-flex flex-column mb-3 account_degree">
            <label>الدرجة العلمية</label>
            <p style="text-align:center;border:1px solid #ddd;width:240px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$courseGuest->guests->scientific_degree}}</span></p>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <h5 style="text-align: center">معلومات الدورة</h5>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 d-flex flex-column mb-3">
            <label>رقم الدورة</label>
            <p style="text-align:center;border:1px solid #ddd;width:240px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$courseGuest->courses->id}}</span></p>
        </div>
        <div class="col-md-6 d-flex flex-column mb-3">
            <label>اسم الدورة</label>
            <p style="text-align:center;border:1px solid #ddd;width:240px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$courseGuest->courses->courseName}}</span></p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 d-flex flex-column mb-3 account_name">
            <label>اسم المحاضر</label>
            <p style="text-align:center;border:1px solid #ddd;width:240px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$courseGuest->courses->instructor}}</span></p>
        </div>
        <div class="col-md-6 d-flex flex-column mb-3">
            <label>سعر الدورة</label>
            <p style="text-align:center;border:1px solid #ddd;width:240px;height:40px;border-radius:10px;"><span style="position:relative;top:5px;">{{$courseGuest->courses->price}}</span></p>
        </div>
    </div>
    <br>
    
    <br>
    <div class="col-md-12">
        <div style="border:3px solid #ddd;width:100%;height:3px;"></div>
    </div>
    <br>
    @endforeach
</div>
@endif
</div>
@endsection