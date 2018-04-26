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
<!-- 聊天窗口样式 -->
<link href="/Public/admin/css/chat_ball.css" rel="stylesheet" type="text/css">
<!-- 聊天窗口样式 -->
</head>
<body>

<div class="wrap js-check-wrap">

    <ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo U('/Admin/index/questManage');?>" >问答管理</a></li>
	</ul>
		
	<form name="sel_quest" class="well form-search" action="<?php echo U('/Admin/index/questManage');?>" method="post">
	    分类： 
		<select name="term" style="width: 200px;">
			<option value="0">全部</option>
		   <?php $__FOR_START_12959__=0;$__FOR_END_12959__=count($quest_nav_list);for($i=$__FOR_START_12959__;$i < $__FOR_END_12959__;$i+=1){ ?><option value="<?php echo ($quest_nav_list[$i]['id']); ?>"><?php echo ($quest_nav_list[$i]['nav_name']); ?></option><?php } ?>
			
		</select> &nbsp;&nbsp;
		<input type="button" onclick="sel_quest_list()" class="btn btn-primary" value="搜索">
		<input type="reset" class="btn btn-danger" value="清空">
	</form>
		
	<form name="quest_list" class="js-ajax-form" novalidate="novalidate">
		
        <input id="current_url" type="hidden" name="current_url" value="<?php echo ($current_url); ?>" />

		<table class="table table-hover table-bordered table-list">
			<thead>
				<tr>
					<th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
					<th width="50">ID</th>
					<th width="50">姓名</th>
					<th width="400">内容</th>
					<th width="150">时间</th>
					<th width="50">类别</th>
					<th width="400">回复</th>
					<th width="50">状态</th>
					<th width="70">操作</th>
				</tr>
			</thead>
			<tbody>
			  <?php $__FOR_START_12568__=0;$__FOR_END_12568__=count($quest_list);for($i=$__FOR_START_12568__;$i < $__FOR_END_12568__;$i+=1){ ?><tr>
				   <td>
					<input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($quest_list[$i]['id']); ?>" title="ID:<?php echo ($quest_list[$i]['id']); ?>"></td>
					<td><b><?php echo ($quest_list[$i]['id']); ?></b></td>
					<td><?php echo ($quest_list[$i]['send_name']); ?></td>
					<td><?php echo ($quest_list[$i]['send_content']); ?></td>
					<td><?php echo date('Y-m-d H:i:s',$quest_list[$i]['send_datetime']) ?></td>
					<td><?php echo ($quest_nav[$quest_list[$i]['n_id']]); ?></td>
					<td><?php echo ($quest_list[$i]['put_content']); ?></td>
                    <td>
                      <?php if($quest_list[$i]['status'] == 1): ?><a onclick="update_word_one(<?php echo ($quest_list[$i]['id']); ?>,'status',0)" data-toggle="tooltip" title="" data-original-title="已审核"><i class="fa fa-check"></i></a>
                      <?php else: ?>
                        <a onclick="update_word_one(<?php echo ($quest_list[$i]['id']); ?>,'status',1)" data-toggle="tooltip" title="" data-original-title="未审核"><i class="fa fa-close"></i></a><?php endif; ?>				
					</td>
					<td>
						<a href="javascript:;" onclick="chat_ball_open(<?php echo ($quest_list[$i]['id']); ?>)">回复</a> | 
						<a href="javascript:;" onclick='del_quest(<?php echo ($quest_list[$i]["id"]); ?>,$(this))' class="js-ajax-delete">删除</a>
					
					</td>

				 </tr><?php } ?>
				

			</tbody>
            
			
			
		</table>
			<div id="page" class="wp-paginate">
             	<?php echo ($page); ?>
            </div>

            
            
	</form>
</div>
<div id="chat_ball" class="chat_ball" style="width: 100%;height: 100%; position: fixed;top: 0px;left: 0px; display: none;color: #666; z-index: 5;">
</div>

<script src="/Public/admin/js/load.js"></script>
<!-- 公共 -->
<script src="/Public/common/js/jquery-1.8.3.min.js"></script>
<script src="/Public/common/js/bootstrap.min.js"></script>



<script type="text/javascript" src="/Public/admin/js/ajaxpost_quest.js"></script>
   <script>
   
    	$(function(){
    		data_toggle_tooltip();
    	});
    </script>

</body>
</html>