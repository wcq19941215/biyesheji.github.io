// 点击列表的页数按钮   进行ajax的请求替换模版
$(".js-ajax-form").on("click","#page a",function(e) {
	e.preventDefault();
	var data=new FormData(document.sel_admin_user);
	$.ajax({
		url : this.href,
		type : 'post',
		data : data,
		dataType : 'json',
		processData : false,
		contentType : false,
		success : function(msg) {
			document.admin_user_list.innerHTML=msg;	

		},

	});
});
			
//通过调用此函数进行查询文章
function sel_admin_user_list() {
	var data=new FormData(document.sel_admin_user);
	var url=document.sel_admin_user.action;
	$.ajax({
		url : url,
		type : 'post',
		data : data,
		dataType : 'json',
		processData : false,
		contentType : false,
		success : function(msg) {
			document.admin_user_list.innerHTML=msg;
			alert(msg);
		}
	});
}
//添加管理员用户方法
function addAdminUser() {
	var data=new FormData(document.add_admin_user);
	var url=document.add_admin_user.action;
	$.ajax({
		type : 'post',
		url : url,
		data : data,
		dataType : 'json',
		processData : false,
		contentType : false,
		success : function(msg) {
			alert(document.add_admin_user.user.value+'用户添加成功，初始密码为000000');
		}

	});
}