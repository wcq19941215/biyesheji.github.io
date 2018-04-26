function delete_menu_list(id,self) {
	//删除菜单列表
	$.ajax({
	    type : "post",
	    url : '/Admin/Menu/deleteIndexMenuList',
	    data : {'id':id},
	    success : function(msg) {
	    	// body...
	    	var return_data=JSON.parse(msg);
	    	if (return_data.status > 0) {
	    		self.parent().parent().remove();
	    	}else{
	    		alert(return_data.status);
	    	}

	    	
	    }

		});
	    	
}
function add_menu_list() {
	//增加菜单列表
	var data=new FormData(document.getElementById('add_index_menu'));
	//alert(JSON.parse(data));
	$.ajax({
		type : 'post',
		url : '/Admin/Menu/addIndexMenuList',
		data : data,
		dataType : 'json',
		processData : false,
		contentType : false,
		success : function(msg) {
			// body...
			if (msg.status > 0) {
				alert("添加成功");
				window.location.href="/Admin/index/indexMenuManage";
			}else{
				alert("请重试");
			}
		}
	});

}
function edit_menu_list() {
	//修改菜单列表
	 var data=new FormData(document.getElementById('edit_index_menu'));
	//alert(JSON.parse(data));
	 var url = document.edit_index_menu.action;
	$.ajax({
		type : 'post',
		url : url,
		data : data,
		dataType : 'json',
		processData : false,
		contentType : false,
		success : function(msg) {
			// body...
			console.log(msg);
			if (msg.status > 0) {
				alert("修改成功");
				window.location.href="/Admin/index/indexMenuManage";
			}else{
				alert("未修改");
			}
		}
	});

}