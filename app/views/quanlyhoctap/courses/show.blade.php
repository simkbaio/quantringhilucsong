@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Thông tin khóa học: {{$course->name}} <a href="{{URL::route('admin.courses.edit',$course->id)}}" class="btn blue btn-sm">sửa thông tin</a>
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
                {{portlet_open('Thông tin cơ bản')}}
                <div class="row">
                    <div class="col-md-5">
                        <ul class="list-group">

                        <li class="list-group-item">Tên: <span class="badge badge-info">{{$course->name}}</span>
                        </li>
                        <li class="list-group-item">Bắt đầu: <span class="badge badge-info">{{date('d/m/Y',$course->start)}}</span>
                        </li>
                        <li class="list-group-item">Kết thúc: <span class="badge badge-info">{{date('d/m/Y',$course->end)}}</span>
                        </li>

                    </ul>
                    </div>
                </div>
                {{portlet_close()}}
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                {{portlet_open('Danh sách lớp học','blue')}}
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{URL::route('admin.classes.create',['course'=>$course->id])}}" class="btn btn green" style="margin-bottom: 10px;">Thêm lớp mới</a>
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
                                {{$class->name}}
                            </td>
                            <td>
                                {{$class->description}}
                            </td>
                            <td></td>
                            <td>


                                <a href="{{URL::route("admin.classes.edit",$class->id)}}" class="btn blue"> <i class="fa fa-cogs"></i></a>
                            </td>
                            <td>
                                {{Form::open(['route'=>['admin.classes.destroy',$class->id],'method'=>'DELETE'])}}
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