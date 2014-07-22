@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Sửa thời khóa biểu
                </h3>
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{URL::route('admin')}}">
                            Trang chủ
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
                <?php 
                    $times = array();
                 $minues_arr =['00','15','20','25','30','35','45','40','45','50','55'];
                 for($i=6;$i<=22;$i++){
                    foreach($minues_arr as $j ){
                        if($i<10){
                            $times['0'.$i.":".$j]= '0'.$i.":".$j;
                        }
                        else{
                            $times[$i.":".$j]= $i.":".$j;
                        }
                    }
                 }

                 ?>
                    {{Form::model($schedule,['route'=>['admin.classes.schedules.update',$schedule->class_id,$schedule->id],'method'=>'PUT'])}}
                                 {{HForm::input([
                    'title'=>'Môn học',
                    'name'=>'subject_id',
                    'type'=>'select',
                    'data_input'=>Subject::getSelectData(),
                    'width'=>'6',
                ])}}
                {{HForm::input([
                    'title'=>'Giáo viên',
                    'name'=>'teacher_id',
                    'type'=>'select',
                    'data_input'=>Teacher::getAllSelectData(),
                    'width'=>6,
                ])}}
                 {{HForm::input([
                    'title'=>'Thứ',
                    'name'=>'day',
                    'type'=>'select',
                    'data_input'=>Config::get('admin.days'),
                    'width'=>4,
                    ])}}
                {{HForm::input([
                    'title'=>'Giờ bắt đầu',
                    'name'=>'time_start',
                    'type'=>'select',
                    'data_input'=>$times,
                    'width'=>4,

                ])}}
                {{HForm::input([
                    'title'=>'Giờ kết thúc',
                    'name'=>'time_end',
                    'type'=>'select',
                    'data_input'=>$times,
                    'width'=>4,

                ])}}
                {{HForm::input(
                [   
                    'title'=>'Địa điểm',
                    'name'=>'place',
                    'width'=>'12',
                ]
                )}}

                {{HForm::input(
                [
                    'title'=>'Ghi chú',
                    'name'=>'description',
                    'type'=>'textarea',
                    'width'=>'12',
                ]
                )}}




                    <div class="col-md-12" style="text-align: center;">
                        {{Form::submit('Cập nhật lịch học',['class'=>'btn blue'])}}

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