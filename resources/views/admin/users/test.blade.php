@extends('admin.layouts.master')

@section('content')
    <form method="POST" action="{{ route('provider.storeProvider') }}" enctype="multipart/form-data" data-parsley-validate
          novalidate>
    {{ csrf_field() }}

    <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                
                <h4 class="page-title">إضافة مزود خدمة</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card-box">
                    
                    <h4 class="header-title m-t-0 m-b-30">بيانات مزود الخدمة</h4>


                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="userName">اسم مزود الخدمة*</label>
                            <input class="form-control name" type="text" name="name" value="{{ old('name') }}" placeholder="اسم مزود الخدمة" required>
                            <p class="help-block" id="error_userName"></p>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                    </div>

                    <div class="col-xs-6">
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="userPhone">رقم الجوال*</label>
                            
                            <input class="form-control phone" type="tel" name="phone" value="{{ old('phone') }}" placeholder="رقم الجوال" required>
                            <span class="phone errorValidation"></span>
                            @if($errors->has('phone'))
                                <p class="help-block">
                                    {{ $errors->first('phone') }}
                                </p>
                            @endif
                        </div>
                    </div>


                    <div class="col-xs-6">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="emailAddress">البريد الإلكتروني*</label>

                            <input type="email" name="email" parsley-trigger="change" value="{{ old('email') }}"
                                   class="form-control"
                                   placeholder="البريد الإلكتروني..." required/>
                            @if($errors->has('email'))
                                <p class="help-block">{{ $errors->first('email') }}</p>
                            @endif

                        </div>

                    </div>

                    <div class="col-xs-6">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="pass1">كلمة المرور*</label>


                            <input type="password" name="password" id="pass1" value="{{ old('password') }}"
                                   class="form-control"
                                   placeholder="كلمة المرور..."
                                   required/>

                            @if($errors->has('password'))
                                <p class="help-block">{{ $errors->first('password') }}</p>
                            @endif

                        </div>
                    </div>


                    <div class="col-xs-6">
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="passWord2">تأكيد كلمة المرور*</label>
                            <input data-parsley-equalto="#pass1" name="password_confirmation" type="password" required
                                   placeholder="تأكيد كلمة المرور..." class="form-control" id="passWord2">
                            @if($errors->has('password_confirmation'))
                                <p class="help-block">{{ $errors->first('password_confirmation') }}</p>
                            @endif


                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="passWord2">العنوان*</label>
                        <input name="address" value="{{ old('address') }}" type="text" required placeholder="العنوان..."
                               class="form-control">
                        
                        @if($errors->has('address'))
                            <p class="help-block">{{ $errors->first('address') }}</p>
                        @endif

                    </div>

                    

                    <div class="form-group">
                        <label for="pass1">المديتة *</label>
                        <select class="form-control" name="city">
                            <option value="" selected disabled>المدينة</option>
                            @if(count($cities) > 0)
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="pass1">نوع مزود الخدمة *</label>
                        <select class="form-control" name="providerType">
                            <option value="" selected disabled>نوع مزود الخدمة</option>
                            <option value="0">فرد</option>
                            <option value="1">مركز</option>
                        </select>
                    </div>
                    
                    <div class="form-group" id="service">
                        <label>الخدمات</label><br/>
                        <div class="row" id="row0">
                            <div class="col-lg-1"> #1 : </div>
                            <div class="col-lg-5">
                                
                                <select class="form-control select2" name="service[0]">
                                    <option value="" disabled>يرجى اختيار الخدمة</option>
                                    @forelse($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @empty
                                        <option value="">لا توجد بيانات</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-lg-1 removeElement" data-id="0"><i class="fa fa-remove"></i></div>
                        </div>
                    </div>
                    
                    <div class="form-group text-right m-b-0 ">
                        <button id="mydiv" data-myval="0" class="btn btn-primary waves-effect waves-light m-l-5 m-t-20">
                            إضافة خدمة</button>
                     </div>

                    <div class="form-group text-right m-t-20">
                        <button class="btn btn-primary waves-effect waves-light m-t-20" type="submit">
                            حفظ البيانات
                        </button>
                        <button onclick="window.history.back();return false;" type="reset"
                                class="btn btn-default waves-effect waves-light m-l-5 m-t-20">
                            إلغاء
                        </button>
                    </div>

                </div>
            </div><!-- end col -->

            <div class="col-lg-4">
                <div class="card-box" style="overflow: hidden;">
                    <h4 class="header-title m-t-0 m-b-30">صورة الحساب</h4>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="file" name="image" class="dropify" data-max-file-size="6M" data-show-remove="false" data-allowed-file-extensions="pdf png gif jpg jpeg" data-errors-position="outside" required data-parsley-required-message="هذا الحقل إلزامي" />

                        </div>
                    </div>

                </div>
                
                <div class="card-box" style="overflow: hidden;">
                    <h4 class="header-title m-t-0 m-b-30">صورة السجل التجارى</h4>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="file" name="document_photo" class="dropify" data-max-file-size="6M" data-show-remove="false" data-allowed-file-extensions="pdf png gif jpg jpeg" data-errors-position="outside" required data-parsley-required-message="هذا الحقل إلزامي" />

                        </div>
                    </div>

                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </form>
@endsection
@section('script')
    <script>
        //$(document).ready(function () {

        var services = @json($services);
         $('#mydiv').on('click', function (e) {
            console.log('inas');
            e.preventDefault();
            var a = $('#mydiv').data('myval');
            var v = a + 1;
            $('#mydiv').data('myval', a + 1);
        
            $('#service').append('<div class="row" id="row'+v+'" data-id="row' + v + '"><div class="col-lg-1"># '+(v+1)+' : </div> <div class="col-lg-5"><select class="form-control select2" name="service[' + v + ']" id="serviceId"></div><div class="col-lg-1 removeElement" data-id="'+ v + '"><i class="fa fa-remove"></i></div></div>');
        });
        
        var json = JSON.parse(data)
        $("#serviceId").append('<option value="">برجاء الاختيار</option');
        $.each(services, function(key, val) {
            $("#serviceId").append('<option value="' + val.id + '">' + val.name + '</option>');
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