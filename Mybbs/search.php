<?php 
$total=0;
if(isset($_GET['search_type']))
{
	$searchtype=$_GET['search_type'];
	$keyword = trim($_GET['key_words']);
		
	include_once 'conn/conn.php';
	$db=get_connect();
//设置分页参数
	$page_cur=1;
	$page_itemnum=5;	//每页显示5条
	if(isset($_GET['page_cur']))
	{
		$page_cur=$_GET['page_cur'];
	}
//处理查询结果分页
	if($searchtype=="theme")
	{
		
//		$sql="select *  from tb_leaveword left join tb_user on tb_user.id=tb_leaveword.userid where title like  '%".$keyword."%'";
		$sqlcount="select count(*) as total from tb_leaveword left join tb_user on tb_user.id=tb_leaveword.userid where title like '%".$keyword."%'";
		$sql="select * from tb_leaveword left join tb_user on tb_user.id=tb_leaveword.userid where title like '%".$keyword."%' order by tb_leaveword.createtime desc limit ".$page_itemnum*($page_cur-1).",".$page_itemnum;
	}
	else if($searchtype=="content"){
		
//		$sql="select * from tb_leaveword left join tb_user on tb_user.id=tb_leaveword.userid where content like  '%".$keyword."%'";
		$sqlcount="select count(*) as total from tb_leaveword left join tb_user on tb_user.id=tb_leaveword.userid where content like '%".$keyword."%'";
		$sql="select * from tb_leaveword left join tb_user on tb_user.id=tb_leaveword.userid where content like '%".$keyword."%' order by tb_leaveword.createtime desc limit ".$page_itemnum*($page_cur-1).$page_itemnum;
	}
	//获取查询结果的数量
		$result=mysqli_fetch_array($db->query($sqlcount));
		$total=$result['total'];//一共有多少页
	//获得查询结果	
		$result=$db->query($sql);	
	//处理分页链接
	$page_btn_n=7;
	$page_array=array();
	$start= $page_cur -ceil($page_btn_n/2);//起始坐标
	$need_n=ceil($total/$page_itemnum)-$page_cur>=ceil($page_btn_n/2)?0:ceil($page_btn_n/2)-(ceil($total/$page_itemnum)-$page_cur)-1;
	$start=$start-$need_n<1?1:$start-$need_n+1;
	for ($j = $start,$i=0; $j <= ceil($total/$page_itemnum)&&$j<$start+$page_btn_n; $j++,$i++) {
		if($page_cur==$j)
		$page_array[$i]="<li class='active'><a href='index.php?id=查询留言&page_cur=$j&search_type=$searchtype&key_words=$keyword'>$j</a></li>";
		else $page_array[$i]="<li ><a href='index.php?id=查询留言&page_cur=$j&search_type=$searchtype&key_words=$keyword'>$j</a></li>";
}}

?>
<div class="bodyright" >	
	<form class="form-search" method="get" action="index.php">
		<input type="hidden" name="id" value="查询留言"></input>
		<span>选择查找方式：</span>
			<select class="input-medium" name="search_type">
			  <option value="theme">留言主题</option>
			  <option value="content">留言内容</option>
			</select>
		  <input type="text" class="input-medium search-query" name="key_words">
		  <button type="submit" class="btn">查询</button>
	</form>

	<?php 
	if($total>0)
	{
		for ($i = 0; $i < $result->num_rows; $i++) 
		{
			$rows=mysqli_fetch_assoc($result);
		?>	
		
		<!-- ----------------------------------- -->
	<div class="tlakitem marbottom10">
		<div class="toptile clearfix">
			<div class="pull-left leftpad20">主题:<?=$rows['title']?> </div>
			<div class="san9"></div>	
		</div>

		<div class=" row clearfix ">
			<div class="span3 leftpad20 ">
				<img  class="img-polaroid user-imag pull-left  " src=<?=$rows['face']?>>
				<div class="pull-left user-info  ">
					<P class="martop10"><span> <?=$rows['usernc']?></span></br>
					<p>留言时间:</br>
					<?=date("Y-m-d H:i:s",$rows['createtime']) ?></p>	
				</div>
			</div>
			<div class="span5 leftborder liuyancontent ">
				<P><?=$rows['content']?></P>
			</div>	
		</div>
		
	</div>	<!-- tlakitem -->

		<?php }	?>	<!-- 循环结束 -->
		<!--	显示分页	-->
		<div class="nextpage clearfix">
			<div class="pull-left martop20 leftpad20"><?php  $page_total=ceil($total/$page_itemnum); 
			echo "一共".$page_total."页 当前第".$page_cur."页";
			?>
			</div>
		
			<div class="pagination pull-right">		
			  <ul>
			    <?php 
			    	if($page_cur!=1)
			    		echo "<li><a href='index.php?id=查询留言&search_type=$searchtype&key_words=$keyword&page_cur=".($page_cur-1)."'>Prev</a></li>";
					foreach ($page_array as $k=>$v)
						echo $v;
					if($page_cur!=ceil($total/$page_itemnum))
			    		echo "<li><a href='index.php?id=查询留言&search_type=$searchtype&key_words=$keyword&page_cur=".($page_cur+1)."'>Next</a></li>";	
				 ?>
			  </ul>
			</div>
		</div>		
		<?php }
	else if(isset($result))
	{echo "没有得到查询结果";}
	?>
</div><!-- bodyright -->


