<div class="page-header" style="-webkit-print-color-adjust: exact;">
                        <img class="imgInPrint" src="{{asset('assets/images/logo.png')}}" />
                      </div>
                      <br>
                @foreach($showFullProject as $showRequest)
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-building"></i></div>
                                            <input type="text" name="waqf_name" disabled style="background-color:white" value="{{$showRequest->ProjectoRequests->waqf_name}}" class="form-control" />
                                        </div>
                                    </div>
                            </div>
                            <br>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم صاحب الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input type="text" name="waqf_ownerName" disabled style="background-color:white" value="{{$showRequest->ProjectoRequests->waqf_ownerName}}" class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">اسم المسؤول عن الوقف</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fas fa-user-plus"></i></div>
                                            <input type="text" name="waqf_charger" disabled style="background-color:white" value="{{$showRequest->ProjectoRequests->waqf_charger}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <br>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">المدينة</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-city"></i></div>
                                            <input type="text" name="city" disabled style="background-color:white" value="{{$showRequest->ProjectoRequests->city}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">الشارع</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-street-view"></i></div>
                                            <input type="text" name="street" disabled style="background-color:white" value="{{$showRequest->ProjectoRequests->street}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <br>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">الجوال</label>
                                        <div class="input-group mb5">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input type="text" name="phone" disabled style="background-color:white;direction:ltr" value="{{$showRequest->ProjectoRequests->phone}}"  class="form-control">
                                        </div>
                                    </div>
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">وصف الوقف</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-comment"></i></div>
                                        <textarea name="desc" class="form-control" disabled style="background-color:white" rows="4" cols="50">{{$showRequest->ProjectoRequests->desc}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">مستخدم المشروع</label>
                                    <div class="input-group mb5">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" name="user_id" disabled style="background-color:white;" value="{{@App\User::find($showRequest->ProjectoRequests->user_id)->first_name}} {{@App\User::find($showRequest->ProjectoRequests->user_id)->last_name}}"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        
                            
                            <br>
                            
                            <!--<div class="row">-->
                            <!--    <div class="col-md-12">-->
                            <!--        <div class="form-group">-->
                            <!--            <label class="control-label">مدير المشروع</label>-->
                            <!--            <div class="input-group mb5">-->
                            <!--                <div class="input-group-addon"><i class="fas fa-user-edit"></i></div>-->
                            <!--                <input type="text" name="user_id" disabled style="background-color:white;" value="{{@App\Project::find($showRequest->project_id)->first_name}} {{@App\Project::find($showRequest->project_id)->last_name}}"  class="form-control">-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            @endforeach
                            <br>
                            <br>
                            <hr>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach($standardsPillarsUsed as $getRequirementArray)
                                    <div style="border:1px solid #f3f1f1;">
                                        <h4 style="color:#727677;position:relative;right:20px;padding:10px">الركن: {{$getRequirementArray->name}}</h4>
                                        
                                    </div>
                                    <hr>
                                    <table class="table table-bordered table-project-manager4">
                                        <thead>
                                            <tr>
                                              <th width="20%">المعيار</th>
                                              <th width="30%">المتطلب</th>
                                              <th width="10%">التكرار السنوي</th>
                                              <th width="10%">القيمة المستهدفة</th>
                                              <th width="10%">نتيجة التدقيق</th>
                                              <th width="50%">التوافق</th>
                                            </tr>
                                        </thead>
                                      <tbody>
                                          @foreach($getRequirementArray->ProjectResultsWithItsPillar as $getRequirement)
                                            <tr>
                                                <td>{{$getRequirement->standard}}</td>
                                                <td>{{$getRequirement->requirement}}</td>
                                                <td>{{$getRequirement->annual_frequency}}</td>
                                                @if($getRequirement->target_value_type == 1)
                                                <td>%{{$getRequirement->target_value}}</td>
                                                <td>%{{$getRequirement->audit_result}}</td>
                                                @if($getRequirement->likes == 0)
                                                <td class="inResponsive">
                                                    <i class="fa fa-check-circle fa-2x img1-project-manager4" style="color: #1BA590;"></i>
                                                    <p class="PInproj1detect">مطابق</p>
                                                    <p class="p1detect">حجم الفجوة :{{$getRequirement->gap_size == 'null' ? 'لا يوجد' : $getRequirement->gap_size}}%</p>
                                                </td>
                                                @else
                                                <td class="inResponsive">
                                                    <i class="fa fa-times-circle fa-2x img1-project-manager4" style="color: #e1215d;"></i>
                                                    <p class="PInproj1detect">غير مطابق</p>
                                                    <p class="p1detect">حجم الفجوة :{{$getRequirement->gap_size == 'null' ? 'لا يوجد' : $getRequirement->gap_size}}%</p>
                                                </td>
                                                @endif
                                                @else
                                                <td>{{$getRequirement->target_value}}</td>
                                                <td>{{$getRequirement->audit_result}}</td>
                                                @if($getRequirement->likes == 0)
                                                <td class="inResponsive">
                                                    <i class="fa fa-check-circle fa-2x img1-project-manager4" style="color: #1BA590;"></i>
                                                    <p class="PInproj1detect">مطابق</p>
                                                    <p class="p1detect">حجم الفجوة :{{$getRequirement->gap_size == 'null' ? 'لا يوجد' : $getRequirement->gap_size}}</p>
                                                </td>
                                                @else
                                                <td class="inResponsive">
                                                    <i class="fa fa-times-circle fa-2x img1-project-manager4" style="color: #e1215d;"></i>
                                                    <p class="PInproj1detect">غير مطابق</p>
                                                    <p class="p1detect">حجم الفجوة :{{$getRequirement->gap_size == 'null' ? 'لا يوجد' : $getRequirement->gap_size}}</p>
                                                </td>
                                                @endif
                                                @endif
                                            </tr>
                                          @endforeach
                                      </tbody>
                                    </table>
                                    @endforeach
                                </div>
                            </div>
                            </div>