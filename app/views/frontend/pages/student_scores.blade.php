@extends('frontend.layouts.master')
@section('content')
@foreach($current_class as $class)
<h3>
	Lớp: {{$class->n_class->name}}
</h3>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>môn</th>
				<th>Điểm số</th>
			</tr>
		</thead>
		<tbody>
		@foreach($class->n_class->subjects as $subject)
			<tr>
				<td>{{$subject->subject->name}}</td>
				<td>
				<?php $score = StudentScore::hasScore($account->StudentInfo()->id,$subject->subject_id)?>
				@if($score)
				{{$score}}
				@else
				chưa có điểm
				@endif
				</td>
			</tr>
		
		@endforeach
		</tbody>
	</table>
</div>
@endforeach

@stop