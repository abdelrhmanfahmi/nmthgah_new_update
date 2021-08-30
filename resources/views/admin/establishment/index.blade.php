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
        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list  footable-loaded footable"
            data-page-size="10">
              التأسيس المعياري
            <thead>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>اسم الوقف</th>
                <th>المدينة</th>
            </thead>
            <tbody>
                @if(count($establish) > 0)
                @foreach($establish as $establishes)
                <tr>
                <td>{{$establishes->name}}</td>
                <td>{{$establishes->email}}</td>
                <td>{{$establishes->waqf}}</td>
                <td>{{$establishes->city}}</td>
                <td>
                    <a href="editEstablish/{{$establishes->id}}" class="btn btn-success">تعديل</a>
                    <a style="cursor:pointer;" onclick="whenDeleteFile(this)" data-id-image="{{$establishes->id}}" class="btn btn-danger text-white">حذف</a>
                </td>
                </tr>
                @endforeach
                @else
                <tr><td colspan="5" class="text-center">لا توجد بيانات</td></tr>
                @endif
            </tbody>
            <tfoot>
                <td colspan="8">
                    <div class="text-center">
                        {{$establish->links()}}
                    </div>
                </td>
            </tfoot>
        </table>
    </div>
    <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body text-center" style="padding: 40px">
                <h3 class="afterShow" style="font-family:dr;color:#808080;">هل تريد حذف هذا التأسيس المعياري؟</h3>
                
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
        $('<div id="dataOfDelation"><br><a onclick="closeWindow()" href="/admin/deleteEstablish/'+idOfFile+'" class="btn btn-danger">نعم</a> &nbsp;&nbsp; <a class="btn btn-success text-white" onclick="closeWindow()">لا</a></div>').insertAfter(".afterShow");
        // $('#uploadingModal').hide();
    }
    
    function closeWindow(){
        $('#uploadingModal').hide();
    }
</script>
@endsection
