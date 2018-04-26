function getVerify(self) {
	self.src='/Admin/index/getVerify/'+Math.random();
}
function logins() {
	// 管理员进行登录
	var login_data=new FormData(document.getElementById('login'));
	$.ajax({
		type : 'post',
		url : '/Admin/AdminUser/login',
		data : login_data,
		processData : false,
		contentType : false,
		success : function(msg) {
			// body...
			var return_data=JSON.parse(msg);
			if (return_data.status==1) {
				window.location.href="/Admin/index/index";
			}else if(return_data.status==2){
				alert("验证码错误,请重新输入!");
				getVerify(document.getElementById('verify_img'));

			}else{
				alert("用户名或密码错误,请重新输入!");
				getVerify(document.getElementById('verify_img'));
			}
		}
	});
   
}
function outLogin() {
	// 退出登录
	$.ajax({
		type : 'post',
		url : '/Admin/AdminUser/outLogin',
		success : function(msg) {
			// body...
			window.location.href='/Admin/index/login';
		}
	});
}
function modiAdminPass(argument) {
	//修改管理员密码
	 var pass_data=new FormData(document.getElementById('modi_admin_pass'));
	 $.ajax({
	 	type : 'post',
	 	url : '/Admin/AdminUser/modiAdminPass',
	 	data : pass_data,
	 	processData : false,
	 	contentType : false,
	 	success : function(msg) {
	 		// body...
	 		var return_data=JSON.parse(msg);
	 		// alert(return_data.status);
	 		if (return_data.status==1) {
	 			alert("修改成功,请重新登录!");
	 			parent.window.location.href="/Admin/index/login";
	 		}else{
	 			alert("修改失败,请重试!");
	 		}
	 	}

	 });
}
function adminUserInfo() {
//修改管理员用户信息
	var data=new FormData(document.form_data);
	var url=document.form_data.action;
	$.ajax({
		type : 'post',
		url : url,
		data : data,
		dataType : 'json',
		processData : false,
		contentType : false,
		success : function(msg) {
			if (msg.status==1) {
				alert('修改成功');
			}else{
				alert('修改成功');
			}
		}
	});
}