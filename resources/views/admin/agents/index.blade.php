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
                        عملاء سبق التعامل معهم 
                        <thead>
                            <tr>
                                <th>رقم</th>
                                <th>الصورة</th>
                                <th>اعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($agents) < 1) <tr>
                                <td colspan="4" class="text-center">لا توجد سجلات</td>
                                </tr>
                                @else
                                @foreach($agents as $key => $agent)
                                <tr>
                                    <td>{{$key+1}}</td>

                                    <td>
                                        @if(pathinfo($agent->logo, PATHINFO_EXTENSION) != 'pdf')
                                        <img src="{{ asset('uploads/' . $agent->logo) }}" width="200px" height="200px" alt="">
                                        @else
                                        <img src="{{ url('storage/files/download.png') }}" width="200px" height="200px" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="editAgent/{{$agent->id}}" class="btn btn-success">تعديل</a>
                                        <a style="cursor:pointer;" onclick="whenDeleteFile(this)" data-id-image="{{$agent->id}}" class="btn btn-danger text-white">حذف</a>

                                    </td>
                                </tr>
                                @endforeach
                                @endif
                        </tbody>
                        <tfoot>
                            <td colspan="5">
                                <div class="text-right">
                                    {{$agents ->links()}}
                                </div>
                            </td>
                        </tfoot>
                    </table>
                </div>
                <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
            
                        <div class="modal-body text-center" style="padding: 40px">
                            <h3 class="afterShow" style="font-family:dr;color:#808080;">هل تريد حذف هذا العميل؟</h3>
                            
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
        $('<div id="dataOfDelation"><br><a onclick="closeWindow()" href="/admin/deleteAgent/'+idOfFile+'" class="btn btn-danger">نعم</a> &nbsp;&nbsp; <a class="btn btn-success text-white" onclick="closeWindow()">لا</a></div>').insertAfter(".afterShow");
        // $('#uploadingModal').hide();
    }
    
    function closeWindow(){
        $('#uploadingModal').hide();
    }
</script>
@endsection