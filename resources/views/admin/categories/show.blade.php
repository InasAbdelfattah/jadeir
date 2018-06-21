@extends('admin.layouts.master')

@section('content')

    <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right m-t-15">
                    <a href="{{ route('categories.index') }}" class="btn btn-custom  waves-effect waves-light">
                        <span class="m-l-5">
                            <i class="fa fa-eye"></i> <span>عرض أنواع البطاقات</span> </span>
                    </a>
                </div>
                <h4 class="page-title">أنواع البطاقات</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-8">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">عرض نوع بطاقة</h4>

                    <div class="form-group">
                        <label for="userName"> الاسم باللغة العربية*</label>
                        <input type="text" name="name_ar" readonly value="{{ $category->name_ar or old('name_ar') }}" parsley-trigger="change" required class="form-control"
                               id="userName" data-parsley-required-message="هذا الحقل إلزامي">
                    </div>

                    <div class="form-group">
                        <label for="userName">الاسم باللغة الانجليزية*</label>
                        <input type="text" name="name_en" readonly value="{{ $category->name_en or old('name_en') }}" parsley-trigger="change" required
                               class="form-control"
                               id="userName"
                               data-parsley-required-message="هذا الحقل إلزامي">
                    </div>
                

                    <div class="form-group">
                        <label for="pass1">الحالة : </label>
                        {{$category->status == 1 ? 'مفعل' : 'معطل'}}
                        
                    </div>

                    

                </div>
            </div><!-- end col -->

            <!-- <div class="col-lg-4">
                <div class="card-box" style="overflow: hidden;">

                    <h4 class="header-title m-t-0 m-b-30">الصورة</h4>

                    <div class="form-group">
                        <input type="file" name="image" data-default-file="{{ $category->image }}" class="dropify"
                               data-max-file-size="6M"/>
                    </div>

                </div>
            </div> -->
        </div>
        <!-- end row -->


@endsection






