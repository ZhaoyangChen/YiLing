﻿<!DOCTYPE html>
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
						<li id="addNav" class="active">
							<a href="#spiderStatus" data-toggle="tab">
								<i class="icon-bug"></i>
								<span class="menu-text"> 爬虫状态 </span>
							</a>
						</li>
						<li>
							<a href="#spiderControl" data-toggle="tab">
								<i class="icon-wrench"></i>
								<span class="menu-text"> 爬虫控制 </span>
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
							<li class="active">爬虫面板</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="well">
							<div id="user-profile-1" class="user-profile row">
								<div class="col-xs-12 col-sm-3 center">
									<div>
										<span class="profile-picture">
											<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/images/Spider.jpg" />
										</span>

										<div class="space-4"></div>

										<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
											<div class="inline position-relative">
												<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
													<span class="white">Spider Z. Chen</span>
												</a>

											</div>
										</div>
									</div>

									<div class="space-6"></div>

									<div class="hr hr16 dotted"></div>
								</div>

								<div class="col-xs-12 col-sm-9">
									<div class="profile-user-info profile-user-info-striped">
										<div class="profile-info-row">
											<div class="profile-info-name"> Name </div>

											<div class="profile-info-value">
												<span class="editable" id="username">Spider</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Status </div>

											<div class="profile-info-value">
												<span class="editable" id="status">Working</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Location </div>

											<div class="profile-info-value">
												<i class="icon-map-marker light-orange bigger-110"></i>
												<span class="editable" id="country">Shanghai</span>
												<span class="editable" id="city">China</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Father </div>

											<div class="profile-info-value">
												<span class="editable" id="about">Royan Chen</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Age </div>

											<div class="profile-info-value">
												<span class="editable" id="age">0</span>
											</div>
										</div>

										<div class="profile-info-row">
											<div class="profile-info-name"> Birthday </div>

											<div class="profile-info-value">
												<span class="editable" id="signup">15/06/2016</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- /.well -->


						<div class="page-content tab-content" >
							<div id="spiderStatus" class="tab-pane fade in active">
							</div>
							<div id="spiderControl" class="tab-pane fade in">
								<button id="startSpider" class="btn btn-primary">启动爬虫工作</button>
								<button id="stopSpider" class="btn btn-danger">停止爬虫工作</button>
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