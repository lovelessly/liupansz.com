<?php
Session_start();
if($_SESSION['login'] != 1){
        Header("HTTP/1.1 301 Moved Permanently");
	Header("Location:main.php");
}
?>
<!doctype.php>
<html>

<head>
    <meta charset="UTF-8">
    <title>帐户信息页面</title>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/freeue.css" rel="stylesheet" type="text/css">
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/function.js"></script>
	<script src="js/jquerycookie/jquery.cookie.js"></script>
	<script>
	function Request(strName){
	var strHref = document.location.href;
	var intPos = strHref.indexOf("?");
	var strRight = strHref.substr(intPos + 1);
	var arrTmp = strRight.split("&");
	for(var i = 0; i < arrTmp.length; i++ ) {
	var arrTemp = arrTmp[i].split("=");
	if(arrTemp[0].toUpperCase() == strName.toUpperCase()) return arrTemp[1];
	}
	return 0;
	}
	if(false){//预留用于判断用户是否登陆
		$('body').css('display','none');
		window.history.back(-1);
	}
	else{
		$('body').css('display','block');
	}
	</script>
</head>

<body>
    <!--页面头部-->
    <!--=============================导航栏================================-->
    <header id="js-header" class="mala-header mala-header-fix">
        <div class="mala-clearfix">
             <!--=============================右侧的个人中心================-->
            <a href="main.php" class="mala-logo mala-fl"></a>
            <div class="mala-user-info mala-fr js-header-dropmenu">
                <span class="mala-username">Hi, Baiduer!<i class="mala-arrow mala-arrow-down  mala-ml"></i>
                </span>
                <!--=====================js/common.js中控制下拉菜单========-->
                <ul class="mala-header-dropdown-list js-header-list">
                    <li class="mala-header-dropdown-item"><a href="stylelist.php" class="mala-link">管理后台</a>  <i class="mala-arrow mala-arrow-up" style="right:10px;"></i>
                    </li>
                    <li class="mala-header-dropdown-item"><a href="logout.php" class="mala-link">退出</a>
                    </li>
                </ul>
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
    <!--=====================左侧栏,js代码在/js/common.js=============-->
    <nav id="js-aside" class="mala-aside">
        <h3 class="mala-subnavi-title">后台管理</h3>
        <ul class="mala-subnavi-list">
            <li class="mala-subnavi-item">
                <a href="stylelist.php" class="mala-subnavi-link"> <i class="fa fa-taxi fa-fw"></i> </i>样式内容管理</a>
            </li>
            <!-- <li class="mala-subnavi-item">
                <div class="mala-subnavi-lead mala-clearfix"> <i class="fa fa-exchange fa-fw"></i> 线上预警
                    <span class="mala-arrow mala-arrow-down mala-fr"></span>
                </div>
                <ul class="mala-thirdnavi-list">
                    <li class="mala-thirdnavi-item"> <a href="" class="mala-thirdnavi-link">交互查询</a> 
                    </li>
                    <li class="mala-thirdnavi-item"> <a href="" class="mala-thirdnavi-link">metric信息</a> 
                    </li>
                </ul>
            </li>
            <li class="mala-subnavi-item">
                <div class="mala-subnavi-lead mala-clearfix"> <i class="fa fa-coffee fa-fw"></i> 速度报表
                    <span class="mala-arrow mala-arrow-down mala-fr"></span>
                </div>
                <ul class="mala-thirdnavi-list">
                    <li class="mala-thirdnavi-item"> <a href="" class="mala-thirdnavi-link">交互查询</a> 
                    </li>
                    <li class="mala-thirdnavi-item"> <a href="" class="mala-thirdnavi-link">metric信息</a> 
                    </li>
                </ul>
            </li>
            <li class="mala-subnavi-item">
                <div class="mala-subnavi-lead mala-clearfix"> <i class="fa fa-database fa-fw"></i> 交互查询
                    <span class="mala-arrow mala-arrow-down mala-fr"></span>
                </div>
                <ul class="mala-thirdnavi-list">
                    <li class="mala-thirdnavi-item"> <a href="" class="mala-thirdnavi-link">交互查询</a> 
                    </li>
                    <li class="mala-thirdnavi-item"> <a href="" class="mala-thirdnavi-link">metric信息</a> 
                    </li>
                </ul>
            </li> -->
        </ul>
        <h3 class="mala-subnavi-title">帐户设置</h3>
        <ul class="mala-subnavi-list">
            <li class="mala-subnavi-item">
                <a href="account.php" class="mala-subnavi-link"> <i class="fa fa-cube fa-fw"></i>修改帐户信息</a>
            </li>
            <!-- <li class="mala-subnavi-item">
                <div class="mala-subnavi-lead mala-clearfix"> <i class="fa fa-exchange fa-fw"></i> 线上预警
                    <span class="mala-arrow mala-arrow-down mala-fr"></span>
                </div>
                <ul class="mala-thirdnavi-list">
                    <li class="mala-thirdnavi-item"> <a href="" class="mala-thirdnavi-link">交互查询</a> 
                    </li>
                    <li class="mala-thirdnavi-item"> <a href="" class="mala-thirdnavi-link">metric信息</a> 
                    </li>
                </ul>
            </li> -->
        </ul>
    </nav>
    <!--主内容区-->
    <section class="mala-content">
        <h1 class="mala-title-bar">账户信息</h1>
        <div class="mala-flow-bar">

        </div>
        <form action="http://www.baidu.com" method="POST">
            <div class="mala-container-fluid">
                <div class="mala-form">
				    <div class="mala-form-item mala-row">
                        <div class="mala-col-md-3">
                            <label for="" class="mala-label mala-form-fix">
                                <span class="mala-required"></span>用户名</label>
                        </div>
                        <div class="mala-col-md-3">
                            <label for="" class="mala-label mala-form-fix">user_account_name</label>
                        </div>
