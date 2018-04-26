<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0050)http://www.thinkcmfx.com/index.php/Admin/Nav/index -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->


	<link href="/Public/admin/css/theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/admin/css/simplebootadminindex.min.css">
<link href="/Public/admin/css/simplebootadmin.css" rel="stylesheet">


<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
<![endif]-->

<!-- 公共 -->
<link href="/Public/common/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
  form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
  .table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
  .table-list{margin-bottom: 0px;}
</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
		  <li class="active"><a href="<?php echo U('/Admin/index/indexMenuManage');?>">菜单管理</a></li>
		  <?php $cid=$_POST['cid']; ?>
		  <li><a href="<?php echo U('/Admin/index/indexMenuAdd',array('cid'=>$cid));?>">添加菜单</a></li>
		</ul>

		<form class="well form-search" id="mainform" action="" method="post">
			<select id="navcid_select" name="cid">
			  <?php $__FOR_START_12168__=0;$__FOR_END_12168__=count($adv_menu);for($i=$__FOR_START_12168__;$i < $__FOR_END_12168__;$i+=1){ if($adv_menu[$i]['id'] == $cid): ?><option value="<?php echo ($adv_menu[$i]['id']); ?>" selected=""><?php echo ($adv_menu[$i]['menu_name']); ?></option>
			  	 <?php else: ?>
			  	    <option value="<?php echo ($adv_menu[$i]['id']); ?>"><?php echo ($adv_menu[$i]['menu_name']); ?></option><?php endif; } ?>
			</select>
		</form>
		<form class="js-ajax-form" action="" method="post" novalidate="novalidate">
			<div class="table-actions">
				<button type="submit" class="btn btn-primary btn-small js-ajax-submit">排序</button>
			</div>
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="50">排序</th>
						<th width="50">ID</th>
						<th>菜单名称</th>
						<th width="80">状态</th>
						<th width="180">操作</th>
					</tr>
				</thead>
				<tbody>

				  <?php $__FOR_START_26910__=0;$__FOR_END_26910__=count($index_menu_list);for($i=$__FOR_START_26910__;$i < $__FOR_END_26910__;$i+=1){ ?><tr>
						<td>
						  <input name="listorders[<?php echo ($index_menu_list[$i]['id']); ?>]" type="text" size="3" value="0" class="input input-order">
						</td>
						<td><?php echo ($index_menu_list[$i]["id"]); ?></td>
						<td><?php echo ($index_menu_list[$i]["menu_name"]); ?></td>
					    <td>显示</td>
						<td>
						  <a href='<?php echo U("/Admin/index/indexMenuAdd",array("pid"=>$index_menu_list[$i]["id"]));?>'>添加子菜单</a> | <a href='<?php echo U("/Admin/index/indexMenuEdit",array("id"=>$index_menu_list[$i]["id"]));?>'>编辑</a> | <a class="js-ajax-delete" href="#" onclick="delete_menu_list(<?php echo ($index_menu_list[$i]['id']); ?>,$(this))">删除</a>
						</td>
				    </tr><?php } ?>
					
				</tbody>
				<tfoot>
					<tr>
						<th width="50">排序</th>
						<th width="50">ID</th>
						<th>菜单名称</th>
						<th width="80">状态</th>
						<th width="180">操作</th>
					</tr>
				</tfoot>
			</table>

			<div class="table-actions">
				<button type="submit" class="btn btn-primary btn-small js-ajax-submit">排序</button>
			</div>
		</form>
	</div>
<script src="/Public/admin/js/load.js"></script>
<!-- 公共 -->
<script src="/Public/common/js/jquery-1.8.3.min.js"></script>
<script src="/Public/common/js/bootstrap.min.js"></script>


	
	<script>
		$(function() {

			$("#navcid_select").change(function() {
				$("#mainform").submit();
			});

		});
	</script>
<script type="text/javascript" src="/Public/admin/js/ajaxpost_menu.js"></script>
</body>
</html>