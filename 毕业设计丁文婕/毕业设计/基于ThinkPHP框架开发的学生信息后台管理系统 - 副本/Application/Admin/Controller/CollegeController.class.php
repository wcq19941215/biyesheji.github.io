<?php
namespace Admin\Controller;
use Think\Controller;
class CollegeController extends Controller {
    public function _initialize()
    {
        A("AdminUser")->checkLogin();
    }
    public function getArea()
    {
        //获取地区信息
        return M('college_area')->field('id,name')->select();
    }
    public function getSchool($aid)
    {
        //通过传递过来的地区id值取出学校信息
        if (empty($aid)) {
            return false;
        }
        return M('college_school')->where(array('aid'=>$aid))->field('id,name')->select();
    }
    public function getSchoolList($page_up,$page_num,$area_id='',$name='')
    {
        //获取学校列表  通过分页和页数来进行控制
        $area_id && $data["s.aid"]=$area_id;
        $name && $data["s.name"]=array('like',"%$name%");
        $return_schoolList=M("college_school as s")->join(C('DB_PREFIX')."college_area as a on a.id=s.aid")->where($data)->order("s.id DESC")->page($page_up,$page_num)->field("s.id,s.name,s.url,a.name as area")->select();
        return $return_schoolList;
    }
    public function getSchoolFind($school_id)
    {
         //获取学校单条信息
        return M('college_school as s')->join(C('DB_PREFIX').'college_area as a on a.id=s.aid')->where(array('s.id'=>$school_id))->field('s.id,s.aid,s.name,s.url,a.name as area')->find();
    }
    public function getMajor($sid,$lid)
    {
        //通过传递过来的学校id值取出专业信息
        if (empty($sid) || empty($lid)) {
            return false;
        }
        return M('college_major')->where(array('sid'=>$sid,'lid'=>$lid))->field('id,name')->select();
    }
    public function getMajorList($page_up,$page_num,$school_id='',$level_id,$name='')
    {
        //获取专业列表  通过分页和页数来进行控制
        $school_id && $data["m.sid"]=$school_id;
        $level_id && $data['m.lid']=$level_id;
        $name && $data["m.name"]=array('like',"%$name%");
        $return_majorList=M("college_major as m")->join(C('DB_PREFIX')."college_school as s on s.id=m.sid")->join(C('DB_PREFIX')."college_level as l on l.id=m.lid")->where($data)->order("m.id DESC")->page($page_up,$page_num)->field("m.id,m.name,s.name as school,l.name as level")->select();
        return $return_majorList;
    }
    public function getMajorFind($major_id)
    {
         //获取专业单条信息
        return M('college_major m')->join(C('DB_PREFIX').'college_school as s on s.id=m.sid')->where(array('m.id'=>$major_id))->field('m.id,m.name,s.name as school,m.lid,m.sid')->find();
    }
    public function getGradeList($page_up,$page_num,$major_id="",$year="")
    {
        //获取分数列表  通过分页和页数来进行控制
        $major_id && $data["g.mid"]=$major_id;
        $year && $data["g.year"]=$year;
        $return_gradeList=M("college_grade as g")->join(C('DB_PREFIX')."college_major as m on m.id=g.mid")->where($data)->order("g.id DESC")->page($page_up,$page_num)->field("g.id,g.code,g.year,g.planum,m.name as major")->select();
        return $return_gradeList;
    }
    public function getGradeFind($grade_id)
    {
        //获取分数单条信息
        return M('college_grade as g')->join(C('DB_PREFIX').'college_major as m on m.id=g.mid')->where(array('g.id'=>$grade_id))->field('g.id,g.code,g.year,g.mid,g.planum,m.name as major,m.lid')->find();
    }
    public function getLevel()
    {
        //获取层次信息
        return M('college_level')->field('id,name')->select();
    }
    public function addLevel($name)
    {
        //添加层次
        if (empty($name)) {
            return false;
        }
        return M('college_level')->add(array('name'=>$name));
    }
    public function addGrade($data)
    {
        //添加分数
        if (empty($data['code']) || empty($data['year']) || empty($data['mid']) || empty($data['planum'])) {
            return false;
        }
        return M('college_grade')->add($data);
    }
    
