<!--添加回复的处理页-->
<?php
include_once 'conn/conn.php';
session_start();
//获得参数
$replycontent=$_POST['liuyan_content'];
$userid=$_SESSION['user_id'];
$titleid=$_POST['title_id'];
$page_cur=1;
if(isset($_POST['page_cur'])) $page_cur=$_POST['page_cur'];

echo $replycontent."\t".$userid."\t".$titleid;
echo '</br>';
//链接数据库
$db=get_connect();
//获取用户id
//$sql="select id from tb_user where usernc='".$user."'";
//echo $sql;
//$result=mysqli_fetch_array($db->query($sql));
//$userid=$result['id'];

//插入留言
$sql="insert into tb_reply(userid,leave_id,contents,createtimes)
values(".$userid.",'".$titleid."','".$replycontent."',".time().")";
echo $sql;
if($db->query($sql))
{
	echo "插入成功";
	header("Location: index.php?id=首页&page_cur=$page_cur");
}
?>