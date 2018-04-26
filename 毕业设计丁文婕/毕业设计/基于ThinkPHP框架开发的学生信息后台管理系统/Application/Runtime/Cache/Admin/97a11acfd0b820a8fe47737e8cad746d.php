<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<link href="/Public/admin/css/theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/admin/css/simplebootadminindex.min.css">
<link href="/Public/admin/css/simplebootadmin.css" rel="stylesheet">


<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
<![endif]-->

<!-- 公共 -->
<link href="/Public/common/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('/Admin/index/schoolManage');?>" >学校管理</a></li>
			<li><a href="<?php echo U('/Admin/index/collegeSchoolAdd');?>" >添加学校</a></li>
			<li class="active"><a href="<?php echo U('/Admin/index/collegeSchoolEdit');?>" >编辑学校</a></li>
		</ul>
		<form id="add_index_menu" method="post" name="edit_college" action="<?php echo U('/Admin/College/ajaxEditSchool');?>" class="form-horizontal js-ajax-form" novalidate="novalidate">
			<fieldset>
			<input type="hidden" name="id" value="<?php echo ($school['id']); ?>">
				<div class="control-group">
					<label class="control-label">地区</label>
					<div class="controls">
						<select name="aid" id="navcid_select">
							<option value="<?php echo ($school['aid']); ?>" selected=""><?php echo ($school['area']); ?></option>
						</select>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label">学校</label>
					<div class="controls">
						<input type="text" name="name" id="outlink_input" class="valid" value="<?php echo ($school['name']); ?>" aria-invalid="false" placeholder="请输入学校...">
						
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">链接</label>
					<div class="controls">
						<input type="text" name="url" id="outlink_input" value="<?php echo ($school['url']); ?>" class="valid" aria-invalid="false">
						
					</div>
				</div>


			</fieldset>
			<div class="form-actions">
				<button type="button" onclick="editCollege()" class="btn btn-primary js-ajax-submit">修改</button>
				<a class="btn" href="javascript:history.back(-1);">返回</a>
			</div>

		</form>
	</div>

<script src="/Public/admin/js/load.js"></script>
<!-- 公共 -->
<script src="/Public/common/js/jquery-1.8.3.min.js"></script>
<script src="/Public/common/js/bootstrap.min.js"></script>



<script type="text/javascript" src="/Public/admin/js/ajaxpost_college.js"></script>
</body>
</html>