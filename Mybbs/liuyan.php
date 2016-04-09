<?php 
include_once 'conn/conn.php';
function add_liuyan()
{
	for($i=6;$i<200;$i++)
	{
		$db=get_connect();
		$userid=27;
		$sql="insert into tb_leaveword (userid,title,content,createtime) values($userid,'$i','$i',".time().")";
		$result=$db->query($sql);
	}
}
@session_start();
if(!isset($_SESSION['user_name']))
{
	echo "请登录";
	exit;
}
if(isset($_POST['liuyan_title']))
{
	$username=$_SESSION['user_name'];
	$title=$_POST['liuyan_title'];
	$content=$_POST['liuyan_content'];
	//插入留言部分
	$db=get_connect();
	$sql="select id from tb_user where usernc='".$username."'";
	$result=$db->query($sql);
	$row=mysqli_fetch_assoc($result);
	$userid=$row['id'];
	$sql="insert into tb_leaveword (userid,title,content,createtime) values($userid,'$title','$content',".time().")";
	$result=$db->query($sql);
	if($result)
	{
		header("Location: index.php");
	}
}
?>
<div class="bodyright">
<!-- 发表留言部分 -->
	<div class="setupliuyan">
		<h4 class=" text-center botborder ">发表留言</h4>
		<form class="form-horizontal martop20" action="liuyan.php" method="post" >
			<div class="control-group ">
			    <label class="control-label" for="username">留言主题</label>
			    <div class="controls">
			      <input type="text"  name="liuyan_title" class="input-xlarge"  placeholder="留言主题"/>
			    </div>
			</div>

			<div class="control-group">
			    <label class="control-label" for="inputPassword">留言内容</label>
			    <div class="controls">
			      <textarea rows="6" class="input-xxlarge" name="liuyan_content"></textarea>
			    </div>
			</div>
	
			<div class="control-group">
			     <button type="submit " class="btn controls btn-primary">发表</button>
			      <button class="btn  btn-primary " type="reset">重写</button>
			</div>
			</div>
		</form>
	
	</div>
</div><!-- bodyright -->