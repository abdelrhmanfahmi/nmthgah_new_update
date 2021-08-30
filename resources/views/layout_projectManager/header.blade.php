<!doctype html>

<head>

</head>

<body>


    <section class="login-page">
        <div class="container">
            <nav>
                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                    <a id="mainPages4" href="/manager"><i style="margin-left:10px;" class="fa fa-home"></i> الرئيسية </a>
                    <a id="logout4" href="{{route('project.logout')}}">تسجيل خروج <i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            </nav>
            <div class="loginco">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="indexProject-form">
                            <h3 class=indexProject-title>المشاريع</h3>
                            <table class="table table-hover tableProjectUser2">
                                <thead style="color:#919191;font-family:cr">
                                    <tr>
                                        <th>اسم المشروع</th>
                                        <th>تاريخ الإنشاء</th>
                                        <th>المدينة</th>
                                        <th>رقم المشروع</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="col text-center" style="color:#CCCCCC;font-family:cr">
                                    @if(count($projectos) < 1) <tr>
                                        <td colspan="5" class="text-center">لا توجد بيانات</td>
                                        </tr>
                                        @else
                                        @foreach($projectos as $projecto)
                                        <tr id="trTable2">
                                            <td>{{$projecto->waqf_name}}</td>
                                            <td>{{ Carbon\Carbon::parse($projecto->created_at)->format('Y-m-d') }} / {{ Carbon\Carbon::parse($projecto->created_at)->format('H:i') }}</td>
                                            <td>{{$projecto->city}}</td>
                                            <td style="color:#00A490">{{$projecto->id}}</td>
                                            <td>
                                                <button dataRows2="{{$projecto->id}}" dataRows3="{{$projecto->request_id}}" class="btnRequestProjectUser2">إدارة</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                </tbody>
                                <tfoot>
                                    <td colspan="8">
                                        <div class="text-center">
                                            {{$projectos->links()}}
                                        </div>
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div><!-- row -->
            </div>
            
        </div><!-- container -->
    
    </section>
</body>

</html>