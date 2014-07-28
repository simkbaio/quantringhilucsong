 @if(Sentry::check())
 <div class="fa-hover col-md-3 col-sm-4">
    <ul class="nav nav-pills nav-stacked nav-tabs-light">
        <li class="active"><a href="#"><img src="/frontend_assets/img/log_green_nls.png" style="width:80px;"> {{Sentry::getUser()->first_name}}</a></li>
        @if($account->StudentInfo())
        <li><a href="/student-profile"><i class="fa fa-user"></i> Thông tin học viên</a></li>
        @endif
        <li><a href="/thoi-khoa-bieu"><i class="fa fa-calendar"></i> Thời khóa biểu</a></li>
        <li><a href="/ket-qua-hoc-tap"><i class="fa fa-pencil-square-o"></i> Kết quả học tập</a></li>
        <!--<li><a href="#"><i class="fa fa-comment-o"></i> Tin nhắn của bạn (3)</a></li>-->

        <!--<li><a href="#"><i class="fa fa-bullhorn"></i> Thông báo từ NLS (2)</a></li>-->
        <!--<li><a href="#"><i class="fa fa-hand-o-up"></i> Đăng ký lớp học</a></li>-->
        @if(Sentry::getUser()->hasAccess('admin'))
        <li><a href="#"><i class="fa fa-dashboard"></i> Go to Admin Section</a></li>
        @endif
        <li><a href="/dang-xuat"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
    </ul>
</div>
@endif