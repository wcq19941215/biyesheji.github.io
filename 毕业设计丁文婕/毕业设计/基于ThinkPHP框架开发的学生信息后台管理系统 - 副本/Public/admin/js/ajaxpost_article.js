function data_toggle_tooltip() {
   	  $("[data-toggle='tooltip']").tooltip();	
}
/*add_news        start*/
//在新增文章类里的上传文章
function ajax_post_article() {
	var data=new FormData(document.getElementById('upload_article'));
	$.ajax({
		type : 'POST',
		url : '/Admin/Article/uploadArticle',
		data : data,
		dataType : 'json',
        processData : false,
        contentType : false,
		success : function(msg){
          //console.log(msg);
          if (msg.status==1) {
          	alert("添加成功");
          	window.location.href="/Admin/index/articleManage";

          }else{
          	alert("添加失败,请重试!");
          }
		}
	});
}

//在编辑文章类里的上传文章
function ajax_post_article_edit() {
	var data=new FormData(document.getElementById('upload_article'));
	$.ajax({
		type : 'POST',
		url : '/Admin/Article/uploadEditArticle',
		data : data,
		dataType : 'json',
        processData : false,
        contentType : false,
		success : function(msg){
          console.log(msg);
          if (msg.status==1) {
          	alert("添加成功");
          	window.location.href="/Admin/index/articleManage";

          }else{
          	alert("添加失败,请重试!");
          }
		}
	});
}

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
	// body...
	var thumb_img=$(document.getElementById('plupload').contentWindow.document.getElementById('thumb_img')).attr("src");
	$("#thumb-preview").attr("src",thumb_img);
	$("#thumb").attr("value",thumb_img);
	$(".aui_state_lock").css("display","none");
	
}
//相册图集多图上传
function img_submit_photos() {
	// body...
	var thumb_img=$(document.getElementById('plupload_photos').contentWindow.document.getElementById('thumb_img')).attr("src");
	alert(thumb_img);
    var rand=generateMixed(10);
    alert(rand);
	var photos_img_li='<li id="'+rand+'" style="margin-bottom: 5px;">';
	photos_img_li+='<input id="photo-'+rand+'" type=hidden name=photos_url[] value="'+thumb_img+'">';
	photos_img_li+='<input id="photo-'+rand+'-name" type=text name=photos_alt[] value="" style="width: 160px;" title=图片名称>';
	photos_img_li+='<img id="photo-'+rand+'-preview" src="'+thumb_img+'" style="height:36px;width: 36px;margin-left:5px;" onclick=upload_img_open(".aui_dialog",$(this).attr("src"));>';
	photos_img_li+='<a href=javascript:upload_one_image("图片上传","#photo-'+rand+'"); style="margin-left:5px;">替换</a>';
	photos_img_li+='<a href=javascript:$("#'+rand+'").remove(); style="margin-left:5px;">移除</a>';
	photos_img_li+='</li>';
	$("#photos").append(photos_img_li);
	$(".aui_state_lock_photos").css("display","none");
	
	
}
//获取随机数
function generateMixed(n) {
		var chars = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	     var res = "";
	     for(var i = 0; i < n ; i ++) {
	         var id = Math.ceil(Math.random()*35);
	         res += chars[id];
	     }
	     return res;
}

// 点击列表的页数按钮   进行ajax的请求替换模版
$(".js-ajax-form").on("click","#page a",function(e) {
	e.preventDefault();
	$.ajax({
		url : this.href,
		type : 'post',
		data : {'title':document.sel_article.title.value,'menu_id':document.sel_article.term.value,'start_time':document.sel_article.start_time.value,'end_time':document.sel_article.end_time.value},
		success : function(msg) {
			document.article_list.innerHTML=msg;
			data_toggle_tooltip();

		},

	});
});
			
//通过调用此函数进行查询文章
function sel_article_list() {
	var menu_id=document.sel_article.term.value;
	var title=document.sel_article.title.value;
	var start_time=document.sel_article.start_time.value;
	var end_time=document.sel_article.end_time.value;
	var url=document.sel_article.action;
	// alert(url);
	$.ajax({
		url : url,
		type : 'post',
		data : {'menu_id':menu_id,'title':title,'start_time':start_time,'end_time':end_time},
		success : function(msg) {
			document.article_list.innerHTML=msg;
			data_toggle_tooltip();
		}
	});
}
//删除文章
function del_article(id,self) {
	// body...
	$.ajax({
		type : 'post',
		url : '/Admin/Article/ajaxDelArticle',
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
//取消图片
function call_img(self) {
	// body...
	self.siblings('img').attr('src','/Public/common/default_img/default-thumbnail.png');
}
//修改文章状态值
function update_word_one(id,key,val) {
	var url=document.getElementById('current_url').value;
	$.ajax({
		type : 'post',
		url : '/Admin/Article/ajaxUpdateArticleOne',
		data : {'id':id,'key':key,'val':val},
		dataType : 'json',
		success : function(msg) {
			if (msg.status==1) {
                $.ajax({
					url : url,
					type : 'post',
					data : {'title':document.sel_article.title.value,'menu_id':document.sel_article.term.value,'start_time':document.sel_article.start_time.value,'end_time':document.sel_article.end_time.value},
					success : function(msg) {
						document.article_list.innerHTML=msg;
						data_toggle_tooltip();

					},

				});
			}else{
				return false;
			}
		}

	});
}