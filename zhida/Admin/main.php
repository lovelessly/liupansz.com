
<?php
Session_start();
$_SESSION['views']=1;
//默认自动登陆，之后需要调用login写session
//$_SESSION['login']=1;
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>直达号管理后台</title>
    <link href="css/freeue.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="js/jquerycookie/jquery.cookie.js"></script>
</head>

<body>
    <!--=============================导航栏================================-->
    <header id="js-header" class="mala-header">
        <div class="mala-clearfix mala-container">
        <!--=============================右侧的个人中心================-->
            <a href="main.php" class="mala-logo mala-fl"></a>
            <div class="mala-user-info mala-fr js-header-dropmenu">
                <span class="mala-username">
		<?php
		if($_SESSION['login'] == 1){
			echo 'Hi,' . $_SESSION['username'] .'!';
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
                    <li class="mala-header-dropdown-item"><a href="logout.php" class="mala-link">退出</a>
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
    <!--=====================图片轮播=============-->
    <!--=====================js_slider控制图片轮播,具体代码在文件尾部=============-->
    <div class="mala-slider" id="js-slider">
        <ul class="mala-slide-list">
            <!--=====================背景图片由mala-slider-item控制=============-->
            <li class="mala-slide-item mala-fl" style="background-image: url(images/slide3.jpg); width:100%">
                <div class="mala-container">
                    <h3 class="mala-slide-title">样式推广管理后台</h3>
                    <h4 class="mala-slide-subtitle">我是广告</h4>
                    <p class="mala-slide-cont">我是广告 again
                        <br>我还是广告
                    </p>
                    <a href="stylelist.php" class="mala-btn mala-btn-primary mala-btn-larger">进入后台</a>
                </div>
            </li>
<!--             <li class="mala-slide-item mala-fl" style="background-image: url(images/slide2.jpg);">
                <div class="mala-container">
                    <h3 class="mala-slide-title">白金汉 Billingham 335 摄影包</h3>
                    <h4 class="mala-slide-subtitle">经典款式 做工精良</h4>
                    <p class="mala-slide-cont">以精湛手工著称，材质耐用，历久常新；新型StromBlock防水涂层合成帆布面料，
                        <br>高效防水厚实美观的黄铜扣具，经久耐用不生锈</p>
                    <a href="#" class="mala-btn mala-btn-primary mala-btn-larger">注册资源</a> 
                </div>
            </li> -->
        </ul>
    </div>
    <!--===========通知栏=============-->
    <div class="mala-notice">
        <div class="mala-container mala-clearfix">
            <div class="mala-fl"> <i class="fa fa-volume-up"></i>百度音乐是中国第一音乐门户,为你提供海量正版高品质音乐,最权威的音乐榜单</div>
            <div class="mala-fr"> <i class="fa fa-envelope-o"></i> freeue@baidu.com <i class="fa fa-paw" style="margin-left:10px;"></i> Freeue2014</div>
        </div>
    </div>
    <!--==============主体内容========-->
    <div class="mala-main">
        <div class="mala-container mala-clearfix">
            <figure class="mala-figure">
                <!--产品特点-->
                <div class="mala-service-list">
                    <div class="mala-row">
                        <div class="mala-col-md-4">
                            <div class="mala-service-item">
                                <span class="mala-service-img"><i class="fa fa-plane"></i>
                                </span>
                                <h4 class="mala-service-title">QA测试服务化集合</h4>
                                <span class="mala-service-desc">一站式测试服务体验</span>
                            </div>
                        </div>
                        <div class="mala-col-md-4">
                            <div class="mala-service-item">
                                <span class="mala-service-img"><i class="fa fa-shield"></i>
                                </span>
                                <h4 class="mala-service-title">QA测试服务化集合</h4>
                                <span class="mala-service-desc">一站式测试服务体验</span>
                            </div>
                        </div>
                        <div class="mala-col-md-4">
                            <div class="mala-service-item">
                                <span class="mala-service-img"><i class="fa fa-tasks"></i>
                                </span>
                                <h4 class="mala-service-title">QA测试服务化集合</h4>
                                <span class="mala-service-desc">一站式测试服务体验</span>
                            </div>
                        </div>
                    </div>
                </div>
            </figure>
        </div>
    </div>
    <!--==============页尾==============-->
    <footer class="mala-footer">
        <div class="mala-container mala-clearfix">
            <div class="mala-footer-links"></div>
            <div class="mala-row">
                <div class="mala-col-md-2">
                    <dl class="mala-footer-dl">
                        <dt class="mala-footer-dt">关于</dt>
                        <dd class="mala-footer-dd"> <a href="" class="mala-link">帮助</a> 
                        </dd>
                    </dl>
                </div>
                <div class="mala-col-md-2">
                    <dl class="mala-footer-dl">
                        <dt class="mala-footer-dt">友情链接</dt>
                        <dd class="mala-footer-dd"> <a href="" class="mala-link">联系</a> 
                        </dd>
                    </dl>
                </div>
                <div class="mala-col-md-2">
                    <dl class="mala-footer-dl">
                        <dt class="mala-footer-dt">反馈</dt>
                        <dd class="mala-footer-dd"> <a href="" class="mala-link">文档中心</a> 
                        </dd>
                        <dd class="mala-footer-dd"> <a href="" class="mala-link">百度监控平台</a> 
                        </dd>
                        <dd class="mala-footer-dd"> <a href="" class="mala-link">Hi群：1425469</a> 
                        </dd>
                    </dl>
                </div>
                <div class="mala-col-md-2">
                    <dl class="mala-footer-dl">
                        <dt class="mala-footer-dt">百度通用元素库</dt>
                        <dd class="mala-footer-dd"> <a href="" class="mala-link">邮箱：openserver@baidu.com</a> 
                        </dd>
                    </dl>
                </div>
                <div class="mala-col-md-4">
                    <div class="mala-footer-copyright mala-fr">©2011-2014 百度质量部出品</div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery-1.11.0.min.js"></script>
	
    <!--======主要用于header的控制===-->
    <script src="js/common.js"></script>
    <script src="js/jquery.glide.js"></script>
    <!--控制轮播图片切换代码，引用的js为jquery.glide.js-->
<!--     <script>
    $('#js-slider').glide();                    
    </script> -->
    <script>
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cdiv style='display:none;' %3E %3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fa04bc642fb15cb6b591f8fe5423f1bc2' type='text/javascript'%3E%3C/script%3E"));
    </script>
</body>

</html>
