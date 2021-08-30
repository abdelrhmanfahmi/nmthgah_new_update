@extends('layout_project.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>اهلا بك مدير {{auth()->user()->first_name}} في نمذجة الابتكار </h1>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h1> إليك المشاريع المسندة إليك من مدير النظام </h1>
            </div>
        </div>
        @foreach($projects as $project)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title">
                        <h3> المشروع رقم: {{$project->id}} </h3>
                    </div>
                    <div class="card-body">
                        <h3> عنوان المشروع: {{$project->project_address}} </h3>
                        <h3> وصف المشروع: {{$project->description}}</h3>
                        <h3> نتيجة المشروع: {{$project->project_result}}</h3>
                        <h3> مدير النظام منشيء المشروع: {{$project->project_maker_admin->name}}</h3>
                        <h3> المستخدم التابع المشروع: {{$project->project_maker_user->first_name}}</h3>
                        <h2 class="text-center">اركان المشروع ومعاييرها ومتطلباتها</h2>
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <hr style="background-color: royalblue;width:50%;font-weight:bold;">
        @endforeach

    </div>
</div>


@endsection