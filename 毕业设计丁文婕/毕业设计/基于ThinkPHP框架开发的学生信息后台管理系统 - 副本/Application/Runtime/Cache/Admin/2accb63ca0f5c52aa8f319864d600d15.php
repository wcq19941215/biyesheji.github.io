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
        <li class="active">
          <a href="<?php echo U('/Admin/index/leaveWordManage');?>">所有留言</a>
        </li>
    </ul>
    <form name="leave_word_list" method="post" class="js-ajax-form" novalidate="novalidate">
              <input id="current_url" type="hidden" name="current_url" value="<?php echo ($current_url); ?>" />
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
                <th width="50">ID</th>
                <th width="100">姓名</th>
                <th width="150">邮箱</th>
                <th style="min-width: 60px;">留言标题</th>
                <th>留言内容</th>
                <th width="120">留言时间</th>
                <th width="50">状态</th>
                <th width="120">操作</th>
            </tr>
          </thead>
          <tbody>
            <?php $__FOR_START_32157__=0;$__FOR_END_32157__=count($leave_word_list);for($i=$__FOR_START_32157__;$i < $__FOR_END_32157__;$i+=1){ ?><tr>
                    <td><?php echo ($leave_word_list[$i]['id']); ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo ($leave_word_list[$i]['title']); ?></td>
                    <td><?php echo ($leave_word_list[$i]['content']); ?></td>
                    <td>
                      <?php echo date('Y-m-d H:i:s',$leave_word_list[$i]['datetime']) ?>
                    </td>
                    <td>
                      <?php if($leave_word_list[$i]['status'] == 1): ?><a onclick="update_word_one(<?php echo ($leave_word_list[$i]['id']); ?>,'status',0)" data-toggle="tooltip" title="" data-original-title="已审核"><i class="fa fa-check"></i></a>
                      <?php else: ?>
                        <a onclick="update_word_one(<?php echo ($leave_word_list[$i]['id']); ?>,'status',1)" data-toggle="tooltip" title="" data-original-title="未审核"><i class="fa fa-close"></i></a><?php endif; ?>
                    </td>
                    <td>
                      <a href="javascript:;" onclick="del_leave_word(<?php echo ($leave_word_list[$i]['id']); ?>,$(this),'<?php echo U("/Admin/LeaveWord/ajaxDelLeaveWord");?>')" class="js-ajax-delete">删除</a>
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



<script type="text/javascript" src="/Public/admin/js/ajaxpost_leave_word.js"></script>
<script>
    	$(function(){
    		data_toggle_tooltip();
    	});
    </script>
</body>
</html>