@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Bảng điều khiển.
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
                        <a href="#">
                            Trang quản trị
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
                {{portlet_open('Bảng điều khiển','blue')}}
                <h3>Lưu ý trong quá trình DEV</h3>

</p>
                {{portlet_close()}}
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
</div>


@stop