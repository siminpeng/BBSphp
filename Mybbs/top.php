<?php
session_start();
include 'conn/conn.php';
include_once 'function.php';
if(isset($_GET['id'])) $id=$_GET['id'];
else $id="首页";

//$time=time();
//
//echo $time;
//
//echo date("Y/m/d H:i:s",$time);

//phpinfo();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <meta charset="UTF-8"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>留言板</title>
</head>
<body>

	<!--S=nav  -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">

				<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<!-- Be sure to leave the brand out there if you want it shown -->
				<a class="brand" href="javascript:0">留言板</a>


				<!-- Everything you want hidden at 940px or less, place within here -->
				<div class="nav-collapse collapse">
					<!-- .nav, .navbar-search, .navbar-form, etc -->
					<ul class="nav">
						<li <?php if($id=='首页') echo "class='active'";?>><a href="index.php?id=首页">主页</a></li>
						<li <?php if($id=='用户注册') echo "class='active'";?>><a href="index.php?id=用户注册">用户注册</a></li>
						<li <?php if($id=='发表留言') echo "class='active'";?>><a href="index.php?id=发表留言">发表留言</a></li>
						<li <?php if($id=='查询留言') echo "class='active'";?>><a href="index.php?id=查询留言">查询留言</a></li>
						<li <?php if($id=='注销登录') echo "class='active'";?>><a href="signout.php">注销登录</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--E=nav  -->
	<!-- Subhead
		================================================== -->
	<header class="headbg">
		<div class="container">
			<h1>留言本</h1>
			<p class="lead">
				你一言！我一语！
			</p>
		</div>
	</header>
	