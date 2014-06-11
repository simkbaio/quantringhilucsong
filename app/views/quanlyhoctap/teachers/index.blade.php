@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Quản lý giáo viên
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
                        Quản lý giáo viên

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
                <i class="fa fa-reorder"></i>Danh sách giáo viên
                </div>
            </div>
            <div class="portlet-body">
<?php
$teachers = Teacher::orderBy('name')->get();
?>
    <a href="{{URL::route('admin.teachers.create')}}" class="btn green" style="margin-bottom: 20px;">Thêm giáo viên mới</a>

            <table class="table table-striped table-bordered table-advance table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ngày gia nhập</th>
                        <th>Ngày kết thúc</th>
                        <th class="col-md-1"></th>
                        <th class="col-md-1"></th>

                    </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{$teacher->id}}</td>
                        <td>
                        <a href="{{URL::route('admin.teachers.show',$teacher->id)}}">{{$teacher->name}}</a></td>

                        <td>{{date('d-m-Y',$teacher->join_date)}}</td>
                        <td>{{date('d-m-Y',$teacher->out_date)}}</td>
                        <td>
                        <a href="{{URL::route("admin.teachers.edit",$teacher->id)}}" class="btn blue"> <i class="fa fa-cogs"></i></a>
                        </td>
                        <td>
                            {{Form::open(['route'=>['admin.teachers.destroy',$teacher->id],'method'=>'DELETE'])}}
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