@extends('admin.layouts.master')
@section('title', 'بيانات المنطقة الفرعية')
@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                    <a href="{{ route('districts.index') }}" type="button" class="btn btn-custom waves-effect waves-light"
                       aria-expanded="false"> مشاهدة جميع المناطق الفرعية
                        <span class="m-l-5">
                        <i class="fa fa-backward"></i>
                    </span>
                    </a>

                </div>
            <h4 class="page-title">بيانات المنطقة الفرعية</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">بيانات المنطقة الفرعية</h4>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="userName">الاسم باللغة العربية</label>
                            <p>{{ $city->name_ar }}</p>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="userName">الاسم باللغة الانجليزية</label>
                            <p>{{ $city->name_en }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="userPhone">الوصف باللغة العربية</label>
                            <p>{!! $city->description_ar !!}</p>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="userPhone">الوصف باللغة الانجليزية</label>
                            <p>{!! $city->description_en !!}</p>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="pass1">المنطقة الرئيسية</label>
                            <p>{{ $city->city()->first() ? $city->city()->first()->name_ar : ''}}</p>

                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="pass1">حالة التفعيل*</label>
                            <p>{{$city->status == 1 ? 'مفعل' : 'معطل'}}</p>

                        </div>
                    </div>
                </div>

            </div>

        </div><!-- end col -->

    </div>
    <!-- end row -->

@endsection
