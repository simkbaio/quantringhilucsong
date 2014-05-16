@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Quản lý Menu
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
                        Quản lý Menu

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
                <i class="fa fa-reorder"></i>Danh sách Menu
                </div>
            </div>
            <div class="portlet-body">
<?php
$menus = Menus::orderBy('id')->get();
?>
    <a href="{{URL::route('admin.menus.create')}}" class="btn green" style="margin-bottom: 20px;">Tạo bộ menu mới</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                @foreach($menus as $menuspack)
                    <tr>
                        <td>{{$menuspack->id}}</td>
                        <td>
                            {{Form::open(['route'=>['admin.menus.destroy',$menuspack->id],'action'=>'DELETE'])}}
                            {{Form::submit('DELETE',array("class"=>'btn red'))}}
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