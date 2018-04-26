<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
<!-- 与首页的一样  重复加载 start -->
<link href="/Public/admin/css/theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/admin/css/simplebootadminindex.min.css">
<link href="/Public/admin/css/simplebootadmin.css" rel="stylesheet">


<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
<![endif]-->

<!-- 公共 -->
<link href="/Public/common/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- 与首页的一样  重复加载 end -->
</head>
<body>
<div class="wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('/Admin/index/AdminUserInfo');?>">修改信息</a></li>
			<li class="active"><a href="/Admin/index/modiAdminPass" target="_self">修改密码</a></li>
		</ul>
		<form id="modi_admin_pass" class="form-horizontal js-ajax-form" novalidate="novalidate">
			<fieldset>
				<div class="control-group">
					<label class="control-label" for="input-old-password">原始密码</label>
					<div class="controls">
						<input type="password" class="input-xlarge" id="input-old-password" name="old_password">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-password">新密码</label>
					<div class="controls">
						<input type="password" class="input-xlarge" id="input-password" name="password">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input-repassword">重复新密码</label>
					<div class="controls">
						<input type="password" class="input-xlarge" id="input-repassword" name="repassword">
					</div>
				</div>
				<div class="form-actions">
					<button type="button" onclick="modiAdminPass()" class="btn btn-primary  js-ajax-submit">保存</button>
				</div>
			</fieldset>
		</form>
</div>
<script src="/Public/admin/js/load.js"></script>
<!-- 公共 -->
<script src="/Public/common/js/jquery-1.8.3.min.js"></script>
<script src="/Public/common/js/bootstrap.min.js"></script>



<script type="text/javascript" src="/Public/Admin/js/ajaxpost_admin.js"></script>
</body>
</html>