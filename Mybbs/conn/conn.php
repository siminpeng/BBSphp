<?php
//老版本弃用
//$conn=mysql_connect("localhost", "root","");//连接数据库
//mysql_select_db("db_guestbook",$conn);

//测试
//$sql=mysql_query("select * from tb_user");
//$info=mysql_fetch_array($sql);
//$userid=$info['id'];
//echo $userid;

@ $db=new mysqli('localhost','root','','db_guestbook');

//if(mysqli_connect_errno())
//{
//	echo "不能连接数据库";
//	exit;
//}
//echo "连接数据库成功</br>";

