@extends('admin.layouts.master')
@section('title', 'الصفحة الرئيسية')

@section('content')


    @if(auth()->user()->can('statistics_manage'))

        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <!-- <div class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div> -->

                    <h4 class="header-title m-t-0 m-b-30">عدد الطلاب المسجلين بالتطبيق</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <span class="badge badge-success pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                            <h2 class="m-b-0"> 158 </h2>
                            <p class="text-muted m-b-25">عدد الطلاب المسجلين بالتطبيق</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 77%;">
                                <span class="sr-only">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <!-- <div class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div> -->

                    <h4 class="header-title m-t-0 m-b-30">عدد المعلمين المسجلين بالتطبيق</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <span class="badge badge-success pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                            <h2 class="m-b-0"> 8451 </h2>
                            <p class="text-muted m-b-25">عدد المعلمين المسجلين بالتطبيق</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 77%;">
                                <span class="sr-only">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <!-- <div class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div> -->

                    <h4 class="header-title m-t-0 m-b-30">عدد الطلبات المعلقة بالتطبيق</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <span class="badge badge-success pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                            <h2 class="m-b-0"> 158 </h2>
                            <p class="text-muted m-b-25">عدد الطلبات المعلقة بالتطبيق</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 77%;">
                                <span class="sr-only">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <!-- <div class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div> -->

                    <h4 class="header-title m-t-0 m-b-30">عدد الطلبات الملغاة فى التطبيق</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <span class="badge badge-success pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                            <h2 class="m-b-0"> 158 </h2>
                            <p class="text-muted m-b-25">عدد الطلبات الملغاة فى التطبيق</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 77%;">
                                <span class="sr-only">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->


            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <!-- <div class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div> -->

                    <h4 class="header-title m-t-0 m-b-30">عدد الطلبات المرفوضة بالتطبيق</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <span class="badge badge-success pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                            <h2 class="m-b-0"> 158 </h2>
                            <p class="text-muted m-b-25">عدد الطلبات المرفوضة بالتطبيق</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 77%;">
                                <span class="sr-only">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <!-- <div class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div> -->

                    <h4 class="header-title m-t-0 m-b-30">عدد الطلبات المكتملة بالتطبيق</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <span class="badge badge-success pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                            <h2 class="m-b-0"> 8451 </h2>
                            <p class="text-muted m-b-25">عدد الطلبات المكتملة بالتطبيق</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 77%;">
                                <span class="sr-only">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <!-- <div class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div> -->

                    <h4 class="header-title m-t-0 m-b-30">عدد المعلمين المتاحين بالتطبيق</h4>

                     <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <span class="badge badge-success pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                            <h2 class="m-b-0"> 158 </h2>
                            <p class="text-muted m-b-25">عدد المعلمين المتاحين بالتطبيق</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 77%;">
                                <span class="sr-only">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6">
                <div class="card-box">

                    <h4 class="header-title m-t-0 m-b-30">عدد رسائل تواصل معنا المقرؤة</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <span class="badge badge-success pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                            <h2 class="m-b-0"> 158 </h2>
                            <p class="text-muted m-b-25">عدد رسائل تواصل معنا المقرؤة</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 77%;">
                                <span class="sr-only">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-3 col-md-6">
                <div class="card-box">
                    <!-- <div class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div> -->

                    <h4 class="header-title m-t-0 m-b-30">عدد رسائل تواصل معنا الغير مقرؤة</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2">
                            <span class="badge badge-success pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                            <h2 class="m-b-0"> 158 </h2>
                            <p class="text-muted m-b-25">عدد رسائل تواصل معنا الغير مقرؤة</p>
                        </div>
                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 77%;">
                                <span class="sr-only">77% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->

       



    
    @else

        <div class="alert alert-info fade in">

            <strong>مرحباً بك!</strong>
            <b style="color: #000;">{{ auth()->user()->name }}</b>
            لوحة تحكم جدير
            </a>

        </div>



    @endif


@endsection
