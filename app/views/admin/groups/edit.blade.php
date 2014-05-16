@extends('admin.layouts.master')
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/bootstrap-select/bootstrap-select.min.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/select2/select2-metronic.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/jquery-multi-select/css/multi-select.css"/>
@section('footer')
<script type="text/javascript" src="/admin_assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admin_assets/scripts/core/app.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#all_permissions').multiSelect();
});
</script>
@stop

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Tạo mới nhóm
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
                        <a href="{{URL::route('admin.groups.index')}}">
                            Nhóm thành viên
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            {{$group->name}}
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
                {{portlet_open('Nhập thông tin cần sửa','blue')}}
                <div class="row">
                    {{Form::model($group,['route'=>['admin.groups.update',$group->id],'method'=>'PUT'])}}

                    {{HForm::input([
                        'title'=>'Tên nhóm',
                        'name'=>'name',
                        'width'=>'6'
                        ],$errors)}}
                        <div class="col-md-6">
                        {{Form::label('permissions','Thiết lập quyền của nhóm',array('class'=>'form-label'))}}
                        <?php 
                            $all_permissions = Permission::orderBy('name')->get();
                         ?>
                         @if($all_permissions->count())
                            <select multiple="multiple" class="multi-select" id="all_permissions" name="permissions[]">
                            @foreach(Permission::orderBy('name')->get() as $per)
                            <option value ="{{$per->name}}"
                            @if($group->hasAccess($per->name))
                            selected
                            @endif
                            ">{{$per->name}}</option>
                            @endforeach

                        </select>
                        @else
                        <p>Chưa tạo bất kì quyền nào</p>
                        @endif
                        </div>
                        <div class="col-md-12">
                        {{Form::submit('Cập nhật',['class'=>'btn blue','style'=>'margin-top:10px;'])}}
                        </div>
                        {{Form::close()}}
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