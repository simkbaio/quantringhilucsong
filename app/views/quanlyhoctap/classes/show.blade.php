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
<script type="text/javascript" src="/admin_assets/scripts/custom/class.js"></script>

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
    {{flash_message()}}
    <div class="row">

      <div class="col-md-6">
        @include('quanlyhoctap.classes.elements.baseinfo', array('some' => 'data'))
      </div>
      <div class="col-md-6">
        {{portlet_open('Thêm thông tin','green')}}
        <div class ="row"><div class="col-md-12">
          <legend class="form-legend" style="font-size: 14px;font-weight: bold;">Thêm học viên</legend>
          {{Form::open(['route'=>['admin.classes.addstudent',$class->id]])}}
          {{HForm::input([
            'title'=>'Học viên',
            'name'=>'student',
            'type'=>'select',
            'data_input'=>$class->notInStudents(),
            'width'=>12,
            ])}}
            <div class="form-group col-md-12">
              {{Form::submit('Thêm',['class'=>'btn green'])}}
            </div>
            {{Form::close()}}
          </div>

          <!-- Them mon hoc -->
          <div class="col-md-12">
            <legend class="form-legend"  style="font-size: 14px;font-weight: bold;">Thêm môn học</legend>
            {{Form::open(['route'=>['admin.classes.addsubject',$class->id]])}}
            {{HForm::input([
              'title'=>'Môn học',
              'name'=>'subject',
              'type'=>'select',
              'data_input'=>($class->subjects_not_in())?$class->subjects_not_in():[],
              'width'=>12,
              ])}}
              <div class="form-group col-md-12">
                {{Form::submit('Thêm',['class'=>'btn green'])}}
              </div>
              {{Form::close()}}
            </div>
            <!-- Ket thuc them mon hoc -->
          </div>

          {{portlet_close()}}
        </div>
      </div>

      <!-- Kết thúc thêm học viên mới -->
      <style>

      </style>
      <div class="row">
        <div class="col-md-12">
          {{portlet_open('Danh sách môn học','green')}}
          <table class="table table-striped table-bordered table-advance table-hover">
            <thead>
              <tr>
                <th>Tên</th>
                <th>Trạng thái</th>
                <th class="col-md-1">Hủy</th>
              </tr>
            </thead>
            <tbody>
              @foreach($class->subjects  as $subject)
              <tr>
                <td>{{$subject->subject->name}}</td>
                <td>
                  <div class="form-group  col-md-6">
                    {{Form::select('status',[
                    '0'=>'Chưa bắt đầu',
                    '1'=>'Đang học',
                    '2'=>'Đã kết thúc',
                    ],$subject->status,[
                    'class'=>'form-control subject-status',
                    'class-subject-id'=>$subject->id,
                    'class-id'=>$class->id])
                  }}
                  </div>

                  </td>
                  <td>
                    <a href="{{URL::route("admin.classes.removesubject",[$class->id,$subject->subject->id])}}" class="btn btn-sm btn-danger">Hủy</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>


            {{portlet_close()}}
          </div>
        </div>
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
                  <?php
                  if(!$student->student){
                    $student->delete();
                    continue;
                  }
                  ?>

                  <tr>
                    <td>
                      {{isset($student->student->name)?$student->student->name:'no name!'}}
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
                   <td><a href="{{URL::route('admin.classes.removestudent',[$class->id,$student->student->id])}}" class="btn red">Hủy</a></td>
                 </tr>
                 @endforeach
               </tbody>
             </table>
           </div>

           {{portlet_close()}}
           {{portlet_open('Lịch học','green')}}
           <div class="row">
             <div class="col-md-12">
               <a class="btn green" data-toggle="modal" href='#add-new-subject'>Thêm lịch học</a>


             </div>
           </div>
           <div class="row">
             <div class="col-md-12">
               @if($class->schedules)
               <table class="table table-striped table-bordered table-advance table-hover">
                 <thead>
                   <tr>
                    <th>Môn học </th>
                    <th>Thứ</th>
                    <th>Băt đầu</th>
                    <th>Kết thúc</th>
                    <th>Địa điểm</th>
                    <th></th>
                    <th></th>

                  </tr>
                </thead>
                <tbody>
                 @foreach($class->schedules as $item)
                 <tr>
                   <td>{{ $item->subject->name }}</td>
                   <td>{{Config::get('admin.days')[$item->day]}}</td>
                   <td>{{ $item->time_start}}</td>
                   <td>{{ $item->time_end}}</td>
                   <td>{{ $item->place}}</td>
                   <td><a href="{{URL::route('admin.classes.schedules.edit',[$class->id,$item->id])}}" title="" class="btn blue">EDIT</a></td>
                   <td><a href="{{URL::route('admin.classes.schedules.delete',$item->id)}}" title="" class="btn red">DELETE</a></td>
                 </tr>
                 @endforeach
               </tbody>
             </table> 
             @else
             <h2>Chưa có môn học nào</h2>
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

<div class="modal fade" id="add-new-subject">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title">Thêm lịch học</h4>
     </div>
     <div class="modal-body">
       <p>Môn học chưa có trong danh sách? Hãy <a href="{{URL::route('admin.subjects.create')}}" title="">Thêm môn học mới tại đây</a></p>
       <div class="row">
         {{Form::open(['route'=>['admin.classes.schedules.store',$class->id]])}}
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
        {{ Form::hidden('class_id',$class->id) }}
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


        </div>

      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       {{Form::submit('Thêm',['class'=>'btn btn-primary'])}}
       {{Form::close()}}
     </div>
   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop