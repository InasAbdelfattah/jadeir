@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-xs-6 col-md-4 col-sm-4">
            <div class="btn-group pull-right m-t-15">
                    <a href="{{ route('centers.index') }}" class="btn btn-custom  waves-effect waves-light">
                        <span class="m-l-5">
                            <i class="fa fa-eye"></i> <span>عرض المراكز</span> </span>
                    </a>
                </div>
            <h3 class="page-title">بيانات المركز</h3>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="bg-picture card-box">
                <div class="profile-info-name">
                    <div class="profile-info-detail">
                        {{--<h3 class="m-t-0 m-b-0">بيانات المركز</h3>--}}

                        <div class="m-t-20 text-center">
                            @if($center->photo)
                            <a data-fancybox="gallery"
                               href="{{ url('files/centers/' . $center->photo) }}">
                                <img class="img-thumbnail" src="{{ url('files/centers/' . $center->photo) }}"/>
                            </a>
                            @else
                            <img class="img-thumbnail" src="{{ request()->root().'/assets/admin/custom/images/default.png' }}"/>
                            @endif
                        </div>

                        <div class="panel-body">

                            <div class="col-lg-3 col-xs-12">
                                <label>اسم المنطقة الرئيسية:</label>
                                <p>@if($center->area){{ $center->area->name_ar }} @else -- @endif</p>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <label>اسم المنطقة الفرعية :</label>
                                <p>@if($center->city) {{ $center->city->name_ar }} @else -- @endif </p>
                            </div>

                            <div class="col-lg-3 col-xs-12">
                                <label> حالة المركز :</label>
                                <p>{{ $center->status == 0 ? 'معطل' : 'مفعل' }}</p>
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
                <h4 class="header-title m-t-0 m-b-30">بطاقات المركز</h4>

                @if(count($centerCards) > 0)
                @foreach($centerCards as $card)
               
                <div>
                    <label>اسم البطاقة :</label>
                    <p>{{$card->name_ar}}</p>
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
                            
                            <td>{{ $row->service_name ? $row->service_name->name_ar : 'خدمة محذوفة'}}</td>
                            
                            <td>{{ $row->price }}</td>
                            
                        </tr>
                    @empty
                    <tr><td colspan="2">لا يوجد بيانات</td></tr>               
                    @endforelse

                    </tbody>
                    </table>
                    @endforeach
                    @else
                
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-danger text-center">
                                لا توجد خدمات متاحة حالياً للمركز
                            </div>
                        </div>
                    </div>

                @endif

            </div>

        </div>

    </div>
  
@endsection
