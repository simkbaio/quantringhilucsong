@extends('admin.layouts.master')
@section('footer')
<script type="text/javascript" src="/admin_assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script>
jQuery(document).ready(function($) {
$("#mask_date1").inputmask("m/d/y", {
            "placeholder": "*"
        });
});
</script>
<script src="http://malsup.github.com/jquery.form.js"></script> 
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admin_assets/scripts/core/app.js"></script>
<script>
jQuery(document).ready(function($) {
     $('#changepassword').ajaxForm(function(e) { 
        $('#change-password-result').html(e);
        $('#change-password-result').css('display', '');
            }); 
});

</script>
@stop

@section('content')
<div class="page-content-wrapper">
	<div class="page-content">


		<!-- BEGIN PAGE HEADER-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					Sửa thông tin học viên
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
							Sửa thông tin học viên
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
				{{portlet_open('Nội dung cần nhập','blue')}}
				<div class="row">
					{{Form::model($student,['route'=>['admin.students.update',$student->stu_id],'method'=>'PUT'])}}
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
						<div class="form-group col-md-3">
						<label class="control-label">Ngày sinh</label>
						<div>
						<input type="text" id="mask_date1" name="stu_birthday" class="form-control" value="{{date('m/d/Y',$student->stu_birthday)}}">
							<span class="help-block">
								Nhập theo định dạng (tháng/ngày/năm)
							</span>
						</div>
					</div>

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
							'type'=>'select',
							'data_input'=>Config::get('admin.married'),
							],$errors)}}

						{{HForm::input([
							'name'=>'stu_educated',
							'title'=>'Học thức',
							'width'=>'4',
							'type'=>'select',
							'data_input'=>Config::get('admin.educated'),
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
							<div class="col-md-12" style="text-align: center;">
							{{Form::submit('Cập nhật thông tin',['class'=>'btn blue'])}}
							<a  href="#changepassword" data-toggle="modal" class="btn yellow">Đổi Mật khẩu</a>

							</div>



							

						</div>

						{{Form::close()}}
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
		<!-- END CONTENT -->
	</div>
@include('quanlyhoctap.students.elements.modal_changepassword')->withId($student->stu_id);


	@stop