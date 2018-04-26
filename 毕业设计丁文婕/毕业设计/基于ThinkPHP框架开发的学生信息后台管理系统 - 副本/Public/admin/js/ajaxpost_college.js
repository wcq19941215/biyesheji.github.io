//通过地区id获取学校信息
function getSchool(aid) {
	
	$.ajax({
		type : 'post',
		url : '/Admin/College/ajaxGetSchool',
		data : {'aid':aid},
		dataType : 'json',
		success : function(msg) {
			if (msg.status!=0) {
				console.log(msg);
				var html="";
				for (var i = 0; i < msg.data.length; i++) {
					html+="<option value='"+msg.data[i].id+"'>"+msg.data[i].name+"</option>";
					
				}
				document.getElementById('school').innerHTML=html;
				var major_html="<option value='0' selected=''>请选择专业</option>";
	            document.getElementById('major').innerHTML=major_html;
			}
			
		}
	});
}
//通过学校id获取专业信息
function getMajor(sid,lid) {
	console.log(sid);
	console.log(lid);
	$.ajax({
		type : 'post',
		url : '/Admin/College/ajaxGetMajor',
		data : {'sid':sid,'lid':lid},
		dataType : 'json',
		success : function(msg) {
			if (msg.status!=0) {
				console.log(msg);
				var html="";
				for (var i = 0; i < msg.data.length; i++) {
					html+="<option value='"+msg.data[i].id+"'>"+msg.data[i].name+"</option>";
					
				}
				document.getElementById('major').innerHTML=html;
				console.log(msg);
			}
			
		}
	});
}
//添加层次
function editCollege() {
	var url=document.edit_college.action;
	var data=new FormData(document.edit_college);
	$.ajax({
		type : 'post',
		url : url,
		data : data,
		dataType : 'json',
		processData : false,
		contentType : false,
		success : function(msg) {
			if (msg.status==1) {
				alert('操作成功');
			}else{
				alert('操作失败');
			}
			console.log(msg);
		}
	});
}
//通过调用此函数进行查询学校,专业，分数
function sel_college_list() {
	var data=new FormData(document.sel_college);
	var url=document.sel_college.action;
	$.ajax({
		url : url,
		type : 'post',
		data : data,
		dataType : 'json',
		processData : false,
		contentType : false,
		success : function(msg) {
			document.college_list.innerHTML=msg;
		}
	});
}
// 点击列表的页数按钮   进行ajax的请求替换模版
$(".js-ajax-form").on("click","#page a",function(e) {
	e.preventDefault();
	var data=new FormData(document.sel_college);
	$.ajax({
		url : this.href,
		type : 'post',
		data : data,
		dataType : 'json',
		processData : false,
		contentType : false,
		success : function(msg) {
			document.college_list.innerHTML=msg;

		},

	});
});
//删除数据
function del_college(id,self,url) {
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