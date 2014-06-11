@extends('admin.layouts.master')
@section('header')
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
@stop
@section('footer')
<script type="text/javascript" src="/admin_assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/admin_assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {

        if (jQuery().timepicker) {
                        $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal

            $('.timepicker-default').timepicker({
                autoclose: true,
                showSeconds: true,
                minuteStep: 1
            });

            $('.timepicker-no-seconds').timepicker({
                autoclose: true,
                minuteStep: 5
            });

            $('.timepicker-24').timepicker({
                autoclose: true,
                minuteStep: 5,
                showSeconds: true,
                showMeridian: false
            });

            // handle input group button click
            $('#gio-bat-dau').parent('.input-group').on('click', '.input-group-btn', function(e){
                e.preventDefault();
                console.log("Click!");

                var test = $(this).parent('.input-group').find('.timepicker');
                console.log(test);
                test.timepicker('showWidget');
            });
            $('.clockface_1').clockface();

        }
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
                    Thông tin lớp: {{$class->name}} <a href="{{URL::route('admin.classes.edit',$class->id)}}" class="btn blue btn-xs">sửa thông tin lớp học</a
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
                        <a href="{{URL::route('admin.classes.index')}}">
                            Lớp học
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            {{$class->name}}
                        </a>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->

        <!-- Thêm học viên mới -->

        <div class="row">
            <div class="col-md-6">
                {{portlet_open('Thông tin cơ bản','yellow')}}
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">


                            <li class="list-group-item">Khóa học: <span class="badge badge-info">{{$class->course->name}}</span></li>
                            <li class="list-group-item">Ngày bắt đầu: <span class="badge badge-info">{{date('d/m/Y',$class->course->start)}}</span> </li>
                            <li class="list-group-item">Ngày Kết thúc: <span class="badge badge-info">{{date('d/m/Y',$class->course->end)}}</span> </li>
                            <li class="list-group-item">Giáo viên: <span class="badge badge-info">{{($class->teacher())?$class->teacher->name:'Chưa có'}}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Mô tả</h3>
                            </div>
                            <div class="panel-body">
                                {{$class->description}}
                            </div>
                        </div>
                    </div>
                </div>

                {{portlet_close()}}
            </div>
            <div class="col-md-6">
                {{portlet_open('Thêm học viên vào lớp','green')}}
                <div class="row">
                    {{Form::open(['route'=>['admin.classes.addstudent',$class->id]])}}
                    {{HForm::input([
                        'title'=>'Học viên',
                        'name'=>'student',
                        'type'=>'select',
                        'data_input'=>$class->notInStudents(),
                        'width'=>6,
                        ])}}
                        <div class="form-group col-md-12">
                            {{Form::submit('Thêm',['class'=>'btn green'])}}
                        </div>
                        {{Form::close()}}
                    </div>

                    {{portlet_close()}}
                </div>
            </div>

            <!-- Kết thúc thêm học viên mới -->
            <div class="row">
                <div class="col-md-12">
                    {{portlet_open('Danh sách học viên','blue')}}
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Kết quả học lực</th>
                                    <th>Kết quả hạnh kiểm</th>
                                    <th class="col-md-1">Hủy</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($class->students()->get() as $student)
                                <tr>
                                    <td>
                                        {{$student->student->name}}
                                    </td>
                                    <td>
                                        @if($student->result_type_academic)
                                        {{$student->result_type_academic}}
                                        @else
                                        Chưa xét duyệt
                                        @endif
                                    </td>
                                    <td>
                                     @if($student->result_type_conduct)
                                     {{$student->result_type_conduct}}
                                     @else
                                     Chưa xét duyệt
                                     @endif
                                 </td>
                                 <td><a href="#" class="btn red">Hủy</a></td>
                             </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>

                 {{portlet_close()}}
                 {{portlet_open('Lịch học','green')}}
                 <div class="row">
                     <div class="col-md-12">
                         <a class="btn green" data-toggle="modal" href='#add-new-schedule'>Thêm Lịch học</a>


                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-12">
                         @if($class->schedules->toArray())
                         <table class="table table-striped table-bordered table-advance table-hover">
                             <thead>
                                 <tr>
                                     <th>Thứ</th>
                                     <th>Vào lúc</th>
                                     <th>Địa điểm</th>
                                     <th></th>
                                     <th></th>

                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                 </tr>
                             </tbody>
                         </table> 
                         @else
                         <h2>Chưa có lịch học</h2>
                         @endif
                     </div>
                     {{portlet_close()}}
                 </div>
             </div>
         </div>
         <!-- END PAGE CONTENT-->
     </div>
 </div>
 <!-- END CONTENT -->
</div>
<div class="modal fade" id="add-new-schedule">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             <h4 class="modal-title">Thêm lịch học</h4>
         </div>
         <div class="modal-body">
             <div class="row">
                 {{Form::open(['route'=>['admin.classes.schedules.create',$class->id]])}}
                 {{HForm::input([
                    'title'=>'Thứ',
                    'name'=>'day',
                    'type'=>'select',
                    'data_input'=>Config::get('admin.days'),
                    'width'=>3,
                    ])}}
                    <div class="form-group col-m-3">
                        <label class="control-label">Giờ bắt đầu</label>
                        <div>
                            <div class="input-group">
                                <input type="text" id="gio-bat-dau" class="form-control timepicker timepicker-no-seconds">
                                <span class="input-group-btn">
                                    <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
                                </span>
                            </div>
                            <?php
                                $time = array();


                            ?>
                            <div class="form-group">
                                <label class="control-label col-md-3">Input</label>
                                <div class="col-md-3">
                                    <input type="text" value="2:30 PM" data-format="hh:mm A" class="form-control clockface_1"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>

            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary">Save changes</button>
         </div>
     </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop