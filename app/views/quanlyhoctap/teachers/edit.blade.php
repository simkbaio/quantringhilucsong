@extends('admin.layouts.master')
@section('meta_title')
Nghị lực sống | Sửa thông tin giáo viên
@stop
@section('footer')
<script type="text/javascript" src="/admin_assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script>
jQuery(document).ready(function($) {
$(".date_formated").inputmask("m/d/y", {
            "placeholder": "_ "
        });
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
                    Sửa thông tin giáo viên
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
                        <a href="{{URL::route("admin.teachers.index")}} ">
                        giáo viên
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            Sửa thông tin giáo viên
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
                {{portlet_open('Nội dung cần nhập','green')}}
                <div class="row">
                    {{Form::model($teacher,['route'=>['admin.teachers.update',$teacher->teacher_id],'method'=>'PUT'])}}
                    {{HForm::input([
                    'name'=>'teacher_name',
                    'title'=>'Tên giáo viên',
                    'width'=>'6',
                    ],$errors)}}


                    {{HForm::input([
                    'name'=>'teacher_address',
                    'title'=>'Địa chỉ',
                    'width'=>'4',
                    ],$errors)}}



                    {{HForm::input([
                    'name'=>'teacher_phone',
                    'title'=>'Số điện thoại',
                    'width'=>'6',
                    ],$errors)}}

                    {{HForm::input([
                    'name'=>'teacher_email',
                    'title'=>'Hòm Thư',
                    'width'=>'6',
                    ],$errors)}}
                    <div class="form-group col-md-6">
                        <label class="control-label">Ngày gia nhập</label>
                        <div>
                        <input type="text" class="date_formated  form-control" name="teacher_join_date" class="form-control" value="{{date("m-d-Y",$teacher->teacher_join_date)}}">
                            <span class="help-block">
                                Nhập theo định dạng (tháng/ngày/năm)
                            </span>
                        </div>
                    </div>
                        <div class="form-group col-md-6">
                        <label class="control-label">Ngày kết thúc</label>
                        <div>
                        <input type="text" class="date_formated form-control" name="teacher_out_date" class="form-control" value="{{date("m/d/Y",$teacher->teacher_out_date)}}">
                            <span class="help-block">
                                Nhập theo định dạng (tháng/ngày/năm) {{date("m-d-Y",$teacher->teacher_out_date)}}
                        </div>
                    </div>
                    <div class="col-md-12" style="text-align: center;">
                            {{Form::submit('Tạo giáo viên mới',['class'=>'btn green'],$errors)}}

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