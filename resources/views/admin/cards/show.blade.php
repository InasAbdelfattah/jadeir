@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-xs-6 col-md-4 col-sm-4">
            <div class="btn-group pull-right m-t-15">
                    <a href="{{ route('cards.index') }}" class="btn btn-custom  waves-effect waves-light">
                        <span class="m-l-5">
                            <i class="fa fa-eye"></i> <span>عرض البطاقات</span> </span>
                    </a>
                </div>
            <h3 class="page-title">بيانات البطاقة</h3>
        </div>

    </div>

    <div class="row">
        
        <div class="col-xs-12">
            
            <div class="bg-picture card-box">
                <div class="profile-info-name">
                    <div class="profile-info-detail">
                        {{--<h3 class="m-t-0 m-b-0">بيانات البطاقة</h3>--}}

                        <div class="m-t-20 text-center">
                            @if($card->image)
                            <a data-fancybox="gallery"
                               href="{{ url('files/cards/' . $card->image) }}">
                                <img class="img-thumbnail" src="{{ url('files/cards/' . $card->image) }}"/>
                            </a>
                            @else
                            <img class="img-thumbnail" src="{{ request()->root().'/assets/admin/custom/images/default.png' }}"/>
                            @endif
                        </div>

                        <div class="panel-body">

                            <div class="col-lg-3 col-xs-12">
                                <label>نوع البطاقة:</label>
                                <p>{{ $card->category }}</p>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <label>اسم البطاقة عربى :</label>
                                <p> {{ $card->name_ar }} </p>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <label>اسم البطاقة انجليزى :</label>
                                <p>{{ $card->name_en }}</p>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <label>السعر :</label>
                                <p> {{ $card->price }} </p>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <label>صلاحية البطاقة :</label>
                                <p> {{ $card->expiration }} شهر</p>
                            </div>
                        </div>
                    </div>
                    <!-- end card-box-->


                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-sm-12 col-xs-12 text-center">
            <div class="bg-picture card-box">
                <div class="profile-info-name">
                    <div class="profile-info-detail">
                        <h3 class="m-t-0 m-b-0">مزايا البطاقة</h3>

                        <div class="col-xs-12 m-t-20">
                            <div class="row">
                                
                                <div class="col-xs-6">
                                    <label>مزايا البطاقة عربى</label>
                                    <p>{!! $card->benifits_ar !!}</p>
                                </div>
                                <div class="col-xs-6">
                                    <label>مزايا البطاقة انجليزى</label>
                                    <p>{!! $card->benifits_en !!}</p>
                                </div>
                               
                            </div>
                        </div>

                    </div>
                    <!-- end card-box-->

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-xs-12 text-center">
            <div class="bg-picture card-box">
                <div class="profile-info-name">
                    <div class="profile-info-detail">
                        <h3 class="m-t-0 m-b-0">عن البطاقة</h3>

                        <div class="col-xs-12 m-t-20">
                            <div class="row">
                                
                                <div class="col-xs-6">
                                    <label>عن البطاقة عربى</label>
                                    <p>{!! $card->about_card_ar !!}</p>
                                </div>
                                <div class="col-xs-6">
                                    <label>عن البطاقة انجليزى</label>
                                    <p>{!! $card->about_card_en !!}</p>
                                </div>
                               
                            </div>
                        </div>

                    </div>
                    <!-- end card-box-->

                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">خدمات البطاقة</h4>

                @if($card->cardServices->count() > 0)
                    <table class="table table table-hover m-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الخدمة عربى</th>
                            <th>اسم الخدمة انجليزى</th>
                            <!-- <th>الحى</th> -->
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($card->cardServices  as $row)
                            <tr>
                                <td>#</td>
                                
                                <td>{{ $row->name_ar }}</td>
                                <td>{{ $row->name_en }}</td>
                                
                                <td>
                                    

                                    <a href="javascript:;" id="elementRow{{ $row->id }}" data-id="{{ $row->id }}"
                                       data-url="{{ route('card.delete_service')  }}"
                                       class="btn btn-xs btn-danger removeElement">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-danger text-center">
                                لا توجد خدمات متاحة حالياً للبطاقة
                            </div>
                        </div>
                    </div>

                @endif

            </div>

        </div>     

    </div>

 
@endsection

@section('scripts')

    <script>
        $('body').on('click', '.removeElement', function () {
            var id = $(this).attr('data-id');
            var $tr = $(this).closest($('#elementRow' + id).parent().parent());
            swal({
                title: "هل انت متأكد؟",
                text: "لا يمكنك استرجاع المحذوفات مرة اخرى.",
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
                        url: '{{ route('card.delete_service') }}',
                        data: {id: id},
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data.status == true) {
                                var shortCutFunction = 'success';
                                var msg = 'لقد تمت عملية الحذف بنجاح.';
                                var title = data.title;
                                toastr.options = {
                                    positionClass: 'toast-top-left',
                                    onclick: null
                                };
                                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                                $toastlast = $toast;

                                $tr.find('td').fadeOut(1000, function () {
                                    $tr.remove();
                                });
                            }
                            if (data.status == false) {
                                var shortCutFunction = 'error';
                                var msg = data.message;
                                var title = data.title;
                                toastr.options = {
                                    positionClass: 'toast-top-left',
                                    onclick: null
                                };
                                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                                $toastlast = $toast;
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

       
        
        $('form').on('submit', function (e) {
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

                        $("#currentRow" + data.id).html('تم التفعيل');
                        $("#currentRow" + data.id).addClass('btn-danger').removeClass('btn-success');
                        setTimeout(function () {
                            $('#currentRowOn' + data.id).parents('table').DataTable()
                                .row($('#currentRowOn' + data.id))
                                .remove()
                                .draw();
                        }, 2000);




                        {{--setTimeout(function () {--}}
                        {{--window.location.href = '{{ route('categories.index') }}';--}}
                        {{--}, 3000);--}}
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