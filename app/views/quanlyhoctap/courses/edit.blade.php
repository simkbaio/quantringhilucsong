@extends('admin.layouts.master')
@section('meta_title')
Nghị lực sống | Thêm khóa học mới
@stop
@section('head')
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/bootstrap-datepicker/css/datepicker.css"/>


@stop
@section('footer')
<script type="text/javascript" src="/admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>


<script>
    jQuery(document).ready(function($) {
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                autoclose: true
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
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
                    Thêm khóa học mới
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
                        <a href="{{URL::route("admin.courses.index")}} ">
                            khóa học
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            {{$course->course_name}}
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
                    {{Form::model($course,['route'=>['admin.courses.update',$course->course_id],'method'=>'PUT'])}}
                    {{HForm::input([
                        'name'=>'course_name',
                        'title'=>'Tên khóa học',
                        'width'=>'6',
                        ],$errors)}}


                    <div class="form-group  col-md-3">
                        <label>Ngày bắt đầu</label>
                        <input class="form-control input-medium date-picker" name="course_start" type="text" value="{{date('m/d/Y',$course->course_start)}}"/>
                        {{error_for('course_start',$errors)}}
                    </div>
                    <div class="form-group  col-md-3">
                        <label>Ngày kết thúc</label>
                        <input class="form-control input-medium date-picker" name="course_end" type="text" value="{{date('m/d/Y',$course->course_end)}}"/>
                        {{error_for('course_end',$errors)}}

                    </div>


                    {{HForm::input([
                        'name'=>'course_description',
                        'title'=>'Mô tả khóa học',
                        'type'=>'textarea',
                        ],$errors)}}


                        <div class="col-md-12" style="text-align: center;">
                            {{Form::submit('Cập nhật',['class'=>'btn blue'],$errors)}}

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