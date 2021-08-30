@extends('admin.index')
@section('main')

<style>
    .setProject{
        background-color:goldenrod;
        color:white;
        border-radius:15px;
        outline:0;
        border:0px;
    }
    .setProject:hover{
        background-color:white;
        color:goldenrod;
    }
</style>

<div class="row">
<div class="col-12">
<div class="card card-outline-info">
<div class="card-header">
<h4 class="m-b-0 text-white"></h4>
</div>

<div class="card-block">
    <h6 class="card-subtitle"></h6>
    <div class="table-responsive">
        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list  footable-loaded footable"
            data-page-size="10">
            المشاريع
            <thead>
                <tr>
                <th>الرقم المتسلسل</th>
                <th>رقم المشروع</th>
                <th>اسم صاحب الوقف</th>
                <th>اسم المسؤول عن الوقف</th>
                <th>العميل</th>
                <th>إعدادات</th>
                </tr>
            </thead>
            <tbody>
                @if(count($projectos) < 1)
                    <tr><td colspan="6" class="text-center">لا توجد بيانات</td></tr>
                @else 
                @foreach($projectos as $key => $projecto)
                <tr>
                    <td>{{($key+1)}}</td>
                    <td>{{$projecto->id}}</td>
                    <td>{{$projecto->ProjectoRequests->waqf_ownerName}}</td>
                    <td>{{$projecto->ProjectoRequests->waqf_charger}}</td>
                    <td>{{$projecto->usersProjecto->first_name}}</td>
                    <td>
                        <a href="showProjectos/{{$projecto->id}}" class="btn btn-primary">التفاصيل</a>
                        <a href="editProjectos/{{$projecto->id}}" class="btn btn-success">تعديل</a>
                        <a style="cursor:pointer;" onclick="whenDeleteFile(this)" data-id-image="{{$projecto->id}}" class="btn btn-danger text-white">حذف</a>
                        <a href="messagesBetweenAdminProject/{{$projecto->id}}/{{$projecto->request_id}}/{{$projecto->project_id}}" class="btn btn-info">رسائل</a>
                    </td>
                </tr>
                @endforeach 
                @endif
            </tbody>
            <tfoot>
                <td colspan="5">
                    <div class="text-right">
                        {{$projectos->links()}}
                    </div>
                </td>
            </tfoot>
        </table>
    </div>
</div>
<div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body text-center" style="padding: 40px">
                <h3 class="afterShow" style="font-family:dr;color:#808080;">هل تريد حذف هذا المشروع؟</h3>
                
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
        $('#uploadingModal').show();
        $('<div id="dataOfDelation"><br><a onclick="closeWindow()" href="/admin/deleteProjectos/'+idOfFile+'" class="btn btn-danger">نعم</a> &nbsp;&nbsp; <a class="btn btn-success text-white" onclick="closeWindow()">لا</a></div>').insertAfter(".afterShow");
        // $('#uploadingModal').hide();
    }
    
    function closeWindow(){
        $('#uploadingModal').hide();
    }
</script>
@endsection
