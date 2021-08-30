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
             تقييمات المستخدمين
            <thead>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>اسم الوقف</th>
                <th>المدينة</th>
            </thead>
            <tbody>
                @if(count($results) > 0)
                @foreach($results as $result)
                <tr>
                <td>{{$result->name}}</td>
                <td>{{$result->email}}</td>
                <td>{{$result->waqf}}</td>
                <td>{{$result->city}}</td>
                <td>
                    <a href="showResults/{{$result->id}}" class="btn btn-primary">التفاصيل</a>
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
                        {{$results->links()}}
                    </div>
                </td>
            </tfoot>
        </table>
    </div>
    
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    // function whenDeleteFile(e){
    //     $('#dataOfDelation').empty();
    //     var idOfFile = e.getAttribute('data-id-image');
    //     console.log(idOfFile);
    //     $('#uploadingModal').show();
    //     $('<div id="dataOfDelation"><br><a onclick="closeWindow()" href="/admin/deleteEvaluate/'+idOfFile+'" class="btn btn-danger">نعم</a> &nbsp;&nbsp; <a class="btn btn-success text-white" onclick="closeWindow()">لا</a></div>').insertAfter(".afterShow");
    //     // $('#uploadingModal').hide();
    // }
    
    // function closeWindow(){
    //     $('#uploadingModal').hide();
    // }
</script>
@endsection
