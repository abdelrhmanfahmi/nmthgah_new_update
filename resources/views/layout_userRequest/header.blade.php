<!doctype html>

<head>

</head>

<body>


    <section class="login-page">
        <div class="container">
            <nav>
                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                    <a id="mainPages3" href="/home"><i style="margin-left:10px;" class="fa fa-home"></i> الرئيسية </a>
                    <a id="logout3" href="{{route('user.logout')}}">تسجيل خروج <i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
            </nav>
            <div class="loginco">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="index-form">
                            <h3 class=index-title>متابعة المشاريع</h3>
                            <table class="table table-hover tableProjectUser">
                                <thead style="color:#919191;font-family:cr;">
                                    <tr>
                                        <th>الاسم</th>
                                        <th>المالك</th>
                                        <th>المدينة</th>
                                        <th>الرقم</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="col text-center" style="color:#CCCCCC;font-family:cr">
                                    @if(count($requests) < 1) <tr>
                                        <td colspan="5" class="text-center">لا توجد بيانات</td>
                                        </tr>
                                        @else
                                        @foreach($requests as $request)
                                        <tr id="trTable">
                                            <td>{{$request->waqf_name}}</td>
                                            <td>{{$request->waqf_ownerName}}</td>
                                            <td>{{$request->city}}</td>
                                            <td style="color:#00A490">{{$request->id}}</td>
                                            <td>
                                                <button dataRows="{{$request->id}}" class="btnRequestProjectUser">التفاصيل</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                </tbody>
                                <tfoot>
                                    <td colspan="8">
                                        <div class="text-center">
                                            {{$requests->links()}}
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