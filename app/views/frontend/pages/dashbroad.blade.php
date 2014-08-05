@extends('frontend.layouts.master')
@section('content')
@if($account->StudentInfo())
@if($account->StudentInfo()->NotCompleteProfile())
	<div class="alert alert-success-light-color fade in">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<p>
		<i class="fa fa-trophy"></i> <strong>Well done!</strong> Bạn đã đăng ký tài khoản thành công . Chúng tôi cần bạn cung cấp thêm thông tin cá nhân để thuận tiện cho việc quản lý của Trung tâm Nghị Lực Sống.
	</p>
	<p>
		<a type="button" class="btn btn-success" href="/student-profile">Cập nhật thông tin cá nhân</a>
		
	</p>
</div> 
@endif 
@endif
<div class="panel panel-light-white">
	<div class="panel-heading">
		<h3 class="panel-title">Thông tin chung</h3>
	</div>
	<div class="panel-body">
	<!-- Flash message -->
	@if(Session::has('flash_message'))
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{Session::get('flash_message')}}
	</div>
	@endif
	<!-- End flash message -->

	</div>
	<div class="panel-footer">
<!-- 		<a type="button" class="btn btn-light" href="/student-profile"><i class="fa fa-check-circle-o"></i> Sửa thông tin cá nhân</a>
		<button type="button" class="btn btn-primary" onClick="window.location='change_pass.html'"><i class="fa fa-folder-open"></i> Đổi mật khẩu</button> -->
	</div>
</div>
@stop