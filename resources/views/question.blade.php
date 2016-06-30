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

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<!--customize-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="assets/js/spider/index.js"></script>
		<script src="assets/js/dropzone.min.js"></script>
		<link rel="stylesheet" href="assets/css/index/index.css" />
		<script src="assets/js/bootbox.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
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
						<li class="active">
							<a href="#about" data-toggle="tab">
								<i class="icon-info"></i>
								<span class="menu-text"> 关于夷陵 </span>
							</a>
						</li>
						<li>
							<a href="#caution" data-toggle="tab">
								<i class="icon-question"></i>
								<span class="menu-text"> 注意事项 </span>
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
							<li class="active">文档面板</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content tab-content" >
						<div id="about" class="tab-pane fade in active">
							<div class="well">
								<p>
									1. 本系统主要通过爬虫抓取关键词在百度搜索引擎中与百姓网关联的链接, 以及其对应的排名状况。
								</p>

								<p>
									2. 本系统基于Laravel 5.2框架, MongoDB, Redis 和 Supervisor 开发。
								</p>

								<p>
									3. 根据机器性能, 线上并行爬虫数目限定在15个。
								</p>
							</div>
						</div>
						<div id="caution" class="tab-pane fade in">
							<div class="well">
								<p>
									1. 爬虫抓取逻辑根据百度网页元素中特殊的DOM结构, 一旦百度调整网页元素DOM, 将导致爬取结果全部为 排名无穷大
								</p>
								<p>
									2. 爬虫通过各种方式伪造自然人类操作, 一旦百度调整防御策略, 可能会导致爬虫抓取出现大量错误。
								</p>
								<p>
									3. 百度搜索引擎针对同一个查询,可能根据访问机器,用户习惯 返回不同的网页。 所以本系统抓取排名与自然人观察到的排名可能存在差别, 请时刻保持怀疑态度。
								</p>
								<p>
									4. 爬虫启动, 停止操作为敏感操作, 请谨慎。
								</p>
								<p>
									5. 新用户需要申请注册权限, 新功能添加或修改建议以及其他问题, 请联系 陈赵阳 chenzhaoyang@baixing.com。
								</p>
							</div>
						</div>
					</div>



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
		<script src="assets/js/bootstrap.min.js"></script>
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
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

</body>
</html>