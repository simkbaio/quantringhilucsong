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
    <script src="/frontend_assets/docs/js/ie8-responsive-file-warning.js"></script>
    <script src="/frontend_assets/docs/js/html5shiv.js"></script>
    <script src="/frontend_assets/docs/js/respond.min.js"></script>
    <![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,vietnamese' rel='stylesheet' type='text/css'>    <title>

    Nghị lực sống | Trang tương tác học viên

</title>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#kvelle-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{URL::to('/')}}">Nghị Lực sống</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="kvelle-navbar">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tin tức <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu default-border">
                            <li><a href="#">Bản tin 1</a></li>
                            <li><a href="#">Bản tin 2</a></li>
                            <li><a href="#">Bản tin 3</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Thông tin lớp học <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu default-border">
                            <li><a href="#">Bản tin 1</a></li>
                            <li><a href="#">Bản tin 2</a></li>
                            <li><a href="#">Bản tin 3</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right col-md-5" id="login-form">
                    <li class="col-md-4">
                        {{HForm::input([
                            'title'=>'Hòm thư',
                            'name'=>'email',
                            'width'=>'12',
                            ])}}</li>
                            <li class="col-md-4">
                            {{HForm::input([
                                 'title'=>'Mật khẩu',
                                 'name'=>'password',
                                 'type'=>'password',
                                 'width'=>'12',
                            ])}}
                            </li class="col-md-4">
                            <li class="col-md-4" style="text-align: center;">
                                {{Form::submit('Đăng nhập',['class'=>'btn btn-default btn-sm','style'=>'margin-top:20px;margin-bottom:5px;'])}}
                
                            </li>
                        </ul>
                                <style type="text/css">
                                    #login-form label{
                                        font-size: 12px;
                                        font-weight: bold;
                                        margin-bottom: 0px;
                                        color:#43923E;
                                    }
                                    #login-form li {
                                        padding: 0px;
                                    }
                                    #login-form .form-group{
                                        padding-right: 5px;
                                        padding-left: 0px;
                                    }
                                    #login-form div.form-group{
                                        margin-bottom: 5px;
                                    }
                                    #login-form div.form-group input{
                                        height: 25px;
                                    }

                                </style>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>

                    <div class="container jumbotron" style="margin-top:60px;">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <h3>Đăng kí thành viên <strong>Nghị Lực sống</strong></h3>
                                <h5 style="text-align: center;">Đề cùng nhau giúp đỡ và sẻ chia</h5>
                                {{HForm::input([
                                    'title'=>'Họ',
                                    'name'=>'last_name',
                                    'width'=>'6'
                                    ])}}
                                {{HForm::input([
                                    'title'=>'Tên',
                                    'name'=>'first_name',
                                    'width'=>'6'
                                    ])}}
                                {{HForm::input([
                                    'title'=>'Hòm thư',
                                    'name'=>'email',
                                    'width'=>'6'
                                    ])}}
                                {{HForm::input([
                                    'title'=>'Mật khẩu mới',
                                    'name'=>'password',
                                    'width'=>'6'
                                    ])}}
                                {{HForm::input([
                                    'name'=>'province_id',
                                    'title'=>'Tỉnh thành',
                                    'type'=>'select',
                                    'data_input'=>Config::get('admin.province'),
                                    'width'=>'6',
                                    ],$errors)}}
                                {{HForm::input([
                                    'name'=>'sex',
                                    'title'=>'Giới tính',
                                    'type'=>'select',
                                    'data_input'=>Config::get('admin.sex'),
                                    'width'=>'6',
                                    ],$errors)}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span style="font-weight: bold;padding-left: 30px;padding-bottom: 5px;">Bạn sinh ngày?</span>
                                        </div>
                                        <div class="col-md-4">
                                            {{HForm::input([
                                                'name'=>'day',
                                                'title'=>'Ngày',
                                                'width'=>'12',
                                            ],$errors)}}
                                        </div>
                                        <div class="col-md-4">
                                            {{HForm::input([
                                                 'name'=>'month',
                                                'title'=>'Tháng',
                                                'width'=>'12',
                                            ],$errors)}}
                                        </div>
                                        <div class="col-md-4">
                                            {{HForm::input([
                                                  'name'=>'year',
                                                  'title'=>'năm',
                                                  'width'=>'12',
                                              ],$errors)}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-dm-6" style="text-align: center;">
                                                {{Form::submit('Đăng kí',['class'=>'btn btn-dark btn-lg'])}}
                                            </div>
                                    </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>



                                <footer class="push-down push-up">
                                    <p class="text-center kvelle-color-white no-margins">
                                     Bản quyền thuộc về <a href="http://nghilucsong.net" class="color-hover-white">Trung tâm Nghị Lực Sống</a>
                                 </p>
                             </footer>

                             <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
                             <script>window.jQuery || document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">\x3C/script>')</script>

                             <script src="/frontend_assets/extra/jquery-ui/jquery-ui.min.js"></script>
                             <script src="/frontend_assets/js/bootstrap.min.js"></script>

                             <script src="/frontend_assets/extra/side-menu/modernizr.custom.js"></script>
                             <script src="/frontend_assets/extra/side-menu/classie.js"></script>

                             <script src="/frontend_assets/docs/js/portlets.js"></script>
                             <script src="/frontend_assets/docs/js/kvelle.js"></script>

                         </body>

                         </html>