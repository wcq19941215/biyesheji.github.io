function data_toggle_tooltip() {
   	  $("[data-toggle='tooltip']").tooltip();	
}
// 点击列表的页数按钮   进行ajax的请求替换模版
$(".js-ajax-form").on("click","#page a",function(e) {
	e.preventDefault();
	$.ajax({
		url : this.href,
		type : 'post',
		// data : {'title':document.sel_article.title.value,'menu_id':document.sel_article.term.value,'start_time':document.sel_article.start_time.value,'end_time':document.sel_article.end_time.value},
		success : function(msg) {
			document.leave_word_list.innerHTML=msg;	
			data_toggle_tooltip();
		},

	});
});
			
//删除留言
function del_leave_word(id,self,url) {
	// body...
	$.ajax({
		type : 'post',
		url : url,
		data : {'id' : id},
		dataType : 'json',
		success : function(msg) {
			// body...
			if (msg.status==1) {
                self.parent().parent().remove();
			}else{
				return false;
			}
			
		}
	});
}

//修改留言状态值
function update_word_one(id,key,val) {
	var url=document.getElementById('current_url').value;
	$.ajax({
		type : 'post',
		url : '/Admin/LeaveWord/ajaxUpdateLeaveWordOne',
		data : {'id':id,'key':key,'val':val},
		dataType : 'json',
		success : function(msg) {
			if (msg.status==1) {
                $.ajax({
					url : url,
					type : 'post',
					success : function(msg) {
						document.leave_word_list.innerHTML=msg;	
						data_toggle_tooltip();
					},

				});
			}else{
				return false;
			}
		}

	});
}