@extends('Statistic.layouts.master')
@section('content')
<div class="container">

<h1>
	Classes Statistic
</h1>
<table class="table table-bordered table-hover">
<?php
	$days_in_week = Config::get('admin.days');
?>
	<thead>
		<tr>
			<th>Class</th>
			<th>Course</th>
			<th>Schedules</th>
			<th>Student</th>
		</tr>
	</thead>
	<tbody>
		@foreach($classes as $class)
		<tr>
			<td>{{$class->name}}</td>
			<td>
			@if($class->course)
			{{$class->course->name}}
			@else
			<span class="label label-danger">Err</span> Class isn't any Course
			@endif
			</td>
			<td>

			@if($class->schedules)
				<ul>
				@foreach($class->schedules as $schedule)
					<li>{{$schedule->subject->name}} ({{$schedule->time_start}} - {{$schedule->time_end}}) {{$days_in_week[$schedule->day]}}</li>
				@endforeach
				</ul>
			@else
			Chưa có lịch học
			@endif	
			</td>
			<td>
				<ul style="list-style: none;">
                    @foreach($class->students as $student)
                    <li style=" display:inline-block;">{{$student->student->name}}</li> ,
                    @endforeach
				</ul>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@stop