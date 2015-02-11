<?php
Session_start();
echo $_SESSION['views'];

if($_SESSION['login'] != 1 && $_SERVER['HTTP_REFERER'] != 'http://cp01-centos43-rdqa036.epc.baidu.com:8702/zhida/Admin/main.php'){
	Header("HTTP/1.1 301 Moved Permanently");
	Header("Location:main.php");
}
else if($_SESSION['login'] != 1 && $_SERVER['HTTP_REFERER'] == 'http://cp01-centos43-rdqa036.epc.baidu.com:8702/zhida/Admin/main.php'){
	Header("HTTP/1.1 301 Moved Permanently");
	Header("Location:login.php");
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>列表页面</title>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/freeue.css" rel="stylesheet" type="text/css">
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/function.js"></script>
	<script src="js/jquerycookie/jquery.cookie.js"></script>
	<script>
	if(Request("page") == 0){
		window.location = './stylelist.php?page=1';
	}
	</script>
</head>

<body>
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
    <!--=========主内容区=======-->
    <section class="mala-content">
        <h1 class="mala-title-bar">样式内容管理</h1>
        <ul class="mala-tab-navi-bar mala-clearfix">
            <li class="mala-tab-navi-item mala-fl mala-mr active">所有样式</li>
        </ul>
        <div class="mala-container-fluid">
<!--             <div class="mala-search-bar">
                <select name="" class="mala-select mala-mr">
                    <option value="">请选择分类</option>
                </select>
                <select name="" class="mala-select mala-mr">
                    <option value="">请选择分类</option>
                </select>
                <input type="text" class="mala-input mala-input-large mala-mr" placeholder="请输入关键字"><a class="mala-btn mala-btn-default mala-btn-small ">搜索</a> 
            </div> -->
            <div class="mala-opt-bar mala-clearfix">
                <div class="mala-btn-group mala-mr"><a class="mala-btn mala-btn-primary mala-btn" data-toggle="modal" data-target="#malaModal">新建内容</a>
                </div>
<!--                 <div class="mala-btn-group mala-mr"> <a class="mala-btn mala-btn-default ">修改类别</a><a class="mala-btn mala-btn-default  ">刷新列表</a><a class="mala-btn mala-btn-default ">修改状态</a>
                </div> -->
                <div class="mala-btn-group "><a class="mala-btn mala-btn-danger" data-toggle="modal" data-target="#malaModal2">批量删除</a>
                <!--=====================筛选项目,具体看js/common.js=============-->
                </div>
                <div class="mala-fake-select mala-fr">
                    <span class="mala-select-title js-fake-select">筛选项目</span> <i class="mala-arrow mala-arrow-down"></i>
                    <ul class="mala-select-list js-list">
                        <li class="mala-select-item js-select-item active">筛选项目</li>
                        <li class="mala-select-item js-select-item">发生的发生</li>
                        <li class="mala-select-item js-select-item">发生的发生</li>
                    </ul>
                    <ul class="mala-select-list-fix">
                        <li class="mala-select-item">筛选项目</li>
                        <li class="mala-select-item">发生的发生</li>
                        <li class="mala-select-item">发生的发生</li>
                    </ul>
                </div>
            </div>
            <div class="mala-list-bar">
                <table id="js-mytable" class="mala-table">
                    <thead>
                        <tr>
                            <th class="mala-th" width="5%">
                                <input type="checkbox" class="mala-ml-small">
                            </th>
                            <th class="mala-th" width="5%">id</th>
                            <th class="mala-th" >标题</th>
                            <th class="mala-th" width="10%">所属推广</th>
                            <th class="mala-th" width="10%">平台</th>
                            <th class="mala-th" width="10%">是否热门推荐</th>
                            <th class="mala-th" width="20%">修改时间</th>
                            <th class="mala-th" width="13%">操作</th>
                        </tr>
                    </thead>
                    <tbody id='element_list'>
 <!--                        <tr class="mala-tr">
                            <td class="mala-td">
                                <input type="checkbox" class="mala-ml-small">
                            </td>
                            <td class="mala-td mala-td-title"><a href="./detail.php?id=1">北京的发生发生的发生</a>
                            </td>
                            <td class="mala-td">喜剧</td>
                            <td class="mala-td">发布中</td>
                            <td class="mala-td">小雨</td>
                            <td class="mala-td">2014-10-03 14:00</td>
                            <td class="mala-td"><a href="" class="mala-mr js-edit">编辑</a> <a href="">删除</a>
                            </td>
                        </tr>
                         -->
                    </tbody>
                </table>
            </div>
            <!--==============换页=================-->
            <div class="mala-pager">
                <span class="mala-paginate-link">
                    <span class="mala-caret mala-caret-prev"></span>
                </span> <a href="" class="mala-paginate-link">1</a>  <a href="" class="mala-paginate-link active">2</a>  <a href="" class="mala-paginate-link">3</a>   
                <span class="mala-paginate-link">
                    <span class="mala-caret mala-caret-next"></span>
                </span>
            </div>
        </div>
    </section>
    <!-- =====================模拟弹窗================= -->	
	<div class="mala-modal fade" id="malaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="mala-modal-dialog">
            <div class="mala-modal-content">
                <div class="mala-modal-header">
                    <button type="button" class="close" id='new_style_close' data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="mala-modal-title" id="myModalLabel">新增样式</h4>
                </div>
                <div class="mala-modal-body">
                <!-- =============================在mala-modal-body中写上弹窗中内容的html=================== -->
					<form action="../API/create_new_style.php" enctype="multipart/form-data" method='POST' target='#'>
						<div class="mala-container-fluid">
							<div class="mala-form">
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>样式名称</label>
									</div>
									<div class="mala-col-md-6">
										<input type="text" class="mala-input mala-form-control" name='ad_name'>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>简要描述</label>
									</div>
									<div class="mala-col-md-6">
										<input type="text" class="mala-input mala-form-control" name='short_desc'>
									</div>
								</div>
								 <div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>是否热门</label>
									</div>
									<div class="mala-col-md-3">
										<select name="hot" id="" class="mala-select mala-form-control">
											<option value="0">非热门</option>
											<option value="1">热门</option>
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
											<option value="0">PC</option>
											<option value="1">移动</option>
										</select>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>投放url</label>
									</div>
									<div class="mala-col-md-6">
										<input type="text" class="mala-input mala-form-control" name='toufang_url'>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>详情url</label>
									</div>
									<div class="mala-col-md-6">
										<input type="text" class="mala-input mala-form-control" name='detail_url'>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>所属推广</label>
									</div>
									<div class="mala-col-md-6">
										<input type="text" class="mala-input mala-form-control" name='belong'>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>计费模式</label>
									</div>
									<div class="mala-col-md-6">
										<textarea name="charging_type" class="mala-textarea mala-form-control" rows="4"></textarea>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>样式特色说明</label>
									</div>
									<div class="mala-col-md-6">
										<textarea name="desc" class="mala-textarea mala-form-control" rows="4"></textarea>
									</div>
								</div>
								<div class="mala-form-item mala-row">
									<div class="mala-col-md-3">
										<label for="" class="mala-label mala-form-fix">
											<span class="mala-required">*</span>可体验样式的搜索关键词</label>
									</div>
									<div class="mala-col-md-6">
										<textarea name="s_keyword" class="mala-textarea mala-form-control" rows="4"></textarea>
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
					</form>
				</div>
                <div class="mala-modal-footer">
                    <button type="button" class="mala-btn mala-btn-default mala-btn-wie mala-mr" data-dismiss="modal">取消</button>
                    <button onclick="$('form').submit();$('#new_style_close').click();" type="button" class="mala-btn mala-btn-primary mala-btn-wide">保存</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 控制左侧栏的隐藏和显示 -->
    <div class="mala-aside-opt">
        <a href="#" class="" id="mala-aside-hide">
            <i class="fa fa-arrow-left"></i>
        </a>
        <a href="#" class="" id="mala-aside-show" style="display:none">
            <i class="fa fa-arrow-right"></i>
        </a>
    </div>
    <script src="js/jquery-1.11.0.min.js"></script>
    <!-- 主要用户左侧栏的下拉效果和导航栏的下拉 -->
    <script src="js/common.js"></script>
    <!-- bootstrap的modal.js，控制弹窗 -->
    <script src="js/modal.js"></script>
<!--     <script>
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cdiv style='display:none;' %3E %3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fa04bc642fb15cb6b591f8fe5423f1bc2' type='text/javascript'%3E%3C/script%3E"));
    </script> -->
<script>
test(Request("page"));
</script>

</body>

</html>