<!--                         <div class="mala-col-md-3">
                            <span class="mala-tiper mala-form-fix">此处的分类是课程显示在百度中</span>
                        </div> -->
                    </div>
                    <div class="mala-form-item mala-row">
                        <div class="mala-col-md-3">
                            <label for="" class="mala-label mala-form-fix">
                                <span class="mala-required">*</span>当前密码</label>
                        </div>
                        <div class="mala-col-md-6">
                            <input type="password" class="mala-input mala-form-control" name='password'>
                        </div>
<!--                         <div class="mala-col-md-3">
                            <span class="mala-tiper mala-form-fix">此处的分类是课程显示在百度中</span>
                        </div> -->
                    </div>
<!--                     <div class="mala-form-item mala-row">
                        <div class="mala-col-md-3">
                            <label for="" class="mala-label mala-form-fix">
                                <span class="mala-required">*</span>课程分类</label>
                        </div>
                        <div class="mala-col-md-3">
                            <select name="" id="" class="mala-select mala-form-control">
                                <option value="">请选择</option>
                            </select>
                        </div>
                        <div class="mala-col-md-3">
                            <select name="" id="" class="mala-select mala-form-control">
                                <option value="">请选择</option>
                            </select>
                        </div>
                        <div class="mala-col-md-3">
                            <span class="mala-tiper mala-form-fix">此处的分类是课程显示在百度中</span>
                        </div>
                    </div> -->
                    <div class="mala-form-item mala-row">
                        <div class="mala-col-md-3">
                            <label for="" class="mala-label mala-form-fix">
                                <span class="mala-required">*</span>新密码</label>
                        </div>
                        <div class="mala-col-md-6">
                            <input type="password" class="mala-input mala-form-control">
                        </div>
                    </div>
                    <!-- <div class="mala-form-item mala-row">
                        <div class="mala-col-md-3">
                            <label for="" class="mala-label mala-form-fix">
                                <span class="mala-required">*</span>课程简介</label>
                        </div>
                        <div class="mala-col-md-6">
                            <textarea name="" class="mala-textarea mala-form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="mala-form-item mala-row">
                        <div class="mala-col-md-3">
                            <label for="" class="mala-label mala-form-fix">
                                <span class="mala-required">*</span>讲师简介</label>
                        </div>
                        <div class="mala-col-md-6">
                            <textarea name="" class="mala-textarea mala-form-control" rows="4"></textarea>
                        </div>
                    </div> -->
					
                    <div class="mala-form-item mala-row">
                        <div class="mala-col-md-3">
                            <label for="" class="mala-label mala-form-fix">
                                <span class="mala-required">*</span>新密码确认</label>
                        </div>
                        <div class="mala-col-md-6">
                            <input type="password" class="mala-input mala-form-control" id='newpassword_comf'>
                        </div>
                    </div> 
                    <div class="mala-form-item mala-row">
                        <div class="mala-col-md-3">
                            <label for="" class="mala-label mala-form-fix">
                                <span class="mala-required">*</span>设置头像</label>
                        </div>
						<input onchange="previewImage(this)" style='display:none' type="file" name="file" id="upload_file" />
                        <div class="mala-col-md-3" onclick='upload_pic(this.className);$("#upload_file").click();'><span class="mala-btn mala-btn-default mala-btn-block ">上传头像</span>
							<br>
							<div id='preview'>
                            <img src="images/slide1.jpg" class="mala-form-photo">
							</div>
                        </div>
                    </div>
                    <div class="mala-form-item mala-row">
                        <div class="mala-col-md-3">
                            <label for="" class="mala-label mala-form-fix">&nbsp;</label>
                        </div>
                        <div class="mala-col-md-3">&nbsp;</div>
                    </div>
                </div>
            </div>
            <div class=" mala-form-opt">
                <input type="submit" class="mala-btn mala-btn-primary mala-btn-large mala-mr" value="保存" onclick='alert($("#newpassword_comf").val());'>
                <input type="reset" class="mala-btn mala-btn-default mala-btn-large" value="取消">
            </div>
        </form>
    </section>
    <div class="mala-aside-opt">
        <a href="#" class="" id="mala-aside-hide">
            <i class="fa fa-arrow-left"></i>
        </a>
        <a href="#" class="" id="mala-aside-show" style="display:none">
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>
	<script src="js/common.js"></script>
 
<script language="JavaScript" type="text/javascript"> 
 $.cookie('name', 'value');
</script> 



</body>

</html>
