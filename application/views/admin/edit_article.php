<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <link href='/public/bootstrap/css/bootstrap.min.css' rel="stylesheet" type="text/css" />
    <style>
        .submit {
            float:right;
            margin-top:10px;
        }
        span {
            margin-left:10px;
        }
        body {
            background:#ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <h5><a href="/admin/article">< 返回</a></h5>

    <h4 class="text-center text-primary">编辑文档</h4>
    <h5 class="text-danger text-center">
        <?php echo $title;?>
    </h5>
    <form method="post" action="/admin/edit">

        <input type="text" style="background:#f6f6f6;" class="form-control" placeholder="标题" name="title"  value='<?php echo $title;?>' >
        <input type="hidden" name="wid" value='<?php echo $id;?>'/>
        <div style="margin-top:20px;"></div>
        <span>插入: &nbsp;  </span>

        <input type="button" class="btn btn-default" onclick="insert(document.getElementById('edit'),
                                '<p>\n\n</p>\n')"  value="段落" />
        <input type="button" class="btn btn-default" onclick="insert(document.getElementById('edit'),
                                '\n<blockquote>\n<p>\n\n</p>\n</blockquote>')" value="引用" />
        <input type="button" class="btn btn-default" onclick="insert(document.getElementById('edit'),
                                '\n<h4></h4>\n')" value="标题" />
        <input type="button" class="btn btn-default" onclick="insert(document.getElementById('edit'),
                                '\n<pre><code>\n\n</code></pre>\n')" value="代码框" />
        <input type="button" class="btn btn-default" onclick="insert(document.getElementById('edit'),
                                '\n<ul>\n<li>\n<p>小标题</p>\n</li>\n\n</ul>\n')" value="条目" />
        <input type="button" class="btn btn-default" onclick="insert(document.getElementById('edit'),
                                '\n<a class=\'thumbnail\' target=\'_blank\' href=\'OSS_PATH/\'>\n<img src=\'OSS_PATH/\' alt=\'\'>\n</a>'
                                )" value="图片" />
        <input type="button" class="btn btn-default" onclick="insert(document.getElementById('edit'),
                                ' <b style=color:#ff7d7b >\n\n</b> '
                                )" value="高亮字符" />

        <h5 class="text-info">
            - &lt;...&gt; 与 &lt;/...&gt;  之间的内容会被自动转义为HTML实体<br>
            - 代码框class属性: language- + clike/c/c++/php/css/js/sql/bash/html<br>
            - 在提交之前暂不会保存更改，请及时备份
        </h5>

        <div style="margin-top:10px;"></div>

        <b style="color: #ff6d72">设置为推荐文章  </b><input  type="radio" name="bid" value="1" <?php if($bid==1) echo "checked";?>>
	    <b style="color: #ff6d72">设置为私密文章  </b><input  type="radio" name="bid" value="2" <?php if($bid==2) echo "checked";?>>
        <?php if(count($type)!=0):?>
            <select name="type">
            <?php foreach ($type as $v):?>
            <option value="<?=$v->id?>" <?php if($v->id==$c_type) echo "selected"; ?>><?=$v->type?></option>
            <?php endforeach;?>
            </select>
        <?php endif;?>
        <textarea id="edit"  spellcheck="false" style="background:#f6f6f6;" class="form-control"  rows="25"  name="content" placeholder="正文" ><?php echo $content;?></textarea>
        <input type="text" value="<?=$c_type?>" hidden="hidden" name="c_type">
        <input type="submit"  class="btn btn-primary submit"  value="提 交" name="bt">

    </form>

</div>
<br>
<script type="text/javascript">
    function insert(myField, myValue) {
        //IE support
        if (document.selection) {
            myField.focus();
            sel = document.selection.createRange();
            sel.text = myValue;
            sel.select();
        }
        //MOZILLA/NETSCAPE support
        else if (myField.selectionStart || myField.selectionStart == '0') {
            var startPos = myField.selectionStart;
            var endPos = myField.selectionEnd;
            // save scrollTop before insert text
            var restoreTop = myField.scrollTop;
            myField.value = myField.value.substring(0, startPos) + myValue + myField.value.substring(endPos, myField.value.length);
            if (restoreTop > 0) {
                myField.scrollTop = restoreTop;
            }
            myField.focus();
            myField.selectionStart = startPos + myValue.length;
            myField.selectionEnd = startPos + myValue.length;
        } else {
            myField.value += myValue;
            myField.focus();
        }
    }
</script>
</body>
</html>
