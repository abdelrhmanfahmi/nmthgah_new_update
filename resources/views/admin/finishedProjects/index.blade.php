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
            المشاريع المنتهية
            <thead>
                <tr>
                <th>الرقم</th>
                <th>اسم الوقف</th>
                <th>اسم صاحب الوقف</th>
                <th>اسم المسؤول عن الوقف</th>
                <th>إعدادات</th>
                </tr>
            </thead>
            <tbody>
                @if(count($finishedProject) < 1)
                    <tr><td colspan="6" class="text-center">لا توجد بيانات</td></tr>
                @else 
                @foreach($finishedProject as $key => $finish)
                <tr>
                    <td>{{($key+1)}}</td>
                    <td>{{$finish->ProjectoRequests->waqf_name}}</td>
                    <td>{{$finish->ProjectoRequests->waqf_ownerName}}</td>
                    <td>{{$finish->ProjectoRequests->waqf_charger}}</td>
                    <td>
                        <a href="showFinishedProjects/{{$finish->ProjectoRequests->id}}/{{$finish->id}}" class="btn btn-primary">التفاصيل</a>
                    </td>
                </tr>
                @endforeach 
                @endif
            </tbody>
            <tfoot>
                <td colspan="5">
                    <div class="text-right">
                        {{$finishedProject->links()}}
                    </div>
                </td>
            </tfoot>
        </table>
    </div>
</div>
</div>
</div>
</div>
@endsection