@extends('admin.layouts.master')
@section('meta_title')
Nghị lực sống | Thêm lớp học mới
@stop


@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Thêm lớp học mới
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
                            Thêm lớp học mới
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
                {{portlet_open('Nội dung cần nhập','green')}}
                
                {{flash_message()}}
                <div class="row">
                    {{Form::open(['route'=>'admin.classes.store'])}}
                    @if(Input::has('course'))
                    {{Form::hidden('course',Input::get('course'))}}
                    @endif
                    {{HForm::input([
                        'name'=>'name',
                        'title'=>'Tên lớp học',
                        ],$errors)}}

                    {{HForm::input([
                        'name'=>'course_id',
                        'title'=>'Khóa học',
                        'width'=>'6',
                        'type'=>'select',
                        'value'=>(Input::has('course')?Input::get('course'):Input::old('course_id')),
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
                        'title'=>'Mô tả khóa học',
                        'type'=>'textarea',
                        ],$errors)}}


                        <div class="col-md-12" style="text-align: center;">
                            {{Form::submit('Tạo lớp học mới',['class'=>'btn green'],$errors)}}

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