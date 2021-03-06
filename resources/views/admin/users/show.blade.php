@extends('admin.layouts.master')
@section('title', 'بيانات المستخدم')
@section('content')


    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
           <!--  <div class="btn-group pull-right m-t-15">
                    <a href="{{ route('districts.index') }}" type="button" class="btn btn-custom waves-effect waves-light"
                       aria-expanded="false"> مشاهدة جميع المناطق الفرعية
                        <span class="m-l-5">
                        <i class="fa fa-backward"></i>
                    </span>
                    </a>

                </div> -->
            <h4 class="page-title">بيانات المستخدم</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <h4 class="header-title m-t-0 m-b-30">بيانات المستخدم</h4>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="userName">الاسم</label>
                            <p>{{ $user->name }}</p>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="userName">الهاتف</label>
                            <p>{{ $user->phone }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="userPhone">البريد الالكترونى</label>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="pass1">تاريخ انشاء المستخدم</label>
                            <p>{{ $user->created_at}}</p>

                        </div>
                    </div>

                    
                </div>
                <div class="row">

                    

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="pass1">عدد مرات الدخول على حسابه</label>
                            <p>{{$login ? $login->logins_count : 0}}</p>

                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="pass1">اخر تاريخ وقت قام بالدخول على حسابه</label>
                            <p>{{$login ? $login->updated_at : ''}}</p>

                        </div>
                    </div>

                    @if($user->is_user !=1)
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="pass1">الصلاحيات الممنوحة اليه</label>
                                @if($user->roles->pluck('name')) 
                                @foreach($user->roles->pluck('name') as $roleUser)
                                 - <p>{{$roleUser}}</p>
                                @endforeach 
                                @endif
                                

                            </div>
                        </div>
                    @endif
                </div>

            </div>

        </div><!-- end col -->

    </div>
    <!-- end row -->

@endsection
