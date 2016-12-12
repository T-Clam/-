<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="Keywords" content="Tg Blog">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tg‘s 博客</title>
</head>
<body>
<div class="content-warp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 dtop sidebar">
                <div class="clearfix"></div>
                <div class="sidebar-content">
                    <form class="form-inline" role="form" action="/blog/search" method="post">
                        <div class="form-group">
                            <input id="search" class="form-control" name="q" size="15" type="text" placeholder="关键字">
                        </div>
                        <button type="submit" class="btn btn-info" name="search">搜 索</button>
                    </form>

                    <div class="card">
                        <div class="header"></div>
                        <div class="avater">
                            <img alt="me" src="/public/image/m.jpg">
                        </div>
                        <div class="content">
                            <h2 class="cen2"><b style="color: #25d009">唐钢</b></h2>
                            <ul class="nav">
                                <li><b>文章</b><br><?=$wz_count;?></li>
                                <li><b>推荐</b><br><?=count($data);?></li>
                                <li><b>分类</b><br><?=count($type);?></li>
                            </ul>
                        </div>
                        <div style="clear:both;"></div>
                    </div>

                    <h5>分类</h5>
                    <?php foreach($type as $v): ?>

                    <ul class="nav nav-sidebar">

                        <li class="active">
                            <a href="/blog/search_type/<?=$v->id?>"><?=$v->type;?><sup><?=$v->count?></sup></a>
                        </li>

                    </ul>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col-md-9 dtop main-content">
                <div class="cen">
                    <h6 align="right">人生原则--滴水之恩,滴水相报.<br>滴水之仇,不共戴天.</h6>
                    <h2 class="cen2">
                        <p>文章<span>推荐</span></p>
                    </h2>

                    <?php
                    foreach ($data as $row) {
                        if($row['m_time']==null)
                            $row['m_time'] = $row['time'];
                        if($row['num']==null)
                            $row['num'] = 1;
                        echo "<div class='cen'>";
                        echo "<div class='timeline-img'></div>";
                        echo "<h3><a href=/blog/articlelook?id=" . $row['id'] . ">" . $row['title'] . "</a></h3><br>";
                        if (strlen($row['content']) >= 200) {
                            $row['content'] = mb_substr($row['content'], 0, 200);
                            $row['content'] .= '......';
                        }
                        echo "<p>" . $row['content'] . "</p>";
                        echo "<p style='font-size: x-small ; color: #2c5cff' align='right'>发布于：" .$row['time'] . "<br>近期修改：".$row['m_time']."</p>";
                        echo "<p style='font-size: x-small' align='right'>阅读(".$row['num'].")";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<audio autoplay="autoplay" loop="loop">
   <source src="/public/bjyinyue.mp3" type="audio/mp3" />
</div>
</body>
</html>
