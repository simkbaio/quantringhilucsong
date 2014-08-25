@extends('frontend.layouts.master_nosidebar')
@section('content')
	{{Form::open(['url'=>'reset-password'])}}
	<div class="container">
	<legend>
		Mật khẩu mới sẽ được gửi vào hòm thư của bạn.
	</legend>
		<div class="row">
			{{HForm::input([
				'name'=>'email',
				'title'=>'Hòm thư',
				'width'=>'6'
			])}}
		</div>
		<div class="row">
			<div class="col-md-offset-3">
				{{Form::submit('Gửi mất khẩu',['class'=>'btn btn-info'])}}
			</div>
		</div>
	</div>
	{{Form::close()}}
@stop