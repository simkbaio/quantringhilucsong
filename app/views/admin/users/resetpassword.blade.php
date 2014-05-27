@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Khôi phục mật khẩu
                    <small>Trang demo</small>
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
                        <a href="#">
                            Khôi phục mật khẩu
                        </a>

                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                {{portlet_open('Bảng điều khiển','blue')}}
                <div class="row">
                    {{Form::open()}}
                {{HForm::input([
                    'title'=>'Mật khẩu mới',
                    'name'=>'password',
                    'type'=>'password',
                ],$errors)}}
                {{HForm::input([
                    'title'=>'Gõ lại mật khẩu',
                    'name'=>'password_confirmation',
                    'type'=>'password',

                ],$errors)}}
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::submit('Đổi mật khẩu',['class'=>'btn blue'])}}
                    </div>
                </div>
        {{Form::close()}}
                </div>
                {{portlet_close()}}
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
</div>


@stop