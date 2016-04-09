<head>
	<!-- <meta charset="UTF-8"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">

	
</head>
<?php
session_start();
$username=trim($_POST['username']);
$userpwd=trim($_POST['userpwd']);
$sex=trim($_POST['sex']);
$face=trim($_POST['face']);

if(!$username||!$userpwd||!$sex||!$face)
{
	echo "页面错误";
	exit;
}
 
@$db=mysqli_connect('localhost','root','root','db_guestbook');
if(mysqli_connect_errno())
{
	echo "不能连接数据库";
	exit;
}

$db->query("set names 'utf8'");

$sql="select * from tb_user where usernc='".$username."'";

//echo $sql;

$ruslt=$db->query($sql);

if($ruslt->num_rows)
{
	echo "用户已经存在，请重新注册";
	//返回上一个页面
	exit;
}
$sql=" insert into tb_user (usernc,userpwd,sex,face,usertype,regtime)
values('$username','$userpwd','$sex','$face',0,".time().")";

//echo $sql;

$result=$db->query($sql);
if(!$result) echo "注册失败";
else echo "注册成功";
//跳转到住页面

$sql="select * from tb_user where usernc='".$username."' and userpwd='".$userpwd."'";

$result=$db->query($sql);

if($result->num_rows==1)
{
	$user=mysqli_fetch_array($result);
	$_SESSION['user_name']=$user['usernc'];
	$_SESSION['user_id']=$user['id'];
	$_SESSION['user_img']=$user['face'];
	$_SESSION['regtime']=$user['regtime'];
	
}
// var_dump($_SESSION);
header("Location:index.php");
