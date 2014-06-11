@include('frontend.layouts.head')
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="padding-top:10px">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#kvelle-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           

            <a class="navbar-brand" href="index.html" style="font-size:60px; font-weight:bold">NLS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="kvelle-navbar">           
            <ul class="nav navbar-nav navbar-right">
                <li> 
                    <form class="form-inline" role="form" action="javascript:" style="padding-top:8px;">
                        <div class="form-group">                           
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Địa chỉ email">
                             <p class="custom-checkbox">
                            <label style="font-size: 12px;color: #ffffff;">
                                <input type="checkbox"> Duy trì đăng nhập
                            </label>
                        </p>
                        </div>
                        <div class="form-group" style="margin-top:-3px">                          
                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Mật khẩu">
                            <p><a  style="font-size: 12px;color: #ffffff;" href="">Quên mật khẩu?</a></p>
                        </div>
                       
                        
                        <button style="margin-top:-39px; font-size:17px" type="submit" class="btn btn-primary btn-sm">Đăng nhập</button>
                </form>
            </li>
               
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container push-down">       
 @yield('content')
</div>
@include('frontend.layouts.footer')