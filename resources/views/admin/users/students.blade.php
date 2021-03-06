@extends('admin.layouts.master')
@section('title', 'الطلاب')
@section('content')

    <!-- Page-Title -->
    <div class="row zoomIn">
        <div class="col-sm-12">
           
            <h4 class="page-title">الطلاب</h4>
        </div>
    </div>

    <div class="row zoomIn">
        <div class="col-sm-12">
            <div class="card-box">

                <div class="row">
                    <div class="col-sm-4 col-xs-8 m-b-30" style="display: inline-flex">
                        مشاهدة الطلاب
                    </div>

                    <div class="col-sm-4 col-sm-offset-4 pull-left">
                        
                    </div>
                </div>

                <div class="row">
                    <form action="{{route('students.search')}}" method="get">
                        {{csrf_field()}}

                        <div class="col-lg-3">
                           
                            <input type="text" name="name" class="form-control" placeholder="اسم الطالب"/>
                            
                        </div>

                        <div class="col-lg-3">
                           
                            <input type="text" name="phone" class="form-control" placeholder="رقم الجوال"/>
                            
                        </div>

                        <div class="col-lg-2">
                           
                            <!--<input type="number" name="order_id" class="form-control" placeholder="رقم الطلب"/>-->
                            <select name="city" class="form-control">
                                <option value="">اسم المدينة</option>
                                @forelse($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @empty
                                    <option value="">لا يوجد</option>
                                @endforelse
                            </select>
                            
                        </div>
                        
                        <div class="col-lg-2">
                              
                            <select name="is_active" class="form-control">
                                <option value="" disabled selected>حالة الطالب</option>
                                    <option value="1">مفعل</option>
                                    <option value="0">معطل</option>
                            </select>
                            
                        </div>
                        
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary">بحث</button>
                        </div>
                        
                    </form>
                </div>
                <div class="clearfix" style="margin-bottom: 20px;"></div>
                <table id="datatable-fixed-header" class="table  table-striped">
                    <thead>
                    <tr>
                        <th>م
                            <!-- <div class="checkbox checkbox-primary checkbox-single">
                                <input type="checkbox" style="margin-bottom: 0px;" name="check"
                                       onchange="checkSelect(this)"
                                       value="option2"
                                       aria-label="Single checkbox Two">
                                <label></label>
                            </div> -->
                        </th>
                        <th>اسم الطالب</th>
                        <th>البريد الإلكتروني</th>
                        <th>رقم الجوال</th>
                        <th>تاريخ الاشتراك</th>
                        <th>المدينة</th>
                        <th>العمليات المتاحة</th>

                    </tr>
                    </thead>
                    <tbody>
                        @php $i = 0 ; @endphp 
                    @foreach($users as $user)

                        <tr id="currentRowOn{{$user->id}}">
                            <td>
                                {{$i++}}
                                <!-- <div class="checkbox checkbox-primary checkbox-single">
                                    <input type="checkbox" style="margin-bottom: 0px;" class="checkboxes-items"
                                           value="{{ $user->id }}"
                                           aria-label="Single checkbox Two">
                                    <label></label>
                                </div> -->
                            </td>
                            <td>{{$user->name}}</td>

                            <td>{{ $user->email }}</td>
                            <!--<td>{{ $user->username  }}</td>-->
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->created_at }}</td>                            
                            <td>{{ $user->city }}</td>                            
                            <td>
                                
                                <a href="{{ route('users.show',$user->id) }}"
                                   class="btn btn-icon btn-xs waves-effect btn-default m-b-5">
                                    <i class="fa fa-eye"></i>
                                </a>
                                
                                @if($user->id != 1)

                                    @if($user->is_active == 1)
                                    <a href="#custom-modal{{ $user->id }}"
                                        data-id="{{ $user->id }}" id="currentRow{{ $user->id }}"
                                        class="btn btn-success btn-xs btn-trans waves-effect waves-light m-r-5 m-b-10"
                                        data-animation="fadein" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a">تعطيل
                                    </a>
                                    <div id="custom-modal{{ $user->id }}" class="modal-demo"
                                                  data-backdrop="static">
                                                 <button type="button" class="close" onclick="Custombox.close();">
                                                     <span>&times;</span><span class="sr-only">Close</span>
                                                 </button>
                                                 <h4 class="custom-modal-title">سبب تعطيل المستخدم</h4>
                                                 <div class="custom-modal-text text-right" style="text-align: right !important;">
                                                    <form id="activeForm" action="{{ route('user.suspend') }}" method="post" data-id="{{ $user->id }}">
             
                                                        {{ csrf_field() }}
                                                         <input type="hidden" name="userId" value="{{$user->id}}">
                                                         <input type="hidden" name="is_active" value="0">
                                                        <div class="form-group ">
                                                                
                                                                <div>
                                                                    <label for="paid-signup">
                                                                         سبب التعطيل 
                                                                    </label>
                                                                    <br>
                                                                    <textarea id="paid-signup" value="{{old('reason')}}" name="reason" id="reason" class="form-control"></textarea>
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
                                    @endif

                                <!-- <a href="javascript:;" id="elementRow{{ $user->id }}" data-id="{{ $user->id }}"
                                   class="removeElement btn-xs btn-icon btn-trans btn-sm waves-effect waves-light btn-danger m-b-5">
                                    <i class="fa fa-remove"></i>

                                </a> -->

                                <a href="#custom-modal2{{ $user->id }}"
                                        data-id="{{ $user->id }}" id="currentRow{{ $user->id }}"
                                        class="btn-xs btn-icon btn-trans btn-sm waves-effect waves-light btn-danger m-b-5"
                                        data-animation="fadein" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a"><i class="fa fa-remove"></i>
                                    </a>
                                    <div id="custom-modal2{{ $user->id }}" class="modal-demo"
                                                  data-backdrop="static">
                                                 <button type="button" class="close" onclick="Custombox.close();">
                                                     <span>&times;</span><span class="sr-only">Close</span>
                                                 </button>
                                                 <h4 class="custom-modal-title">سبب حذف المستخدم</h4>
                                                 <div class="custom-modal-text text-right" style="text-align: right !important;">
                                                    <form id="deleteForm" action="{{ route('user.delete') }}" method="post" data-id="{{ $user->id }}">
             
                                                        {{ csrf_field() }}
                                                         <input type="hidden" name="id" value="{{$user->id}}">
                                                  
                                                        <div class="form-group ">
                                                                
                                                                <div>
                                                                    <label for="paid-signup">
                                                                         سبب الحذف 
                                                                    </label>
                                                                    <br>
                                                                    <textarea id="paid-signup" value="{{old('delete_reason')}}" name="delete_reason" id="reason" class="form-control"></textarea>
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

                                

                                @endif
                            </td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- End row -->
