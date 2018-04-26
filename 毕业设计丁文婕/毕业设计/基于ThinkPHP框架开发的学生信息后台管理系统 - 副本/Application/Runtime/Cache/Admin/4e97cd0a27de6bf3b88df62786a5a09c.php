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
<!-- 分页样式 -->
<link rel="stylesheet" type="text/css" href="/Public/admin/css/list_page.css"/>
<!-- 分页样式 -->
<script src="/Public/admin/js/load.js"></script>
<!-- 公共 -->
<script src="/Public/common/js/jquery-1.8.3.min.js"></script>
<script src="/Public/common/js/bootstrap.min.js"></script>




</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo U('/Admin/index/schoolManage');?>" >学校管理</a></li>
		<li><a href="<?php echo U('/Admin/index/collegeSchoolAdd');?>" >添加学校</a></li>
	</ul>
		
	<form name="sel_college" class="well form-search" action="<?php echo U('/Admin/index/schoolManage');?>" method="post">
	    地区： 
		<select name="aid" style="width: 200px;">
			<option value="0">全部</option>
		   <?php $__FOR_START_25763__=0;$__FOR_END_25763__=count($area);for($i=$__FOR_START_25763__;$i < $__FOR_END_25763__;$i+=1){ ?><option value="<?php echo ($area[$i]['id']); ?>"><?php echo ($area[$i]['name']); ?></option><?php } ?>
			
		</select>
        
		 &nbsp; &nbsp;
		学校： 
		<input type="text" name="name" style="width: 200px;" value="" placeholder="请输入学校名字...">
		<input type="button" onclick="sel_college_list()" class="btn btn-primary" value="搜索">
		<input type="reset" class="btn btn-danger" value="清空">
	</form>
		
	<form name="college_list" class="js-ajax-form" novalidate="novalidate">
		        <div class="table-actions">
			<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/index.php/AdminPost/check/check/1" data-subcheck="true">审核</button>
			<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/index.php/AdminPost/check/uncheck/1" data-subcheck="true">取消审核</button>
			<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/index.php/AdminPost/top/top/1" data-subcheck="true">置顶</button>
			<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/index.php/AdminPost/top/untop/1" data-subcheck="true">取消置顶</button>
			<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/index.php/AdminPost/recommend/recommend/1" data-subcheck="true">推荐</button>
			<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/index.php/AdminPost/recommend/unrecommend/1" data-subcheck="true">取消推荐</button>
			<button class="btn btn-primary btn-small js-articles-copy" type="button">批量复制</button>
			<button class="btn btn-danger btn-small js-ajax-submit" type="submit" data-action="/index.php/AdminPost/delete" data-subcheck="true" data-msg="您确定删除吗？">删除</button>
		</div>
		
        <input id="current_url" type="hidden" name="current_url" value="<?php echo ($current_url); ?>" />

		<table class="table table-hover table-bordered table-list">
			<thead>
				<tr>
					<th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
					<th width="50">ID</th>
					<th width="80">地区</th>
					<th width="300">学校</th>
					<th>网址</th>
					<th width="70">操作</th>
				</tr>
			</thead>
			<tbody>
			  <?php $__FOR_START_32142__=0;$__FOR_END_32142__=count($college_list);for($i=$__FOR_START_32142__;$i < $__FOR_END_32142__;$i+=1){ ?><tr>
				   <td>
					<input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($college_list[$i]['id']); ?>" title="ID:<?php echo ($college_list[$i]['id']); ?>"></td>
					<td><b><?php echo ($college_list[$i]['id']); ?></b></td>
					<td><?php echo ($college_list[$i]['area']); ?></td>
					<td><?php echo ($college_list[$i]['name']); ?></td>
					<td><?php echo ($college_list[$i]['url']); ?></td>
					<td>
					<a href="<?php echo U('/Admin/index/collegeSchoolEdit',array('id'=>$college_list[$i]['id']));?>">编辑</a> | 
					<a href="javascript:;" onclick='del_college(<?php echo ($college_list[$i]["id"]); ?>,$(this),<?php echo U('/Admin/College/ajaxDelSchool');?>)' class="js-ajax-delete">删除</a>
					
					</td>
				 </tr><?php } ?>
				

			</tbody>
            
			
			
		</table>
			<div id="page" class="wp-paginate">
             	<?php echo ($page); ?>
            </div>

            
            
	</form>
</div>


<script type="text/javascript" src="/Public/admin/js/ajaxpost_college.js"></script>

</body>
</html>