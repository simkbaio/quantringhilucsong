@extends('admin.layouts.master')
@section('footer')
<script>
	jQuery(document).ready(function($) {
		$.ajax({
			url: '{{URL::route('admin.ajax.changelog')}}',
		})

		.done(function(data) {
			$("#changelog").html(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
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
					Bảng điều khiển.
				</h3>
				<ul class="page-breadcrumb breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{URL::route('admin')}}">
							Trang chủ
						</a>
						<i class="fa fa-angle-right"></i>
					</li>

				</ul>
				<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->
		{{flash_message()}}
		<div class="row">
			<div class="col-md-6">
				<div class="portlet">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-reorder"></i>Quản lý học tập
						</div>
						<div class="tools">
							<a class="collapse" href="javascript:;">
							</a>

						</div>
					</div>
					<div class="portlet-body">
						<div class="col-md-3">
							<a href="{{URL::route('admin.courses.index')}}">
								<div class="tile bg-green">
									<div class="tile-body">
										<i class="fa fa-leaf"></i>
									</div>
									<div class="tile-object">
										<div class="name">
											Khóa học
										</div>
										<div class="number">
											{{Course::get()->count()}}
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-3">
							<a href="{{URL::route('admin.classes.index')}}">
								<div class="tile bg-blue">
									<div class="tile-body">
										<i class="fa fa-coffee"></i>
									</div>
									<div class="tile-object">
										<div class="name">
											Lớp học
										</div>
										<div class="number">
											{{NClass::count()}}
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-3">
							<a href="{{URL::route('admin.students.index')}}">
								<div class="tile bg-red">
									<div class="tile-body">
										<i class="fa fa-user"></i>
									</div>
									<div class="tile-object">
										<div class="name">
											Học viên
										</div>
										<div class="number">
											{{Student::count()}}
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-3">
							<a href="{{URL::route('admin.teachers.index')}}">
								<div class="tile bg-yellow">
									<div class="tile-body">
										<i class="fa fa-briefcase"></i>
									</div>
									<div class="tile-object">
										<div class="name">
											Giáo viên
										</div>
										<div class="number">
											{{Teacher::count()}}
										</div>
									</div>
								</div>
							</a>
						</div>
						
					</div>
				</div>

			</div>
			<div class="col-md-6">
				{{portlet_open('Thông báo nhanh','green')}}
				<div class="row">
					<div class="col-md-12">
						<div id="disqus_thread"></div>
						<script type="text/javascript">
							/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'admin-nls'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
        	var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        	dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        	(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>
</div>


{{portlet_close()}}
</div>
</div>
				<div class="row">
					<div class="col-span12">
						{{portlet_open('Changelog','red')}}
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive" id="changelog">
								Loading...
							</div>
							</div>
						</div>
						{{portlet_close()}}
					</div>
				</div>
</div>
<!-- END PAGE CONTENT-->
</div>
</div>
<!-- END CONTENT -->
</div>


@stop