@endsection

@section('scripts')

    <script>

        @if(session()->has('success'))
        setTimeout(function () {
            //showMessage('{{ session()->get('success') }}');
            showMessage('{{ session('success') }}');
        }, 3000);
        @endif

        $('body').on('click', '.removeElement', function () {
            var id = $(this).attr('data-id');
            var $tr = $(this).closest($('#elementRow' + id).parent().parent());
            swal({
                title: "هل انت متأكد؟",
                text: "",
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
                        url: '{{ route('user.delete') }}',
                        data: {id: id},
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
                            }

                            $tr.find('td').fadeOut(1000, function () {
                                $tr.remove();
                            });
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

        $('.getSelected').on('click', function () {
            // var items = $('.checkboxes-items').val();
            var sum = [];
            $('.checkboxes-items').each(function () {
                if ($(this).prop('checked') == true) {
                    sum.push(Number($(this).val()));
                }

            });

            if (sum.length > 0) {
                //var $tr = $(this).closest($('#elementRow' + id).parent().parent());
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
                            url: '{{ route('users.group.delete') }}',
                            data: {ids: sum},
                            dataType: 'json',
                            success: function (data) {
                                $('#catTrashed').html(data.trashed);
                                if (data) {
                                    var shortCutFunction = 'success';
                                    var msg = 'لقد تمت عملية الحذف بنجاح.';
                                    var title = data.title;
                                    toastr.options = {
                                        positionClass: 'toast-top-left',
                                        onclick: null
                                    };
                                    var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                                    $toastlast = $toast;
                                }

                                $('.checkboxes-items').each(function () {
                                    if ($(this).prop('checked') == true) {
                                        $(this).parent('tr').remove();
                                    }
                                });
//                        $tr.find('td').fadeOut(1000, function () {
//                            $tr.remove();
//                        });
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
            } else {
                swal({
                    title: "تحذير",
                    text: "قم بتحديد عنصر على الاقل",
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "موافق",
                    confirmButtonClass: 'btn-warning waves-effect waves-light',
                    closeOnConfirm: false,
                    closeOnCancel: false

                });
            }


        });

        $('.getSelectedAndSuspend').on('click', function () {

            var sum = [];
            $('.checkboxes-items').each(function () {
                if ($(this).prop('checked') == true) {
                    sum.push(Number($(this).val()));
                }
            });

            if (sum.length > 0) {
                //var $tr = $(this).closest($('#elementRow' + id).parent().parent());
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
                            url: '{{ route('users.group.suspend') }}',
                            data: {ids: sum},
                            dataType: 'json',
                            success: function (data) {
                                $('#catTrashed').html(data.trashed);
                                if (data) {

                                    var shortCutFunction = 'success';
                                    var msg = 'لقد تمت عملية الحظر بنجاح.';
                                    var title = data.title;
                                    toastr.options = {
                                        positionClass: 'toast-top-left',
                                        onclick: null
                                    };
                                    var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                                    $toastlast = $toast;

                                    location.reload();
                                }

                                $('.checkboxes-items').each(function () {
                                    if ($(this).prop('checked') == true) {
                                        //$(this).parent().parent().parent().remove();
                                    }
                                });
//                        $tr.find('td').fadeOut(1000, function () {
//                            $tr.remove();
//                        });
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
            } else {
                swal({
                    title: "تحذير",
                    text: "قم بتحديد عنصر على الاقل",
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "موافق",
                    confirmButtonClass: 'btn-warning waves-effect waves-light',
                    closeOnConfirm: false,
                    closeOnCancel: false

                });
            }

        });

        function showMessage(message) {

            var shortCutFunction = 'success';
            var msg = message;
            var title = 'نجاح!';
            toastr.options = {
                positionClass: 'toast-top-center',
                onclick: null,
                showMethod: 'slideDown',
                hideMethod: "slideUp",
            };
            var $toast = toastr[shortCutFunction](msg, title);
            // Wire up an event handler to a button in the toast, if it exists
            $toastlast = $toast;


        }

   $('form#activeForm').on('submit', function (e) {
            e.preventDefault();

            var id = $(this).attr('data-id');

            var $tr = $($('#currentRowOn' + id)).closest($('#currentRow' + id).parent().parent());

            // console.log($tr);

            var formData = new FormData(this);
            for (var value of formData.values()) {
                console.log(value); 
            }
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
                        // if(data.order_status == 1){
                        //     $("#order_status" + data.id).html('سارى');
                        // }elseif(data.order_status == 2){
                        //     $("#order_status" + data.id).html('مرفوض');
                        // }

                        $tr.find('td').fadeOut(1000, function () {
                                $tr.remove();
                            });
                        //location.reload();


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

   $('form#deleteForm').on('submit', function (e) {
            e.preventDefault();

            var id = $(this).attr('data-id');

            var $tr = $($('#currentRowOn' + id)).closest($('#currentRow' + id).parent().parent());

            // console.log($tr);

            var formData = new FormData(this);
            for (var value of formData.values()) {
                console.log(value); 
            }
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
                        // if(data.order_status == 1){
                        //     $("#order_status" + data.id).html('سارى');
                        // }elseif(data.order_status == 2){
                        //     $("#order_status" + data.id).html('مرفوض');
                        // }

                        $tr.find('td').fadeOut(1000, function () {
                                $tr.remove();
                            });
                        //location.reload();


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