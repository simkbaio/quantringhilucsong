<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/frontend_assets/extra/jquery-ui/jquery-ui.min.css">
    <link href="/frontend_assets/css/bootstrap-flat-green.css" rel="stylesheet" id="target">
    <link href="/frontend_assets/docs/css/docs.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="docs/js/ie8-responsive-file-warning.js"></script>
    <script src="docs/js/html5shiv.js"></script>
    <script src="docs/js/respond.min.js"></script>
    <![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,100italic,300italic,400italic,700italic' rel='stylesheet' type='text/css'>

    <title>

        NGHỊ LỰC SỐNG - Hỗ trợ toàn diện cho người khuyết tật

    </title>
</head>

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


                <a class="navbar-brand" href="/" style="width:100px; padding:0"><img src="/frontend_assets/img/logo_mini.png"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="kvelle-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="form-inline" role="form" action="/dang-nhap" method="POST" style="padding-top:8px;">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Địa chỉ email">
                                <p class="custom-checkbox">
                                    <label style="font-size: 12px;color: #ffffff;">
                                        <input type="checkbox" name="remember"> Duy trì đăng nhập
                                    </label>
                                </p>
                            </div>
                            <div class="form-group" style="margin-top:-3px">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Mật khẩu">
                                <p><a  style="font-size: 12px;color: #ffffff;" href="/quen-mat-khau">Quên mật khẩu?</a></p>
                            </div>


                            <button style="margin-top:-39px; font-size:17px" type="submit" class="btn btn-primary btn-sm">Đăng nhập</button>
                        </form>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container push-down">
        <div class="row" style="padding-top:50px">
            @if(Session::has("flash_message"))
            <div class="col-sm-12"> 
               <div class="well well-success-light-text">
               <h4><a href="">Thông báo!</a></h4>
                {{Session::get("flash_message")}}
            </div>
            @endif
        </div>   
        <div class="col-md-6" style="text-align:center; margin-top:10%"><img src="/frontend_assets/img/logo_0.jpg"/></div>

        <div class="col-md-6">
            <h3>Đăng ký thành viên</h3>
            {{Form::open(['url'=>'dang-ki'])}}


            <form role="form" class="has-light" action="/dang-ki" method = "POST">
                <div class="form-group">
                    <input type="text"  class="form-control" value="{{Input::old('last_name')}}" name="last_name" id="email" placeholder="Họ">
                    {{error_for('last_name',$errors)}}
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{Input::old('first_name')}}" name="first_name" id="name" placeholder="Tên">
                    {{error_for('first_name',$errors)}}
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{Input::old('email')}}" name="email" id="email" placeholder="Email của bạn">
                    {{error_for('email',$errors)}}
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu truy cập">
                    {{error_for('password',$errors)}}
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password_confirmation" id="pass" placeholder="Nhập lại mật khẩu">
                    {{error_for('password_confirmation',$errors)}}
                </div>
                <h3>Ngày sinh</h3>
                <div class="form-group"> 
                    <label for="day">Ngày</label>
                    <select style="padding:5px; border:1px solid #55b44f" name="day" id="day" placeholder="Ngày">
                        @for($i=1;$i<=31;$i++)
                        <option>{{$i}}</option>
                        @endfor
                    </select>
                    <label for="month">Tháng</label>
                    <select style="padding:5px; border:1px solid #55b44f" name="month" id="month">
                        @for($i=1;$i<=12;$i++)
                        <option>{{$i}}</option>
                        @endfor
                    </select>
                    <label for="year">Năm</label>
                    <select style="padding:5px; border:1px solid #55b44f" name="year" id="month">
                        @for($i=2000;$i>=1950;$i--)
                        <option>{{$i}}</option>
                        @endfor
                    </select>
                </div>

                <h3>Giới tính</h3>

                <div class="custom-checkbox">
                    <label>
                        <input type="radio" name="sex" value="1" checked="checked">
                        Nam</label>
                        <label>
                            <input type="radio" name="sex" value="0">
                            Nữ</label>
                        </div>
                        <div class="form-group" style="padding-top:20px">

                            <input style="font-size:40px;" type="submit" class="btn btn-light" value="Đăng kí" />
                            {{--<a style="height:64px;font-size: 20px;" href="{{URL::route('facebook_login')}}" class="btn btn-light">Đăng nhập bằng Facebook</a>--}}
                        </div>  
                    </form>
                </div>
            </div>
        </div>
        <footer class="push-down push-up">
            <p class="text-center kvelle-color-white no-margins">
                Một sản phẩm của <a href="http://nghilucsong.net" class="color-hover-white" target="_blank">TT Nghị Lực Sống</a> &middot; All Rights Reserved
            </p>
        </footer>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">\x3C/script>')</script>
        <script src="/frontend_assets/extra/jquery-ui/jquery-ui.min.js"></script>
        <script src="/frontend_assets/js/bootstrap.min.js"></script>
        <script src="/frontend_assets/extra/side-menu/modernizr.custom.js"></script>
        <script src="/frontend_assets/extra/side-menu/classie.js"></script>
        <script src="/frontend_assets/extra/side-menu/gnmenu.js"></script>
        <script src="/frontend_assets/extra/checkabox/checkABox.js"></script>
        <script src="/frontend_assets/docs/js/forms.js"></script>
        <script src="/frontend_assets/docs/js/portlets.js"></script>
        <script src="/frontend_assets/docs/js/kvelle.js"></script>
    </body>

    </html>