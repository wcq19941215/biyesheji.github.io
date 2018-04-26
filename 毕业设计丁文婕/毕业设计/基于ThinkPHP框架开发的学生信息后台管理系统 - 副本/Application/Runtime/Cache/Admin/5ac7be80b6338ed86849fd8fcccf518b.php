<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>404</title>
</head>
<body>

</body>
<script type="text/javascript">
	alert("身份信息已过期,请重新登录!");
	window.location.href="<?php echo U('Admin/index/login');?>";
</script>
</html>