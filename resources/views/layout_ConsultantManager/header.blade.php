<!doctype html>

<head>

</head>

<body>


    <section class="login-page">
        <div class="container">
            <nav>
                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                    <a id="mainPages5" href="/consultant"><i style="margin-left:10px;" class="fa fa-home"></i> الرئيسية </a>
                    <a id="logout5" href="{{route('consultant.logout')}}">تسجيل خروج <i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            </nav>
            <div class="loginco">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="indexConsultant-form">
                            <h3 class=indexConsultant-title>المشاريع</h3>
                            <table class="table table-hover tableProjectUser3">
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
                                        @if(count($consultantos) < 1) <tr>
                                        <td colspan="5" class="text-center">لا توجد بيانات</td>
                                        </tr>
                                        @else
                                        
                                        @foreach($consultantos as $consultanto)
                                        <tr id="trTable3">
                                            <td>{{$consultanto->waqf_name}}</td>
                                            <td>{{ Carbon\Carbon::parse($consultanto->created_at)->format('Y-m-d') }} / {{ Carbon\Carbon::parse($consultanto->created_at)->format('H:i') }}</td>
                                            <td>{{$consultanto->city}}</td>
                                            <td style="color:#00A490">{{$consultanto->ProjectID}}</td>
                                            <td>
                                                <button dataRows3="{{$consultanto->id}}" class="btnRequestProjectUser3">تقييم</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                </tbody>
                                <tfoot>
                                    <td colspan="8">
                                        <div class="text-center">
                                            {{$consultantos->links()}}
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