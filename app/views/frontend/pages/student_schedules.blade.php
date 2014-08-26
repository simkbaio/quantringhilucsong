@extends('frontend.layouts.master')
<!-- Custom style -->
@section('head')
<style type="text/css" media="screen">
	.schedules_table .schedule_info {
		list-style:none;
		font-size:10px;
		padding-left:5px;
		border-bottom: 1px solid;
		
	}
</style>	

@stop
<!-- Content -->
@section('content')
<h3>Lịch học</h3>
<div class="row">
    @foreach($all_schedules as $schedules)
    <?php
    $class = $schedules['class'];
    ?>
    <h4>Lớp: {{$class->name}}</h4>
    <table class="table table-hover table-bordered schedules_table">
        <thead>
            <tr>
                <th>Môn</th>
                <th>Thứ 2</th>
                <th>Thứ 3</th>
                <th>Thứ 4</th>
                <th>Thứ 5</th>
                <th>Thứ 6</th>
                <th>Thứ 7</th>
                <th>Chủ nhật</th>
            </tr>
        </thead>
        <tbody>
            @foreach(array_keys($schedules) as $key)
            <tr>
                <td>{{$key}}</td>
                @for($i=1;$i<=7;$i++)
                @if(isset($schedules[$key][$i]))
                <td>
                    @foreach ($schedules[$key][$i] as $e)

                    <ul class="schedule_info">
                        <li><b>Bắt đầu</b>:<br/> {{$e->time_start}} </li>
                        <li><b>Kết thúc</b>:<br/> {{$e->time_end}} </li>
                        <li><b>Địa điểm</b>:<br/> {{$e->place}} </li>
                        @if($e->teacher)
                        <li><b>Giáo viên</b>:<br/> {{$e->teacher->name}} </li>
                        @else
                        <li><b>Chưa phân giáo viên</b></li>
                        @endif
                    </ul>
                    @endforeach
                </td>
                @else
                <td></td>
                @endif
                @endfor
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
</div>
@stop