<!--主页的显示部分-->
<?php 
include_once 'conn/conn.php';
//================分页参数处理开始=============================
$page_n=5;
$page_cur=1;
if(isset($_GET['page_cur'])) $page_cur=$_GET['page_cur'];
$db=get_connect();
$result_array=mysqli_fetch_array($db->query("select count(*) as total from tb_leaveword"));
$total=$result_array['total'];
//================分页结果处理开始=============================
$sql="select  u.*,lw.id as lwid,lw.userid,lw.title,lw.content,lw.createtime
from tb_leaveword as lw left  join tb_user as u on u.id=lw.userid order by lw.createtime desc limit ".($page_cur-1)*$page_n.','.$page_n;
//echo '<hr />'.$sql;
$result=$db->query($sql);
//================分页超链接处理开始=============================
//$page_btn_n=5;
//$page_array=array();
//$page_array[$page_cur]="<li class='active'><a href='index.php?page_cur=$page_cur'>$page_cur</a></li>";
//$is_pre_enough=$page_cur-1>=$page_btn_n/2;
//$is_next_enough=ceil($total/$page_n)-$page_cur>=$page_btn_n/2;
//$pre_n=$is_next_enough?$page_btn_n/2:$page_btn_n-(ceil($total/$page_n)-$page_cur);
//$next_n=$is_pre_enough?$page_btn_n/2:$page_btn_n-($page_cur-1);
//for($i=0;$i<$pre_n-1;$i++){
//	$pa_t=$page_cur-$i-1;
//	if($pa_t<1) break;
//	$page_array[$pa_t]="<li ><a href='index.php?page_cur=$pa_t'>$pa_t</a></li>";
//}
//for($i=0;$i<$next_n-1;$i++){
//	$pa_t=$page_cur+$i+1;
//	if($pa_t>ceil($total/$page_n)) break;
//	$page_array[$pa_t]="<li ><a href='index.php?page_cur=$pa_t'>$pa_t</a></li>";
//}
//ksort($page_array);
//=====================================
$page_btn_n=7;
$page_array=array();
$start=$page_cur-ceil($page_btn_n/2);//起始坐标
$need_n=ceil($total/$page_n)-$page_cur>=ceil($page_btn_n/2)?0:ceil($page_btn_n/2)-(ceil($total/$page_n)-$page_cur)-1;
$start=$start-$need_n<1?1:$start-$need_n+1;
for ($j = $start,$i=0; $j <= ceil($total/$page_n)&&$j<$start+$page_btn_n; $j++,$i++) {
	if($page_cur==$j)$page_array[$i]="<li class='active'><a href='index.php?page_cur=$j'>$j</a></li>";
	else $page_array[$i]="<li ><a href='index.php?page_cur=$j'>$j</a></li>";
}
?>
<div class="bodyright" >	

	<?php 
	for ($i = 0; $i < $result->num_rows; $i++) 
	{
	$rows=mysqli_fetch_assoc($result);
	?>	
	
	<!-- ----------------------------------- -->
	<div class="tlakitem marbottom10">
		<div class="toptile clearfix">
			<div class="pull-left leftpad20">主题:<?=$rows['title']?> </div>
			<div class="san9">
				<div class="pull-right marright20" >
				<a href="index.php?id=回复&titleid=<?=$rows['lwid']?>&page_cur=<?=$page_cur?>">回复</a>
				</div>
			</div>	
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
		
		<?php 
			$sql="select tu1.usernc,tr.contents from tb_reply as tr left join tb_user as tu1 on tr.userid=tu1.id  where leave_id=".$rows['lwid'];
			$rest=$db->query($sql);
			if($rest->num_rows>0)
			{
				echo "<ul class='repiyitem topborder unstyled'>";
				for($ji=0;$ji<$rest->num_rows;$ji++)
				{
					$rowst=mysqli_fetch_assoc($rest);
					echo "<li><span>".$rowst['usernc']."回复：</span>".$rowst['contents']."</li>";
				}	
				echo "</ul>";
			}
		?>
		

	</div>	<!-- tlakitem -->
	
	<?php }?>
	<div class="nextpage clearfix">
		<div class="pull-left martop20 leftpad20"><?php  $page_total=ceil($total/$page_n); 
		echo "一共".$page_total."页 当前第".$page_cur."页";
		?></div>
		<div class="pagination pull-right">		
		  <ul>
		    <?php 
		    	if($page_cur!=1)
		    		echo "<li><a href='index.php?page_cur=".($page_cur-1)."'>上一页</a></li>";
				foreach ($page_array as $k=>$v)
					echo $v;
				if($page_cur!=ceil($total/$page_n))
		    		echo "<li><a href='index.php?page_cur=".($page_cur+1)."'>下一页</a></li>";	
			 ?>
		  </ul>
		</div>
	</div>
</div><!-- bodyright -->
