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
                    <div>
                        <form action="/blog/message" method="post" class="form" name="ly">
                            <h2 style="color: #00a7d0">
                                我要留言
                            </h2>
                            <div class="form-group">
                            <label>
                                你是 :
                            </label>
                                <input id="name" type="text" name="name" class="form-control" placeholder=""/>
                                </div>
                            <div class="form-group">
                            <label>
                                想说 :
                            </label>
                                <textarea id="message" name="message" class="form-control" placeholder=""></textarea>
                                </div>
                            <button type="submit" class="btn btn-info">留言</button>
                        </form>
                    </div>

                    <div class="card">
                        <div class="header"></div>
                        <div style="clear:both;">T-Clam</div>
                    </div>
                </div>
            </div>

            <div class="col-md-9 dtop main-content">
                <div class="cen">
                    <h6 align="right">唯有梦想和好女孩不能辜负.</h6>
                    <h2>
                        <p>留言</p>
                    </h2>
                    <?php

                    foreach ($log as $row){
                        echo "<div class='cen' style='margin-top:1% '><b>".$row['name'].":</b><br>";
                        echo $row['content']."<br>";
                        echo "<h5 align='right';>".$row['time']."</h5>";
                        echo "</div>";
                    }
                    echo $page;

                    ?>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>

