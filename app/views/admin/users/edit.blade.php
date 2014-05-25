@extends('admin.layouts.master')


<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/bootstrap-select/bootstrap-select.min.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/select2/select2-metronic.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/jquery-multi-select/css/multi-select.css"/>
@section('footer')
<script type="text/javascript" src="/admin_assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admin_assets/scripts/core/app.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#all_permissions').multiSelect();
     $('#changepassword').ajaxForm(function(e) { 
        $('#change-password-result').html(e);
        $('#change-password-result').css('display', '');
            }); 
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
                    Sửa Thành viên
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
                        Sửa thành viên
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        {{portlet_open('Nhập thông tin cần sửa','blue')}}
        <div class="row">
            <div class="col-md-12">
                {{Form::model($user,
                    ['route'=>array('admin.users.update',$user->id),
                    'method'=>'PUT','class'=>'form-horizontal'])}}

                    <!-- Email Field -->
                    <div class="form-group">
                        {{Form::label('email','Email',array('class'=>'col-md-2 control-label'))}}
                        <div class="col-md-5">
                        {{Form::text('email',null,array('placeholder'=>"Email",'class'=>"form-control",'disabled'=>''))}}
                           {{error_for('email"',$errors)}}
                       </div>
                       <div class="col-md-5">
                           <a href="#changepassword" data-toggle="modal" class="btn yellow">Đổi mật khẩu</a>
                       </div>
                   </div>
                   <div class="form-group">
                    {{Form::label('activated','Kích Hoạt',array('class'=>'control-label col-md-2'))}}
                    <div class="col-md-5">
                        {{Form::select('activated',
                            array('1'=>'Đã kích hoạt','0'=>'Chưa kích hoạt'),
                            ($user->activated)?1:0,
                            array('class'=>'form-control')
                            )}}

                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('last_name','Họ',array('class'=>'col-md-2 control-label'))}}
                        <div class="col-md-5">
                            {{Form::text('last_name',null,array('placeholder'=>"Họ",'class'=>"form-control"))}}

                            {{error_for('last_name"',$errors)}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{Form::label('first_name','Tên',array('class'=>'col-md-2 control-label'))}}
                        <div class="col-md-5">
                            {{Form::text('first_name',null,array('placeholder'=>"Tên",'class'=>"form-control"))}}

                            {{error_for('first_name"',$errors)}}
                        </div>
                    </div>



                    <div class="form-group col-md-6">
                    <h4>Thành viên thuộc nhóm:</h4>

                        <div class="checkbox-list">
                        @foreach(Sentry::findAllGroups() as $group)
                        <label>
                            <input type="checkbox" value="{{$group->id}}" name="group[]"
                                @if($user->inGroup($group))
                                checked
                                @endif
                            > {{$group->name}} 
                        </label>
                        @endforeach
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        {{Form::label('permissions','Thiết lập quyền truy cập của người dùng',array('class'=>'form-label'))}}
                        <?php 
                            $all_permissions = Permission::orderBy('name')->get();
                         ?>
                         @if($all_permissions->count())
                            <select multiple="multiple" class="multi-select form-control" id="all_permissions" name="permissions[]">
                            @foreach(Permission::orderBy('name')->get() as $per)

                            <option value ="{{$per->name}}"  
                                @if($user->hasAccess($per->name))
                                selected
                                @endif
                            >{{$per->name}}</option>
                            @endforeach

                        </select>
                        @else
                        <p>Chưa tạo bất kì quyền nào</p>
                        @endif
                </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        {{Form::submit('Cập nhật',array('class'=>'btn blue'))}}
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
@include('admin.users.elements.modal_changepassword')->withId($user->id);

@stop