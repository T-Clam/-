<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>博客后台管理</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href='/public/bootstrap/css/bootstrap.min.css' rel="stylesheet" type="text/css" />
    <link href="/public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="/public/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
    <style>
        .col-xs-6 {
            width: 50%;
        }
        .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
            float: left;
        }
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }
        .small-box {
            position: relative;
            display: block;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            margin-bottom: 15px;
        }
        .bg-aqua {
            background-color: #00c0ef !important;
        }
        .bg-red, .bg-yellow, .bg-aqua, .bg-blue, .bg-light-blue, .bg-green, .bg-navy, .bg-teal, .bg-olive, .bg-lime, .bg-orange, .bg-fuchsia, .bg-purple, .bg-maroon, .bg-black {
            color: #f9f9f9 !important;
        }
        *, *:before, *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .small-box > .inner {
            padding: 10px;
        }
        .small-box .icon {
            position: absolute;
            top: auto;
            bottom: 5px;
            right: 5px;
            z-index: 0;
            font-size: 90px;
            color: rgba(0, 0, 0, 0.15);
        }
        .ion-xbox {
            display: inline-block;
            font-family: "Ionicons";
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            text-rendering: auto;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .small-box > .small-box-footer {
            position: relative;
            text-align: center;
            padding: 3px 0;
            color: #fff;
            color: rgba(255, 255, 255, 0.8);
            display: block;
            z-index: 10;
            background: rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }

        .fa {
            display: inline-block;
            font-family: FontAwesome;
            font-style: normal;
            font-weight: normal;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
</head>

<body class="skin-blue sidebar-mini">
<div class="wrapper">


    <header class="main-header">
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="glyphicon glyphicon-cloud"></span>
            </a>
            <a href="/admin/logout" class="sidebar-toggle" style="float:right;" role="button">
                <span style="color: #070201"><b>注销</b></span>
            </a>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/public/image/m.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Tg</p>
                    <a href="/blog"><i class="glyphicon glyphicon-cloud"></i> 博客主页</a>
                </div>
            </div>


            <ul class="sidebar-menu">
                <li class="header">HEADER</li>
                <!-- Optionally, you can add icons to the links -->
                <li class="active"><a href="/admin/index"><i class="glyphicon glyphicon-home"></i> <span >控制台</span></a></li>
                <li><a href="/admin/visit"><i class="glyphicon glyphicon-user"></i> <span ></span>访客</a></li>
                <li><a href="/admin/article"><i class="glyphicon glyphicon-folder-open"></i> <span ></span>文章管理</a></li>
                <li><a href="/admin/message"><i class="glyphicon glyphicon-file"></i> <span ></span>留言管理</a></li>
                <li><a href="/admin/layout"><i class="glyphicon glyphicon-calendar"></i> <span ></span>排版管理</a></li>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                控制台
                <small>Time will prove everything</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin/"><i class="glyphicon glyphicon-th-list"></i> 控制台</a></li>
                <li class="active">Here</li>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            访客
                        </h3>
                        <h3>
                            <?php echo $cvisitor; ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/admin/visit" class="small-box-footer">
                        More <i class="glyphicon glyphicon-user"></i>
                    </a>
                </div>
            </div>




            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            文章
                        </h3>
                        <h3>
                            <?php echo $cwz; ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/admin/article" class="small-box-footer">
                        More <i class="glyphicon glyphicon-folder-open"></i>
                    </a>
                </div>
            </div>




            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            留言
                        </h3>
                        <h3>
                            <?php echo $cmessage; ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/admin/message" class="small-box-footer">
                        More <i class="glyphicon glyphicon-file"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            排版
                        </h3>
                        <h3>
                            <?php echo $ctype; ?>
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/admin/layout" class="small-box-footer">
                        More <i class="glyphicon glyphicon-calendar"></i>
                    </a>
                </div>
            </div>

            <!-- Your Page Content Here -->

        </section>
    </div>



    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            you can do everythings
        </div>
        <strong> &copy; 2016.唐钢.</strong>
    </footer>

    <div class='control-sidebar-bg'></div>
</div>
<script src="/public/jQuery/jQuery-2.1.4.min.js"></script>
<script src="/public/dist/js/app.min.js" type="text/javascript"></script>
</body>
</html>
