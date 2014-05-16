@include('admin.layouts.head')
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
@include('admin.layouts.header_content')
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN SIDEBAR -->
@include('admin.layouts.sidebar')
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
@yield('content')
<!-- END CONTAINER -->

@include('admin.layouts.footer')