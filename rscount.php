<?php 
header("content-type:text/html;charset=utf-8");
if($_SEVER['REQUEST_METHOD']=="PSOT"){
	include("conn.php");
	$rs=mysql_query('select *from message where flag=1');
	// 查找来自message的表格 找到flag=1的
	$rscount=mysql_num_rows($rs);
	echo '{"status":"10001","rscount":'.$rscount'}';
}else{
	header("location:error.php");
}
?>