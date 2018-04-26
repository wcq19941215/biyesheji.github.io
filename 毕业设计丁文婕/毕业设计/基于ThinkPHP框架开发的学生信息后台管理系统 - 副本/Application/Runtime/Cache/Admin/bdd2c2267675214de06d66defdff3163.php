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
        <li class="active"><a href="<?php echo U('/Admin/index/trainStudentManage');?>">学生管理</a></li>
        <li><a href="<?php echo U('/Admin/index/trainStudentAdd');?>" >添加学生</a></li>
    </ul>
    <form name="data_list" method="post" class="js-ajax-form" novalidate="novalidate">
              <input id="current_url" type="hidden" name="current_url" value="<?php echo ($current_url); ?>" />
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
                <th width="50">ID</th>
                <th>姓名</th>
                <th>性别</th>
                <th>生日</th>
                <th>手机号</th>
                <th>地址</th>
                <th>来源</th>
                <th>费用</th>
                <th>上课班级</th>
                <th>上课状态</th>
                <th>备注</th>
                <th width="120">操作</th>
            </tr>
          </thead>
          <tbody>
            <?php $__FOR_START_15679__=0;$__FOR_END_15679__=count($data_list);for($i=$__FOR_START_15679__;$i < $__FOR_END_15679__;$i+=1){ ?><tr>
                    <td><?php echo ($data_list[$i]['id']); ?></td>
                    <td><?php echo ($data_list[$i]['name']); ?></td>
                    <td><?php echo ($data_list[$i]['sex']); ?></td>
                    <td><?php echo date('Y-m-d',$data_list[$i]['birth']);?></td>
                    <td><?php echo ($data_list[$i]['phone']); ?></td>
                    <td><?php echo ($data_list[$i]['site']); ?></td>
                    <td><?php echo ($data_list[$i]['source']); ?></td>
                    <td><?php echo ($data_list[$i]['money']); ?></td>
                    <td><?php echo ($data_list[$i]['begins']); ?></td>
                    <td><?php echo ($student_status[$data_list[$i]['status']]); ?></td>
                    <td><?php echo ($data_list[$i]['ramark']); ?></td>
                    <td>
                      <a href="javascript:;">退学</a>
                      |<a href="javascript:;">编辑</a>
                      |<a href="javascript:;" onclick='del_article(<?php echo ($article_list[$i]["id"]); ?>,$(this))' class="js-ajax-delete">删除</a>
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