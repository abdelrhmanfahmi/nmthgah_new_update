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
                        الدورات المؤكدة
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th> اسم الكورس</th>
                                <th>الاسم</th>
                                <th>الهاتف</th>
                                <th>الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($courseGuests) < 1) <tr>
                                <td colspan="5" class="text-center">لا توجد بيانات</td>
                                </tr>
                                @else
                                @foreach($courseGuests as $course)
                                <tr>
                                <td>{{$course->id}}</td>
                                    <td>{{$course->courses->courseName}}</td>
                                    <td>{{$course->guests->name}}</td>
                                    <td>{{$course->guests->phone}}</td>
                                    <td>
                                        <a href="showCoursePaid/{{$course->id}}/{{$course->guests->id}}" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="تفاصيل"><i class="mdi mdi-eye" aria-hidden="true"></i></a>
                                        <form style="display:inline;" method="POST" action="deleteCoursePaid/{{$course->guests->id}}">
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