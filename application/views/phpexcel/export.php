<?php
header("Content-type: text/html; charset=utf8");
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
require_once 'Classes/PHPExcel/Reader/Excel5.php';
$con = mysqli_connect('localhost','root','844385','ci_blog');

$objReader = PHPExcel_IOFactory::createReader('excel5'); //use Excel5 for 2003 format
$excelpath='/var/www/html/CI/application/views/phpexcel/text.xls';
$objPHPExcel = $objReader->load($excelpath);
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();           //取总行
$highestColumn = $sheet->getHighestColumn(); //取总列
for($j=3;$j<=$highestRow;$j++)                      //从第二行开始读取数据
{
    $str="";
    for($k='A';$k<=$highestColumn;$k++)            //从A列读取数据
    {
        $str .=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'|*|';//读取单元格
    }
    //$str=mb_convert_encoding($str,'gbk','utf8');//根据自己编码修改
    $strs = explode("|*|",$str);
    mysqli_query($con,"set names utf8");
    if(mysqli_query($con,"insert into student(XH,XM,sex,number,QQ,address,major,remarks,image) VALUES('$strs[0]','$strs[1]','$strs[2]','$strs[3]','$strs[4]','$strs[5]','040201','$strs[6]','$strs[7]') "))
        echo $strs[0],",",$strs[1],",",$strs[2],",",$strs[3],$strs[4],$strs[5],',',$strs[7],"<br>";
    else
        echo mysqli_error($con);
    /*$strs = array_filter($strs);
    $json['XH'] = $strs[0];
    $json['XM'] = $strs[1];
    $json['sex'] = $strs[2];
    $json['number'] = $strs[3];
    $json['QQ'] = $strs[4];
    $json['remarks'] = $strs[5];*/






}
?>