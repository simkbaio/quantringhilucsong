@extends('admin.layouts.master')
@section('content')
<div class="page-content-wrapper">
	<div class="page-content">

		<div class="row">
			<div class="col-md-12">
				<h3 class="page-title">
					Sửa menu: {{$menuspack->name}}
				</h3>
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{URL::to('admin')}}">
							Trang chủ
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{URL::route('admin.menuspacks.index')}}">
							Quản lý bộ menu
						</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">
						Sửa
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
			{{portlet_open('Sửa thông tin bộ menu','green')}}
						{{Form::model($menuspack,
							['route'=>['admin.menuspacks.update',$menuspack->id],
							'method'=>'PUT'])}}
						{{HForm::input([
							'title'=>'Tên bộ Menu',
							'name'=>'name'
						],$errors)}}
						{{HForm::input([
							'title'=>'Thứ tự',
							'name'=>'order'
						],$errors)}}
						{{Form::submit('Tạo',array('class'=>'btn green'))}}


						{{Form::close()}}
			{{portlet_close()}}
			</div>
		</div>
		<!-- END PAGE CONTENT-->
	</div>
</div>
<!-- END CONTENT -->
</div>
@stop