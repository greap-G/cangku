<?php 
header("content-type:text/html;charset=utf-8");//设置字符集
if($_SEAVER['REQUEST_METHOD']=="POST"){//控制提交方法 
	$page=$_POST['page'];//接页数
	include("conn.php");//引入数据库
	$rs=mysql_query('select * from message where flag=1 order by addTime desc limit'.(($page-1)*5).',5');
	// 查找message表格 flag是1的 设置按照时间顺序降序  记录数从几个开始取5个
	print_r $rs;
	$json='{"status":"10001","msg":"success","data":[';//把返回数据拼接成json格式
	$num=mysql_num_rows($rs);//返回多少条数据
	if($num>0){//如果有返回数量 就取出
		while($info=mysql_fetch_array($rs,MYSQLI_ASSOC)){
			$json.=jsons_encode($info).",";
		}
		echo substr($json,0,strlen($json)-1)."]}";
	}else{
		echo '{"status":"10002","msg":"没有记录"}';
	}
}else{
	header("location:error.html");
}
?>