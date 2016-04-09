<?php
include_once 'top.php';
?>
<!-- S=标题 -->
	<div class="container" >
		<div class="toptile clearfix">
			<div class="pull-left ">
				<sapn>今天是：
				<?php 
					$time=date('Y m d');
					echo $time;
				?>
				</sapn>
			</div>
			<!-- 右边的内容 -->
			<ul class="breadcrumb pull-right">
				<span>当前位置:</span>
				
				<li class="active"><?php echo $id;?></li>
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
		<?php 
			switch ($id) {
				case "首页":
				include_once 'main.php';;
				break;
				
				case "用户注册":
				include_once 'signup.php';;
				break;
				case "发表留言":
				include_once 'liuyan.php';;
				break;
				
				case "查询留言":
				include_once 'search.php';;
				break;
				
				case "注销登陆":
				include_once 'signout.php';;
				break;
				
				case "回复":
				include_once 'reply.php';
				break;

				default:
					include_once 'main.php';
				break;
			}
		?>
		</div><!-- span9 -->
		<!-- E=right -->
		</div> 
	</div>
	<!-- E=主要内容 -->
<?php include_once 'bottom.php';?>

