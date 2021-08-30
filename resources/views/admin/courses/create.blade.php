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
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{route('courses.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">اسم الدورة</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                        <input type="text" style="height:40px" name="courseName" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">وصف المحاضر</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-pen"></i></div>
                                        <textarea name="instructorDesc" class="form-control" id="instructorDesc" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">المحاضر</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                        <input type="text" style="height:30px;" name="instructor" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">صورة المحاضر</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-camera-retro"></i></div>
                                        <input type="file" name="instructorImage" class="dropify">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">سعر الكورس</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-coins"></i></div>
                                        <input type="text" name="price" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">مدة الكورس</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-history"></i></div>
                                        <input type="number" name="courseTime" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">موعد الكورس</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-watch"></i></div>
                                        <input type="date" name="courseDate" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">الساعة</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-hourglass-start"></i></div>
                                        <input type="time" name="timeCourse" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-froup">
                                    <label class="control-label">اسم البنك</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-bank"></i></div>
                                        <input type="text" style="height:30px;" name="payment_method" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">صورة البنك</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="mdi mdi-bank"></i></div>
                                        <input type="file" name="image_bank" class="dropify">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">رقم الحساب الدولي</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                                        <input style="width:420px;height:45px;" type="text" name="international_account" class="from-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">رقم الحساب المحلي</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-user-circle"></i></i></div>
                                        <input style="width:420px;height:45px" type="text" name="local_account" class="from-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">المحاور</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-table"></i></div>
                                        <div style="display: flex;">
                                            <input style="flex: 1;width:240px;height:40px" type="text" id="pillars" value="" class="form-control">
                                            <button id="addItem"><i class="mdi mdi-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span><textarea name="pillars" class="form-control" cols="30" rows="10" style="border-radius: 10px;border:2px solid goldenrod;display:none;" id="dataPillar"></textarea></span>
                        </div>
                        <!--************-->

                    </div>
                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> حفظ </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
@include('admin.courses.courseJS')
@endsection