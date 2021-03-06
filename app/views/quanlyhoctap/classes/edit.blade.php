@extends('admin.layouts.master')
@section('meta_title')
Nghị lực sống | Sửa thông tin lớp học
@stop


@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Sửa thông tin lớp học
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
                        <a href="{{URL::route("admin.classes.index")}} ">
                            lớp học
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            Sửa thông tin lớp học
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
                    {{Form::model($class,['route'=>['admin.classes.update',$class->id],'method'=>'PUT'])}}
                    {{HForm::input([
                        'name'=>'name',
                        'title'=>'Tên lớp học',
                        ],$errors)}}
                    {{HForm::input([
                        'name'=>'course_id',
                        'title'=>'Bộ môn',
                        'width'=>'6',
                        'type'=>'select',
                        'data_input'=>Course::getAllSelectData(),
                        ],$errors)}}
                    {{HForm::input([
                        'name'=>'teacher_id',
                        'title'=>'Giáo viên giảng dạy',
                        'width'=>'6',
                        'type'=>'select',
                        'data_input'=>Teacher::getAllSelectData(),
                        ],$errors)}}



                    {{HForm::input([
                        'name'=>'description',
                        'title'=>'Mô tả Bộ môn',
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