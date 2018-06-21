@extends('admin.layouts.master')

@section('content')

    <!-- Page-Title -->

    <div class="row">
        <div class="col-xs-6 col-md-4 col-sm-4">
            <h3 class="page-title">بيانات الطلب</h3>
        </div>

        <!--
                        <div class="m-t-15 col-xs-6 col-md-8 col-sm-8 text-right">
                            <a href="profile_edit.html">
                                     <button type="button" class="btn btn-success">تعديل البيانات</button>
                                </a>
                        </div>
        -->
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="bg-picture card-box">
                <div class="profile-info-name">
                    <div class="profile-info-detail">
                        {{--<h3 class="m-t-0 m-b-0">بيانات الطلب</h3>--}}

                        

<!--  `doc_photo`, `username`, `phone`, `phone2`, `delivered_time`, `address`, `card_id`, `user_id`, `payment_method`, `status`, `refuse_reason` -->

                        <div class="panel-body">

                            <div class="col-lg-3 col-xs-12">
                                <label>رقم الطلب :</label>
                                <p>{{ $order->id }}</p>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <label>اسم البطاقة :</label>
                                <p>@if($order->card) {{ $order->card->name_ar }} @else -- @endif </p>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <label>اسم المستخدم :</label>
                                <p>{{ $order->username }}</p>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <label>مكان التسليم :</label>
                                <p>{{ $order->address }}</p>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <label> جوال المستخدم :</label>
                                <p>{{ $order->phone }}</p>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <label>جوال اضافى للمستخدم :</label>
                                <p>{{ $order->phone2 }}</p>
                            </div>
       
                            <div class="col-lg-3 col-xs-12">
                                <label>تاريخ الطلب :</label>
                                <p> {{ $order->created_at }}</p>
                            </div>

                            <div class="col-lg-6 col-xs-12">
                            <label> <p>صورة الهوية :</label>
                            
                            @if($order->doc_photo)
                            <a data-fancybox="gallery"
                               href="{{ url('files/docs/' . $order->doc_photo) }}">
                                <img class="img-thumbnail" src="{{ url('files/docs/' . $order->doc_photo) }}"/>
                            </a>
                            @else
                            <img class="img-thumbnail" src="{{ request()->root().'/assets/admin/custom/images/default.png' }}"/>
                            @endif

                        </div>

                        <div class="col-lg-3 col-xs-12">
                            <label>طريقة الدفع :</label>
                            <p> {{ $order->payment_method == 0 ? 'تحويل بنكى' : 'بطاقة ائتمان' }}</p>
                        </div>

                        @if($order->status ==1 )
                            <div class="col-lg-3 col-xs-12">
                            <label>حالة الطلب :</label>
                            <p>مقبول</p>
                        </div>
                        @elseif($order->status == 2)
                            <div class="col-lg-3 col-xs-12">
                            <label>حالة الطلب :</label>
                            <p>مرفوض</p>

                            <label>سبب الرفض :</label>
                            <p>{{$order->refuse_reason}}</p>
                        </div>
                        @endif


                        </div>
                    </div>
                    <!-- end card-box-->


                </div>
            </div>
        </div>

    </div>


@endsection


