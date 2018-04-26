<?php
namespace Admin\Controller;
use Think\Controller;
class QuestController extends Controller {
    public function _initialize()
    {
        A("AdminUser")->checkLogin();
    }

    public function getQuestList($page_up,$page_num,$nav_id='',$name='',$start_time='',$end_time='')
    {
        //获取文章列表  通过分页和页数来进行控制
        $nav_id && $data["n_id"]=$nav_id;
        $name && $data["send_name"]=array('like',"%$name%");
        $start_time && $end_time && $data["send_datetime"]=array('between',array($start_time,$end_time));
        !isset($data["send_datetime"]) && $start_time && $data["send_datetime"]=array('EGT',$start_time);
        !isset($data["send_datetime"]) && $end_time && $data["send_datetime"]=array('ELT',$end_time);
        $return_questList=M("quest")->where($data)->order("send_datetime DESC")->page($page_up,$page_num)->field("id,send_name,send_content,send_datetime,put_content,status,n_id")->select();
        return $return_questList;
    }
    
    public function delQuest($id)
    {
        if (empty($id)) {
            return false;
        }
        return M('quest')->where("id = $id")->delete();
    }
    //获取到一条问答的详情
    public function getQuestPart($quest_id)
    {
        $data=array();
        if (empty($quest_id)) {
           return false;
        }

        $return_data=M('quest')->where("id = $quest_id")->field('id,send_name,send_content,send_datetime,put_name,put_content')->find();
        return $return_data;
    }
    //修改文章的单个值
    public function updateQuestOne($key,$val,$id)
    {
       return M('quest')->where("id = $id")->save(array($key=>$val));

    }


    //ajax  操作
    public function ajaxDelQuest()
    {
        $id=trim(I('post.id'));
        if (empty($id)) {
            die;
        }
        if ($this->delQuest($id)>0) {
            # code...
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    //*ajax修改文章单个值*/
    public function ajaxUpdateQuestOne()
    {
        
        $key=trim(I('post.key'));
        $id=trim(I('post.id'));
        $val=trim(I('post.val'));
        $update_quest_one=$this->updateQuestOne($key,$val,$id);
        if ($update_quest_one) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    /*ajax请求渲染聊天窗模版返回*/
    public function ajaxGetQuestPart()
    {
        
        $quest_id=trim(I('post.id'));
        if (empty($quest_id)) {
            die;
        }
        $quest_part=$this->getQuestPart($quest_id);
        $this->assign('quest_part',$quest_part);
        $shtml=$this->fetch('Assis/chat_ball');
        $this->ajaxReturn($shtml);
    }
    public function cs()
    {
       
    }
    
    


    
}