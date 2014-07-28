@extends('frontend.layouts.master')
@section('footer')
<script src="/frontend_assets/extra/datetimepicker/bootstrap-datetimepicker.js"></script>
<script>
	jQuery(document).ready(function($) {
		$('#datetimepicker3').datetimepicker({
		pickTime: false
	});
	});
</script>
@stop
@section('content')
@if(Session::has("flash_message"))
<div class="col-sm-12"> 
	<div class="well well-success-light-text">
		<h4><a href="">Thông báo!</a></h4>
		{{Session::get("flash_message")}}
	</div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				{{Form::model($student,['route'=>['admin.students.update',$student->id],'method'=>'PUT'])}}
				<legend> Thông tin cơ bản</legend>
				<div class="row">
					{{HForm::input([
						'name'=>'name',
						'title'=>'Tên học viên',
						'width'=>'6',
						],$errors)}}
					{{HForm::input([
						'name'=>'province_id',
						'title'=>'Tỉnh thành',
						'type'=>'select',
						'data_input'=>Config::get('admin.province'),
						'width'=>'4',
						],$errors)}}
					</div>
					<div class="row">
						{{HForm::input([
							'name'=>'sex',
							'title'=>'Giới tính',
							'type'=>'select',
							'data_input'=>Config::get('admin.sex'),
							'width'=>'3',
							],$errors)}}

							<div class="form-group col-md-4">
								<label class="control-label">Ngày sinh</label>
								<div class='input-group date' id='datetimepicker3'>
								<input type='text' name="birthday" value="{{date('m/d/Y',$student->birthday)}}" class="form-control" data-format='MM/dd/yyyy'>
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>

							</div>
						</div>

						{{HForm::input([
							'name'=>'address',
							'title'=>'Địa chỉ',
							'width'=>'6',
							],$errors)}}

						{{HForm::input([
							'name'=>'hometown',
							'title'=>'Quê quán',
							'width'=>'6',
							],$errors)}}


						{{HForm::input([
							'name'=>'phone',
							'title'=>'Số điện thoại',
							'width'=>'4',
							],$errors)}}

						<div class="form-group col-md-4">
						    <label for="name" class="control-label">Email</label>
						    <div class="controls">
						    	<input type="text" name="email" class="form-control"  value="{{$student->email}}" disabled="" required="required" pattern="" title="">
						
						    </div>
						</div>

						{{HForm::input([
							'name'=>'facebook',
							'title'=>'Facebook',
							'width'=>'4',
							],$errors)}}



						{{HForm::input([
							'name'=>'married',
							'title'=>'Tình trạng hôn nhân',
							'width'=>'4',
							'type'=>'select',
							'data_input'=>Config::get('admin.married'),
							],$errors)}}

						{{HForm::input([
							'name'=>'educated',
							'title'=>'Học thức',
							'width'=>'4',
							'type'=>'select',
							'data_input'=>Config::get('admin.educated'),
							],$errors)}}

						{{HForm::input([
							'name'=>'type_disabilities',
							'title'=>'Loại khuyết tật',
							'type'=>'select',
							'width'=>'4',
							'data_input'=>Config::get('admin.disabilities'),
							],$errors)}}
							<legend>Thông tin người xác nhận</legend>

							{{HForm::input([
								'name'=>'person_authen_name',
								'title'=>'Người xác nhận',
								'width'=>'6',
								],$errors)}}

							{{HForm::input([
								'name'=>'person_authen_address',
								'title'=>'Địa chỉ người xác nhận',
								'width'=>'6',
								],$errors)}}
								<legend>Đổi mật khẩu</legend>
								{{HForm::input([
									'name'=>'new_password',
									'title'=>'Mật khẩu mới',
									'type'=>'password',
									'width'=>'6',
									],$errors)}}
								{{HForm::input([
									'name'=>'new_password_confirmation',
									'title'=>'Gõ lại mật khẩu mới',
									'type'=>'password',
									'width'=>'6',
									],$errors)}}
									<div class="col-md-12" style="text-align: center;">
										{{Form::submit('Cập nhật thông tin',['class'=>'btn btn-info'])}}
										<a href="/dashbroad" title="" class="btn btn-default"> Quay trở lại</a>

									</div>

								</div>

								{{Form::close()}}
							</div>
						</div>
						<!-- END PAGE CONTENT-->
					</div>
				</div>
				@stop