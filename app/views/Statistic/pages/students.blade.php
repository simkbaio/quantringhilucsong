@extends('Statistic.layouts.master')
@section('content')
<div class="container">
	
<h1>
	Students Statistic
</h1>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>Class</th>
		</tr>
	</thead>
	<tbody>
		@foreach($students as $student)
		<tr>
			<td>{{$student->name}} - {{$student->email}}</td>
			<td>
				<ul>
					@foreach($student->n_class as $class)
					@if($class->n_class)
					<li style="list-style: none;">{{ $class->n_class->name }}</li>
					@else
					<span class="label label-danger">error:</span> Have class result but no Class information
					@endif
					@endforeach
				</ul>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>

@stop