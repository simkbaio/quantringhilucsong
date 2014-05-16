@extends('admin.layouts.master')
@section('meta_title')
   Nghị Lực Sống | Quản lý nhóm thành viên
@stop

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Quản lý nhóm thành viên
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
                        <a href="#">
                            Nhóm thành viên
                        </a>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        {{flash_message()}}
        <a href="{{URL::route('admin.groups.create')}}" class="btn green" style="margin-bottom: 10px;"> Tạo mới</a>
        <div class="row">
            <div class="col-md-12">
                {{portlet_open('Quản lý nhóm thành viên','blue')}}
                <?php 
                $groups = Sentry::findAllGroups();
                ?>
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Quyền truy cập</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                        <tr>
                            <td>{{$group->id}}</td>
                            <td>{{$group->name}}</td>
                            <td>
                                <?php $permissions = $group->getPermissions() ?>
                            @foreach(Permission::orderBy('name')->get() as $permission)
                            @if($group->hasAccess($permission->name))
                            <span class="badge badge-success">{{$permission->name}}</span>
                            
                            @endif
                            @endforeach


                            </td>
                            <td class="col-md-1"><a href="{{URL::route('admin.groups.edit',$group->id)}}" class="btn blue">EDIT</a></td>
                            <td class="col-md-1">
                                {{Form::open(['route'=>['admin.groups.destroy',$group->id],'method'=>'DELETE'])}}
                                {{Form::submit('DELETE',array('class'=>'btn red'))}}
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