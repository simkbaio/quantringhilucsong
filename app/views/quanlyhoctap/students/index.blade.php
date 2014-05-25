@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Quản lý Học viên
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
                        Quản lý Học viên

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
                <i class="fa fa-reorder"></i>Danh sách Học viên
                </div>
            </div>
            <div class="portlet-body">
<?php
$students = Student::orderBy('stu_name')->get();
?>
    <a href="{{URL::route('admin.students.create')}}" class="btn green" style="margin-bottom: 20px;">Tạo Học viên mới</a>

            <table class="table table-striped table-bordered table-advance table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ngày sinh</th>
                        <th class="col-md-1"></th>
                        <th class="col-md-1"></th>

                    </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->stu_id}}</td>
                        <td>
                        <a href="{{URL::route('admin.students.show',$student->stu_id)}}">{{ $student->stu_name}}</a></td>
                        <td>{{date('d-m-Y', $student->stu_birthday)}}</td>
                        <td>
                        <a href="{{URL::route("admin.students.edit", $student->stu_id)}}" class="btn blue"> <i class="fa fa-cogs"></i></a></td>
                        <td>
                            {{Form::open(['route'=>['admin.students.destroy', $student->stu_id],'method'=>'DELETE'])}}
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