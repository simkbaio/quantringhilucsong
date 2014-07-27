<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="padding-top:5px; min-height:40px !important">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#kvelle-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a class="navbar-brand" href="/" style="width:40px; padding:0"><img src="/frontend_assets/img/logo_mini.png" style="width:100%"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="kvelle-navbar">           
            <ul class="nav navbar-nav navbar-right">
                @if(Sentry::check())
                <li class="dropdown"> 
                 <a href="/profile" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF; padding:0px !important"><i class="fa fa-user"></i> {{Sentry::getUser()->first_name}} &nbsp;<i class="fa fa-angle-down"></i></a>
                 <ul class="dropdown-menu default-border">
<!--                         <li><a href="/profile"><i class="fa fa-user"></i> Thông tin tài khoản</a></li>
 --><!--
                        <li><a href="#"><i class="fa fa-comment-o"></i> Tin nhắn của bạn (3)</a></li>
                        <li><a href="#"><i class="fa fa-calendar"></i> Thời khóa biểu</a></li>
                        <li><a href="#"><i class="fa fa-pencil-square-o"></i> Kết quả học tập</a></li>
                        <li><a href="#"><i class="fa fa-bullhorn"></i> Thông báo từ NLS (2)</a></li>
                        <li><a href="#"><i class="fa fa-hand-o-up"></i> Đăng ký lớp học</a></li> -->
                        <li><a href="/dang-xuat"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
                    </ul>
                </li>
                @endif

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>