<?php
namespace Admin\Controller;
use Think\Controller;
class LeaveWordController extends Controller {
    public function _initialize()
    {
        A("AdminUser")->checkLogin();
    }
    public function getLeaveWordList($page_up,$page_num,$user_id='',$title='',$start_time='',$end_time='')
    {
        //获取留言列表  通过分页和页数来进行控制
        $user_id && $data["l.m_id"]=$user_id;
        $title && $data["l.title"]=array('like',"%$title%");
        $start_time && $end_time && $data["l.datetime"]=array('between',array($start_time,$end_time));
        !isset($data["l.datetime"]) && $start_time && $data["l.datetime"]=array('EGT',$start_time);
        !isset($data["l.datetime"]) && $end_time && $data["l.datetime"]=array('ELT',$end_time);
        $return_articleList=M("leave_word as l")->join(C('DB_PREFIX')."index_user as iu on iu.id=l.u_id")->where($data)->order("datetime DESC")->page($page_up,$page_num)->field("l.id,title,content,datetime,l.status")->select();
        return $return_articleList;
    }
    
    public function delLeaveWord($id)
    {
        if (empty($id)) {
            return false;
        }
        return M('leave_word')->where("id = $id")->delete();
    }
    //修改留言的单个值
    public function updateLeaveWordOne($key,$val,$id)
    {
       return M('leave_word')->where("id = $id")->save(array($key=>$val));

    }


    /*AJAX*/
    public function ajaxDelLeaveWord()
    {
        $id=trim(I('post.id'));
        if (empty($id)) {
            die;
        }
        if ($this->delLeaveWord($id)>0) {
            # code...
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxUpdateLeaveWordOne()
    {
        
        $key=trim(I('post.key'));
        $id=trim(I('post.id'));
        $val=trim(I('post.val'));
        $update_leave_word_one=$this->updateLeaveWordOne($key,$val,$id);
        if ($update_leave_word_one) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function cs()
    {
       $data['status']=1;

       print_r(M('leave_word')->where("id=1")->save($data));
    }


    
}