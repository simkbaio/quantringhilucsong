@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Quản lý lớp học
                </h3>
                <ul class="page-breadcrumb breadcrumb">

                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{URL::to('admin')}}">
                            Trang chủ
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        Quản lý lớp học

                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        {{flash_message()}}
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>Danh sách lớp học
                </div>
            </div>
            <div class="portlet-body">
                <?php
                $classes = NClass::orderBy('class_name')->get();
                ?>
                <a href="{{URL::route('admin.classes.create')}}" class="btn green" style="margin-bottom: 20px;">Thêm lớp học mới</a>

                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Khóa học</th>
                            <th>Giáo viên

                                <th class="col-md-1"></th>
                                <th class="col-md-1"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes as $class)
                            <tr>
                                <td>{{$class->class_id}}</td>
                                <td>
                                    <a href="{{URL::route('admin.classes.show',$class->class_id)}}">{{$class->class_name}}</a></td>
                                     <td>{{$class->course->course_name}}</td>
                                        <td>{{$class->teacher->teacher_name}}</td>


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

                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>


@stop