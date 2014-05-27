@extends('admin.layouts.master')

<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/bootstrap-select/bootstrap-select.min.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/select2/select2-metronic.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/jquery-multi-select/css/multi-select.css"/>
@section('footer')
<script type="text/javascript" src="/admin_assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admin_assets/scripts/core/app.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#all_permissions').multiSelect();
});
</script>
@stop

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Tạo thành viên mới
                </h3>
                <ul class="page-breadcrumb breadcrumb">

                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{URL::route('admin')}}">
                            Trang chủ
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="{{URL::route('admin.users.index')}}">
                            Thành viên
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                            Tạo mới
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
<!--        Flash Message -->
        {{flash_message()}}
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        {{portlet_open('Thêm thành viên','green')}}
        <div class="row">
            <div class="col-md-8">
                {{Form::open(['route'=>'admin.users.store','class'=>''])}}

                <!-- Email Field -->
                    <div class="form-group">
                            {{Form::label('email','Email',array('class'=>'control-label'))}}
                            {{Form::text('email',null,['class'=>'form-control'])}}
                    </div>

                    <div class="row">
                        <!-- Tên Field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('last_name','Họ')}}
                                {{Form::text('last_name',null,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <!-- Họ Field -->
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('first_name','Tên')}}
                                {{Form::text('first_name',null,['class'=>'form-control'])}}
                            </div>
                        </div>


                    </div>
                <!-- Password Field -->
                <div class="form-group">
                    {{Form::label('password','Mật khẩu')}}
                    {{Form::password('password',['class'=>'form-control col-md-6'])}}
                </div>
                <!-- Password Field -->
                <div class="form-group">
                    {{Form::label('password_confirmation','Xác thực mật khẩu')}}
                    {{Form::password('password_confirmation',['class'=>'form-control col-md-6'])}}
                </div>
               <div class="form-group col-md-6">
                    <h4>Thành viên thuộc nhóm:</h4>

                        <div class="checkbox-list">
                        @foreach(Sentry::findAllGroups() as $group)
                        <label>
                            <input type="checkbox" value="{{$group->id}}" name="group[]"
                            > {{$group->name}} 
                        </label>
                        @endforeach
                        </div>
                    </div>
                <div class="form-group col-md-6">
                        <h4>Thiết lập thêm quyền truy cập</h4>
                        <?php 
                            $all_permissions = Permission::orderBy('name')->get();
                         ?>
                         @if($all_permissions->count())
                            <select multiple="multiple" class="multi-select form-control" id="all_permissions" name="permissions[]">
                            @foreach(Permission::orderBy('name')->get() as $per)
                            <option value ="{{$per->name}}">{{$per->name}}</option>
                            @endforeach

                        </select>
                        @else
                        <p>Chưa tạo bất kì quyền nào</p>
                        @endif
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    {{Form::submit('Tạo mới',array('class'=>'btn green'))}}
                </div>
                </div>
                
                {{Form::close()}}
            </div>
        </div>
        {{portlet_close()}}
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
</div>


@stop