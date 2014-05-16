@extends('admin.layouts.master')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{URL::to('admin_assets')}}/plugins/jquery-nestable/jquery.nestable.css" />
@stop
@section('footer')
    <script src="{{URL::to('admin_assets')}}/plugins/jquery-nestable/jquery.nestable.js" />ui-nestable.js"></script>
    <script type="text/javascript">
    var output_json;
    function update_order(data){
        $.ajax({
            type: "POST",
            url: '{{URL::to('admin/menuspacks/update-order/'.$menuspack->id)}}',
            data: data,
            contentType:'application/json',
            success: function(e){console.log(e)},
            dataType: JSON
});

    }
        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target);
            if (window.JSON) {
                data = window.JSON.stringify(list.nestable('serialize'));
                update_order(data);
            } else {
                console.log('JSON browser support required for this demo.');
            }
        };
     jQuery(document).ready(function($) {
            $('#nestable_list_1').nestable({})
            .on('change', updateOutput);
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
                    Bộ menu: {{$menuspack->name}}
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
                        <a href="{{URL::to('admin/menuspacks')}}">
                            Bộ menus
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            {{$menuspack->name}}
                        </a>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        {{flash_message()}}

        <!-- Tạo menu nhanh -->
        <div class="row">
            <div class="col-md-12">
                {{portlet_open('Tạo nhanh Menu','green')}}
                <div class="row">
                    {{Form::open(['route'=>['admin.menuspacks.menus.store',$menuspack->id]])}}
                    {{Form::hidden('menuspack_id',$menuspack->id)}}
                    {{HForm::input([
                        'title'=>'Tên',
                        'name'=>'title',
                        'width'=>'3',

                    ])}}
                    {{HForm::input([
                        'title'=>'Link',
                        'name'=>'link',
                        'width'=>'3',

                    ])}}
                    
                    {{HForm::input([
                        'type'=>'select',
                        'title'=>'Menu Gốc',
                        'name'=>'parent',
                        'width'=>'3',
                        'data_input'=>$menuspack->getMenusSelectData(),

                    ])}}
                    {{HForm::input([
                        'title'=>'Order',
                        'name'=>'order',
                        'width'=>'1',
                        'value'=>0,

                    ])}}
                    {{HForm::input([
                        'title'=>'Icon',
                        'name'=>'icon',
                        'width'=>'2',

                    ])}}
                    <div class="col-md-12">
                        {{Form::submit('Tạo',array('class'=>'btn green'))}}

                    </div>
                        {{Form::close()}}
                </div>

                    {{portlet_close()}}
                </div>
            </div>
            <!-- Kết thúc tạo menu nhanh -->
            <div class="row">
                <div class="col-md-12">

                    {{portlet_open('Danh sách menu','blue')}}
                    <?php
                        $menus = $menuspack->menus();
                    ?>
@if ($menus->count())
        <div class="dd" id="nestable_list_1">
            <ol class="dd-list">
            @foreach ($menus->orderBy('order')->whereParent(0)->get() as $menu)
                <li class="dd-item dd3-item" data-id="{{$menu->id}}">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content"><strong><a href="{{URL::to($menu->link)}}" class="tooltips" data-original-title="Xem thử đường dẫn" data-placement="right" title="">{{$menu->title}} <i class="{{$menu->icon}}"></i> </a><a class="pull-right tooltips" data-original-title="Xóa menu" data-placement="left"  href="{{URL::to('admin/menus/delete/'.$menu->id)}}" title=""><i class="glyphicon glyphicon-remove"></i>Delete</a>  <a href="{{URL::to('admin/menuspacks/'.$menuspack->id.'/menus/'.$menu->id.'/edit')}}" class="pull-right tooltips" data-original-title="Edit" data-placement="left"><i class="glyphicon glyphicon-edit"></i>Edit</a></strong></div>
                    @if($menu->child()->count() > 0 )
                    <ol class="dd-list">
                        @foreach ($menu->child()->orderBy('order')->get() as $menu)
                            <li class="dd-item dd3-item" data-id="{{$menu->id}}">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content"><strong><a href="{{URL::to($menu->link)}}" class="tooltips" data-original-title="Xem thử đường dẫn" data-placement="right" title="">{{$menu->title}} <i class="{{$menu->icon}}"></i></a><a class="pull-right tooltips" data-original-title="Xóa menu" data-placement="left"  href="{{URL::to('admin/menus/delete/'.$menu->id)}}" title=""><i class="glyphicon glyphicon-remove"></i>Delete</a>  <a href="{{URL::to('admin/menuspacks/'.$menuspack->id.'/menus/'.$menu->id.'/edit')}}" class="pull-right tooltips" data-original-title="Edit" data-placement="left"><i class="glyphicon glyphicon-edit"></i>Edit</a></strong></div>
                            @if($menu->child()->count() > 0 )
                    <ol class="dd-list">
                        @foreach ($menu->child()->orderBy('order')->get() as $menu)
                            <li class="dd-item dd3-item" data-id="{{$menu->id}}">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content"><strong><a href="{{URL::to($menu->link)}}" class="tooltips" data-original-title="Xem thử đường dẫn" data-placement="right" title="">{{$menu->title}} <i class="{{$menu->icon}}"></i></a><a class="pull-right tooltips" data-original-title="Xóa menu" data-placement="left"  href="{{URL::to('admin/menus/delete/'.$menu->id)}}" title=""><i class="glyphicon glyphicon-remove"></i>Delete</a>  <a href="{{URL::to('admin/menuspacks/'.$menuspack->id.'/menus/'.$menu->id.'/edit')}}" class="pull-right tooltips" data-original-title="Edit" data-placement="left"><i class="glyphicon glyphicon-edit"></i>Edit</a></strong></div>
                        </li>
                        @endforeach
                    </ol>
                    @endif
                        </li>
                        @endforeach
                    </ol>
                    @endif
                </li>
            @endforeach
 
                                    </ol>
                                </div>

        @else
    There are no menus
@endif 

         {{portlet_close()}}
     </div>
 </div>
 <!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->
</div>


@stop