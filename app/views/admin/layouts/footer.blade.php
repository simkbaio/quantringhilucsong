<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
        {{date('Y')}} &copy; Nghị Lực Sống by Dương Ngọc Anh.
    </div>
    <div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{URL::to('admin_assets')}}/plugins/respond.min.js"></script>
<script src="{{URL::to('admin_assets')}}/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{URL::to('admin_assets')}}/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="{{URL::to('admin_assets')}}/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{URL::to('admin_assets')}}/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="{{URL::to('admin_assets')}}/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{URL::to('admin_assets')}}/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{URL::to('admin_assets')}}/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{URL::to('admin_assets')}}/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{URL::to('admin_assets')}}/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{URL::to('admin_assets')}}/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
</script>

<!-- END CORE PLUGINS -->
<script src="{{URL::to('admin_assets')}}/scripts/core/app.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
    });
</script>
@yield('footer')
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>