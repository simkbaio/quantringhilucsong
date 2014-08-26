@extends('Statistic.layouts.master')
@section('content')
<div class="container">

<h1>
	Classes Statistic
</h1>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Class</th>
			<th>Course</th>
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