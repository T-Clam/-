<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="Keywords" content="Tg Blog">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tg‘s 博客/文章</title>
</head>
<body>
<div class="row">
<div class="cen dtop col-md-12">
    <h6 align="right">害怕失败,害怕尴尬.<br>向往成功,向往希望.</h6>
    <h2 class="cen2">文章</h2>
    <div class="row">
    <div class="col-md-4">
        <form action = "/blog/search"  method = "post" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-info"><b style="color: #728270">搜索</b><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        </div>
        </div>
        <?php
        if(!empty($log)){
            foreach ($log as $row) {
		if($row['bid']!=2||@$bid_key==1){
                if(!empty($q)){
                $row['title'] = str_replace($q, '<b style="background-color:#9bd7ff">'.$q.'</b>',$row['title']);
                $row['content'] = str_replace($q, '<b style="background-color:#9bd7ff">'.$q.'</b>',$row['content']);
                }
                if($row['m_time']==null)
                    $row['m_time'] = $row['time'];
                if($row['num']==null)
                    $row['num'] = 1;
                echo "<div class='cen'>";
                echo "<div class='timeline-img'></div>";
                echo "<h3><a href=/blog/articlelook?id=" . $row['id'] . " >" . $row['title'] . "</a></h3><br>";
                if (strlen($row['content']) >= 200) {
                    $row['content'] = mb_substr($row['content'], 0,200);
                    $row['content'] .= '......';
                }
                echo "<p>" . $row['content'] . "</p><br><br>";
                echo "<p style='font-size: x-small ; color: #2c5cff' align='right'>发布于：".$row['time'] . "<br>近期修改：".$row['m_time']."</p>";
                echo "<p style='font-size: x-small' align='right'>阅读(".$row['num'].")";
                echo "</div>";
            }
		}
            if(!empty($page))
            echo $page;}
            else
            echo $key;
            ?>
</div>

</div>
</body>
</html>

