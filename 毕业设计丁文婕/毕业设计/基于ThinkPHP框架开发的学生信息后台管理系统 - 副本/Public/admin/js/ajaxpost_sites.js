function ajax_post_sites_up() {
	// body...
	var data=new FormData(document.getElementById('post_sites'));
	$.ajax({
		url : document.getElementById('post_sites').action,
		type : 'post',
		data : data,
		dataType : 'json',
		processData : false,
		contentType : false,
		success : function(msg) {
			// body...
			if (msg.status==1) {
				alert("修改成功");
			}else{
				alert("未修改");
			}
			
		}
	});
	// alert(document.getElementById('post_sites').action);
}