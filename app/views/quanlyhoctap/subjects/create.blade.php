@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Tạo môn học mới
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
                        <a href="{{URL::route('admin.subjects.index')}}">
                            Quản lý môn học
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                {{portlet_open('Thông tin cần nhập','green')}}
                {{flash_message()}}
                                <div class="row">
                    {{Form::open(['route'=>'admin.subjects.store'])}}

                    {{HForm::input([
                        'name'=>'name',
                        'title'=>'Tên môn học',
                        'width'=>'6',
                        ],$errors)}}


                    {{HForm::input([
                        'name'=>'description',
                        'title'=>'Mô tả Bộ môn',
                        'type'=>'textarea',
                        ],$errors)}}


                        <div class="col-md-12" style="text-align: center;">
                            {{Form::submit('Tạo môn học mới',['class'=>'btn green'])}}

                        </div>

                        {{portlet_close()}}


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