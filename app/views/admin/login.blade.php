<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>Nghị lực sống | Đăng nhập</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="/admin_assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/admin_assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="/admin_assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/select2/select2.css"/>
	<link rel="stylesheet" type="text/css" href="/admin_assets/plugins/select2/select2-metronic.css"/>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME STYLES -->
	<link href="/admin_assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
	<link href="/admin_assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="/admin_assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="/admin_assets/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="/admin_assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="/admin_assets/css/pages/login.css" rel="stylesheet" type="text/css"/>
	<link href="/admin_assets/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="index.html">
			<img src="/admin_assets/img/logo-big.png" alt=""/>
		</a>
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		{{flash_message()}}
		<!-- BEGIN LOGIN FORM -->
		{{Form::open(['route'=>'admin.sessions.store'])}}
		<h3 class="form-title">Đăng nhập tài khoản</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
				Đăng nhập địa chỉ mail và mật khẩu.
			</span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
				{{error_for('email',$errors)}}
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
				{{error_for('password',$errors)}}

			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
				<input type="checkbox" name="remember" value="1"/> Ghi nhớ đăng nhập </label>
				<button type="submit" class="btn green pull-right">
					Login <i class="m-icon-swapright m-icon-white"></i>
				</button>
			</div>
			<div class="login-options">
				<h4>Đăng nhập bằng</h4>
				<ul class="social-icons">
					<li>
						<a class="facebook" data-original-title="facebook" href="#">
						</a>
					</li>
					<li>
						<a class="twitter" data-original-title="Twitter" href="#">
						</a>
					</li>
					<li>
						<a class="googleplus" data-original-title="Goole Plus" href="#">
						</a>
					</li>
					<li>
						<a class="linkedin" data-original-title="Linkedin" href="#">
						</a>
					</li>
				</ul>
			</div>
			<div class="forget-password">
				<h4>Quên mật khẩu ?</h4>
				<p>
					Hãy click vào 
					<a href="javascript:;" id="forget-password">
						Đây
					</a>
					Để khôi phục mật khẩu.
				</p>
			</div>

		</form>
		<!-- END LOGIN FORM -->
		<!-- BEGIN FORGOT PASSWORD FORM -->
<!-- 		<form class="forget-form" action="index.html" method="post">
 -->		{{Form::open(['route'=>'admin.users.resetpasswordrequest','class'=>'forget-form'])}}
			<h3>Quên mật khẩu ?</h3>
			<p>
				Nhập hòm thư của bạn để khôi phục mật khẩu.
			</p>
			<div class="form-group">
				<div class="input-icon">
					<i class="fa fa-envelope"></i>
					<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
				</div>
			</div>
			<div class="form-actions">
				<button type="button" id="back-btn" class="btn">
					<i class="m-icon-swapleft"></i> Back </button>
					<button type="submit" class="btn green pull-right">
						Submit <i class="m-icon-swapright m-icon-white"></i>
					</button>
				</div>
			</form>
			<!-- END FORGOT PASSWORD FORM -->

		</div>
		<!-- END LOGIN -->
		<!-- BEGIN COPYRIGHT -->
		<div class="copyright">
			{{date('Y',time())}} &copy; nghilucsong. Trang quản trị.
		</div>
		<!-- END COPYRIGHT -->
		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="/admin_assets/plugins/respond.min.js"></script>
	<script src="/admin_assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
	<script src="/admin_assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="/admin_assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<script src="/admin_assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/admin_assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="/admin_assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="/admin_assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="/admin_assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script src="/admin_assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="/admin_assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/admin_assets/plugins/select2/select2.min.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="/admin_assets/scripts/core/app.js" type="text/javascript"></script>
	<script src="/admin_assets/scripts/custom/login.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
		jQuery(document).ready(function() {     
			App.init();
			Login.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>