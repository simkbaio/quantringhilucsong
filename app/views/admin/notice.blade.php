<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Nghị lực sống | Thông báo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta http-equiv="refresh" content="5; url={{URL::route('admin')}}" />
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
    <div class="content" style="width:50%;">
    <h4>{{Session::get('flash_message')}}</h4>
    <p>Xin bạn vui lòng chờ trong giây lát hoặc click vào <a href="{{URL::route('admin')}}">Đây</a> để về trang chủ</p>
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