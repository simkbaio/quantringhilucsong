@extends('frontend.layouts.master')
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
					<div>
						<input type="text" id="mask_date1" name="birthday" class="form-control" value="{{date('m/d/Y',$student->birthday)}}">
						<span class="help-block">
							Nhập theo định dạng (tháng/ngày/năm)
						</span>
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

				{{HForm::input([
					'name'=>'email',
					'title'=>'Hòm Thư',
					'width'=>'4',
					],$errors)}}

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