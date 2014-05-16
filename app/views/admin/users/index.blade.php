@extends('admin.layouts.master')

@section('meta_title')
Nghị lực sống | Quản lý thành viên
@stop
<!-- Head Plugin -->
@section('head')
<link rel="stylesheet" type="/admin/text/css" href="/admin_assets/assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="/admin/text/css" href="/admin_assets/assets/plugins/select2/select2-metronic.css"/>
<link rel="stylesheet" href="/admin_assets/plugins/data-tables/DT_bootstrap.css"/>

@stop

<!--Footer Plugin -->
@section('footer')
<script type="text/javascript" src="/admin_assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/data-tables/DT_bootstrap.js"></script>
<script src="/admin_assets/scripts/custom/table-advanced.js"></script>
<script>
    jQuery(document).ready(function () {
        TableAdvanced.init();
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
                    Quản lý thành viên
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

                        Quản lý thành viên

                    </li>

                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        @if(Session::has('flash_message'))
        {{flash_message()}}
        @endif
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>
                    Quản lý thành viên
                </div>
                <div class="actions">
                    <div class="btn-group">

                    </div>
                </div>
            </div>
            <div class="portlet-body">


                <?php
                $users = User::orderBy('last_name')->get();
                ?>
                {{link_to_route('admin.users.create','Thêm thành viên mới',null,array('class'=>'default btn green','style'=>'margin-bottom:10px;'))}}
                <br/>
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                    <thead>
                        <tr>
                            <th>
                                Họ

                                Tên
                            </th>

                            <th>
                                Email
                            </th>
                            <th>
                                Group
                            </th>
                            <th>
                                Active
                            </th>

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->last_name}} {{$user->first_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <ul style="list-style: none;margin-left: 0px;padding-left: 0px;">
                                    @foreach($user->groups() as $group)
                                    <li>{{link_to_route('admin.groups.show',$group->name,$group->id)}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @if($user->activated)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge">None</span>
                                @endif

                            </td>
                            <td><a href="{{URL::route('admin.users.edit',$user->id)}}" class="btn blue">Edit</a></td>
                            <td>
                                {{Form::open(array(
                                    'route'=> array('admin.users.destroy',$user->id),
                                    'method'=>'delete',
                                    ))}}
                                    {{Form::submit('Delete',['class'=>'btn red'])}}
                                    {{Form::close()}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
</div>


@stop