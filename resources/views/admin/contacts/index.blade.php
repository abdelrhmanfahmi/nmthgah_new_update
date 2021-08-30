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
                        الروابط الاجتماعية
                        <thead>
                            <tr>
                                <th>رقم</th>
                                <th>تويتر</th>
                                <th>انستجرام</th>
                                <th>لينكدإن</th>
                                <th>اعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($contacts) < 1) <tr>
                                <td colspan="4" class="text-center">لا توجد سجلات</td>
                                </tr>
                                @else
                                @foreach($contacts as $key => $contact)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$contact->twitter}}</td>
                                    <td>{{$contact->instagram}}</td>
                                    <td>{{$contact->linkedin}}</td>
                                   
                                    <td>
                                        <a href="editContact/{{$contact->id}}" class="btn btn-primary">تعديل</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection