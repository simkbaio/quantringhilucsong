@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">


		<!-- BEGIN PAGE HEADER-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					Thông tin học viên: {{$student->stu_name}} <a href="{{URL::route('admin.students.edit',$student->stu_id)}}" class="btn btn-xs blue">Sửa thông tin sinh viên</a>
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
						<a href="{{URL::route('admin.students.index')}}">
							Học viên
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">
							{{$student->stu_name}}
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
				{{portlet_open('Thông tin cơ bản','green')}}
				<div class="row">
					<div class="col-md-6">
						<ul class="list-group">

							<li class="list-group-item">
								Họ tên
								<span class="label label-info pull-right">
									{{$student->stu_name}}
								</span>
							</li>
							<li class="list-group-item">
								Ngày sinh
								<span class="label label-info pull-right">
									{{date('d/m/Y',$student->stu_birthday)}}
								</span>
							</li>
							<li class="list-group-item">
								Giới tính
								<span class="label label-info pull-right">
									{{Config::get('admin.sex')[$student->stu_sex]}}
								</span>
							</li>
							<li class="list-group-item">
								Địa chỉ
								<span class="label label-info pull-right">
									{{$student->stu_address}}
								</span>
							</li>
							<li class="list-group-item">
								Quê quán
								<span class="label label-info pull-right">
									{{$student->stu_hometown}}
								</span>
							</li>
							<li class="list-group-item">
								Tỉnh thành
								<span class="label label-info pull-right">
									{{Config::get('admin.province')[$student->stu_province_id]}}
								</span>
							</li>
							<li class="list-group-item">
								Số điện thoại
								<span class="label label-info pull-right">
									{{$student->stu_phone}}
								</span>
							</li>
							<li class="list-group-item">
								Hòm thư
								<span class="label label-info pull-right">
									{{$student->stu_email}}
								</span>
							</li>

							<li class="list-group-item">
								Facebook
								<span class="label label-info pull-right">
									{{$student->stu_facebook}}
								</span>
							</li>



						</ul>

					</div>
					<div class="col-md-6">
						<ul class="list-group">
							<li class="list-group-item">
								Tình trạng hôn nhân
								<span class="label label-info pull-right">
									{{Config::get('admin.married')[$student->stu_married]}}
								</span>
							</li>

							<li class="list-group-item">
								Học thức
								<span class="label label-info pull-right">
									{{Config::get('admin.educated')[$student->stu_educated]}}
								</span>
							</li>

							<li class="list-group-item">
								Loại khuyết tật
								<span class="label label-info pull-right">
									{{Config::get('admin.disabilities')[$student->stu_type_disabilities]}}
								</span>
							</li>

							<li class="list-group-item">
								Người xác nhận
								<span class="label label-info pull-right">
									{{$student->stu_person_authen_name}}
								</span>
							</li>
							<li class="list-group-item">
								Địa chỉ người xác nhận
								<span class="label label-info pull-right">
									{{$student->stu_person_authen_address}}
								</span>
							</li>
							<li class="list-group-item">
								Ngày đăng kí
								<span class="label label-info pull-right">
									{{date('d-m-Y',$student->stu_regis_date)}}
								</span>
							</li>
						</ul>


					</div>

				</div>
			</div>
		</div>
		<!-- END PAGE CONTENT-->
	</div>
</div>
<!-- END CONTENT -->
</div>


@stop