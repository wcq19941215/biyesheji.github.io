<?php
namespace Admin\Controller;
use Think\Controller;
class TrainController extends Controller {
    public function _initialize()
    {
        A("AdminUser")->checkLogin();
    }
    public function addRoom($data)
    {
        //添加教室
        if (empty($data['name'])) {
            return false;
        }
        return M('train_room')->add($data);
    }
    public function getRoomList($page_up,$page_num)
    {
        //获取教室信息列表
        $return_data_list=M("train_room")->order("id DESC")->page($page_up,$page_num)->field("id,name,ramark")->select();
        return $return_data_list;
    }
    public function getRoomData()
    {
       //获取教室信息全部
        $return_data_list=M("train_room")->field("id,name")->select();
        return $return_data_list;
    }
    public function getTeaList($page_up,$page_num)
    {
        //获取老师信息列表
        $return_data_list=M("train_tea")->order("id DESC")->page($page_up,$page_num)->field("id,name,sex,phone,wechat,rank")->select();
        return $return_data_list;
    }
    public function getTeaData()
    {
        //获取老师信息全部
        $return_data_list=M("train_tea")->field("id,name")->select();
        return $return_data_list;
    }
    public function addTea($data)
    {
        //添加老师
        if (empty($data['name'])) {
            return false;
        }
        return M('train_tea')->add($data);
    }
    public function getCourseList($page_up,$page_num)
    {
        //获取课程信息列表
        $return_data_list=M("train_course")->order("id DESC")->page($page_up,$page_num)->field("id,name,ramark")->select();
        return $return_data_list;
    }
    public function getCourseData()
    {
        //获取课程信息全部
        $return_data_list=M("train_course")->field("id,name")->select();
        return $return_data_list;
    }
    public function addCourse($data)
    {
        //添加课程
        if (empty($data['name'])) {
            return false;
        }
        return M('train_course')->add($data);
    }
    public function getBeginsList($page_up,$page_num)
    {
         //获取上课信息列表
        $return_data_list=M("train_begins as b")->join(C('DB_PREFIX').'train_course as c on c.id=b.c_id')->join(C('DB_PREFIX').'train_tea as t on t.id=b.t_id')->join(C('DB_PREFIX').'train_room as r on r.id=b.r_id')->order("b.id DESC")->page($page_up,$page_num)->field("b.id,b.start_time,b.name,b.ramark,c.name as course,t.name as tea,r.name as room")->select();
        return $return_data_list;
    }
    public function getBeginsData()
    {
         //获取上课信息列表
        $return_data_list=M("train_begins")->field("id,name")->select();
        return $return_data_list;
    }
    public function addBegins($data)
    {
       //添加上课信息
        if (empty($data['name'])) {
            return false;
        }
        return M('train_begins')->add($data);
    }
    public function getStudentList($page_up,$page_num)
    {
        //获取上课信息列表
        $return_data_list=M("train_student as s")->join(C('DB_PREFIX').'train_begins as b on b.id=s.b_id')->order("s.id DESC")->page($page_up,$page_num)->field("s.id,s.name,s.sex,s.birth,s.phone,s.source,s.site,s.ramark,s.money,s.status,b.name as begins")->select();
        return $return_data_list;
    }
    public function addStudent($data)
    {
        //添加学员
        if (empty($data['name'])) {
            return false;
        }
        return M('train_student')->add($data);
    }




    /*ajax操作*/
    public function ajaxAddRoom()
    {
        //添加教室
        $data=I('post.post');
        if ($this->addRoom($data)) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxAddCourse()
    {
        //添加课程
        $data=I('post.post');
        if ($this->addCourse($data)) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxAddTea()
    {
        //添加教师
        $data=I('post.post');
        if ($this->addTea($data)) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxAddBegins()
    {
        //添加上课信息
        $data=I('post.post');
        $data['start_time']=strtotime($data['start_time']);
        if ($this->addBegins($data)) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxAddStudent()
    {
       //添加学员
        $data=I('post.post');
        $data['birth']=strtotime($data['birth']);
        if ($this->addStudent($data)) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
}