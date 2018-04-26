<?php
namespace Admin\Controller;
use Think\Controller;
class AdminUserController extends Controller {
    //通过传递过来的用户名和密码进行验证
    public function loginRealize($user,$pwd)
    {
        if (empty($user) || empty($pwd)) {
            return false;
        }

        $data=array("user"=>$user,"pwd"=>$pwd);
        $userInfo=M("admin_user")->where($data)->field('id,user,pwd,user_name,exa_juris')->find();
        M('admin_user_record')->where(array('uid'=>$userInfo['id']))->save(array('session'=>session_id()));
        return empty($userInfo["id"]) ? false : $this->sessionAdminUserInfo($userInfo);
    }
    //验证session
    public function checkSession($user_id,$session_id)
    {
        if (empty($session_id)) {
            return false;
        }
        $admin_user_record=M('admin_user_record')->where(array('uid'=>$user_id))->field('session')->find();
        if ($session_id!=$admin_user_record['session']) {

            return false;
        }
        return true;
        
       
    }
    //实现验证管理员登录
    public function checkLoginRealize()
    {
        $AdminUserInfo=$_SESSION['AdminUserInfo'];

        if (empty($AdminUserInfo["id"])) {
            # code...
            return false;
        }else{

            return $this->checkSession($AdminUserInfo['id'],session_id());
        }
    }
    //传入数据进行存入session
    public function sessionAdminUserInfo($data)
    {
        $_SESSION["AdminUserInfo"]=$data;
        return $_SESSION["AdminUserInfo"];
    }
    //数据进行加密
    public function encrypt($data)
    {
        $mix="YXPHP";
        return md5(sha1($data.$mix));
    }


    public function checkLogin()
    {
        //验证管理员是否登录
        $login_code=$this->checkLoginRealize();

        if ($login_code==false) {
            $shtml=$this->fetch("Error/check_login");
            echo $shtml;
            die();
        }else{
            return true;
        }
    }
    ///实现修改管理员密码的功能
    public function modiAdminPassRealize($user,$old_password,$password,$repassword)
    {
        if (empty($user)) {
            return false;
        }
        if (empty($old_password)) {
            return false;
        }
        if (empty($password) || $password != $repassword) {
            return false;
        }
        $admin_user_id=M("admin_user")->where("`user`='$user' and `pwd`='$old_password'")->field("id")->find()["id"];
        if (empty($admin_user_id)) {
            return false;
        }
        $password_data["pwd"]=$password;
        $return_modi_admin=M("admin_user")->where("`user`='$user' and `pwd`='$old_password'")->save($password_data);
        return $return_modi_admin;

    }
    //验证码验证
    public function checkVerify($code,$id='')
    {
       $Verify=new \Think\Verify();
       return $Verify->check($code,$id);
    }
    //获取管理员用户列表
    public function getAdminUserList($page_up,$page_num,$user_id="",$user="")
    {
        //获取管理员用户列表  通过分页和页数来进行控制
        $user_id && $data["id"]=$user_id;
        $user && $data["user"]=array('like',"%$user%");
        $return_adminUserList=M("admin_user")->where($data)->order("id DESC")->page($page_up,$page_num)->field("id,user,user_name")->select();
        return $return_adminUserList;
    }
    public function addAdminUserRealize($user,$pwd)
    {
        //添加管理员用户实现方法
        if (empty($user) || empty($pwd)) {
            return false;
        }
        $admin_user_id=M('admin_user')->add(array('user'=>$user,'pwd'=>$pwd));
        if ($admin_user_id>0) {
            M('admin_user_info')->add(array('uid'=>$admin_user_id));
            M('admin_user_record')->add(array('uid'=>$admin_user_id));
        }
        return $admin_user_id;

    }
    public function getAdminUserExaJuris($admin_user_id)
    {
        //获取到管理员用户的权限和他的信息
        if (empty($admin_user_id)) {
            return false;
        }
        $admin_userInfo=M('admin_user')->where(array('id'=>$admin_user_id))->field('id,user,user_name,exa_juris')->find();
        $admin_userInfo['exa_juris']=explode(',',$admin_userInfo['exa_juris']);
        return $admin_userInfo;
    }
    public function getAdminUserInfo($user_id)
    {
        //获取管理员用户的详细信息
        if (empty($user_id)) {
            return false;
        }
        return M('admin_user_info')->where(array('uid'=>$user_id))->field('email,phone,birth')->find();
    }
    public function setAdminUserInfo($data)
    {
        //设置管理员用户的详细信息
        if (empty($data['uid'])) {
            return false;
        }
        $uid=$data['uid'];
        unset($data['uid']);
        return M('admin_user_info')->where(array('uid'=>$uid))->save($data);
    }
    public function setAdminUserName($user_id,$user_name)
    {
        //设置管理员的昵称
        if (empty($user_id)) {
            return false;
        }
        return M('admin_user')->where(array('id'=>$user_id))->save(array('user_name'=>$user_name));

    }
    public function adminUserExaJuris($id,$exa_juris)
    {
        //设置管理员的权限
        if (empty($id)) {
            return false;
        }
        return M('admin_user')->where(array('id'=>$id))->save(array('exa_juris'=>$exa_juris));
    }








