<?php
namespace Admin\Controller;
use Think\Controller;
class IndexUserController extends Controller {
	public function _initialize()
    {
        A("AdminUser")->checkLogin();
    }
    public function getIndexUserList($page_up,$page_num,$user_id='',$user='')
    {
        //获取首页本地用户列表  通过分页和页数来进行控制
        $user_id && $data["id"]=$user_id;
        $user && $data["user"]=array('like',"%$user%");
        $return_indexUserList=M("index_user")->where($data)->order("regi_time DESC")->page($page_up,$page_num)->field("id,user,pet_name,portrait,email,regi_time,login_time,login_ip,status")->select();
        return $return_indexUserList;
    }

    
}