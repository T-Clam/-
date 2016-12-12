<?php

function SQL($str,$con){
	if(mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$sqltype=strtolower(substr(trim($str),0,6));
	mysqli_real_escape_string($con,$str);
	$sql=mysqli_query($con,$str);
	if($sqltype=="select"){
		if(mysqli_num_rows($sql)==0||$sql==false)
			return false;
		else
			return $sql;
	}
	elseif($sqltype=="update"||$sqltype=="insert"||$sqltype=="delete"){
		if($sql)
			return true;
		else
			return false;
	}
}class Page{
private $pagesize;//每页显示记录数
private $page;//当前页
private $pages;//总页数
private $total;//查询的总记录数
private $pagelen;//页码数
private $pageoffset;//页码偏移量
private $table;//查询的表名



function __construct($pagesize,$pagelen,$table){
	$con=mysqli_connect('localhost','root','844385','ci_blog');
	if(mysqli_connect_errno()){
			printf("failed: %s\n", mysqli_connect_error());
			exit();
		}
	if(@$_GET['page']==""||$_GET['page']<0)
		$this->page=1;
	else
		$this->page=$_GET['page'];
										  
	$this->pagesize=$pagesize;
	$this->pagelen=$pagelen;
	$this->table=$table;
	if($sql= SQL("select * from ".$this->table,$con)){
	$this->total=mysqli_num_rows($sql);
	$this->pages=ceil($this->total/$this->pagesize);
	$this->pageoffset=($this->pagelen-1)/2;
													}
	else
	echo "SQL语句执行失败";
}



function sel($param,$n=1){			//读取每一页的数据,排序选择
	$con=mysqli_connect("localhost","root","844385","ci_blog");
	if(mysqli_connect_errno()){
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	if($n==1)
	SQL("set names utf8",$con);
		if($sql=SQL("select *from ".$this->table." ".$param."limit ".($this->page-1)*$this->pagesize.",".$this->pagesize,$con)){
			return $sql;}
		else
			echo "SQL语句执行失败";
	}


function myPage(){
	//输出当前第几页，共几页
	$message="第".$this->page."页/共".$this->pages."页&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	if($this->page==1)
		$message.="首页&nbsp;&nbsp;上一页&nbsp;&nbsp;&nbsp;&nbsp;";//输出没有链接的文字
	else{
		$message.="<a href='".$_SERVER['PHP_SELF']."?page=1'>首页</a>&nbsp;&nbsp;";  //输出有链接的文字
		$message.="<a href='".$_SERVER['PHP_SELF']."?page=".($this->page-1)."'>上一页</a>&nbsp;&nbsp;&nbsp;";
		}	

	if($this->pages>$this->pagelen){
		if($this->page<=$this->pageoffset){
			$minpage=1;
			$maxpage=$this->pagelen;
										  }
		elseif($this->page>$this->pages-$this->pageoffset){
			$minpage=$this->pages-$this->pagelen+1;
			$maxpage=$this->pages;	
														   }	
		else{
			$minpage=$this->page-$this->pageoffset;
			$maxpage=$this->page+$this->pageoffset;	
			}					
		for($i=$minpage;$i<=$maxpage;$i++){
			if($i==$this->page)
				$message.=$i."&nbsp;&nbsp;";
										  
			else
			$message.="<a id='num' href='".$_SERVER['PHP_SELF']."?page=".$i."'>".$i."</a>&nbsp;&nbsp;";	  	
									      }	  

}
else{
	$minpage=1;
	$maxpage=$this->pages;
	for($i=$minpage;$i<=$maxpage;$i++){
			if($i==$this->page)
				$message.=$i."&nbsp;&nbsp;";
										  
			else
			$message.="<a id='num' href='".$_SERVER['PHP_SELF']."?page=".$i."'>".$i."</a>&nbsp;&nbsp;";	  	
									}

}

 if($this->page==$this->pages)
 	$message.="&nbsp;&nbsp;下一页&nbsp;&nbsp;尾页";
 else{
 	$message.="<a href='".$_SERVER['PHP_SELF']."?page=".($this->page+1)."'>下一页</a>&nbsp;&nbsp;&nbsp;";
 	$message.="<a href='".$_SERVER['PHP_SELF']."?page=".$this->pages."'>尾页</a>"; 
 }

	return $message;
}


}
?>
