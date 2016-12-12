<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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
</head>

<body class="skin-blue sidebar-mini">
<div class="wrapper">


    <header class="main-header">
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="glyphicon glyphicon-cloud"></span>
            </a>
            <a href="/admin/layout" class="sidebar-toggle" style="float:right;" role="button">
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
                <li><a href="/admin/"><i class="	glyphicon glyphicon-th-list"></i> 控制台</a></li>
                <li class="active">Here</li>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">
            <table class="table table-hover">
                <tr>
                    <td>ID</td>
                    <td>用户名</td>
                    <td>内容</td>
                    <td>时间</td>
                    <td>操作<td>
                </tr>

                <?php
                if(!empty($log)){
                    foreach ($log as $row){
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['content']."</td>";
                        echo "<td>".$row['time']."</td>";
                        echo "<td><a href=/admin/handle?id=".$row['id']."&type=3>删除</a></td>";
                        echo "</tr>";
                    }
                    echo "<td colspan='5'>".$page."</td>";
                }
                else
                    echo "<b style='color: #728270'>没有信息</b>";
                ?>




            </table>


            <!-- Your Page Content Here -->

        </section>
    </div>



    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            you can do everythings
        </div>
        <strong> &copy; 2016.唐钢.</strong>
    </footer>
    
</div>
<script src="/public/jQuery/jQuery-2.1.4.min.js"></script>
<script src="/public/dist/js/app.min.js" type="text/javascript"></script>
</body>
</html>
