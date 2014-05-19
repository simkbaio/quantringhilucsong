@extends('admin.layouts.master')
@section('meta_title')
Nghị lực sống | Thêm học viên mới
@stop
@section('content')
<div class="page-content-wrapper">
	<div class="page-content">


		<!-- BEGIN PAGE HEADER-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					Thêm học viên mới
				</h3>
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{URL::route('admin')}}">
							Trang chủ
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{URL::route("admin.students.index")}} ">
							Học viên
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">
							Thêm học viên mới
						</a>
					</li>
				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		<div class="row">
			<div class="col-md-12">
				{{portlet_open('Nội dung cần nhập','green')}}
				<div class="row">
					{{Form::open(['route'=>'admin.students.store'])}}
					{{HForm::input([
						'name'=>'stu_name',
						'title'=>'Tên học viên',
						'width'=>'6',
						],$errors)}}
					{{HForm::input([
						'name'=>'stu_sex',
						'title'=>'Giới tính',
						'type'=>'select',
						'data_input'=>Config::get('admin.sex'),
						'width'=>'2',
						],$errors)}}
					{{HForm::input([
						'name'=>'stu_birdday',
						'title'=>'Ngày sinh',
						'width'=>'4',
						],$errors)}}

					{{HForm::input([
						'name'=>'stu_address',
						'title'=>'Địa chỉ',
						'width'=>'4',
						],$errors)}}

					{{HForm::input([
						'name'=>'stu_hometown',
						'title'=>'Quê quán',
						'width'=>'4',
						],$errors)}}
					{{HForm::input([
						'name'=>'stu_province_id',
						'title'=>'Tỉnh thành',
						'type'=>'select',
						'data_input'=>Config::get('admin.province'),
						'width'=>'4',
						],$errors)}}

					{{HForm::input([
						'name'=>'stu_phone',
						'title'=>'Số điện thoại',
						'width'=>'4',
						],$errors)}}

					{{HForm::input([
						'name'=>'stu_email',
						'title'=>'Hòm Thư',
						'width'=>'4',
						],$errors)}}

					{{HForm::input([
						'name'=>'stu_facebook',
						'title'=>'Facebook',
						'width'=>'4',
						],$errors)}}



					{{HForm::input([
						'name'=>'stu_married',
						'title'=>'Tình trạng hôn nhân',
						'width'=>'4',
						],$errors)}}

					{{HForm::input([
						'name'=>'stu_educated',
						'title'=>'Học thức',
						'width'=>'4',
						],$errors)}}

					{{HForm::input([
						'name'=>'stu_type_disabilities',
						'title'=>'Loại khuyết tật',
						'type'=>'select',
						'width'=>'4',
						'data_input'=>Config::get('admin.disabilities'),
						],$errors)}}
						<div class="col-md-12">
							<h4>Thông tin người xác nhận</h4>

						</div>
						{{HForm::input([
							'name'=>'stu_person_authen_name',
							'title'=>'Người xác nhận',
							'width'=>'6',
							],$errors)}}

						{{HForm::input([
							'name'=>'stu_person_authen_address',
							'title'=>'Địa chỉ người xác nhận',
							'width'=>'6',
							],$errors)}}



							

						</div>
						{{portlet_close()}}
						{{portlet_open('Thông tin đăng nhập','purple')}}
						<div class="row">
						<div class="col-md-12"> 
								<label> Tài khoản đăng nhập:</label> email bạn dùng để đăng kí
						</div>	
							
							{{HForm::input([
								'name'=>'password',
								'title'=>'Mật khẩu đăng nhập',
								'type'=>'password',
								'width'=>'6',

								],$errors)}}
							{{HForm::input([
								'name'=>'password_confirmation',
								'title'=>'Gõ lại mật khẩu',
								'type'=>'password',
								'width'=>'6',

								],$errors)}}
							</div>
							{{portlet_close()}}
							<div class="col-md-12" style="text-align: center;">
								{{Form::submit('Tạo học viên mới',['class'=>'btn green'],$errors)}}

							</div>

						</div>
					</div>
					<!-- END PAGE CONTENT-->
				</div>
			</div>
			<!-- END CONTENT -->
		</div>


		@stop