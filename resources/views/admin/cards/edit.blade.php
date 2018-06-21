@extends('admin.layouts.master')

@section('content')

    <div id="messageError"></div>
    <form data-parsley-validate novalidate method="POST" action="{{ route('cards.update', $card->id) }}"
          enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
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
                    <h4 class="header-title m-t-0 m-b-30">تعديل بطاقة  </h4>

                    <div class="form-group">
                        <label for="pass1"> نوع البطاقة*</label>
                        <select class="form-control select2" name="category_id">
                            @forelse($categories as $cat)
                            <option value="{{$cat->id}}" {{$card->category_id == $cat->id ? 'selected' : ''}}>{{$cat->name_ar}}</option>
                            @empty
                                <option value="">لا يوجد</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="userName"> الاسم باللغة العربية*</label>
                        <input type="text" name="name_ar" value="{{$card->name_ar}}" parsley-trigger="change" required
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control title"
                               id="userName">
                    </div>

                    <div class="form-group">
                        <label for="userName">الاسم باللغة الانجليزية*</label>
                        <input type="text" name="name_en" value="{{$card->name_en}}" parsley-trigger="change" required
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control title"
                               id="userName">
                    </div>

                    <div class="form-group">
                        <label for="userName">صلاحية البطاقة*</label>
                        <input type="number" min="1" name="expiration" value="{{$card->expiration}}" parsley-trigger="change" required
                               placeholder="12 شهر" class="form-control number"
                               id="userName">
                    </div>

                    <div class="form-group">
                        <label for="userName"> الوصف باللغة العربية*</label>
                        <textarea name="about_card_ar" value="{{$card->about_card_ar}}" parsley-trigger="change" required
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control"
                               id="userName"
                               data-parsley-required-message="هذا الحقل إلزامي">{{$card->about_card_ar}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="userName">الوصف باللغة الانجليزية*</label>
                        <textarea name="about_card_en" value="{{$card->about_card_en}}" parsley-trigger="change" required
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control description"
                               id="userName">{{$card->about_card_en}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="userName"> المزايا باللغة العربية*</label>
                        <textarea name="benifits_ar" value="{{$card->benifits_ar}}" parsley-trigger="change" required
                               placeholder="..." class="form-control text"
                               id="userName">{{$card->benifits_ar}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="userName">المزايا باللغة الانجليزية*</label>
                        <textarea name="benifits_en" value="{{$card->benifits_en}}" parsley-trigger="change" required
                               placeholder=" ..." class="form-control text"
                               id="userName">{{$card->benifits_en}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="userName"> السعر*</label>
                        <input type="text" name="price" value="{{$card->price}}" parsley-trigger="change" required
                               placeholder="السعر..." class="form-control"
                               id="userName"
                               data-parsley-required-message="هذا الحقل إلزامي">
                    </div>


                    <div class="form-group" id="service">
                        <label>الخدمات</label><br/>
                        @php $i = 0 ; @endphp
                        @forelse($card->cardServices  as $row)
                        <div class="row" id="row0">
                            <div class="col-lg-1"> #{{$i++}} : </div>
                            <div class="col-lg-5"><input type="text" name="service[0][name_ar]" value="{{$row->name_ar}}" class="form-control"></div>
                            <div class="col-lg-5"><input type="text" name="service[0][name_en]" value="{{$row->name_en}}" class="form-control"></div>
                            <div class="col-lg-1 removeElement" data-id="0"><i class="fa fa-remove"></i></div>
                        </div>
                        @empty
                        <div class="row" id="row0">
                            <div class="col-lg-1"> #1 : </div>
                            <div class="col-lg-5"><input type="text" name="service[0][name_ar]" class="form-control"></div>
                            <div class="col-lg-5"><input type="text" name="service[0][name_en]" class="form-control"></div>
                            <div class="col-lg-1 removeElement" data-id="0"><i class="fa fa-remove"></i></div>
                        </div>
                        @endforelse
                    </div>


                    <div class="form-group text-right m-b-0 ">
                        <button id="mydiv" data-myval="0" class="btn btn-primary waves-effect waves-light m-l-5 m-t-20">
                            إضافة خدمة</button>
                    </div>

                    <div class="form-group">
                        <label for="pass1"> الحالة*</label>
                        <select class="form-control select2" name="status">
                            <option value="1" {{$card->status == 1 ? 'selected' : ''}}>مفعل</option>
                            <option value="0" {{$card->status == 0 ? 'selected' : ''}}>معطل</option>
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
                        <input type="file" name="image" class="dropify" data-max-file-size="6M" data-default-file="{{ request()->root().'/files/cards/'.$card->image}}"/>
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
        CKEDITOR.replace( 'about_card_ar' );
        CKEDITOR.replace( 'about_card_en' );
    </script>
<script>
    $('#mydiv').on('click', function (e) {
        console.log('inas');
        e.preventDefault();
        var a = $('#mydiv').data('myval');
        var v = a + 1;
        $('#mydiv').data('myval', a + 1);

        $('#service').append('<div class="row" id="row'+v+'" data-id="row' + v + '"><div class="col-lg-1"># '+(v+1)+' : </div> <div class="col-lg-5"><input type="text" name="service[' + v + '][name_ar]" class="form-control"></div><div class="col-lg-5"><input type="text" name="service[' + v + '][name_en]" class="form-control"></div><div class="col-lg-1 removeElement" data-id="'+ v + '"><i class="fa fa-remove"></i></div></div>');
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






