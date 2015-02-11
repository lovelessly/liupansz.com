<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统登录</title>
<link href="css/login.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
<link href="css/demo.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="js/Validform_v5.3.2_min.js"></script>
<link href="css/freeue.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="js/jquerycookie/jquery.cookie.js"></script>

<script>
$(function(){

$(".i-text").focus(function(){
$(this).addClass('h-light');
});

$(".i-text").focusout(function(){
$(this).removeClass('h-light');
});

$("#username").focus(function(){
 var username = $(this).val();
 if(username=='输入账号'){
 $(this).val('');
 }
});

$("#username").focusout(function(){
 var username = $(this).val();
 if(username==''){
 $(this).val('输入账号');
 }
});


$("#password").focus(function(){
 var username = $(this).val();
 if(username=='输入密码'){
 $(this).val('');
 }
});


$("#yzm").focus(function(){
 var username = $(this).val();
 if(username=='输入验证码'){
 $(this).val('');
 }
});

$("#yzm").focusout(function(){
 var username = $(this).val();
 if(username==''){
 $(this).val('输入验证码');
 }
});



$(".registerform").Validform({
	tiptype:function(msg,o,cssctl){
		var objtip=$(".error-box");
		cssctl(objtip,o.type);
		objtip.text(msg);
	},
	ajaxPost:true,
	callback:function(data){
		if(data.error != 0){location.reload();}
		else{window.location='./main.php';};
	}
});

});




</script>


</head>

<body>

<header id="js-header" class="mala-header">
        <div class="mala-clearfix mala-container">
        <!--=============================右侧的个人中心================-->
            <a href="main.php" class="mala-logo mala-fl"></a>
            <div class="mala-user-info mala-fr js-header-dropmenu">
                <span class="mala-username">
		<?php
		if($_SESSION['login'] == 1){
			echo 'Hi, Logined User!';
		}
		else{
			echo 'Hi, New User!';
		}
		?>
		<i class="mala-arrow mala-arrow-down  mala-ml"></i>
                </span>
                <!--=====================js/common.js中控制下拉菜单========-->
		<?php
		if($_SESSION['login'] == 1){
                echo '
		<ul class="mala-header-dropdown-list js-header-list">
                    <li class="mala-header-dropdown-item"><a href="stylelist.php" class="mala-link">管理后台</a>  <i class="mala-arrow mala-arrow-up" style="right:10px;"></i>
                    </li>
                    <li class="mala-header-dropdown-item"><a href="stylelist.php" class="mala-link">退出</a>
                    </li>
                </ul>
		';
		}
		else{
			echo '
		<ul class="mala-header-dropdown-list js-header-list">
			<li class="mala-header-dropdown-item"><a href="login.php" class="mala-link">登陆</a>
		</ul>
		';
		}
		?>
            </div>
            <!--=====================mala-avatar控制头像=============-->
            <span class="mala-avatar mala-fr">
                <img src="images/demo-photo.jpg">
            </span>
            <!--=====================导航栏中间的4个按钮=============-->
            <nav class="mala-fr">
                <ul class="mala-nav-list mala-clearfix">
                    <li class="mala-nav-item mala-fl"> <a href="main.php" class="mala-nav-link">首页</a> 
                    </li>
                    <li class="mala-nav-item mala-fl"> <a href="stylelist.php" class="mala-nav-link">关于我们</a> 
                    </li>
                </ul>
            </nav>
        </div>
</header>

<!-- <div class="header">
  <h1 class="headerLogo"><a title="后台管理系统" target="_blank" href="http://www.juheweb.com/"><img alt="logo" src="images/logo.gif"></a></h1>
	<div class="headerNav">
		<a target="_blank" href="http://www.juheweb.com/">华软官网</a>
		<a target="_blank" href="http://www.juheweb.com/">关于华软</a>
		<a target="_blank" href="http://www.juheweb.com/">开发团队</a>
		<a target="_blank" href="http://www.juheweb.com/">意见反馈</a>
		<a target="_blank" href="http://www.juheweb.com/">帮助</a>	
	</div>
</div> -->

<div class="banner">

<div class="login-aside">
  <div id="o-box-up"></div>
  <div id="o-box-down"  style="table-layout:fixed;">
   <div class="error-box"></div>
   
   <form class="registerform" action="../API/login.php">
   <div class="fm-item">
	   <label for="logonId" class="form-label">登录帐号：</label>
	   <input type="text" value="输入账号" name='username' maxlength="100" id="username" class="i-text"  datatype="s6-18" errormsg="用户名至少6个字符,最多18个字符！"  >    
       <div class="ui-form-explain"></div>
  </div>
  
  <div class="fm-item">
	   <label for="logonId" class="form-label">登陆密码：</label>
	   <input type="password" value="" maxlength="100" name='password' id="password" class="i-text" datatype="*6-16" nullmsg="请设置密码！" errormsg="密码范围在6~16位之间！">    
       <div class="ui-form-explain"></div>
  </div>
  
<!--   <div class="fm-item pos-r">
	   <label for="logonId" class="form-label">验证码</label>
	   <input type="text" value="输入验证码" maxlength="100" id="yzm" class="i-text yzm" nullmsg="请输入验证码！" >    
       <div class="ui-form-explain"><img src="images/yzm.jpg" class="yzm-img" /></div>
  </div> -->
  
  <div class="fm-item">
	   <label for="logonId" class="form-label"></label>
	   <input type="submit" value="" tabindex="4" id="send-btn" class="btn-login"> 
       <div class="ui-form-explain"></div>
  </div>
  
  </form>
  
  </div>

</div>

	<div class="bd">
		<ul>
			<li style="background:url(./images/slide3.jpg) #CCE1F3 center 0 no-repeat;"></li>
		</ul>
	</div>

	<div class="hd"><ul></ul></div>
</div>
<script type="text/javascript">jQuery(".banner").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click" });</script>


<div class="banner-shadow"></div>
<div class="footer">
   <p>Copyright &copy; 2015.  Baidu.com All rights reserved.<!-- <a target="_blank" href="http://www.juheweb.com/html/mb/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a> --></p>
</div>
</body>
<script src="js/common.js"></script>
<script src="js/jquery.glide.js"></script>
</html>
