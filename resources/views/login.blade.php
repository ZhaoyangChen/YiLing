<!DOCTYPE html>
<html lang="en">
	<head>
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

		<link rel="stylesheet" href="assets/css/login/index.css" />

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<!--customize-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	</head>
	<body class="login-layout">

	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">
						<div class="center">
							<h1>
								<span class="white">欢迎 登录夷陵热词管理系统</span>
							</h1>
							<h4 class="white">by Royan</h4>
						</div>

						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-bwelcomeBgImg.jpgox no-border" style="background-color: #F2F2F2 !important; padding:2px !important;">
								<div class="widget-body">
									<div class="widget-main" style="background-color: #fff !important;">
										<h4 class="header blue bigger">
											Login
										</h4>

										<div class="space-6"></div>

										<form action="/validate" method="post">                                    <div style="color:red;
										font-size:14px; padding-left:5px;"><span class="field-validation-valid" data-valmsg-for="Username" data-valmsg-replace="true"></span></div>
											<fieldset>
												<label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                <input autofocus="autofocus" class="form-control" data-val="true" data-val-required="Username is required." id="Username" name="Username" placeholder="Email Address" type="text" value="" />
                                                <i class="ace-icon fa fa-user"></i>
                                            </span>
												</label>

												<label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                <input class="form-control" id="Password" name="Password" placeholder="Password" type="password" />
                                                <i class="ace-icon fa fa-lock"></i>
                                            </span>
												</label>

												<div class="space"></div>

												<div class="clearfix">
													<label class="inline">
														<input name="RememberMe" type="checkbox" class="ace" value="true" />
														<span class="lbl"> Remember Me</span>
													</label>

													<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
														<i class="ace-icon fa fa-key"></i>
														Login
													</button>
												</div>

												<div class="space-4"></div>
											</fieldset>
											<input id="ReturnUrl" name="ReturnUrl" type="hidden" value="/" /></form>                            </div><!-- /widget-main -->

									<div class="toolbar clearfix" style="background-color: #4D5054 !important; border-top:none !important;">
										<div>
											<a href="/Account/ForgotPassword"  class="forgot-password-link" style="color:#ffffff !important;">
												<i class="ace-icon fa fa-arrow-left"></i>
												I forgot my password
											</a>
										</div>


									</div>
								</div><!-- /widget-body -->
							</div><!-- /login-box -->

						</div><!-- /position-relative -->
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.main-content -->
	</div><!-- /.main-container -->
</body>
</html>