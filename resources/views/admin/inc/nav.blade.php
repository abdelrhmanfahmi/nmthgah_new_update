<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{asset('assets/images/logo3.png')}}" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a  style="color:goldenrod" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
              حسابى <span class="caret"></span></a>
                <div  class="dropdown-menu animated flipInY">
                    <div class="dropdown-divider"></div> <a href="{{route('admin.logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> تسجيل خروج</a>
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" style="color:goldenrod; ">
            <ul id="sidebarnav" style="color:goldenrod;" >
                <li class="nav-small-cap"></li>
                <li>
                    <a class="has-arrow" href="https://nmthgah.com" target="_blank" aria-expanded="false"><i class="mdi mdi-star"></i><span class="hide-menu"> زيارة الموقع </a>
                </li>
                <li>
                    <a class="has-arrow" href="https://nmthgah.com/admin" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu"> الرئيسية </a>
                </li>
                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu"> اعدادات الموقع </a>
                    <ul aria-expanded="false" class="collapse">
                      <li><a class="" href="{{route('settings.index')}}"> اعدادات رئيسية </a></li>
                      <!--<li><a class="" href="{{route('contactsAdmin.index')}}"> الروابط الاجتماعية </a></li>-->
                      <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-briefcase"></i>&nbsp; &nbsp; <span class="hide-menu">مجالات أعمالنا</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('services.index')}}">مجالات أعمالنا</a></li>
                        <li><a href="{{route('services.create')}}">إضافة مجالات أعمالنا</a></li>
                    </ul>
                </li>
                
                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-check"></i>&nbsp; &nbsp;<span class="hide-menu">قيمنا</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('values.index')}}">القيم</a></li>
                        <li><a href="{{route('values.create')}}">إضافة قيم</a></li>
                    </ul>
                </li>

                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-i-cursor"></i>&nbsp; &nbsp;<span class="hide-menu">الخدمات</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('indicator.index')}}">الخدمات</a></li>
                        <li><a href="{{route('indicator.create')}}">إضافة خدمات</a></li>
                    </ul>
                </li>

                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account-settings">&nbsp; &nbsp;</i><span class="hide-menu">فريق العمل</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('teams.index')}}">فريق العمل</a></li>
                        <li><a href="{{route('teams.create')}}">إضافة فريق العمل</a></li>
                    </ul>
                </li>

                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account-settings">&nbsp; &nbsp;</i><span class="hide-menu">الشركاء</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('partners.index')}}">الشركاء</a></li>
                        <li><a href="{{route('partners.create')}}">إضافة الشركاء</a></li>
                    </ul>
                </li>
                
                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account-settings">&nbsp; &nbsp;</i><span class="hide-menu">العملاء</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('agents.index')}}">العملاء</a></li>
                        <li><a href="{{route('agents.create')}}">إضافة العملاء</a></li>
                    </ul>
                </li>
                    </ul>
                </li>
                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-message"></i><span class="hide-menu"> الرسائل </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('messages.index')}}" class="">الرسائل</a></li>
                    </ul>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap"></li>
                
                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account-star"></i><span class="hide-menu"> المديرين </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('admin.show')}}" class=""> المديرين</a></li>
                        <li><a href="{{route('admin.create')}}"> اضافة جديد </a></li>
                    </ul>
                </li>

                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu"> المستخدمين </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('users.index')}}"> المستخدمين </a></li>
                        <li><a href="{{route('users.create')}}"> اضافة جديد </a></li>
                    </ul>
                </li>

                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account-settings"></i><span class="hide-menu"> المستشاريين </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('consultants.index')}}"> المستشاريين </a></li>
                        <li><a href="{{route('consultants.create')}}"> اضافة جديد </a></li>
                    </ul>
                </li>
                
                
                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-account-star"></i><span class="hide-menu"> مدير المشروع </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('projects.index')}}"> مدير المشروع </a></li>
                        <li><a href="{{route('projects.create')}}"> اضافة جديد </a></li>
                    </ul>
                </li>

                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-tooltip"></i><span class="hide-menu">الطلبات</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('requests.index')}}">الطلبات</a></li>
                        <li><a href="{{route('requests.create')}}"> اضافة طلب جديد </a></li>
                    </ul>
                </li>
                
                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-folder"></i><span class="hide-menu">المشاريع</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('projectos.index')}}">المشاريع</a></li>
                        <li><a href="{{route('finishedProjects.index')}}">المشاريع المنتهية</a></li>
                        <li><a href="{{route('projectos.create')}}"> اضافة مشروع جديد </a></li>
                    </ul>
                </li>

                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-pillar"></i><span class="hide-menu">الاركان</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('pillar.index')}}">الركن</a></li>
                        <li><a href="{{route('pillar.create')}}"> اضافة جديد </a></li>
                    </ul>
                </li>

                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-book-open"></i><span class="hide-menu">معايير الاركان</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('stand_pillars.index')}}">معيار الركن</a></li>
                        <li><a href="{{route('stand_pillars.create')}}"> اضافة جديد </a></li>
                    </ul>
                </li>

                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-note-outline"></i><span class="hide-menu">متطلبات معايير الاركان</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('req_stand_pillars.index')}}">متطلب معيار الركن</a></li>
                        <li><a href="{{route('req_stand_pillars.create')}}"> اضافة جديد </a></li>
                    </ul>
                </li>
                
                <li class="nav-devider"></li>
                
                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-i-cursor"></i>&nbsp; &nbsp;<span class="hide-menu">التقييم الذاتي</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('evaluate.index')}}">الأسئلة</a></li>
                        <li><a href="{{route('result.index')}}">تقييمات المستخدمين</a></li>
                        <li><a href="{{route('evaluate.create')}}">إضافة أسئلة التقييم</a></li>
                    </ul>
                </li>
                
                <li class="nav-devider"></li>
                
                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-building"></i>&nbsp; &nbsp;<span class="hide-menu">خدمة التأسيس المعياري</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('establish.index')}}">التأسيس المعياري</a></li>
                        <!--<li><a href="{{route('establish.create')}}"> إضافة التأسيس المعياري</a></li>-->
                    </ul>
                </li>
                
                <li class="nav-devider"></li>
                
                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-question-circle"></i>&nbsp; &nbsp;<span class="hide-menu">خدمة الاستشارة الإدارية</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('consulManag.index')}}">الاستشارة الإدارية</a></li>
                        <!--<li><a href="{{route('consulManag.create')}}">إضافة الاستشارة الإدارية</a></li>-->
                        <li><a href="{{route('typesConsul.index')}}">أنواع الاستشارة الاستشارية</a></li>
                        <li><a href="{{route('typesConsul.create')}}">إضافة نوع الاستشارة الاستشارية</a></li>
                    </ul>
                </li>
                
                <li class="nav-devider"></li>
                
                <li class="">
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-folder-account"></i><span class="hide-menu">الدورات</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('courses.index')}}">الدورات</a></li>
                        <li><a href="{{route('courses.create')}}">إضافة الدورات</a></li>
                        <li><a href="{{route('courses.saved')}}">الدورات المستلمة</a></li>
                        <li><a href="{{route('courses.paid')}}">الدورات المؤكدة</a></li>
                    </ul>
                </li>


                <li >
                  <a  href="#" aria-expanded="false"><i class="mdi"></i><span class="hide-menu"> <span class="label "></span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li></li>
                    </ul>
                </li>
                <li >
                    <a  href="#" aria-expanded="false"><i class="mdi"></i><span class="hide-menu"> <span class="label "></span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li></li>
                    </ul>
                </li>
                <li >
                    <a  href="#" aria-expanded="false"><i class="mdi"></i><span class="hide-menu"> <span class="label "></span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
        <!-- item-->
        <a href="{{route('settings.index')}}" class="link" data-toggle="tooltip" title="اعدادات الموقع"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="{{route('admin.logout')}}" class="link" data-toggle="tooltip" title="تسجيل خروج"><i class="mdi mdi-power"></i></a>
    </div>
    <!-- End Bottom points-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
