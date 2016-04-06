<?php
include_once 'top.php';
//获取超链接的值
if(isset($_GET['id']))
{
	$id=$_GET['id'];
}
else $id="首页";
?>
<!-- S=标题 -->
	<div class="container" >
		<div class="toptile clearfix">
			<div class="pull-left ">
				<sapn>今天是：</sapn>
			</div>
			<!-- 右边的内容 -->
			<ul class="breadcrumb pull-right">
				<span>当前位置:</span>
				<li><a href="#">首页</a> <span class="divider">/</span></li>
				<li><a href="#">Library</a> <span class="divider">/</span></li>
				<li class="active">Data</li>
			</ul>
		</div>
	</div>
	<!-- E=标题 -->
	
	<!-- S=主要内容 -->
	<div class="container">
		<div class="row">
		<!--引入左边的部分-->
		<?php include_once 'left.php';?> 
		
		<!-- S=right -->
		<div class="span9  clearfix" >
		<?php include_once 'main.php';?>
		</div><!-- span9 -->
		<!-- E=right -->
		</div> 
	</div>
	<!-- E=主要内容 -->
<?php include_once 'bottom.php';?>

