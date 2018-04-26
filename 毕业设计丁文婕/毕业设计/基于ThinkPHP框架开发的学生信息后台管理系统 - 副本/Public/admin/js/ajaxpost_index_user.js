// 点击列表的页数按钮   进行ajax的请求替换模版
$(".js-ajax-form").on("click","#page a",function(e) {
	e.preventDefault();
	$.ajax({
		url : this.href,
		type : 'post',
		data : {'user_id':document.sel_index_user.uid.value,'user':document.sel_index_user.keyword.value},
		success : function(msg) {
			document.index_user_list.innerHTML=msg;	

		},

	});
});
			
//通过调用此函数进行查询文章
function sel_index_user_list() {
	var user_id=document.sel_index_user.uid.value;
	var user=document.sel_index_user.keyword.value;
	var url=document.sel_index_user.action;
	$.ajax({
		url : url,
		type : 'post',
		data : {'user_id':user_id,'user':user},
		success : function(msg) {
			document.index_user_list.innerHTML=msg;
		}
	});
}