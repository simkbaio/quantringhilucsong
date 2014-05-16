@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Sửa menu: {{$menu->title}}
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
                        <a href="{{URL::route('admin.menuspacks.show',$menu->menuspack()->id)}}">
                            {{$menu->menuspack()->name}}
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            {{$menu->title}}
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
                {{portlet_open('Thông tin chỉnh sửa','blue')}}
                <div class="row">
                    {{Form::open([
                    'route'=>['admin.menuspacks.menus.update',$menu->menuspack()->id,$menu->id],'method'=>'PUT'
                ])}}
                {{Form::hidden('menuspack_id',$menu->menuspack()->id)}}
                    {{HForm::input([
                        'name'=>'title',
                        'title'=>'Tên',
                        'value'=>$menu->title,
                    ])}}
                    {{HForm::input([
                        'name'=>'link',
                        'title'=>'Link',
                        'value'=>$menu->link,
                    ])}}
                    {{HForm::input([
                          'type'=>'select',
                         'name'=>'parent',
                         'data_input'=>$menu->menuspack()->getMenusSelectData(),
                        'title'=>'Menu Gốc',
                        'value'=>$menu->parent,
                    ])}}
                    {{HForm::input([
                        'name'=>'icon',
                        'title'=>'Icon',
                        'value'=>$menu->icon,
                    ])}}
                    <div class="form-group col-md-12">
                        {{Form::submit('Cập nhật',['class'=>'btn blue'])}}
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