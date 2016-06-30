<?php
$tableTags = [
	'关键词',
	'PC端URL',
	'PC端URL排名',
	'PC端URL昨日抓取情况',
	'移动端URL',
	'移动端URL排名',
	'移动端URL昨日抓取情况',
	'期望landing类目',
	'备注',
	'添加者',
	'添加时间',
	'最近更新时间',
];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>夷陵热词管理系统</title>
		<meta name="keywords" content="日志分析展示系统" />
		<meta name="description" content="日志分析展示系统" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts 

		<link rel="stylesheet" href="assets\css\cyrillic.css" />
-->
		<!-- ace styles -->

		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/dropzone.css" />
		<link rel="stylesheet" href="assets/css/index/index.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/jquery-2.0.3.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<!--customize-->
		<script src="assets/js/index/index.js"></script>
		<script src="assets/js/dropzone.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<script src="assets/js/bootbox.min.js"></script>
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							夷陵热词管理系统
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					
					<ul class="nav ace-nav">

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									{{{Auth::user()->name}}}
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li id="logout">
									<a href="#">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<a href="/" class="btn btn-success nav-icon">
								<i class="icon-pencil"></i>
							</a>

							<a href="/spider" class="btn btn-info nav-icon">
									<i class="icon-bug"></i>
							</a>

							<a href="/question" class="btn btn-warning nav-icon">
								<i class="icon-book"></i>
							</a>

							<button class="btn btn-danger nav-icon">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>
							<span class="btn btn-info"></span>
							<span class="btn btn-warning"></span>
							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul id="navTabs" class="nav nav-list">
						<li id="addNav" class="active">
							<a href="#searchWordsSection" data-toggle="tab">
								<i class="icon-search"></i>
								<span class="menu-text"> 查询热词 </span>
							</a>
						</li>
						<li>
							<a href="#addWordsSection" data-toggle="tab">
								<i class="icon-plus"></i>
								<span class="menu-text"> 添加热词 </span>
							</a>
						</li>

						<li id="delNav">
							<a href="#searchWordsSection" data-toggle="tab">
								<i class="icon-minus"></i>
								<span class="menu-text"> 删除热词 </span>
							</a>
						</li>

						<li id="downloadNav">
							<a href="#downloadWordsSection" data-toggle="tab">
								<i class="icon-download"></i>
								<span class="menu-text"> 下载热词 </span>
							</a>
						</li>
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="/">首页</a>
							</li>
							<li class="active">热词管理</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content tab-content" >
						<div id="addWordsSection" class="tab-pane fade in">
							<form id="myform" method="post" action="/upload/handleFile">
								{{csrf_field()}}
								<input type="file" name="avatar" />

								<div class="hr hr-12 dotted"></div>

								<button id="submitBtn" type="submit" class="btn btn-sm btn-primary">Submit</button>
								<button type="reset" class="btn btn-sm">Reset</button>
							</form>
							<br>
							<div class="well">
								<h5>上传进度</h5>
								<div class="progress progress-mini progress-striped active">
									<div id="uploadProgress" style="width: 0%;" class="progress-bar progress-bar-blue"></div>
								</div>
								<h5>分析进度</h5>
								<div class="progress progress-mini progress-striped active">
									<div id="exeProgress" style="width: 0%;" class="progress-bar progress-bar-yellow"></div>
								</div>
							</div>
						</div>

						<div id="downloadWordsSection" class="tab-pane fade in">
							<div id="downloadWell" class="well">
								<button id="downloadBtn" type="button" class="btn btn-sm btn-info">
									<i class="icon-cloud-download"></i>
									下载当前数据
								</button>

								{{--<button id="downloadLogBtn" type="button" class="btn btn-sm btn-default">--}}
									{{--<i class="icon-cloud-download"></i>--}}
									{{--下载爬虫日志--}}
								{{--</button>--}}
							</div>
						</div>

						<div id="searchWordsSection" class="tab-pane fade in active">
							<div id="deleteWell" class="well">
								<h5>当前已选中<span id="deleteInfo">0</span>条数据, 确认删除?</h5>
								<button id="deleteConfirm" type="button" class="btn btn-sm btn-danger">
									<i class="icon-trash"></i>
									确定
								</button>
							</div>

							<div id="searchWell" class="input-group well">
								<span class="input-group-btn">
									<button id="searchConditionBtn" data-toggle="dropdown" class="btn btn-white dropdown-toggle">按热词</button>
									<ul class="dropdown-menu searchCondition">
										<li><a href="#">按热词</a></li>
										<li><a href="#">按PC端URL</a></li>
										<li><a href="#">按PC端排名</a></li>
										<li><a href="#">按PC端爬取状态</a></li>

										<li class="divider"></li>

										<li><a href="#">按移动端URL</a></li>
										<li><a href="#">按移动端排名</a></li>
										<li><a href="#">按移动端爬取状态</a></li>

										<li class="divider"></li>

										<li><a href="#">期望landing类目</a></li>
										<li><a href="#">备注</a></li>
										<li><a href="#">按创建者</a></li>
										<li><a href="#">按创建时间</a></li>
										<li><a href="#">按最近更新时间</a></li>
									</ul>
								</span>

								<span class="input-group-btn">
									<button id="searchSymbolBtn" data-toggle="dropdown" class="btn btn-white dropdown-toggle">模糊等于</button>
									<ul class="dropdown-menu searchCondition">
										<li><a href="#">模糊等于</a></li>
										<li><a href="#">精确等于</a></li>
										<li><a href="#">大于</a></li>
										<li><a href="#">小于</a></li>
									</ul>
								</span>
								<input id="searchInput"type="text" class="form-control" placeholder="Search for...">
								<span class="input-group-btn">
									<button id="keywordSearchBtn" class="btn btn-white" type="button">搜索!</button>
								</span>
							</div>

							<nav>
								<ul class="pager">
									<li class="prevPage"><a href="#">上一页</a></li>
									<li class="nextPage"><a href="#">下一页</a></li>
									<input class="jumpInput" type="text"  placeholder="请输入页码...">
									<li class="jumpPage"><a href="#">跳页</a></li>
								</ul>
							</nav>

							<div id="keywordTableHeader" class="table-header">
								<span id="header-condition">默认查询结果</span>
								<span id="header-num"></span>
								<span id="header-cur"></span>
								<span id="header-total"></span>
							</div>

							<div id="keywordTable" class="table-responsive">
								<table id="sample-table-1" class="table table-striped table-bordered table-hover">
									<thead>
									<tr>
										<th class="center selectCell">
											<label>
												<input type="checkbox" class="ace selectAll" />
												<span class="lbl"></span>
											</label>
										</th>
										@foreach($tableTags as $tag)
											<th>{{$tag}}</th>
										@endforeach
									</tr>
									</thead>

									<tbody>
									</tbody>
								</table>
							</div>

							<nav>
								<ul class="pager">
									<li class="prevPage"><a href="#">上一页</a></li>
									<li class="nextPage"><a href="#">下一页</a></li>
									<input class="jumpInput" type="text"  placeholder="请输入页码...">
									<li class="jumpPage"><a href="#">跳页</a></li>
								</ul>
							</nav>

						</div><!-- Search Section-->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="assets\js\jquery-2.0.3.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets\js\jquery-1.10.2.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
	window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/flot/jquery.flot.min.js"></script>
		<script src="assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="assets/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- inline scripts related to this page -->

</body>
</html>