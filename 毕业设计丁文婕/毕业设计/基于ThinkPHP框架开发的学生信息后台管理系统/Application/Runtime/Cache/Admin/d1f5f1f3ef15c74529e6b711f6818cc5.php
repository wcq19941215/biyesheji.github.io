<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<!-- 与首页的一样  重复加载 start -->
<link href="/Public/admin/css/theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/admin/css/simplebootadminindex.min.css">
<link href="/Public/admin/css/simplebootadmin.css" rel="stylesheet">


<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
<![endif]-->

<!-- 公共 -->
<link href="/Public/common/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- 分页样式 -->
<link rel="stylesheet" type="text/css" href="/Public/admin/css/list_page.css"/>
<!-- 分页样式 -->
</head>
<body>
<div class="wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?php echo U('/Admin/index/trainTeaManage');?>">教师管理</a></li>
        <li><a href="<?php echo U('/Admin/index/trainTeaAdd');?>" >添加教师</a></li>
    </ul>
    <form name="data_list" method="post" class="js-ajax-form" novalidate="novalidate">
              <input id="current_url" type="hidden" name="current_url" value="<?php echo ($current_url); ?>" />
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
                <th width="50">ID</th>
                <th>姓名</th>
                <th>性别</th>
                <th>手机号</th>
                <th>微信</th>
                <th>级别</th>
                
                <th width="120">操作</th>
            </tr>
          </thead>
          <tbody>
            <?php $__FOR_START_31898__=0;$__FOR_END_31898__=count($data_list);for($i=$__FOR_START_31898__;$i < $__FOR_END_31898__;$i+=1){ ?><tr>
                    <td><?php echo ($data_list[$i]['id']); ?></td>
                    <td><?php echo ($data_list[$i]['name']); ?></td>
                    <td><?php echo ($data_list[$i]['sex']); ?></td>
                    <td><?php echo ($data_list[$i]['phone']); ?></td>
                    <td><?php echo ($data_list[$i]['wechat']); ?></td>
                    <td><?php echo ($data_list[$i]['rank']); ?></td>
                    <td>
                      <a href="javascript:;" onclick="del_leave_word(<?php echo ($data_list[$i]['id']); ?>,$(this),'<?php echo U("/Admin/LeaveWord/ajaxDelLeaveWord");?>')" class="js-ajax-delete">删除</a>
                    </td>
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



<script type="text/javascript" src="/Public/admin/js/ajaxpost_common.js"></script>
<script>
    	$(function(){
    		data_toggle_tooltip();
    	});
    </script>
</body>
</html>