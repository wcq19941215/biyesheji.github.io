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
<link rel="stylesheet" type="text/css" href="/Public/admin/css/list_page.css"/>
</head>
<body>
<div class="wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a>本站用户</a></li>
		</ul>
		<form class="well form-search" name="sel_index_user" action="<?php echo U('/Admin/index/indexUserManage');?>" method="post">
			用户ID： 
			<input type="text" name="uid" style="width: 100px;" value="" placeholder="请输入用户ID">
			关键字： 
			<input type="text" name="keyword" style="width: 200px;" value="" placeholder="用户名/昵称/邮箱">
			<input type="button" onclick="sel_index_user_list()" class="btn btn-primary" value="搜索">
			<input type="reset" class="btn btn-danger" value="清空">
		</form>
		<form method="post" name="index_user_list" class="js-ajax-form" novalidate="novalidate">
			            <table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th align="center">ID</th>
						<th>用户名</th>
						<th>昵称</th>
						<th>头像</th>
						<th>邮箱</th>
						<th>注册时间</th>
						<th>最后登录时间</th>
						<th>最后登录IP</th>
						<th>状态</th>
						<th align="center">操作</th>
					</tr>
				</thead>
				<tbody>
				  <?php $status=array('未激活','正常','已拉黑') ?>
				  <?php $__FOR_START_13110__=0;$__FOR_END_13110__=count($index_user_list);for($i=$__FOR_START_13110__;$i < $__FOR_END_13110__;$i+=1){ ?><tr>
						<td align="center"><?php echo ($index_user_list[$i]["id"]); ?></td>
						<td><?php echo ($index_user_list[$i]["user"]); ?></td>
						<td><?php echo ($index_user_list[$i]["pet_name"]); ?></td>
						<td><img width="25" height="25" src="<?php echo ($index_user_list[$i]['portrait']); ?>"></td>
						<td><?php echo ($index_user_list[$i]["email"]); ?></td>
						<td><?php echo date('Y-m-d H:i:s',$index_user_list[$i]['regi_time']); ?></td>
						<td><?php echo date('Y-m-d H:i:s',$index_user_list[$i]['login_time']); ?></td>
						<td><?php echo ($index_user_list[$i]["login_id"]); ?></td>
						<td><?php echo ($status[$index_user_list[$i]["status"]]); ?></td>
						<td align="center">
						<a style="color: #ccc;">拉黑</a>|
						<a style="color: #ccc;">启用</a></td>
					</tr><?php } ?>
								
				</tbody>
			</table>
		        <div id="page" class="wp-paginate">
             	   <?php echo ($page); ?>
                </div>
		</form>
</div>
<script src="/Public/admin/js/load.js"></script>
<!-- 公共 -->
<script src="/Public/common/js/jquery-1.8.3.min.js"></script>
<script src="/Public/common/js/bootstrap.min.js"></script>



<script type="text/javascript" src="/Public/admin/js/ajaxpost_index_user.js"></script>
</body>
</html>