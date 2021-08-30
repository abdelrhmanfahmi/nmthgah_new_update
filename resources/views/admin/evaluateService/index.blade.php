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
            اسئلة التقييم 
            <thead>
                <th width="10%">الرقم</th>
                <th width="30%">السؤال</th>
                <th width="30%">الركن</th>
                <th width="30%"></th>
            </thead>
            <tbody>
                @if(count($questions) > 0)
                @foreach($questions as $key => $question)
                <tr>
                <td>{{$key+1}}</td>
                <td>{{$question->question}}</td>
                <td>{{App\Pillar::find($question->pillar_id)->name}}</td>
                <td>
                    <a href="editQuestion/{{$question->id}}" class="btn btn-success">تعديل</a>
                    <a style="cursor:pointer;" onclick="whenDeleteFile(this)" data-id-image="{{$question->id}}" class="btn btn-danger text-white">حذف</a>
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
                        {{$questions->links()}}
                    </div>
                </td>
            </tfoot>
        </table>
    </div>
    <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body text-center" style="padding: 40px">
                <h3 class="afterShow" style="font-family:dr;color:#808080;">هل تريد حذف هذا السؤال؟</h3>
                
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
        $('<div id="dataOfDelation"><br><a onclick="closeWindow()" href="/admin/deleteQuestion/'+idOfFile+'" class="btn btn-danger">نعم</a> &nbsp;&nbsp; <a class="btn btn-success text-white" onclick="closeWindow()">لا</a></div>').insertAfter(".afterShow");
        // $('#uploadingModal').hide();
    }
    
    function closeWindow(){
        $('#uploadingModal').hide();
    }
</script>
@endsection
