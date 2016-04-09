<!-- 注册部分 -->
<script type="text/javascript">
function chkinput(form){				//定义一个函数
    
	 if(form.username.value==""){				//判断usernc文本框中的值是否为空
	   alert("请输入用户昵称！");   		//如果为空则输出“请输入用户昵称”
	   form.username.focus();					//返回到tel文本框
	   return(false);
	 }
	 
	 if(form.userpwd.value==""){
	 
	   alert("请输入注册密码！");   
	   form.userpwd.focus();
	   return(false);
	 
	 }	 
	  if(form.userpwd1.value==""){
	 
	   alert("请输入重复密码！");   
	   form.userpwd1.focus();
	   return(false);
	 
	 }
	 if(form.userpwd.value!=form.userpwd1.value){
	 
	   alert("密码与确认密码不同！");   
	   form.userpwd.focus();
	   return(false); 
	 
	 }
	 
	 if(form.userpwd.value.length<6){
	 
	   alert("密码长度应大于6位！");   
	   form.userpwd.focus();
	   return(false); 
	 
	 }
	 
	 if(form.sex.value==""){
	   alert("请选择性别！");
	   form.sex.focus();
	   return(false);
	 }
   return(true);							//提交表单
    
  }
</script>	

<div class="bodyright">	
<div class="signup">
	<h4 class=" text-center botborder">用户注册</h4>
	<form class="form-horizontal"  name="form1" method="post" action="savesignup.php" onSubmit="return chkinput(this)">
	
		<div class="control-group">
		    <label class="control-label" for="username">用户名</label>
		    <div class="controls">
		      <input type="text"  name="username" class="input-xlarge"  placeholder="用户名">
		    </div>
		</div>
		<div class="control-group">
		    <label class="control-label" for="inputPassword">密码</label>
		    <div class="controls">
		      <input type="password" name="userpwd" class="input-xlarge" placeholder="密码" >
		    </div>
		</div>


		<div class="control-group">
		    <label class="control-label" for="inputPassword1">确认密码</label>
		    <div class="controls">
		      <input type="password" name="userpwd1" class="input-xlarge" placeholder="确认密码" >
		    </div>
		</div>

		<div class="control-group">
		    <label class="control-label" for="inputPassword1">性别</label>
		    <div class="controls">
		     	<select class="input-large" name="sex">
					<option value="男">男</option>
					<option value="女">女</option>
				</select>
		    </div>
		</div>

		<div class="control-group ">
		    <label class="control-label face" for="inputPassword1">头像</label>
		    <div class="controls ">
		     	<select class="input-large"  name="face" onchange="form1.user_face.src=this.value">
					<?php for ($j = 0; $j < 11; $j++) {?>
					<option value="<?php echo "img/face/".$j.".gif"; ?>">
					<?php echo "$j.gif"; ?>
					</option>
					<?php }?>
				</select>
				<s > <img name="user_face" src="img/face/0.gif"/>
				</s>
		    </div>
		</div>

		<div class="control-group">
		     <button type="submit" class="btn controls btn-primary">注册</button>
		      <button class="btn  btn-primary " type="reset">重写</button>
		</div>
		</form>	
</div>
	

</div>
