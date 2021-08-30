@extends('layout_consltEvaluationPage2.app')
@section('content')
<div id="myModaConsultantProject" class="modalConsultantProject">
    <div class="modal-contentConsultantProject">
        <div class="row">
            <div class="col-md-6">
                <h3 id="pModalConsultantProject">الملفات المساعدة</h3>
            </div>
            <div class="col-md-6">
                <button class="closeConsultantProject">إغلاق</button>
            </div>
        </div>
        <br>
    <div class="login-tab-head">
        <a href=".tab1" class="htab">رفع ملفات</a>
        <a href=".tab2">تحميل ملفات</a>
    </div>
    <div class="login-tab-body">
        <div class="row tabitem btab tab1">
            <div class="col-md-8">
                <div class="files" id="files">
                    <input type="file" id="imgInpConsultant" style="width: 0px;height:0px;overflow: hidden;" name="files[]" multiple />
                    <img src="{{asset('assets/images/Group 3345.png')}}" id="imgFileUploadConsultant" style="margin-right:245px;position:relative;top:60px" width="30px" height="30px" />
                    <span id="uploadWaqfConsultant">اسحب الملفات وافلتها هنا</span>
                </div>
            </div>
            <div class="col-md-4">
            <h3 id="pModalConsultantProjectTable">الملفات المساعدة</h3>
            <ul class="ListConsultantTable-tab1 conslt-tab-scroll-tab1">
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    
                    <span>500,00kbs</span>
                </li>
                <br>
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <span>500,00kbs</span>
                </li>
                <br>
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <span>500,00kbs</span>
                </li>
                <br>
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <span>500,00kbs</span>
                </li>
                <br>
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <span>500,00kbs</span>
                </li>
                <br>
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <span>500,00kbs</span>
                </li>
            </ul>
        </div>
        </div>
        
        <div class="row tabitem tab2">
            
            <div class="btnTableConsultantDownload">
                <img class="" src="{{asset('assets/images/Group 3368.png')}}"><span class="btnTableCosnultantWord">تحميل الجميع</span>
            </div>
            <ul class="ListConsultantTable conslt-tab-scroll">
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
                <br>
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
                <br>
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
                <br>
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
                <br>
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
                <br>
                <li>
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
                <br>
                <li style="background-color:#ddd">
                    <img src="{{asset('assets/images/Group 3315.png')}}" width="20px" height="20px">&nbsp; &nbsp; &nbsp; 
                    <p>تقرير التدقيق الشرعي</p>
                    <img class="imgAfterPDownoload" src="{{asset('assets/images/Group 3398.png')}}" width="20px" height="20px">
                    <span>500,00kbs</span>
                </li>
            </ul>
        </div>
    </div>
        
    </div>
</div>
@endsection