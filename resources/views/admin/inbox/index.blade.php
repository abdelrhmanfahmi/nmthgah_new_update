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
            <thead>
                <tr>
                    <th>رقم</th>
                    <th>الرسالة</th>
                    <th>المستندات</th>
                    <th>مدير النظام</th>
                    <th>مستخدم النظام</th>
                    <th>الاعدادت</th>
                </tr>
            </thead>
            <tbody>
                @if(count($inboxMsgs) < 1)
                    <tr><td colspan="5" class="text-center">لا توجد بيانات</td></tr>
                @else 
                @foreach($inboxMsgs as $key => $inboxMsg)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$inboxMsg->message}}</td>
                    <td> 
                    @if(pathinfo($inboxMsg->files, PATHINFO_EXTENSION) != 'pdf') 
                    <img src="{{ url('storage/'.$inboxMsg->files) }}" width="200px" height="200px" alt="">
                    @else
                    <img src="{{ url('storage/files/download.png') }}" width="200px" height="200px" alt="">
                    @endif
                    </td>
                    <td>{{$inboxMsg->admin_id}}</td>
                    <td>{{$inboxMsg->user_id}}</td>

                    <td>
                        <a href="/admin/editInbox/{{$inboxMsg->id}}" class="btn btn-success">تعديل</a>
                        <br>
                        <a style="cursor:pointer;" onclick="whenDeleteFile(this)" data-id-image="{{$inboxMsg->id}}" class="btn btn-danger">حذف</a>
                        <br>
                        <a href="/admin/showInbox/{{$inboxMsg->id}}/{{$inboxMsg->user_id}}" class="btn btn-primary">التفاصيل</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <td colspan="5">
                    <div class="text-right">
                        
                    </div>
                </td>
            </tfoot>
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
        $('<div id="dataOfDelation"><br><a onclick="closeWindow()" href="/admin/deleteInbox/'+idOfFile+'" class="btn btn-danger">نعم</a> &nbsp;&nbsp; <a class="btn btn-success text-white" onclick="closeWindow()">لا</a></div>').insertAfter(".afterShow");
        // $('#uploadingModal').hide();
    }
    
    function closeWindow(){
        $('#uploadingModal').hide();
    }
</script>
@endsection
