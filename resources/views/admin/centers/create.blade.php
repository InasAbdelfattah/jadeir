@extends('admin.layouts.master')

@section('content')

    <div id="messageError"></div>
    <form id="centerForm" data-parsley-validate novalidate method="POST" action="{{ route('centers.store') }}"
          enctype="multipart/form-data">
    {{ csrf_field() }}

        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right m-t-15">
                    <a href="{{ route('centers.index') }}" class="btn btn-custom  waves-effect waves-light">
                        <span class="m-l-5">
                            <i class="fa fa-eye"></i> <span>عرض المراكز</span> </span>
                    </a>
                </div>
                <h4 class="page-title"> المراكز</h4>
            </div>
        </div>

<!-- `name_ar`, `name_en`, `description_en`, `description_ar`, `area_id`, `city_id`, `photo`, `lat`, `lng`, `address`, `phone`, `email -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">إضافة  </h4>

                    <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                        <label for="userName"> الاسم باللغة العربية*</label>
                        <input type="text" name="name_ar" value="{{old('name_ar')}}" parsley-trigger="change" required
                               placeholder="  ادخل اسم المركز عربى..." class="form-control title"
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
                               placeholder="ادخل اسم المركز انجليزى..." class="form-control title"
                               id="userName">

                        @if ($errors->has('name_en'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name_en') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description_ar') ? ' has-error' : '' }}">
                        <label for="userName"> الوصف باللغة العربية*</label>
                        <textarea name="description_ar" value="{{old('description_ar')}}" parsley-trigger="change" required
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control description"
                               id="userName"></textarea>

                        @if ($errors->has('description_ar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description_ar') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description_en') ? ' has-error' : '' }}">
                        <label for="userName">الوصف باللغة الانجليزية*</label>
                        <textarea name="description_en" value="{{old('description_en')}}" parsley-trigger="change" required
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control description"
                               id="userName"></textarea>

                        @if ($errors->has('description_en'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description_en') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="userPhone"> الهاتف*</label>
                        <input type="text" name="phone" value="{{old('phone')}}" parsley-trigger="change" required
                               placeholder="الهاتف... "
                               class="form-control" data-limit="10" data-message="رقم الهاتف غير صالح" maxlength="25"  data-parsley-required-message:"هذا الحقل إلزامي"/>
                               <span class="phone errorValidation"></span>

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email"> البريد الالكترونى*</label>
                        <input type="email" name="email" value="{{old('email')}}" parsley-trigger="change" required
                               placeholder="البريد الالكترونى..." class="form-control email"
                               id="userName">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }}">
                        <label for="pass1"> المنطقة الرئيسية*</label>
                        <select class="form-control select2" name="area_id" id="area_id" required data-parsley-required-message="هذا الحقل إلزامي">
                            <option value="">برجاء اختيار المنطقة الرئيسية</option>
                            @forelse($areas as $area)
                            <option value="{{$area->id}}">{{$area->name_ar}}</option>
                            @empty
                                <option value="">لا يوجد</option>
                            @endforelse
                        </select>

                        @if ($errors->has('area_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('area_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                        <label for="pass1"> المنطقة الفرعية*</label>
                        <select class="form-control select2" name="city_id" id="city_id" required data-parsley-required-message="هذا الحقل إلزامي">
                            <option value="">برجاء اختيار المنطقة الفرعية</option>
                        </select>
                        @if ($errors->has('city_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>العنوان على الخريطة</label>
                        <div id="us3" style="width: 100%; height: 400px;"></div>
                    </div>
                        
                    <!-- Start lng and lat -->
                    <div class="m-t-small">
                        <input type="hidden" name="lat" class="form-control" id="us3-lat" />
                        <input type="hidden" name="lng" class="form-control" id="us3-lon" />
                        <input type="text" name="address" class="form-control" id="us3-address"/>

                    </div>
                    <!-- End /lng and lat -->




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
    <!--<div class="row">-->
        <!--  assign cards for the center -->

    <!--    <div class="col-lg-8">-->
    <!--        <div class="card-box">-->
    <!--            <h4 class="header-title m-t-0 m-b-30">بطاقات المركز</h4>-->
    <!--            <form id="serviceForm" method="post" action="{{route('center.setSession')}}">-->
    <!--                {{csrf_field()}}-->
    <!--                @if( Session::has('centerId'))-->
    <!--                    <input type="hidden" name="center_id" value="{{ Session::get('centerId')}}">-->
    <!--                @endif-->

    <!--                <div id="cat" class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">-->
    <!--                    <label for="pass1"> نوع البطاقة*</label>-->
    <!--                    <select class="form-control select2" name="category_id" id="category_id">-->
    <!--                        <option value="">برجاء اختيار نوع البطاقة</option>-->
    <!--                        @forelse($categories as $cat)-->
    <!--                            <option value="{{$cat->id}}">{{$cat->name_ar}}</option>-->
    <!--                        @empty-->
    <!--                            <option value="">لا يوجد</option>-->
    <!--                        @endforelse-->
    <!--                    </select>-->

    <!--                    @if ($errors->has('category_id'))-->
    <!--                        <span class="help-block">-->
    <!--                            <strong>{{ $errors->first('category_id') }}</strong>-->
    <!--                        </span>-->
    <!--                    @endif-->
    <!--                </div>-->

    <!--                <div class="form-group">-->
    <!--                    <label for="pass1"> البطاقة*</label>-->
    <!--                    <select class="form-control select2" name="card_id" id="card_id">-->
    <!--                        <option value="">برجاء اختيار بطاقة</option>-->
    <!--                    </select>-->
    <!--                </div>-->

    <!--                <div class="form-group" id="service_id">-->
    <!--                    <label>الخدمات</label><br/>-->
                        <!-- <div class="row" id="row0">
    <!--                        <div class="col-lg-1"> #1 : </div>-->
    <!--                        <div class="col-lg-8"><input type="text" name="service[0][serviceId]" class="form-control"></div>-->
    <!--                        <div class="col-lg-3"><input type="text" name="service[0][servicePrice]" class="form-control"></div>-->
    <!--                        <div class="col-lg-1 removeElement" data-id="0"><i class="fa fa-remove"></i></div>-->
    <!--                    </div> -->-->
    <!--                </div>-->


    <!--                <div class="form-group text-right m-b-0 ">-->
    <!--                    <button type="submit" id="mydiv" data-myval="0" class="btn btn-primary waves-effect waves-light m-l-5 m-t-20"><i class="fa fa-plus"></i></button>-->
    <!--                </div>-->
    <!--            </form>-->

    <!--            <div class="form-group" id="service">-->
    <!--            </div>-->

    <!--            <table class="table">-->
                    <!--<thead>-->
                    <!--<tr>-->
                    <!--    <th>نوع البطاقة</th>-->
                    <!--    <th>اسم البطاقة</th>-->
                    <!--    <th>السعر</th>-->
                    <!--</tr>-->
                    <!--</thead>-->
    <!--                <tbody id="cardRowTr">-->
                    
    <!--                </tbody>-->
    <!--            </table>-->

    <!--        </div>-->


    <!--    </div>-->


    <!--</div>-->



@endsection


@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7KdiLJqJUujYu0PAv5tMS-0YN6dP5LvM&language=ar&region=EG&libraries=places"></script>
    <script src="{{ request()->root() }}/assets/admin/js/locationpicker.jquery.min.js"></script>

    <!--<script src="https://cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>-->
    <script>
        // CKEDITOR.replace( 'description_ar' );
        // CKEDITOR.replace( 'description_en' );
        //$(document).ready(function () {

        getAjaxData('#area_id', '#city_id', '{{ request()->root() }}/ajax-city-data', 'area_id');
        getAjaxData('#category_id', '#card_id', '{{ request()->root() }}/ajax-card-data', 'category_id');

    $(document).ready(function () {
            
            // Google map
  
            function updateControls(addressComponents) {
                $('#us5-city').val(addressComponents.city);
            }

            function initialize() {
            $('#us3').locationpicker({
                location: {
                    latitude: 24.720584598721032,
                    longitude: 46.67315673828125,
                },
                radius: 300,
                inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lon'),
                    locationNameInput: $('#us3-address')
                },
                enableAutocomplete: true,
            });
        }
        google.maps.event.addDomListener(window, "load", initialize);

        //get services of card

        $("#card_id").change(function(){

            $("#service_id").html('');

            var id = $(this).val();
            var url = '{{ request()->root() }}/ajax-card-service-data';

            $.ajax({

                method : 'GET',
                url : url + '/' + id + '/card_id/' ,
                cache : false

            }).success(function(data) {

                var json = JSON.parse(data)
                var v =  0 ;
                console.log(data);
                
                $("#service_id").append('<label>خدمات البطاقة</label');

                $.each(json, function(key, val) {

                    $("#service_id").append('<div class="row" id="row'+v+'" data-id="row' + v + '"><div class="col-lg-1"># '+(v+1)+' : </div> <div class="col-lg-6"><input type="hidden" name="service[' + v + '][id]" value="'+ val.id +'"><input type="text" name="service[' + v + '][name]" readonly value = "'+ val.name +'" class="form-control"></div><div class="col-lg-5"><input type="number" min="0" placeholder="أدخل سعر الخدمة" name="service[' + v + '][price]" class="form-control" required data-parsley-required-message="هذا الحقل الزامى"></div></div>');
                    v++;
                });

            }).error(function(data) {

                console.log(data);

            });

        });


        //$('form#serviceForm').on('submit', function (e) {
            $( document ).on( "submit", "form#serviceForm", function(e) {
            e.preventDefault();

            //var id = $(this).attr('data-id');

            //var $tr = $($('#currentRowOn' + id)).closest($('#currentRow' + id).parent().parent());

            // console.log($tr);

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                    if (data.status == true) {
                        console.log(data);

                        var shortCutFunction = 'success';
                        var msg = data.message;
                        var title = 'نجاح';
                        toastr.options = {
                            positionClass: 'toast-top-center',
                            onclick: null,
                            showMethod: 'slideDown',
                            hideMethod: "slideUp",

                        };
                        var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                        $toastlast = $toast;
                        Custombox.close();
                        $("#service_id").html('');
                        $("#card_id").html('');
                        var a = $('#mydiv').data('myval');
                        var v = a + 1;
                        $('#mydiv').data('myval', a + 1);
                        $('#service').append('<div class="row" id="row'+v+'" data-id="row' + v + '"><div class="col-lg-1"># '+(v+1)+' : </div> <div class="col-lg-5"><input type="text" readonly name="service[' + v + '][cat_id]" value="'+data.category+'" class="form-control"></div><div class="col-lg-5"><input type="text" readonly name="service[' + v + '][card_id]" value="'+data.card+'" class="form-control"></div><div class="col-lg-1 removeElement" data-id="'+ v + '"><i class="fa fa-remove"></i></div></div>');

                        $("#cardRowTr").append('<tr><td>'+data.category+'</td><td>'+data.card+'</td><td></td></tr>');

                    }

                    if (data.status == false) {
                        var shortCutFunction = 'error';
                        var msg = data.message;
                        var title = 'خطأ';
                        toastr.options = {
                            positionClass: 'toast-top-center',
                            onclick: null,
                            showMethod: 'slideDown',
                            hideMethod: "slideUp",

                        };
                        var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                        $toastlast = $toast;
                    }
                },
                error: function (data) {

                }
            });
        });

    });

    </script>
@endsection
