@extends('frontend.layouts.master_nosidebar')
@section('content')
<div class="row">
	<div class="col-md-12" style="text-align: center">
		<div class="well well-light-border">
			{{isset($content)?$content:"Oop Something wrong!"}}
		</div>
		<a href="{{URL::to('/')}} " title="">Click Vào đây để quay trở về trang chủ</a>

	</div>
</div>
@stop