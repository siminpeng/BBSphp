<?php
session_start();
include 'conn/conn.php';
include_once 'function.php';
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
				<a class="brand" href="#">留言板</a>


				<!-- Everything you want hidden at 940px or less, place within here -->
				<div class="nav-collapse collapse">
					<!-- .nav, .navbar-search, .navbar-form, etc -->
					<ul class="nav">
						<li class="active"><a href="#">主页</a></li>
						<li><a href="#about">用户注册</a></li>
						<li><a href="#contact">发表留言</a></li>
						<li><a href="#contact">查看留言</a></li>
						<li><a href="#contact">查询留言</a></li>
						<li><a href="#contact">版主管理</a></li>
						<li><a href="#contact">注销登录</a></li>
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
	