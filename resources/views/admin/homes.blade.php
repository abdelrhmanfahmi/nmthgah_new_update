@extends('admin.index')
@section('main')
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-block">
                
                <h4 class="card-title"><span style="color:#E2AF25">مرحباٌ</span> , {{auth()->user()->name}} </h4>
                <!-- Row -->
                <div class="row m-t-40">
                    <div class="col-md-7">
                        <div id="sales-donute" style="width:100%; height:300px;"></div>
                        <div class="round-overlap"><i class="mdi mdi-home"></i></div>
                    </div>
                    <div class="col-md-5 align-self-center">
                        <h1 class="m-b-0"><small>%</small></h1>
                        <h6 class="text-muted">حالة الموقع  <span class="badge badge-success">يعمل</span>  <span class="badge badge-danger">لا يعمل</span> </h6>
                        
                    </div>
                </div>
                <!-- Row -->
            </div>
        </div>
    </div>

    <div class="col-lg-6" style="color:goldenrod">
    <br>
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card card-block">
                    <!-- Row -->
                    <div class="row p-t-10 p-b-10">
                        <!-- Column -->
                        <div class="col p-r-0">
                            <h1 class="font-light"></h1>
                            <h6 class="text-muted">المديرين</h6></div>
                        <!-- Column -->
                        <div class="col text-right align-self-center">
                            <div data-label="80%" class="css-bar m-b-0 css-bar-primary css-bar-20">{{countAdmins()}}<i class="mdi mdi-account-star"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card card-block">
                    <!-- Row -->
                    <div class="row p-t-10 p-b-10">
                        <!-- Column -->
                        <div class="col p-r-0">
                            <h1 class="font-light"></h1>
                            <h6 class="text-muted">المستشاريين</h6></div>
                        <!-- Column -->
                        <div class="col text-right align-self-center">
                            <div data-label="90%" class="css-bar m-b-0 css-bar-danger css-bar-20">{{countConsultants()}}<i class="mdi mdi-account-settings"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card card-block">
                    <!-- Row -->
                    <div class="row p-t-10 p-b-10">
                        <!-- Column -->
                        <div class="col p-r-0">
                            <h1 class="font-light"></h1>
                            <h6 class="text-muted">مديرون المشاريع</h6></div>
                        <!-- Column -->
                        <div class="col text-right align-self-center">
                            <div data-label="90%" class="css-bar m-b-0 css-bar-warning css-bar-40">{{countProjects()}}<i class="mdi mdi-folder"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card card-block">
                    <!-- Row -->
                    <div class="row p-t-10 p-b-10">
                        <!-- Column -->
                        <div class="col p-r-0">
                            <h1 class="font-light"></h1>
                            <h6 class="text-muted">المستخدمين</h6></div>
                        <!-- Column -->
                        <div class="col text-right align-self-center">
                            <div data-label="90%" class="css-bar m-b-0 css-bar-info css-bar-60">{{countUsers()}}<i class="fa fa-user"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
<!-- Row -->
<!-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-block">
                
                <h4 class="card-title">الرسائل المستقبلة</h4>
                <div class="table-responsive m-t-40">
                    <table class="table stylish-table">
                        <thead>
                            <tr>
                                <th >الأسم</th>
                                <th width="40%">البريد الإلكترونى</th>
                                <th width="40%">نوع الخدمة</th>
                                <th>التاريخ</th>
                                <th width="5%">إعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                <td style="width:50px;"><span class="round"></span></td>
                                <td>
                                <h6></h6>
                                <small class="text-muted" style="font-size:10px;"></small>
                                </td>
                                <td></td>
                                <td><span class="label label-light-success"></span></td>
                                <td><a href="{{url('admin')}}/inbox/" class="btn btn-info btn-small">استعراض</a></td>
                            </tr>
                         
                        <td colspan="5">
                                لا توجد رسائل.
                        </td>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Row -->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection