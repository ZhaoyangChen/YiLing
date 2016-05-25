<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>夷陵热词管理系统</title>
		<meta name="keywords" content="日志分析展示系统" />
		<meta name="description" content="日志分析展示系统" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="resources/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="resources/assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="resources/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts 

		<link rel="stylesheet" href="resources/assets\css\cyrillic.css" />
-->
		<!-- ace styles -->

		<link rel="stylesheet" href="resources/assets/css/ace.min.css" />
		<link rel="stylesheet" href="resources/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="resources/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="resources/assets/css/dropzone.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="resources/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="resources/assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="resources/assets/js/html5shiv.js"></script>
		<script src="resources/assets/js/respond.min.js"></script>
		<![endif]-->

		<!--customize-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="resources/assets/js/index/index.js"></script>
		<script src="resources/assets/js/dropzone.min.js"></script>


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
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-warning-sign"></i>
									8条通知
								</li>
							</ul>
						</li>


						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="resources/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									Jason
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										设置
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										个人资料
									</a>
								</li>

								<li class="divider"></li>

								<li>
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
							<button class="btn btn-success nav-icon">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info nav-icon">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning nav-icon">
								<i class="icon-group"></i>
							</button>

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
						<li>
							<a href="#editWordsSection" data-toggle="tab">
								<i class="icon-edit"></i>
								<span class="menu-text"> 编辑热词 </span>
							</a>
						</li>
						<li>
							<a href="#deleteWordsSection" data-toggle="tab">
								<i class="icon-minus"></i>
								<span class="menu-text"> 删除热词 </span>
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
								<a href="#">首页</a>
							</li>
							<li class="active">热词管理</li>
						</ul><!-- .breadcrumb -->
					</div>

					<div class="page-content tab-content" >
						<div id="addWordsSection" class="tab-pane fade in">
							<div id="dropzone">
								<form action="//dummy.html" class="dropzone dz-clickable">
									<div class="fallback">
										<input name="file" type="file" multiple="" />
									</div>
								</form>
							</div>
						</div>

						<div id="searchWordsSection" class="tab-pane fade in active">

							<div class="input-group">
								<span class="input-group-btn">
									<button id="searchConditionBtn" data-toggle="dropdown" class="btn btn-white dropdown-toggle">
										按热词
										<i class="ace-icon fa fa-angle-down icon-on-right"></i>
									</button>

									<ul class="dropdown-menu">
										<li>
											<a href="#">按PC端URL</a>
										</li>

										<li>
											<a href="#">按PC端排名</a>
										</li>

										<li>
											<a href="#">按PC端爬取状态</a>
										</li>

										<li class="divider"></li>

										<li>
											<a href="#">按移动端URL</a>
										</li>

										<li>
											<a href="#">按移动端排名</a>
										</li>

										<li>
											<a href="#">按移动端爬取状态</a>
										</li>


										<li class="divider"></li>

										<li>
											<a href="#">按创建者</a>
										</li>

										<li>
											<a href="#">按创建时间</a>
										</li>

										<li>
											<a href="#">按最近更新时间</a>
										</li>
									</ul>
								</span>
								<input type="text" class="form-control" placeholder="Search for...">
								<span class="input-group-btn">
									<button class="btn btn-white" type="button">搜索!</button>
								</span>
							</div>

							<div class="table-responsive" style = 'font-size: 1px;'>
								<table id="sample-table-1" class="table table-striped table-bordered table-hover">
									<thead>
									<tr>
										<th class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</th>
										<th>关键词</th>
										<th>PC端URL</th>
										<th>PC端URL排名</th>
										<th>PC端URL昨日抓取情况</th>
										<th>移动端URL</th>
										<th>移动端URL排名</th>
										<th>移动端URL昨日抓取情况</th>
										<th>添加者</th>
										<th>添加时间</th>
										<th>最近更新时间</th>
									</tr>
									</thead>

									<tbody>
									<tr>
										<td class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</td>

										<td>上海二手汽车</td>
										<td>http://shanghai.baixing.com/ershouqiche/</td>
										<td>1</td>
										<td>是</td>
										<td>http://shanghai.baixing.com/m/ershouqiche/</td>
										<td>3</td>
										<td>否</td>
										<td>Royan</td>
										<td>2099-15-9</td>
										<td>3099-15-9</td>
									</tr>
									</tbody>
								</table>
							</div>

						</div><!-- Search Section-->

						<div id="editWordsSection" class="tab-pane fade in ">
						</div>

						<div id="deleteWordsSection" class="tab-pane fade in ">
						</div>
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="resources\assets\js\jquery-2.0.3.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="resources\assets\js\jquery-1.10.2.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='resources/assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='resources/assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='resources/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="resources/assets/js/bootstrap.min.js"></script>
		<script src="resources/assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="resources/assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="resources/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="resources/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="resources/assets/js/jquery.slimscroll.min.js"></script>
		<script src="resources/assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="resources/assets/js/jquery.sparkline.min.js"></script>
		<script src="resources/assets/js/flot/jquery.flot.min.js"></script>
		<script src="resources/assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="resources/assets/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->

		<script src="resources/assets/js/ace-elements.min.js"></script>
		<script src="resources/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

</body>
</html>