    ///下面实现ajax请求
    //登录
    public function login()
    {
        $user=trim(I("post.username"));
        $pwd=trim(I("post.password"));
        $token=trim(I("post.token"));
        $verify_code=trim(I('post.verify'));
        if ($this->checkVerify($verify_code,'')) {
            if (!empty($token)) {
            # code...
                $config=array('DB_PREFIX'=>$token);
                C($config);
            }
            $admin_userInfo=$this->loginRealize($user,$this->encrypt($pwd));
            $return_data=array();
            $return_data["data"]=$admin_userInfo;
            if ($admin_userInfo==false) {
                $return_data["status"]=0;
            }else{
                $return_data["status"]=1;
            }
        }else{
            $return_data["status"]=2;
        }
        
        echo json_encode($return_data);

    }
    //退出登录
    public function outLogin()
    {
        unset($_SESSION["AdminUserInfo"]);
        echo "1";
    }

    //修改管理员密码
    public function modiAdminPass()
    {
        # code...
        $old_password=trim(I("post.old_password"));
        $password=trim(I("post.password"));
        $repassword=trim(I("post.repassword"));
        $return_modi_admin=$this->modiAdminPassRealize($_SESSION["AdminUserInfo"]["user"],$this->encrypt($old_password),$this->encrypt($password),$this->encrypt($repassword));
        $return_data=array();
        if (empty($return_modi_admin)) {
            $return_data["status"]=0;
        }else{
            $return_data["status"]=1;
        }
        $return_data["data"]=$return_modi_admin;
        echo json_encode($return_data);

    }
    //添加管理员用户
    public function addAdminUser()
    {
        $user=trim(I('post.user'));
        $pwd='000000';
        if ($this->addAdminUserRealize($user,$this->encrypt($pwd))>0) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);

    }
    //管理员修改信息
    public function AdminUserInfo()
    {
        $admin_user_info_data=I('post.');
        if ($admin_user_info_data['user_name']!=$_SESSION['AdminUserInfo']['user_name']) {
            if ($this->setAdminUserName($admin_user_info_data['uid'],$admin_user_info_data['user_name'])) {
                $_SESSION['AdminUserInfo']['user_name']=$admin_user_info_data['user_name'];
            }
        }
        unset($admin_user_info_data['user_name']);
        $admin_user_info_data['birth']=strtotime($admin_user_info_data['birth']);
        $return_data['status']=$this->setAdminUserInfo($admin_user_info_data);
        echo json_encode($return_data);

    }
    //修改管理员的权限信息
    public function ajaxAdminUserExaJuris()
    {
        $id=trim(I('post.uid'));
        $menuid_array=I('post.menuid');
        $exa_juris=implode(',', $menuid_array);
        $return_data['status']=$this->adminUserExaJuris($id,$exa_juris);
        echo json_encode($return_data);
    }


    
}