//ajax提交表单数据方法
function submit_ajax_form() {
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
				alert('添加成功');
			}else{
				alert('添加失败');
			}
		}

	});
}
// 点击列表的页数按钮   进行ajax的请求替换模版
$(".js-ajax-form").on("click","#page a",function(e) {
	e.preventDefault();
	var data=new FormData(document.form_data);
	$.ajax({
		url : this.href,
		type : 'post',
		data : data,
		dataType : 'json',
		processData : false,
		contentType : false,
		success : function(msg) {
			document.data_list.innerHTML=msg;	

		},

	});
});
//已post ajax方式提交缩略图
function ajax_post_img() {
	var data=new FormData(document.getElementById('form_img'));
	$.ajax({
		type : 'POST',
		url : '/Admin/Article/uploadImg',
		data : data,
		processData : false,
		contentType : false,
		success : function(msg) {
			// body...
			// alert(msg.destination);
            var return_data=JSON.parse(msg);
			console.log(return_data);
			$("#thumb img").attr('src','/Public/common/update_img/'+return_data.uniname).css('display','block');
            
		}
	});
}
//打开上传文件的窗口
function upload_open(class_name) {
		$(class_name).css('display','block');
}
//打开图片放大的窗口
function upload_img_open(class_name,src) {
		$(class_name).css('display','block');
		$('.img_attr img').attr('src',src);
}
//关闭上传文件的窗口				
function upload_close(class_name) {
	// body...
	$(class_name).css('display','none');
}
//图片上传
function img_submit() {
	// body..
	var thumb_img=$(document.getElementById('plupload').contentWindow.document.getElementById('thumb_img')).attr("src");
	$("#thumb-preview").attr("src",thumb_img);
	$("#thumb").attr("value",thumb_img);
	$(".aui_state_lock").css("display","none");
	
}
//取消图片
function call_img(self) {
	// body...
	self.siblings('img').attr('src','/Public/common/default_img/default-thumbnail.png');
}