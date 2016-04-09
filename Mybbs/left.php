<!-- S=left -->
<div class="span3 clearfix" >
<?php
include_once 'conn/conn.php';
//处理登陆请求
//如果有登陆请求处理并跳转到当前页面
if(isset($_POST['login_name']))
{//说明有登陆请求
	//echo $_POST['login_name'];
	$sql="select * from tb_user where usernc='".$_POST['login_name']."' and userpwd='".$_POST['login_pwd']."'";
	
	$db=get_connect();
	$result=$db->query($sql);

	 if($result->num_rows==1)
	{
		$user=mysqli_fetch_array($result);
		$_SESSION['user_name']=$_POST['login_name'];
		$_SESSION['user_id']=$user['id'];
		$_SESSION['user_img']=$user['face'];
		$_SESSION['regtime']=$user['regtime'];
// 		echo var_dump($_SESSION['user_id']);
// 		echo $_SESSION['user_id'];
// 		echo $_SESSION['user_img'];
// 		echo $_SESSION['regtime'];
		
// 		exit;
	}
	header("Location: index.php");
	
}
if(!isset($_SESSION['user_name']))
{	
?>
	<!-- 登录 -->		
	<div class="bodyleft clearfix">
		<h4 class=" text-center botborder">用户登录</h4>
		<div class="index-login">
			<form action='index.php' method="post">
				<label>用户名</label>
		        <input name="login_name" type="text" class="input-block-level" placeholder="用户名">
		        <label>密码</label>
		        <input name="login_pwd" type="password" class="input-block-level" placeholder="密码">
		        <button class="btn  btn-primary center" type="submit">登录</button>
		     </form>
		 </div>
	</div>
<?php 
} 
else{
?>
	<!-- 用户信息 -->	
	<div class="bodyleft clearfix">
		<h4 class=" text-center botborder">用户信息</h4>
		<div class="index-login ">
			<img  class="img-polaroid user-imag pull-left " src=<?=$_SESSION['user_img'] ?>>
			<div class="pull-left user-info">
				<P>当前用户：<span><?=$_SESSION['user_name']?></span></br>
				<p>用户注册时间：</br>
					<?=date("Y-m-d " ,$_SESSION['regtime'])?>
				</p>	
			</div>
		 </div>
	</div>

<?php 

}?>
	
</div>
			
<!-- E=left -->