    public function addMajor($data)
    {
       //添加专业
        if (empty($data['sid']) || empty($data['lid']) || empty($data['name'])) {
            return false;
        }
        return M('college_major')->add($data);
    }
    public function addSchool($data)
    {
        //添加学校
        if (empty($data['aid']) || empty($data['name'])) {
            return false;
        }
        return M('college_school')->add($data);
    }
    public function editSchool($data)
    {
        //修改学校信息
        if (empty($data['id']) || empty($data['aid']) || empty($data['name'])) {
            return false;
        }
        $id=$data['id'];
        unset($data['id']);
        return M('college_school')->where(array('id'=>$id))->save($data);
    }
    public function editMajor($data)
    {
       //修改专业信息
        if (empty($data['id']) || empty($data['sid']) || empty($data['lid'])) {
            return false;
        }
        $id=$data['id'];
        unset($data['id']);
        return M('college_major')->where(array('id'=>$id))->save($data);
    }
    public function editGrade($data)
    {
        //修改分数信息
        if (empty($data['id']) || empty($data['lid']) || empty($data['mid']) || empty($data['year']) || empty($data['code']) || empty($data['planum'])) {
            return false;
        }
        $id=$data['id'];
        unset($data['id']);
        return M('college_grade')->where(array('id'=>$id))->save($data);
    }
    public function delCollege($id,$table)
    {
        //删除指定表数据
        if (empty($id) || empty($table)) {
            return false;
        }
        return M($table)->where(array('id'=>$id))->delete();
    }







    public function ajaxGetSchool()
    {
        //ajax返回通过地区id查询出的学校信息
        $aid=trim(I('post.aid'));
        $school_data=$this->getSchool($aid);
        if ($school_data==false) {
            $return_data['status']=0;
        }else{
            $return_data['status']=1;
            $return_data['data']=$school_data;
        }
        echo json_encode($return_data);
    }
    public function ajaxGetMajor($value='')
    {
        //ajax返回通过学校id查询出的专业信息
        $sid=trim(I('post.sid'));
        $lid=trim(I('post.lid'));
        $major_data=$this->getMajor($sid,$lid);
        if ($major_data==false) {
            $return_data['status']=0;
        }else{
            $return_data['status']=1;
            $return_data['data']=$major_data;
        }
        echo json_encode($return_data);

    }
    public function ajaxAddLevel()
    {
        //ajax添加专业的层次
        $name=trim(I('post.name'));
        if ($this->addLevel($name)>0) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxAddGrade()
    {
        //ajax添加分数
        $data=I('post.');
        if ($this->addGrade($data)>0) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxAddMajor()
    {
        //ajax添加专业
        $data=I('post.');
        if ($this->addMajor($data)>0) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxAddSchool()
    {
        //ajax添加学校
        $data=I('post.');
        if ($this->addSchool($data)>0) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxEditSchool()
    {
        //ajax修改学校
        $data=I('post.');
        if ($this->editSchool($data)>0) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxEditMajor()
    {
        //ajax修改专业
        $data=I('post.');
        if ($this->editMajor($data)>0) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxEditGrade()
    {
        //ajax修改分数
        $data=I('post.');
        if ($this->editGrade($data)>0) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxDelSchool()
    {
        //删除指定学校
        $id=trim(I('post.id'));
        $table="college_school";
        if ($this->delCollege($id,$table)>0) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxDelMajor()
    {
        //删除指定专业
        $id=trim(I('post.id'));
        $table="college_major";
        if ($this->delCollege($id,$table)>0) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function ajaxDelGrade()
    {
        //删除指定分数
        $id=trim(I('post.id'));
        $table="college_grade";
        if ($this->delCollege($id,$table)>0) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
}