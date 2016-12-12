<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Tg's博客后台登录</title>
		<meta name="keywords" content="唐钢 博客 个人博客 技术博客" />
		<meta name="description" content="唐钢 博客 个人博客 技术博客" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <![endif]-->

        <style>
            .link{
                font-size: x-large;
                margin-top: 5%;
            }
            .login{
                margin-top: 5%;
                margin-left: 30%;
            }
            body{
                background-image: url(/public/image/l.jpg);
                background-size: cover;
                text-align: center;
            }
             a:link {text-decoration:none;color: #ff7380;padding: 0px 25px; display: inline-block;}
             a:visited {text-decoration:none;color: #ff7a7c;}
             a:hover {text-decoration:none; color: #e6221f; }
        </style>
    </head>

    <body>

    <div class="link" style="align-content: center">
   <a href="/"><b>返回主页</b></a>
</div>
    <div style="width: 40%; height: 50%" class="login">
        <?php if(isset($log)):?>
        <div class="alert alert-danger">
            <p><?php echo $log;?></p>
        </div>
    <?php endif;?>
        <h1 style="color: #d01e2b">
            <b>登录</b>
        </h1>
            <form action="/admin/login" method="post" class="form" >
                <div class="form-group">
                    <label for = "name" style="color: red">
                        <b>用户名 :</b>
                    </label>
                    <input id="name" type="text"  name="name" class="form-control" placeholder="用户名"/>
                </div>
                <div class="form-group">
                    <label for = "password" style="color: red">
                        <b>密码 :</b>
                    </label>
                    <input type="password" id="password"   name="password" class="form-control" placeholder="密码">
                </div>
                <button type="submit" class="btn btn-danger">登录</button>
            </form>


    </div>
</html>


