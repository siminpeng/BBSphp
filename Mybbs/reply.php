<?php
if(!isset($_SESSION['user_name']))
{
	echo "请登录";
	exit;
}
include_once 'conn/conn.php';

$page_cur=1;
if(isset($_GET['page_cur'])) $page_cur=$_GET['page_cur'];

$title_id=$_GET['titleid'];
$db=get_connect();
$sql="select  u.*,lw.id as lwid,lw.userid,lw.title ,lw.content,lw.createtime
from tb_leaveword as lw left  join tb_user as u on u.id=lw.userid 
where lw.id=".$title_id;
//echo $sql;

$result=mysqli_fetch_array($db->query($sql));
//var_dump($result);
	
?>
<div class="bodyright">
<!-- 发表留言部分 -->
	<div class="setupliuyan">
		<h4 class=" text-center botborder ">发表回复</h4>
		<form class="form-horizontal martop20" action="addreply.php" method="post" >
			
			<div class="control-group ">
			    <label class="control-label">回复主题</label>
			    <label class="controls padtop5"><?=$result['title']?></label>			      
			</div>
			
			<div class="control-group">
			    <label class="control-label" >留言内容</label>
			    <label class="controls padtop5"><?=$result['content']?></label>			      
			</div>
			<P class="botborder"></P>
			
			<div class="control-group">
			    <label class="control-label" for="inputPassword">回复内容</label>
			    <div class="controls">
			      <textarea rows="6" class="input-xxlarge" name="liuyan_content"></textarea>
			    </div>
			</div>
			<input type="hidden" name="title_id" value=<?=$title_id?>></input>
			<input type="hidden" name="page_cur" value=<?=$page_cur?>></input>
			<div class="control-group">
			     <button type="submit" class="btn controls btn-primary">回复</button>
			     <button class="btn  btn-primary " type="reset">重写</button>
			</div>
		</form>
	</div>
		
	
	</div>
</div><!-- bodyright -->