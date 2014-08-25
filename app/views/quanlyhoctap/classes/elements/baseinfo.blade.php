{{portlet_open('Thông tin cơ bản','yellow')}}
@if($class->course)
<div class="row">
  <div class="col-md-6">
    <ul class="list-group">


      <li class="list-group-item">Bộ môn: <span class="badge badge-info">{{$class->course->title}}</span></li>
      <li class="list-group-item">Ngày bắt đầu: <span class="badge badge-info">{{date('d/m/Y',$class->course->start)}}</span> </li>
      <li class="list-group-item">Ngày Kết thúc: <span class="badge badge-info">{{date('d/m/Y',$class->course->end)}}</span> </li>
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
@else
Error Database: The class have no Course. Plz fix soon;
@endif
{{portlet_close()}}