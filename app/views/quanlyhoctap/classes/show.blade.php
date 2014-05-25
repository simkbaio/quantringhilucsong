@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Thông tin lớp: {{$class->class_name}} <a href="{{URL::route('admin.classes.edit',$class->class_id)}}" class="btn blue btn-xs">sửa thông tin lớp học</a
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
                            {{$class->class_name}}
                        </a>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->

        <!-- Thêm sinh viên mới -->
        <div class="row">
            <div class="col-md-6">
                {{portlet_open('Thông tin cơ bản','yellow')}}
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">


                            <li class="list-group-item">Khóa học: <span class="badge badge-info">{{$class->course->course_name}}</span></li>
                            <li class="list-group-item">Ngày bắt đầu: <span class="badge badge-info">{{date('d/m/Y',$class->course->course_start)}}</span> </li>
                            <li class="list-group-item">Ngày Kết thúc: <span class="badge badge-info">{{date('d/m/Y',$class->course->course_end)}}</span> </li>
                            <li class="list-group-item">Giáo viên: <span class="badge badge-info">{{($class->teacher())?$class->teacher->teacher_name:'Chưa có'}}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                            <h3 class="panel-title">Mô tả</h3>
                            </div>
                            <div class="panel-body">
                                {{$class->class_description}}
                         </div>
                     </div>
                 </div>
             </div>

             {{portlet_close()}}
         </div>
         <div class="col-md-6">
            {{portlet_open('Thêm sinh viên vào lớp','green')}}
            <div class="row">
                {{Form::open(['route'=>['admin.classes.addstudent',$class->class_id]])}}
                {{HForm::input([
                    'title'=>'Sinh viên',
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

        <!-- Kết thúc thêm sinh viên mới -->
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
                                {{$student->student->stu_name}}
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
           </div>
       </div>
       <!-- END PAGE CONTENT-->
   </div>
</div>
<!-- END CONTENT -->
</div>


@stop