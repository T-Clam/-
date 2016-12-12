<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="Keywords" content="Tg Blog">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tg‘s 博客</title>
    <link href='/public/bootstrap/css/bootstrap.min.css' rel="stylesheet" type="text/css" />
    <link href="/public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	
</head>

<style>
    * {
        margin: 0;
    }
    body {
        margin-top: 0px;
        color:#505050;
        background: #ddd;
        font-family: "寰蒋闆呴粦","Helvetica Neue",Helvetica,Arial,sans-serif;
        overflow-x: hidden;
    }
    .h{
        text-shadow: 0px 0px 10px #f4645f;

    }
</style>
<body>

<div class="cen dtop">
    <h6 align="right">学无止境.<br>但却无法回头.</h6>
    <?php
    if($m_time==null)
        $m_time = $time;
    if($num==null)
        $num = 1;
    echo "<h2 align='center'>".$title."</h2><br>";
    echo $content."<br><br>";
    echo "<p style='font-size: x-small ; color: #2c5cff' align='right'>发布于：" .$time . "<br>近期修改：".$m_time."</p>";
    echo "<p style='font-size: x-small' align='right'>阅读(".$num.")";
        ?>
</div>

</body>
</html>
