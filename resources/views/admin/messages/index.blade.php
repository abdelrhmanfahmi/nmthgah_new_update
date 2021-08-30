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
            الرسائل
            <thead>
                <tr>
                    <th>رقم</th>
                    <th>الاسم الثلاثي</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الجوال</th>
                    <th>الاعدادت</th>
                </tr>
            </thead>
            <tbody>
                @if(count($messages) < 1)
                    <tr><td colspan="4" class="text-center">لا توجد بيانات</td></tr>
                @else 
                @foreach($messages as $key => $message)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$message->name}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->phone}}</td>
                    <td>
                                <a style="cursor:pointer;" onclick="whenDeleteFile(this)" data-id-image="{{$message->id}}" class="btn btn-danger text-white">حذف</a>
                                    <br>
                                    <br>
                                <a href="showMessage/{{$message->id}}" class="btn btn-primary">التفاصيل</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <td colspan="8">
                    <div class="text-center">
                        {{$messages->links()}}
                    </div>
                </td>
            </tfoot>
            <br>
        </table>
    </div>
    <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
    
                <div class="modal-body text-center" style="padding: 40px">
                    <h3 class="afterShow" style="font-family:dr;color:#808080;">هل تريد حذف هذه الرسالة؟</h3>
                    
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
        $('#uploadingModal').show();
        $('<div id="dataOfDelation"><br><a onclick="closeWindow()" href="/admin/deleteMessage/'+idOfFile+'" class="btn btn-danger">نعم</a> &nbsp;&nbsp; <a class="btn btn-success text-white" onclick="closeWindow()">لا</a></div>').insertAfter(".afterShow");
        // $('#uploadingModal').hide();
    }
    
    function closeWindow(){
        $('#uploadingModal').hide();
    }
</script>
@endsection
