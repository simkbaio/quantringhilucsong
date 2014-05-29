@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Trang demo Dành cho Lập trình viên
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
                        <a href="{{URL::route('admin.teachers.index')}}">
                            Giáo viên
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>

                        {{$teacher->name}}
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
            {{portlet_open('Thông tin','blue')}}
            <div class="row">
                <div class="col-md-5">
                <h3>Thông tin cơ bản</h3>
                    <ul class="list-group">

                        <li class="list-group-item">Tên giáo viên: <span class="badge badge-info">{{$teacher->name}}</span></li>
                        <li class="list-group-item">Ngày tham gia: <span class="badge badge-info">{{date('d/m/Y',$teacher->join_date)}}</span> </li>
                        <li class="list-group-item">Ngày Kết thúc: <span class="badge badge-info">{{date('d/m/Y',$teacher->out_date)}}</span> </li>
                        <li class="list-group-item">số điện thoại: <span class="badge badge-info">{{$teacher->phone}}</span></li>
                        <li class="list-group-item">Địa chỉ: <span class="badge badge-info">{{$teacher->address}}</span></li>
                        <li class="list-group-item">Hòm thư: <span class="badge badge-info">{{$teacher->email}}</span></li>
                    </ul>
                </div>
                <div class="col-md-7">
                    <h3>Các lớp đang giảng dạy</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                        <thead>
                            <th>Tên lớp</th>
                            <th>Bắt đầu</th>
                            <th>Kết thúc</th>
                            <th>Lịch dạy</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($teacher->classes as $class)
                            <tr>
                                <td>{{$class->name}}</td>
                                <td></td>
                                <td></td>
                                <td><a href="#" class="btn btn-sm"><i class="fa fa-calendar"></i></a></td>
                                <td><a href="#" class="btn red btn-xs">Hủy</a></td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    </div>
                </div>
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