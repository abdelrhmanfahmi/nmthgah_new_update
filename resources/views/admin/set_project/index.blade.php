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
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>عنوان المشروع</th>
                                <th>وصف المشروع</th>
                                <th>نتيجة المشروع</th>
                                <th>مدير النظام التابع له</th>
                                <th>مستخدم المشروع</th>
                                <th>مدير المشروع</th>
                                <th>مستشار المشروع</th>
                                <th>إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($project_makers) < 1) <tr>
                                <td colspan="4" class="text-center">لا يوجد مدير مشروع.</td>
                                </tr>
                                @else
                                @foreach($project_makers as $project_maker)
                                <tr>
                                    <td>{{$project_maker->id}}</td>
                                    <td>{{$project_maker->project_address}}</td>
                                    <td>{{$project_maker->description}}</td>
                                    <td>{{$project_maker->project_result}}</td>
                                    <td>{{$project_maker->admin_id}}</td>
                                    <td>{{$project_maker->user_id}}</td>
                                    <td>{{$project_maker->project_manager_id}}</td>
                                    <td>{{$project_maker->consultant_id}}</td>
                                    <td>
                                        <a href="editProject_Maker/{{$project_maker->id}}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="تعديل"><i class="mdi mdi-account-edit" aria-hidden="true"></i></a>
                                        <form style="display:inline;" method="POST" action="deleteProject_Maker/{{$project_maker->id}}">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="حذف">
                                                <i class="ti-close" aria-hidden="true"></i>
                                            </button>
                                        </form>

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