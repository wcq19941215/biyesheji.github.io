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
		data : {'nav_id':document.sel_quest.term.value},

		success : function(msg) {
			document.quest_list.innerHTML=msg;
			data_toggle_tooltip();

		},

	});
});
			
//通过调用此函数进行查询文章
function sel_quest_list() {
	var nav_id=document.sel_quest.term.value;
	/*var title=document.sel_article.title.value;
	var start_time=document.sel_article.start_time.value;
	var end_time=document.sel_article.end_time.value;*/
	var url=document.sel_quest.action;
	// alert(url);
	$.ajax({
		url : url,
		type : 'post',
		data : {'nav_id':nav_id},
		success : function(msg) {
			document.quest_list.innerHTML=msg;
			data_toggle_tooltip();
		}
	});
}
//删除文章
function del_quest(id,self) {
	// body...
	$.ajax({
		type : 'post',
		url : '/Admin/Quest/ajaxDelQuest',
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
//刷新列表
function ref_quest_list() {
	// body...
	var url=document.getElementById('current_url').value;
	$.ajax({
		url : url,
		type : 'post',
		// data : {'title':document.sel_article.title.value,'menu_id':document.sel_article.term.value,'start_time':document.sel_article.start_time.value,'end_time':document.sel_article.end_time.value},
		data : {'nav_id':document.sel_quest.term.value},
		success : function(msg) {
			document.quest_list.innerHTML=msg;
			data_toggle_tooltip();

		},

	});
}
//修改文章状态值
function update_word_one(id,key,val) {
	
	$.ajax({
		type : 'post',
		url : '/Admin/Quest/ajaxUpdateQuestOne',
		data : {'id':id,'key':key,'val':val},
		dataType : 'json',
		success : function(msg) {
			if (msg.status==1) {
                ref_quest_list();
			}else{
				return false;
			}
		}

	});
}

//打开聊天窗口
function chat_ball_open(id) {
	$.ajax({
		type : 'post',
		url : '/Admin/Quest/ajaxGetQuestPart',
		data : {'id':id},
		success : function(msg) {
			document.getElementById('chat_ball').innerHTML=msg;
			$('#chat_ball').css('display','block');
			$('#chatPanel').scrollTop($('#chatPanelList').height());
		}
	});
	
}
//关闭聊天窗口
function chat_ball_close() {
	ref_quest_list();
	$('#chat_ball').css('display','none');
}
//发送消息
function put_word(id,val) {
	$.ajax({
		type : 'post',
		url : '/Admin/Quest/ajaxUpdateQuestOne',
		data : {'id':id,'key':'put_content','val':val},
		dataType : 'json',
		success : function(msg) {
			if (msg.status==1) {
				chat_ball_open(id);
			}else{
				return false;
			}
		}

	});
}