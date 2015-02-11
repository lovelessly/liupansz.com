<?php
Session_start();
if($_SESSION['login'] != 1){
	Header("HTTP/1.1 301 Moved Permanently");
	Header("Location:main.php");
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>详情编辑</title>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/freeue.css" rel="stylesheet" type="text/css">
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/function.js"></script>
	<script src="js/jquerycookie/jquery.cookie.js"></script>
	<script>
	if(Request("id") == 0){
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
                <a href="" class="mala-subnavi-link"> <i class="fa fa-cube fa-fw"></i>修改帐户信息</a>
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
        <h1 class="mala-title-bar">详情编辑</h1>
        <div class="mala-flow-bar">

        </div>
        <form action="../API/create_new_style.php" method='POST' enctype="multipart/form-data">
            <div class="mala-container-fluid">
							<div class="mala-form">
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>样式名称</label>
									</div>
									<div class="mala-col-md-6">
										<input type="text" class="mala-input mala-form-control" name='ad_name' id='ad_name'>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>简要描述</label>
									</div>
									<div class="mala-col-md-6">
										<input type="text" class="mala-input mala-form-control" name='short_desc' id='short_desc'>
									</div>
								</div>
								 <div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>是否热门</label>
									</div>
									<div class="mala-col-md-3">
										<select name="hot" id="" class="mala-select mala-form-control">
											<option value="0" id='hot_0'>非热门</option>
											<option value="1" id='hot_1' selected='selected'>热门</option>
										</select>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>样式类型</label>
									</div>
									<div class="mala-col-md-3">
										<select name="type" id="" class="mala-select mala-form-control">
											<option value="0" id="type_0">PC</option>
											<option value="1" id="type_1" selected='selected'>移动</option>
										</select>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>投放url</label>
									</div>
									<div class="mala-col-md-6">
										<input type="text" class="mala-input mala-form-control" name='toufang_url' id='toufang_url'>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>详情url</label>
									</div>
									<div class="mala-col-md-6">
										<input type="text" class="mala-input mala-form-control" name='detail_url' id='detail_url'>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>所属推广</label>
									</div>
									<div class="mala-col-md-6">
										<input type="text" class="mala-input mala-form-control" name='belong' id='belong'>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>计费模式</label>
									</div>
									<div class="mala-col-md-6">
										<textarea name="charging_type" class="mala-textarea mala-form-control" rows="4" id='charging_type'></textarea>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>样式特色说明</label>
									</div>
									<div class="mala-col-md-6">
										<textarea name="desc" class="mala-textarea mala-form-control" rows="4" id='desc'></textarea>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>可体验样式的搜索关键词</label>
									</div>
									<div class="mala-col-md-6">
										<textarea name="s_keyword" class="mala-textarea mala-form-control" rows="4" id='s_keyword'></textarea>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>样式图片</label>
									</div>
									<input onchange="previewImage(this)" style='display:none' type="file" name="file" id="upload_file" />
									<div class="mala-col-md-3"><span class="mala-btn mala-btn-default mala-btn-block" onclick='upload_pic(this.className);$("#upload_file").click();'>上传样式图</span>
										<br>
										<div id='preview'>
										<img  src="images/slide1.jpg" class="mala-form-photo" id='style_img'>
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
                <input type="submit" class="mala-btn mala-btn-primary mala-btn-large mala-mr" value="保存">
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
 $.cookie('username', 'testcookie',{ expires: 1 });
</script> 
<script>
getdetail(Request('id'));
</script>


</body>

</html>
