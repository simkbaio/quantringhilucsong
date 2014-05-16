@extends('admin.layouts.master')
@section('content')
<div class="page-content-wrapper">
	<div class="page-content">

		<div class="row">
			<div class="col-md-12">
				<h3 class="page-title">
					Tạo bộ menu mới
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
						Tạo bộ menu mới
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
			{{portlet_open('Tạo bộ menu mới','green')}}
						{{Form::open(['route'=>'admin.menuspacks.store'])}}
						{{HForm::input([
							'title'=>'Tên bộ Menu',
							'name'=>'name'
						],$errors)}}
						{{HForm::input([
							'title'=>'Thứ tự',
							'name'=>'order',
							'value'=>(Input::old('order'))?Input::old('order'):0,

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