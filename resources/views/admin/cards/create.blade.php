@extends('admin.layouts.master')

@section('content')

    <div id="messageError"></div>
    <form data-parsley-validate novalidate method="POST" action="{{ route('cards.store') }}"
          enctype="multipart/form-data">
    {{ csrf_field() }}

        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right m-t-15">
                    <a href="{{ route('cards.index') }}" class="btn btn-custom  waves-effect waves-light">
                        <span class="m-l-5">
                            <i class="fa fa-eye"></i> <span>عرض البطاقات</span> </span>
                    </a>
                </div>
                <h4 class="page-title"> البطاقات</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-8">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">إضافة  </h4>

                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label for="pass1"> نوع البطاقة*</label>
                        <select class="form-control select2" name="category_id">
                            @forelse($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name_ar}}</option>
                            @empty
                                <option value="">لا يوجد</option>
                            @endforelse
                        </select>

                        @if ($errors->has('category_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    

                    <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                        <label for="userName"> الاسم باللغة العربية*</label>
                        <input type="text" name="name_ar" parsley-trigger="change" required value="{{old('name_ar')}}"
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control title"
                               id="userName">
                        @if ($errors->has('name_ar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name_ar') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                        <label for="userName">الاسم باللغة الانجليزية*</label>
                        <input type="text" name="name_en" value="{{old('name_en')}}" parsley-trigger="change" required
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control title"
                               id="userName">
                        @if ($errors->has('name_en'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name_en') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('expiration') ? ' has-error' : '' }}">
                        <label for="userName">صلاحية البطاقة*</label>
                        <input type="number" min="1" name="expiration" parsley-trigger="change" required value="{{old('expiration')}}"
                               placeholder="12 شهر" class="form-control number"
                               id="userName">
                        @if ($errors->has('expiration'))
                            <span class="help-block">
                                <strong>{{ $errors->first('expiration') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('about_card_ar') ? ' has-error' : '' }}">
                        <label for="userName"> الوصف باللغة العربية*</label>
                        <textarea name="about_card_ar" parsley-trigger="change" required value="{{old('about_card_ar')}}"
                               placeholder="ادخل  وصف الخدمة..." class="form-control description"
                               id="userName"></textarea>

                        @if ($errors->has('about_card_ar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('about_card_ar') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('about_card_en') ? ' has-error' : '' }}">
                        <label for="userName">الوصف باللغة الانجليزية*</label>
                        <textarea name="about_card_en" parsley-trigger="change" required value="{{old('about_card_en')}}"
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control description"
                               id="userName"></textarea>

                        @if ($errors->has('about_card_en'))
                            <span class="help-block">
                                <strong>{{ $errors->first('about_card_en') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('benifits_ar') ? ' has-error' : '' }}">
                        <label for="userName"> المزايا باللغة العربية*</label>
                        <textarea name="benifits_ar" parsley-trigger="change" required value="{{old('benifits_ar')}}"
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control text"
                               id="userName"></textarea>

                        @if ($errors->has('benifits_ar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('benifits_ar') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('benifits_en') ? ' has-error' : '' }}">
                        <label for="userName">المزايا باللغة الانجليزية*</label>
                        <textarea name="benifits_en" parsley-trigger="change" required value="{{old('benifits_en')}}"
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control text"
                               id="userName"></textarea>

                        @if ($errors->has('benifits_en'))
                            <span class="help-block">
                                <strong>{{ $errors->first('benifits_en') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="userName"> السعر*</label>
                        <input type="text" name="price" parsley-trigger="change" required value="{{old('price')}}"
                               placeholder="السعر..." class="form-control"
                               id="userName"
                               data-parsley-required-message="هذا الحقل إلزامي">

                        @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group" id="service">
                        <label>الخدمات</label><br/>
                        <div class="row" id="row0">
                            <div class="col-lg-1"> #1 : </div>
                            <div class="col-lg-5"><input type="text" placeholder="اسم الخدمة عربى" name="service[0][name_ar]" class="form-control title" required></div>
                            <div class="col-lg-5"><input type="text" placeholder="اسم الخدمة انجليزى" name="service[0][name_en]" class="form-control title" required></div>
                            <div class="col-lg-1 removeElement" data-id="0"><i class="fa fa-remove"></i></div>
                        </div>
                    </div>


                    <div class="form-group text-right m-b-0 ">
                        <button id="mydiv" data-myval="0" class="btn btn-primary waves-effect waves-light m-l-5 m-t-20">
                            إضافة خدمة</button>
                    </div>

                    <div class="form-group">
                        <label for="pass1"> الحالة*</label>
                        <select class="form-control select2" name="status">
                            <option value="1">مفعل</option>
                            <option value="0">معطل</option>
                        </select>
                    </div>


                    <div class="form-group text-right m-b-0 ">
                        <button class="btn btn-primary waves-effect waves-light m-t-20" type="submit"> حفظ البيانات
                        </button>
                        <button onclick="window.history.back();return false;"
                                class="btn btn-default waves-effect waves-light m-l-5 m-t-20"> إلغاء
                        </button>
                    </div>

                
                </div>
            </div><!-- end col -->

             <div class="col-lg-4">
                <div class="card-box" style="overflow: hidden;">

                    <h4 class="header-title m-t-0 m-b-30">الصورة</h4>

                    <div class="form-group">
                        <input type="file" name="image" class="dropify" data-max-file-size="6M"/>
                    </div>

                </div>
            </div>

            <!-- end col -->
        </div>
        <!-- end row -->
    </form>


@endsection


@section('scripts')
    <script src="https://cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'benifits_ar' );
        CKEDITOR.replace( 'benifits_en' );
        // CKEDITOR.replace( 'about_card_ar' );
        // CKEDITOR.replace( 'about_card_en' );
    </script>
    <script>
        //$(document).ready(function () {

        //other options
        $('#mydiv').on('click', function (e) {
            console.log('inas');
            e.preventDefault();
            var a = $('#mydiv').data('myval');
            var v = a + 1;
            $('#mydiv').data('myval', a + 1);

            $('#service').append('<div class="row" id="row'+v+'" data-id="row' + v + '"><div class="col-lg-1"># '+(v+1)+' : </div> <div class="col-lg-5"><input type="text" placeholder="اسم الخدمة عربى" name="service[' + v + '][name_ar]" class="form-control title" required></div><div class="col-lg-5"><input type="text" placeholder="اسم الخدمة عربى" name="service[' + v + '][name_en]" class="form-control title" required></div><div class="col-lg-1 removeElement" data-id="'+ v + '"><i class="fa fa-remove"></i></div></div>');
        });

        $('body').on('click', '.removeElement', function () {
            var id = $(this).attr('data-id');
            console.log("#row"+id);
            //$("#row"+id).remove();
            $("#row"+id).fadeOut(1000, function () {
                $("#row"+id).remove();
            });

        });
    </script>
@endsection