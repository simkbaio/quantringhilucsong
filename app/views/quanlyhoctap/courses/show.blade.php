@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Thông tin khóa học: {{$course->course_name}}
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
                        <a href="{{URL::route('admin.courses.index')}}">
                            Khóa học
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        {{flash_message()}}
        <div class="row">

            <div class="col-md-12">
                {{portlet_open('Danh sách lớp học','blue')}}
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{URL::route('admin.classes.create',['course'=>$course->course_id])}}" class="btn btn green" style="margin-bottom: 10px;">Thêm lớp mới</a>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th>
                                Tên lớp
                            </th>
                            <th>
                                Chú thích
                            </th>
                            <th>Số học viên</th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($course->classes as $class)
                        <tr>
                            <td>
                                {{$class->class_name}}
                            </td>
                            <td>
                                {{$class->class_description}}
                            </td>
                            <td></td>
                            <td>


                                <a href="{{URL::route("admin.classes.edit",$class->class_id)}}" class="btn blue"> <i class="fa fa-cogs"></i></a>
                            </td>
                            <td>
                                {{Form::open(['route'=>['admin.classes.destroy',$class->class_id],'method'=>'DELETE'])}}
                                {{Form::submit('Xóa',array("class"=>'btn red'))}}
                                {{Form::close()}}
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                {{portlet_close()}}
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
</div>


@stop