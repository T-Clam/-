<?php
/**
 * Created by PhpStorm.
 * User: tg
 * Date: 16-10-28
 * Time: 下午9:52
 */
header("Content-type: text/html; charset=utf8");
$stu_info = (array)$stu_info;
foreach ($stu_info as $k=>$v){
     $v = (array)$v;
     $stu_info[$k] = $v;
     foreach($v as $key=>$value) {
          $stu_info[$k][$key] = urlencode($value);
     }
}
//echo '<pre>';
echo  urldecode(json_encode($stu_info));
//echo '</pre>';

