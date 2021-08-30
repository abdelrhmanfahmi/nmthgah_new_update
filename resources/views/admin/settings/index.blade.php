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
                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list  footable-loaded footable" data-page-size="10">
                        الإعدادات الرئيسية
                        <thead>
                            <tr>
                                <th>رقم</th>
                                <th>لوجو الصورة</th>
                                <th>تويتر</th>
                                <th>انستجرام</th>
                                <th>لينكدإن</th>
                                <th>العنوان</th>
                                <th>تعريف</th>
                                <th>الصورة</th>
                                <th>اعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($settings) < 1) <tr>
                                <td colspan="4" class="text-center">لا توجد سجلات</td>
                                </tr>
                                @else
                                @foreach($settings as $setting)
                                <tr>
                                    <td>{{$setting->id}}</td>
                                    <td>
                                        <img src="{{ asset('uploads/' . $setting->logo) }}" width="200px" height="200px" alt="">
                                    </td>
                                    <td>{{$setting->twitter}}</td>
                                    <td>{{$setting->instagram}}</td>
                                    <td>{{$setting->linkedin}}</td>
                                    <td>{{$setting->title}}</td>
                                    <td>{{$setting->breif}}</td>
                                    <td>
                                        @if(pathinfo($setting->image, PATHINFO_EXTENSION) != 'pdf')
                                        <img src="{{ asset('uploads/' . $setting->image) }}" width="200px" height="200px" alt="">
                                        @else
                                        <img src="{{ url('storage/files/download.png') }}" width="200px" height="200px" alt="">
                                        @endif
                                    </td>

                                    
                                    <td>
                                        <a href="editSetting/{{$setting->id}}" class="btn btn-success">تعديل</a>
                                        <br>
                                        <br>
                                        <!--<a style="cursor:pointer;" onclick="whenDeleteFile(this)" data-id-image="{{$setting->id}}" class="btn btn-danger text-white">حذف</a>-->

                                    </td>
                                </tr>
                                @endforeach
                                @endif
                        </tbody>

                    </table>
                </div>
                <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                
                            <div class="modal-body text-center" style="padding: 40px">
                                <h3 class="afterShow" style="font-family:dr;color:#808080;">هل تريد حذف التعديلات؟</h3>
                                
                            </div>
                
                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function whenDeleteFile(e){
        $('#dataOfDelation').empty();
        var idOfFile = e.getAttribute('data-id-image');
        console.log(idOfFile);
        $('#uploadingModal').show();
        $('<div id="dataOfDelation"><br><a onclick="closeWindow()" href="/admin/deleteSetting/'+idOfFile+'" class="btn btn-danger">نعم</a> &nbsp;&nbsp; <a class="btn btn-success text-white" onclick="closeWindow()">لا</a></div>').insertAfter(".afterShow");
        // $('#uploadingModal').hide();
    }
    
    function closeWindow(){
        $('#uploadingModal').hide();
    }
</script>
@endsection