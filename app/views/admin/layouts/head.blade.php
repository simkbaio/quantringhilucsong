<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>@yield('meta_title','Nghị Lực Sống | Trang quản trị')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
<!--     <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
 -->    <link href="{{URL::to('admin_assets')}}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="{{URL::to('admin_assets')}}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('admin_assets')}}/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{URL::to('admin_assets')}}/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('admin_assets')}}/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('admin_assets')}}/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('admin_assets')}}/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="{{URL::to('admin_assets')}}/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{URL::to('admin_assets')}}/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="/admin/text/css" href="{{URL::to('admin_assets')}}/plugins/select2/select2.css"/>
    <link rel="stylesheet" type="/admin/text/css" href="{{URL::to('admin_assets')}}/plugins/select2/select2-metronic.css"/>
    <link rel="stylesheet" href="/admin_assets/plugins/data-tables/DT_bootstrap.css"/>
    @yield('head')
    <!-- END THEME STYLES -->
<!--     <link rel="shortcut icon" href="favicon.ico"/>
 --></head>
<!-- END HEAD -->