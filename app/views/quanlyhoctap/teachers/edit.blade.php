@extends('admin.layouts.master')
@section('meta_title')
Nghị lực sống | Sửa thông tin giáo viên
@stop
@section('head')
<link rel="stylesheet" type="text/css" href="{{URL::to('admin_assets')}}/plugins/bootstrap-datepicker/css/datepicker.css" />
@stop
@section('footer')
<script type="text/javascript" src="{{URL::to('admin_assets')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js">

<script type="text/javascript" src="/admin_assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $(".date_formated").inputmask("m/d/y", {
            "placeholder": "_ "
        });
    });
    $('.date-picker').datepicker();
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
                    Sửa thông tin giáo viên
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
                        <a href="{{URL::route("admin.teachers.index")}} ">
                            giáo viên
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            Sửa thông tin giáo viên
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
                {{portlet_open('Nội dung cần nhập','blue')}}
                <div class="row">
                    {{Form::model($teacher,['route'=>['admin.teachers.update',$teacher->id],'method'=>'PUT'])}}
                    {{HForm::input([
                        'name'=>'last_name',
                        'title'=>'Họ',
                        'width'=>'3',
                        'value'=>($teacher->account()!=null)?$teacher->account()->last_name:"",
                        ],$errors)}}
                    {{HForm::input([
                        'name'=>'first_name',
                        'title'=>'Tên',
                        'width'=>'3',
                        'value'=>($teacher->account()!=null)?$teacher->account()->first_name:"",
                        ],$errors)}}



                    {{HForm::input([
                        'name'=>'phone',
                        'title'=>'Số điện thoại',
                        'width'=>'4',
                        ],$errors)}}



                    {{HForm::input([
                        'name'=>'address',
                        'title'=>'Địa chỉ',
                        'width'=>'6',
                        ],$errors)}}


                        <div class="form-group col-md-3">
                            <label class="control-label">Ngày gia nhập</label>
                            <div>
                                <input type="text" name="join_date" value="{{date('m/d/Y',$teacher->join_date)}}" size="16" class="m-wrap m-ctrl-medium date-picker">
                                <span class="help-block">
                                    Nhập theo định dạng (tháng/ngày/năm)
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">ngày kết thúc</label>
                            <div>
                                <input type="text" class="m-wrap m-ctrl-medium date-picker" value="{{date('m/d/Y',$teacher->out_date)}}" name="out_date" class="form-control">
                                <span class="help-block">
                                    Nhập theo định dạng (tháng/ngày/năm)
                                </span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <legend>Thông tin đăng nhập</legend>
                            {{HForm::input([
                                'name'=>'email',
                                'title'=>'Hòm Thư',
                                'width'=>'4',
                                ],$errors)}}
                            {{HForm::input([
                                'name'=>'password',
                                'type'=>'password',
                                'title'=>'mật khẩu',
                                'width'=>'4',
                                ]
                                ,$errors)}}
                            {{HForm::input([
                                'name'=>'password_confirmation',
                                'type'=>'password',
                                'title'=>'Gõ lại mật khẩu',
                                'width'=>'4',
                                ],$errors)}}

                            </div>
                            <div class="col-md-12" style="text-align: center;">
                                {{Form::submit('Cập nhật',['class'=>'btn blue'])}}

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