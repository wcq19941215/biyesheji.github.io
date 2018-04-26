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
<!-- 时间控件 -->
<link rel="stylesheet" href="/Public/common/css/calendar.css">
<style type="text/css">
.calendar ul, .calendar ol, .calendar li {
	list-style: none;
	padding: 0;
	margin: 0;
}
</style>
<!-- 时间控件 -->
<script src="/Public/admin/js/load.js"></script>
<!-- 公共 -->
<script src="/Public/common/js/jquery-1.8.3.min.js"></script>
<script src="/Public/common/js/bootstrap.min.js"></script>




</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
		<li class="active"><a href="<?php echo U('/Admin/index/articleManage');?>" >文章管理</a></li>
		<li><a href="<?php echo U('/Admin/index/addArticle');?>" >添加文章</a></li>
	</ul>
		
	<form name="sel_article" class="well form-search" action="<?php echo U('/Admin/index/articleManage');?>" method="post">
	    分类： 
		<select name="term" style="width: 200px;">
			<option value="0">全部</option>
		   <?php $__FOR_START_5076__=0;$__FOR_END_5076__=count($index_menu_list);for($i=$__FOR_START_5076__;$i < $__FOR_END_5076__;$i+=1){ ?><option value="<?php echo ($index_menu_list[$i]['id']); ?>"><?php echo ($index_menu_list[$i]['menu_name']); ?></option><?php } ?>
			
		</select> &nbsp;&nbsp;
		时间：
		<input type="text" id="start_time" name="start_time" class="js-datetime date" value="" style="width: 120px;" autocomplete="off">
        

		  <div id="start_times" class="calendar calendar-modal calendar-d" style="width: 280px; height: 330px; left: 561.5px; top: 581px; z-index: 999;"><div class="calendar-inner" style="width: 280px;"><div class="calendar-views"><div class="view view-date" style="width: 280px;"><div class="calendar-hd"><a href="javascript:;" data-calendar-display-date="" class="calendar-display">2017/<span class="m">1</span></a><div class="calendar-arrow"><span class="prev" title="上一月" data-calendar-arrow-date="">&lt;</span><span class="next" title="下一月" data-calendar-arrow-date="">&gt;</span></div></div><div class="calendar-ct" style="width: 280px; height: 280px;"><ol class="week"><li style="width:40px;height:40px;line-height:40px">日</li><li style="width:40px;height:40px;line-height:40px">一</li><li style="width:40px;height:40px;line-height:40px">二</li><li style="width:40px;height:40px;line-height:40px">三</li><li style="width:40px;height:40px;line-height:40px">四</li><li style="width:40px;height:40px;line-height:40px">五</li><li style="width:40px;height:40px;line-height:40px">六</li></ol><ul class="date-items"><li style="width: 280px;"><ol class="days"><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">27</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">28</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">29</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">30</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">4</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">5</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">6</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">7</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">8</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">9</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">10</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">11</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">12</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">13</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">14</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">15</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">16</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">17</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">18</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">19</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">20</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">21</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">22</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">23</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">24</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">25</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">26</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">27</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">28</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">29</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">30</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">31</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class="new now" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">4</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">5</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">6</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">7</li></ol></li><li style="width: 280px;"><ol class="days"><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">25</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">26</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">27</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">28</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">29</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">30</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">31</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class=" now" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">4</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">5</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">6</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">7</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">8</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">9</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">10</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">11</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">12</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">13</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">14</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">15</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">16</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">17</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">18</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">19</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">20</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">21</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">22</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">23</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">24</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">25</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">26</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">27</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">28</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">29</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">30</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">31</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">4</li></ol></li><li style="width: 280px;"><ol class="days"><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">29</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">30</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">31</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">4</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">5</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">6</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">7</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">8</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">9</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">10</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">11</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">12</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">13</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">14</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">15</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">16</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">17</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">18</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">19</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">20</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">21</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">22</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">23</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">24</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">25</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">26</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">27</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">28</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">4</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">5</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">6</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">7</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">8</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">9</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">10</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">11</li></ol></li></ul></div></div><div class="view view-month" style="width: 280px;"><div class="calendar-hd"><a href="javascript:;" data-calendar-display-month="" class="calendar-display">2017</a><div class="calendar-arrow"><span class="prev" title="上一年" data-calendar-arrow-month="">&lt;</span><span class="next" title="下一年" data-calendar-arrow-month="">&gt;</span></div></div><ol class="calendar-ct month-items" style="width: 280px; height: 280px;"><li style="width:70px;height:70px;line-height:70px" data-calendar-month="" class="now">1月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">2月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">3月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">4月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">5月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">6月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">7月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">8月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">9月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">10月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">11月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">12月</li></ol></div></div></div><div class="calendar-label"><p>HelloWorld</p><i></i></div></div>
	
		-
		<input type="text" id="end_time" class="js-datetime date" name="end_time" value="" style="width: 120px;" autocomplete="off">
        

		  <div id="end_times" class="calendar calendar-modal calendar-d" style="width: 280px; height: 330px; left: 561.5px; top: 581px; z-index: 999;"><div class="calendar-inner" style="width: 280px;"><div class="calendar-views"><div class="view view-date" style="width: 280px;"><div class="calendar-hd"><a href="javascript:;" data-calendar-display-date="" class="calendar-display">2017/<span class="m">1</span></a><div class="calendar-arrow"><span class="prev" title="上一月" data-calendar-arrow-date="">&lt;</span><span class="next" title="下一月" data-calendar-arrow-date="">&gt;</span></div></div><div class="calendar-ct" style="width: 280px; height: 280px;"><ol class="week"><li style="width:40px;height:40px;line-height:40px">日</li><li style="width:40px;height:40px;line-height:40px">一</li><li style="width:40px;height:40px;line-height:40px">二</li><li style="width:40px;height:40px;line-height:40px">三</li><li style="width:40px;height:40px;line-height:40px">四</li><li style="width:40px;height:40px;line-height:40px">五</li><li style="width:40px;height:40px;line-height:40px">六</li></ol><ul class="date-items"><li style="width: 280px;"><ol class="days"><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">27</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">28</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">29</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">30</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">4</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">5</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">6</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">7</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">8</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">9</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">10</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">11</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">12</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">13</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">14</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">15</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">16</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">17</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">18</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">19</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">20</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">21</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">22</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">23</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">24</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">25</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">26</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">27</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">28</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">29</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">30</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">31</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class="new now" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">4</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">5</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">6</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">7</li></ol></li><li style="width: 280px;"><ol class="days"><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">25</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">26</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">27</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">28</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">29</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">30</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">31</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class=" now" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">4</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">5</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">6</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">7</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">8</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">9</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">10</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">11</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">12</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">13</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">14</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">15</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">16</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">17</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">18</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">19</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">20</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">21</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">22</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">23</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">24</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">25</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">26</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">27</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">28</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">29</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">30</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">31</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">4</li></ol></li><li style="width: 280px;"><ol class="days"><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">29</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">30</li><li style="width:40px;height:40px;line-height:40px" class="old" data-calendar-day="">31</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">4</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">5</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">6</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">7</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">8</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">9</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">10</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">11</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">12</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">13</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">14</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">15</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">16</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">17</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">18</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">19</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">20</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">21</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">22</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">23</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">24</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">25</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">26</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">27</li><li style="width:40px;height:40px;line-height:40px" class="" data-calendar-day="">28</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">1</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">2</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">3</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">4</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">5</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">6</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">7</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">8</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">9</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">10</li><li style="width:40px;height:40px;line-height:40px" class="new" data-calendar-day="">11</li></ol></li></ul></div></div><div class="view view-month" style="width: 280px;"><div class="calendar-hd"><a href="javascript:;" data-calendar-display-month="" class="calendar-display">2017</a><div class="calendar-arrow"><span class="prev" title="上一年" data-calendar-arrow-month="">&lt;</span><span class="next" title="下一年" data-calendar-arrow-month="">&gt;</span></div></div><ol class="calendar-ct month-items" style="width: 280px; height: 280px;"><li style="width:70px;height:70px;line-height:70px" data-calendar-month="" class="now">1月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">2月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">3月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">4月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">5月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">6月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">7月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">8月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">9月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">10月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">11月</li><li style="width:70px;height:70px;line-height:70px" data-calendar-month="">12月</li></ol></div></div></div><div class="calendar-label"><p>HelloWorld</p><i></i></div></div>
	
		 &nbsp; &nbsp;
		关键字： 
		<input type="text" name="title" style="width: 200px;" value="" placeholder="请输入标题...">
		<input type="button" onclick="sel_article_list()" class="btn btn-primary" value="搜索">
		<input type="reset" class="btn btn-danger" value="清空">
	</form>
		
	<form name="article_list" class="js-ajax-form" novalidate="novalidate">
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
					<th>标题</th>
					<th width="50">分类</th>
					<th width="50">作者</th>
					<th width="50">点击量</th>
					<th width="50">评论量</th>
					<th width="160">关键字</th>
					<th width="150">发布时间</th>
					<th width="50">状态</th>
					<th width="70">操作</th>
				</tr>
			</thead>
			<tbody>
			  <?php $__FOR_START_29945__=0;$__FOR_END_29945__=count($article_list);for($i=$__FOR_START_29945__;$i < $__FOR_END_29945__;$i+=1){ ?><tr>
				   <td>
					<input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($article_list[$i]['id']); ?>" title="ID:<?php echo ($article_list[$i]['id']); ?>"></td>
					<td><b><?php echo ($article_list[$i]['id']); ?></b></td>
					<td><?php echo ($article_list[$i]['title']); ?></td>
					<td><?php echo ($article_list[$i]['menu_name']); ?></td>
					<td><?php echo ($article_list[$i]['author']); ?></td>
					<td><?php echo ($article_list[$i]['hits']); ?></td>
					<td><?php echo ($article_list[$i]['hits']); ?></td>
					<td><?php echo ($article_list[$i]['keywords']); ?></td>
					<td><?php echo date('Y-m-d H:i:s',$article_list[$i]['datetime']) ?></td>
                    <td>
                      <?php if($article_list[$i]['status'] == 1): ?><a onclick="update_word_one(<?php echo ($article_list[$i]['id']); ?>,'status',0)" data-toggle="tooltip" title="" data-original-title="已审核"><i class="fa fa-check"></i></a>
                      <?php else: ?>
                        <a onclick="update_word_one(<?php echo ($article_list[$i]['id']); ?>,'status',1)" data-toggle="tooltip" title="" data-original-title="未审核"><i class="fa fa-close"></i></a><?php endif; ?>
                      <?php if($article_list[$i]['istop'] == 1): ?><a onclick="update_word_one(<?php echo ($article_list[$i]['id']); ?>,'istop',0)" data-toggle="tooltip" title="" data-original-title="已置顶"><i class="fa fa-arrow-up"></i></a>
                      <?php else: ?>
                        <a onclick="update_word_one(<?php echo ($article_list[$i]['id']); ?>,'istop',1)" data-toggle="tooltip" title="" data-original-title="未置顶"><i class="fa fa-arrow-down"></i></a><?php endif; ?>

                      <?php if($article_list[$i]['recommended'] == 1): ?><a onclick="update_word_one(<?php echo ($article_list[$i]['id']); ?>,'recommended',0)" data-toggle="tooltip" title="" data-original-title="已推荐"><i class="fa fa-thumbs-up"></i></a>
                      <?php else: ?>
                        <a onclick="update_word_one(<?php echo ($article_list[$i]['id']); ?>,'recommended',1)" data-toggle="tooltip" title="" data-original-title="未推荐"><i class="fa fa-thumbs-down"></i></a><?php endif; ?>						
					</td>
					<td>
					<a href="<?php echo U('/Admin/index/editArticle',array('id'=>$article_list[$i]['id']));?>">编辑</a> | 
					<a href="javascript:;" onclick='del_article(<?php echo ($article_list[$i]["id"]); ?>,$(this))' class="js-ajax-delete">删除</a>
					
					</td>

				 </tr><?php } ?>
				

			</tbody>
            
			
			
		</table>
			<div id="page" class="wp-paginate">
             	<?php echo ($page); ?>
            </div>

            
            
	</form>
</div>


<script type="text/javascript" src="/Public/admin/js/ajaxpost_article.js"></script>
<!-- 时间控件 -->
<script src="/Public/common/js/calendar.js"></script>
		<script>
		    $('#ca').calendar({
		        width: 320,
		        height: 320,
		        data: [
					{
					  date: '2015/12/24',
					  value: 'Christmas Eve'
					},
					{
					  date: '2015/12/25',
					  value: 'Merry Christmas'
					},
					{
					  date: '2016/01/01',
					  value: 'Happy New Year'
					}
				],
		    });
            $('#start_times').calendar({
		        trigger: '#start_time',
		        zIndex: 999,
				format: 'yyyy-mm-dd',
		    });
		    $('#end_times').calendar({
		        trigger: '#end_time',
		        zIndex: 999,
				format: 'yyyy-mm-dd',
		    });
         
		    
		</script>
<!-- 时间控件 -->
   <script>
   
    	$(function(){
    		data_toggle_tooltip();
    	});
    </script>

</body>
</html>