        <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{ route('admin.home') }}" class="logo"><span>جد<span>ير</span></span><i class="zmdi zmdi-layers"></i></a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Page title -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left">
                                    <i class="zmdi zmdi-menu"></i>
                                </button>
                            </li>
                            <li>
                                <h4 class="page-title">@yield('page_title')</h4>
                            </li>
                        </ul>

                        <!-- Right(Notification and Searchbox -->
                        <!-- <ul class="nav navbar-nav navbar-right">
                            <li>
                                <div class="notification-box">
                                    <ul class="list-inline m-b-0">
                                        <li>
                                            <a href="javascript:void(0);" class="right-bar-toggle">
                                                <i class="zmdi zmdi-notifications-none"></i>
                                            </a>
                                            <div class="noti-dot">
                                                <span class="dot"></span>
                                                <span class="pulse"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="hidden-xs">
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>
                        </ul> -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->

 <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!-- User -->
                    <div class="user-box">
                        <div class="user-img">
                            <a href="{{ route('users.profile',['id'=>auth()->user()->id]) }}">
                            <img src="{{ url('files/users/' . auth()->user()->image) }}" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive"></a>
                            <div class="user-status online"><i class="zmdi zmdi-dot-circle"></i></div>
                        </div>
                        <h5><a href="#">سند أعمالك</a> </h5>
                        <ul class="list-inline">
                            <li>
                                <a href="{{ route('users.editProfile',['id'=>auth()->user()->id]) }}">
                                    <i class="zmdi zmdi-settings"></i>
                                </a>
                            </li>

                            <li>
                                <a class="text-custom" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="zmdi zmdi-power"></i>
                                </a>

                                <form id="logout-form" action="{{ route('administrator.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                
                            </li>
                        </ul>
                    </div>
                    <!-- End User -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                            <!-- <li class="text-muted menu-title">Navigation</li> -->

                            <li>
                                <a href="{{ route('admin.home') }}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> الرئيسية (الاحصائيات العامة) </span> </a>
                            </li>

                            <!-- <li>
                                <a href="typography.html" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i> <span> Typography </span> </a>
                            </li> -->

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-invert-colors"></i> <span> مستخدمى التطبيق </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('users.teachers')}}">المعلمين</a></li>
                                    <li><a href="{{route('users.students')}}">الطلاب</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-invert-colors"></i> <span> إدارة التطبيق </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('users.index') }}">مدير النظام</a></li>
                                    <li><a href="{{ route('roles.index') }}">الصلاحيات والمهام</a></li>
                                    <!-- <li><a href="{{ route('users.suspended_admins') }}">مديرى التطبيق المعطلين</a></li> -->
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span> إدارة المحتوى </span><span class="menu-arrow"></span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="form-elements.html"><span class="label label-warning pull-right">7</span>الدعم الفنى</a></li>
                                    <li><a href="form-advanced.html">عن التطبيق</a></li>
                                    <li><a href="form-validation.html">بنود الاستخدام</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-view-list"></i> <span> التواصل مع التطبيق </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="tables-basic.html">الإشعارات</a></li>
                                    <li><a href="tables-datatable.html">رسائل تواصل معنا</a></li>
                                    
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-chart"></i><span> الإعدادات </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="chart-flot.html">المدن</a></li>
                                    <li><a href="chart-morris.html">الأحياء</a></li>
                                    <li><a href="chart-chartist.html">المراحل الدراسية</a></li>
                                    <li><a href="chart-chartjs.html">المواد الدراسية</a></li>
                                    <li><a href="chart-other.html">الحسابات البنكية</a></li>
                                </ul>
                            </li>

                            <!-- <li>
                                <a href="calendar.html" class="waves-effect"><i class="zmdi zmdi-calendar"></i><span> التقاارير </span></a>
                            </li>

                            <li>
                                <a href="inbox.html" class="waves-effect"><i class="zmdi zmdi-email"></i><span class="label label-purple pull-right">New</span><span> Mail </span></a>
                            </li> -->

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-item"></i><span> التقارير </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="page-starter.html">تقارير المعلمين</a></li>
                                    <li><a href="page-login.html">تقارير الطلاب</a></li>
                                    <li><a href="page-register.html">تقارير الطلبات</a></li>
                                 
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->