<?php
require_once './Classes/PHPExcel.php';
$excel = new PHPExcel();
$letter = array('A','B','C','D','E','F','F','G');
//��ͷ����
$tableheader = array('ѧ��','����','�Ա�','����','�༶');
//����ͷ��Ϣ
for($i = 0;$i < count($tableheader);$i++) {
$excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
}
//�������
$data = array(
array('1','С��','��','20','100'),
array('2','С��','��','20','101'),
array('3','С��','Ů','20','102'),
array('4','С��','Ů','20','103')
);
//�������Ϣ
for ($i = 2;$i <= count($data) + 1;$i++) {
$j = 0;
foreach ($data[$i - 2] as $key=>$value) {
    $excel->getActiveSheet()->setCellValue("$letter[$j]$i", "$value");
}}
//����Excel�������
    $write = new PHPExcel_Writer_Excel5($excel);
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
    header("Content-Type:application/force-download");
    header("Content-Type:application/vnd.ms-execl");
    header("Content-Type:application/octet-stream");
    header("Content-Type:application/download");;
    header('Content-Disposition:attachment;filename="testdata.xls"');
    header("Content-Transfer-Encoding:binary");

$write->save('php://output');
