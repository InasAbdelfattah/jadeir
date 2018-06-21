@extends('admin.layouts.master')

@section('content')

    <div id="messageError"></div>
    <form data-parsley-validate novalidate method="POST" action="{{ route('centers.update', $center->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

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
                    <h4 class="header-title m-t-0 m-b-30">تعديل المركز</h4>

                    <div class="form-group">
                        <label for="userName"> الاسم باللغة العربية*</label>
                        <input type="text" name="name_ar" value="{{$center->name_ar}}" parsley-trigger="change" required
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control"
                               id="userName"
                               data-parsley-required-message="هذا الحقل إلزامي">
                    </div>

                    <div class="form-group">
                        <label for="userName">الاسم باللغة الانجليزية*</label>
                        <input type="text" name="name_en" value="{{$center->name_en}}" parsley-trigger="change" required
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control"
                               id="userName"
                               data-parsley-required-message="هذا الحقل إلزامي">
                    </div>

                    <div class="form-group">
                        <label for="userName"> الوصف باللغة العربية*</label>
                        <textarea name="description_ar" value="{{$center->description_ar}}" vparsley-trigger="change" required
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control"
                               id="userName"
                               data-parsley-required-message="هذا الحقل إلزامي">{{$center->description_ar}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="userName">الوصف باللغة الانجليزية*</label>
                        <textarea name="description_en" value="{{$center->description_en}}" parsley-trigger="change" required
                               placeholder="ادخل الاسم لنوع الخدمة..." class="form-control"
                               id="userName" data-parsley-required-message="هذا الحقل إلزامي">{{$center->description_en}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="phone"> الهاتف*</label>
                        <input type="text" name="phone" value="{{$center->phone}}" parsley-trigger="change" required
                               placeholder="الهاتف..." class="form-control"
                               id="userName" data-parsley-required-message="هذا الحقل إلزامي">
                    </div>

                    <div class="form-group">
                        <label for="email"> البريد الالكترونى*</label>
                        <input type="email" name="email" value="{{$center->email}}" parsley-trigger="change" required
                               placeholder="البريد الالكترونى..." class="form-control"
                               id="userName" data-parsley-required-message="هذا الحقل إلزامي">
                    </div>

                    <div class="form-group">
                        <label for="pass1"> المنطقة الرئيسية*</label>
                        <select class="form-control select2" name="area_id" id="area_id" required data-parsley-required-message="هذا الحقل إلزامي">
                            <option value="">برجاء اختيار المنطقة الرئيسية</option>
                            @forelse($areas as $area)
                            <option value="{{$area->id}}" {{$area->id == $center->area_id ? 'selected' : ''}}>{{$area->name_ar}}</option>
                            @empty
                                <option value="">لا يوجد</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pass1"> المنطقة الفرعية*</label>
                        <select class="form-control select2" name="city_id" id="city_id" required data-parsley-required-message="هذا الحقل إلزامي">
                            <option value="">برجاء اختيار المنطقة الفرعية</option>
                            @if($center->city)
                            <option value="{{$center->city_id}}" selected="">{{$center->city->name_ar}}</option>
                            @endif
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label>العنوان على الخريطة</label>
                        <div id="us3" style="width: 100%; height: 400px;"></div>
                    </div>
                        <!-- latitude: 24.720584598721032,
                        // longitude: 46.67315673828125, -->
                    
                    <div class="m-t-small">
                        <input type="hidden" name="lat" class="form-control" id="us3-lat" data-lat="{{$center->lat}}"/>
                        <input type="hidden" name="lng" class="form-control" id="us3-lng" data-lng="{{$center->lng}}"/>
                        <input type="text" name="address" class="form-control" id="us3-address"/>

                    </div>
                    <!-- End /lng and lat -->

                    <div class="form-group">
                        <label for="pass1"> الحالة*</label>
                        <select class="form-control select2" name="status">
                            <option value="1" {{$center->status == 1 ? 'selected' : ''}}>مفعل</option>
                            <option value="0" {{$center->status == 0 ? 'selected' : ''}}>معطل</option>
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
                        <input type="file" name="image" class="dropify" data-max-file-size="6M" data-default-file="{{ request()->root().'/files/centers/'.$center->photo}}"/>
                    </div>

                </div>
            </div>

            <!-- end col -->
        </div>
        <!-- end row -->
    </form>

    <div class="row">
        <!--  assign cards for the center -->
        <div class="col-lg-6">
            <div class="card-box">
                <a style="float: left; margin-right: 15px;" href="#custom-modal{{ $center->id }}"
                data-id="{{ $center->id }}" id="currentRow{{ $center->id }}"
                class="btn btn-success btn-xs btn-trans waves-effect waves-light m-r-5 m-b-10"
                data-animation="fadein" data-plugin="custommodal"
                data-overlaySpeed="100" data-overlayColor="#36404a">
                    <i class="fa fa-plus" style="margin-left: 5px"></i>
                </a>
                <div id="custom-modal{{ $center->id }}" class="modal-demo"
                     data-backdrop="static">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="custom-modal-title">تعيين بطاقة للمركز</h4>
                    <div class="custom-modal-text text-right" style="text-align: right !important;">
                        <form id="cardCreate" action="{{ route('center.setSession') }}" method="post" data-id="{{ $center->id }}">

                            {{ csrf_field() }}

                            <input type="hidden" name="center_id" value="{{ $center->id}}">
                            <div id="cat" class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="pass1"> نوع البطاقة*</label>
                                <select class="form-control select2" name="category_id" id="category_id">
                                    <option value="">برجاء اختيار نوع البطاقة</option>
                                    @forelse($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name_ar}}</option>
                                    @empty
                                        <option value="">لا يوجد</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pass1"> البطاقة*</label>
                                <select class="form-control select2" name="card_id" id="card_id">
                                    <option value="">برجاء اختيار بطاقة</option>
                                </select>
                            </div>

                            <div class="form-group" id="service_id">
                                <label>الخدمات</label><br/>

                            </div>


                            <div class="form-group text-right m-t-20">
                                <button id="mydiv" class="btn btn-primary waves-effect waves-light m-t-0"
                                        type="submit">
                                    حفظ البيانات
                                </button>
                                <button onclick="Custombox.close();" type="reset"
                                        class="btn btn-default waves-effect waves-light m-l-5 m-t-0">
                                    إلغاء
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <h4 class="header-title m-t-0 m-b-30">بطاقات المركز</h4>

                @if(count($centerCards) > 0)
                    @foreach($centerCards as $card)
                        <div id="cardDiv{{$card->id}}">
                        <div>
                            <label>اسم البطاقة :</label>
                            <p>{{$card->name_ar}}
                            <a href="javascript:;" id="cardRow{{ $card->id }}"
                               data-id="{{ $card->id }}" data-center="{{$center->id}}"
                               class="removeCard btn btn-icon btn-trans btn-xs waves-effect waves-light btn-danger m-b-5">
                                <i class="fa fa-remove"></i>
                            </a>
                            </p>
                        </div>
                        <p>خدمات البطاقة :</p>
                        <table class="table table table-hover m-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الخدمة </th>
                                <th>السعر</th>

                            </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                            @forelse($card->services as $row)
                                <tr>
                                    <td>{{$i++}}</td>

                                    <td>{{ $row->service_name ? $row->service_name->name_ar : 'خدمة محذوفة' }}</td>

                                    <td id="price{{$row->id}}">{{ $row->price }}</td>
                                    <td>
                                        <a href="#custom-modal{{ $row->id }}"
                                           data-id="{{ $row->id }}" id="currentRow{{ $row->id }}"
                                           class="btn btn-success btn-xs btn-trans waves-effect waves-light m-r-5 m-b-10"
                                           data-animation="fadein" data-plugin="custommodal"
                                           data-overlaySpeed="100" data-overlayColor="#36404a"><i class="fa fa-edit"></i>
                                        </a>
                                        <div id="custom-modal{{ $row->id }}" class="modal-demo"
                                             data-backdrop="static">
                                            <button type="button" class="close" onclick="Custombox.close();">
                                                <span>&times;</span><span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="custom-modal-title">سعر الخدمة</h4>
                                            <div class="custom-modal-text text-right" style="text-align: right !important;">
                                                <form id="updatePrice" action="{{ route('center.editService') }}" method="post" data-id="{{ $row->id }}">

                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="serviceId" value="{{$row->id}}">

                                                    <div class="form-group ">

                                                        <div>
                                                            <label for="paid-signup">
                                                                سعر الخدمة
                                                            </label>
                                                            <br>
                                        <input type="text" id="paid-signup" value="{{old('price')}}" name="price" id="reason" class="form-control" required data-parsley-required-message="هذا الحقل الزامى">
                                                        </div>
                                                    </div>


                                                    <div class="form-group text-right m-t-20">
                                                        <button class="btn btn-primary waves-effect waves-light m-t-0"
                                                                type="submit">
                                                            حفظ البيانات
                                                        </button>
                                                        <button onclick="Custombox.close();" type="reset"
                                                                class="btn btn-default waves-effect waves-light m-l-5 m-t-0">
                                                            إلغاء
                                                        </button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>

                                    </td>

                                </tr>
                            @empty
                                <tr><td colspan="2">لا يوجد بيانات</td></tr>
                            @endforelse

                            </tbody>
                        </table>
                        </div>
                            @endforeach
                @else

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-danger text-center">
                                لا توجد بطاقات متاحة حالياً للمركز
                            </div>
                        </div>
                    </div>

                @endif


            </div>

        </div>
    </div>


@endsection


@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJW9RPz81mqYrqo7QGnvSkDGSf5Z9_vxk&language=ar&region=EG&libraries=places"></script>
    <script src="{{ request()->root() }}/assets/admin/js/locationpicker.jquery.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description_ar' );
        CKEDITOR.replace( 'description_en' );
        //$(document).ready(function () {

        getAjaxData('#area_id', '#city_id', '{{ request()->root() }}/ajax-city-data', 'area_id');
        getAjaxData('#category_id', '#card_id', '{{ request()->root() }}/ajax-card-data', 'category_id');

    //$(document).ready(function () {
            
            // Google map
  
            function updateControls(addressComponents) {
               // $('#us5-city').val(addressComponents.city);
            }

            function initialize() {
                $('#us3').locationpicker({
                    location: {
                        // latitude: 24.720584598721032,
                        // longitude: 46.67315673828125,
                        latitude: $('#us3-lat').data('lat'),
                        longitude: $('#us3-lng').data('lng'),
                    },
                    radius: 300,
                    inputBinding: {
                        latitudeInput: $('#us3-lat'),
                        longitudeInput: $('#us3-lng'),
                        locationNameInput: $('#us3-address')
                    },
                    enableAutocomplete: true,
                });
            }
        google.maps.event.addDomListener(window, "load", initialize);

        //get services of card

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

                    $("#service_id").append('<div class="row" id="row'+v+'" data-id="row' + v + '"><div class="col-lg-1"># '+(v+1)+' : </div> <div class="col-lg-6"><input type="hidden" name="service[' + v + '][id]" value="'+ val.id +'"><input type="text" name="service[' + v + '][name]" readonly value = "'+ val.name +'" class="form-control"></div><div class="col-lg-5"><input type="number" min="0" placeholder="أدخل سعر الخدمة" name="service[' + v + '][price]" class="form-control"></div></div>');
                    v++;
                });

            }).error(function(data) {

                console.log(data);

            });

        });

        $('body').on('click', '.removeElement', function () {
            var id = $(this).attr('data-id');
            console.log("#row"+id);
            //$("#row"+id).remove();
            $("#row"+id).fadeOut(1000, function () {
                $("#row"+id).remove();
            });

        });


        $('form#updatePrice').on('submit', function (e) {
            e.preventDefault();


            var id = $(this).attr('data-id');


            // var $tr = $($('#currentRowOn' + id)).closest($('#currentRow' + id).parent().parent());

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

                        console.log(data);
                        $("#price" + id).html(data.price);


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

        $('body').on('click', '.removeCard', function () {
            var id = $(this).attr('data-id');
            var centerId = $(this).attr('data-center');
            //var $tr = $(this).closest($('#cardRow' + id).parent().parent());
            swal({
                title: "هل انت متأكد؟",
                text: "يمكنك استرجاع المحذوفات مرة اخرى لا تقلق.",
                type: "error",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "موافق",
                cancelButtonText: "إلغاء",
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                closeOnConfirm: true,
                closeOnCancel: true,
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('center.deleteCard') }}',
                        data: {id: id , 'centerId':centerId},
                        dataType: 'json',
                        success: function (data) {
                            $('#catTrashed').html(data.trashed);
                            if (data) {
                                var shortCutFunction = 'success';
                                var msg = 'لقد تمت عملية الحذف بنجاح.';
                                var title = data.title;
                                toastr.options = {
                                    positionClass: 'toast-top-center',
                                    onclick: null,
                                    showMethod: 'slideDown',
                                    hideMethod: "slideUp",

                                };
                                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                                $toastlast = $toast;
                                $("#cardDiv" + id).hide();
                            }


                        }
                    });
                } else {

                    swal({
                        title: "تم الالغاء",
                        text: "انت لغيت عملية الحذف تقدر تحاول فى اى وقت :)",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "موافق",
                        confirmButtonClass: 'btn-info waves-effect waves-light',
                        closeOnConfirm: false,
                        closeOnCancel: false

                    });

                }
            });
        });

        $('form#cardCreate').on('submit', function (e) {
            e.preventDefault();


            var id = $(this).attr('data-id');


            // var $tr = $($('#currentRowOn' + id)).closest($('#currentRow' + id).parent().parent());

            // console.log($tr);


            var formData = new FormData(this);
            // for (var value of formData.values()) {
            //     console.log(value);
            // }
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {

                    if (data.status == true) {
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

                       // console.log(data);
                        location.reload();


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
    </script>
@endsection
