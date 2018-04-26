<?php

namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function _initialize() {

        header("Content-type: text/html; charset=utf-8");
    }

    public function login() {
        # code...

        $this->display("Admin/admin_login");
    }

    //首页
    public function index() {
        //首页

        A("AdminUser")->checkLogin();
        $admin_menu_list = A("Menu")->index(explode(',', $_SESSION['AdminUserInfo']['exa_juris']));
        $this->assign('admin_menu_list', $admin_menu_list);
        $this->display("Admin:index");
    }

    //查看文章列表
    public function articleManage() {
        A("AdminUser")->checkLogin();
        # code...
        //查看文章列表
        $current_url = $_SERVER['REQUEST_URI'];
        //获取到网站文章的列表
        $page_up = I("get.p", 1, 'int');
        $menu_id = trim(I("post.menu_id"));
        $title = trim(I("post.title"));
        $start_time = strtotime(trim(I("post.start_time")));
        $end_time = strtotime(trim(I("post.end_time")));


        $page_num = 10;

        $article_list = A("Article")->getArticleList($page_up, $page_num, $menu_id, $title, $start_time, $end_time);


        //显示页数
        $menu_id && $article_data["m_id"] = $menu_id;
        $title && $article_data["title"] = array('like', "%$title%");

        $start_time && $end_time && $article_data["datetime"] = array('between', array($start_time, $end_time));
        !isset($article_data["datetime"]) && $start_time && $article_data["datetime"] = array('EGT', $start_time);
        !isset($article_data["datetime"]) && $end_time && $article_data["datetime"] = array('ELT', $end_time);

        $Article_count = M("article")->where($article_data)->count();
        $page = new \Think\Page($Article_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        if (IS_AJAX) {
            # code...
            $this->assign("article_list", $article_list);
            $this->assign("page", $page_show);
            $this->assign('current_url', $current_url);
            $shtml = $this->fetch("Assis/article_list_mast");
            $this->ajaxReturn($shtml);
        }


        //获取到首页导航菜单列表
        $index_menu_list = A("Menu")->getMenuList(0, 0, 'index_menu', '└─  ');
        $this->assign("index_menu_list", $index_menu_list);




        $this->assign("article_list", $article_list);
        $this->assign("page", $page_show);
        $this->assign('current_url', $current_url);
        $this->display("Admin:article_Manage");
    }

    //新增文章页面
    public function addArticle() {
        # code...
        A("AdminUser")->checkLogin();
        //新增文章页面
        //获取到首页导航菜单列表
        $index_menu_list = A("Menu")->getMenuList(0, 0, 'index_menu', '└─  ');
        $this->assign("index_menu_list", $index_menu_list);

        $this->display("Admin:add_article");
    }

    //编辑文章页面
    public function editArticle() {
        # code...
        A("AdminUser")->checkLogin();
        //编辑文章页面
        $article_id = trim(I('get.id'));
        if (empty($article_id)) {
            # code...
            die;
        }
        //获取到首页导航菜单列表
        $index_menu_list = A("Menu")->getMenuList(0, 0, 'index_menu', '└─  ');
        $this->assign("index_menu_list", $index_menu_list);
        $articlePart = A('Article')->articlePart($article_id);
        $this->assign('articlePart', $articlePart);
        $this->display("Admin:edit_article");
    }

    //查看本地用户
    public function indexUserManage() {
        # code...
        //查看本地用户
        A("AdminUser")->checkLogin();
        //获取到本地用户的列表
        $page_up = I("get.p", 1, 'int');
        $user_id = trim(I("post.user_id"));
        $user = trim(I("post.user"));

        $page_num = 10;

        $index_user_list = A("IndexUser")->getIndexUserList($page_up, $page_num, $user_id, $user);

        //显示页数
        $user_id && $index_user_data["id"] = $user_id;
        $user && $index_user_data["user"] = array('like', "%$user%");

        $index_user_count = M("index_user")->where($index_user_data)->count();
        $page = new \Think\Page($index_user_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        if (IS_AJAX) {
            # code...
            $this->assign("index_user_list", $index_user_list);
            $this->assign("page", $page_show);
            $shtml = $this->fetch("Assis/index_user_list_mast");
            $this->ajaxReturn($shtml);
        }

        $this->assign("index_user_list", $index_user_list);
        $this->assign("page", $page_show);

        $this->display("Admin:index_user_manage");
    }

    //修改管理员密码
    public function modiAdminPass($value = '') {
        # code...
        A("AdminUser")->checkLogin();
        //修改管理员密码
        $this->display("Admin:modi_admin_pass");
    }

    //上传图片界面
    public function plupload() {
        # code...
        A("AdminUser")->checkLogin();
        //上传图片界面

        $this->display("Admin:plupload");
    }

    //首页导航菜单管理
    public function indexMenuManage() {
        # code...
        //首页导航菜单管理
        A("AdminUser")->checkLogin();
        //获取到首页导航菜单列表
        // $cid=empty(trim(I('post.cid'))) ? 1 : trim(I('post.cid'));
        $index_menu_list = A("Menu")->getMenuList('', 0, 'index_menu', '├─ ');
        $this->assign("index_menu_list", $index_menu_list);
        $data[0] = array('id' => 1, 'menu_name' => '主导航');
        // $data[1]=array('id'=>2,'menu_name'=>'Blog');
        $this->assign('adv_menu', $data);
        $this->display("Admin/index_menu_manage");
    }

    //首页导航菜单添加
    public function indexMenuAdd() {
        # code...
        //首页导航菜单添加
        A("AdminUser")->checkLogin();
        //获取到首页导航菜单列表
        // $cid=empty(trim(I('get.cid'))) ? 1 : trim(I('get.cid'));
        $index_menu_list = A("Menu")->getMenuList('', 0, 'index_menu', '├─ ');
        $this->assign("index_menu_list", $index_menu_list);
        $this->assign('pid', trim(I('get.pid')));
        $this->display("Admin/index_menu_add");
    }

    //首页导航菜单编辑
    public function indexMenuEdit() {
        # code...
        A("AdminUser")->checkLogin();
        //首页导航菜单编辑
        $id = trim(I('get.id'));
        if (empty($id)) {
            # code...
            die;
        }
        //获取到首页导航菜单列表
        // $cid=empty(trim(I('get.cid'))) ? 1 : trim(I('get.cid'));
        $index_menu_list = A("Menu")->getMenuList('', 0, 'index_menu', '├─ ');
        $this->assign("index_menu_list", $index_menu_list);
        $index_menu_find = A('Menu')->getMenuFind('index_menu', $id);
        $this->assign('index_menu_find', $index_menu_find);
        $this->display("Admin/index_menu_edit");
    }

    //留言
    public function leaveWordManage() {
        # code...
        A("AdminUser")->checkLogin();
        //访问此路径的url
        $current_url = $_SERVER['REQUEST_URI'];
        //查看留言列表
        //获取到网站留言的列表
        $page_up = I("get.p", 1, 'int');
        $user_id = trim(I("post.user_id"));
        $title = trim(I("post.title"));
        $start_time = strtotime(trim(I("post.start_time")));
        $end_time = strtotime(trim(I("post.end_time")));


        $page_num = 10;

        $leave_word_list = A("LeaveWord")->getLeaveWordList($page_up, $page_num, $user_id, $title, $start_time, $end_time);


        //显示页数
        $user_id && $leave_word_data["l.m_id"] = $user_id;
        $title && $leave_word_data["l.title"] = array('like', "%$title%");

        $start_time && $end_time && $leave_word_data["l.datetime"] = array('between', array($start_time, $end_time));
        !isset($leave_word_data["l.datetime"]) && $start_time && $leave_word_data["l.datetime"] = array('EGT', $start_time);
        !isset($leave_word_data["l.datetime"]) && $end_time && $leave_word_data["l.datetime"] = array('ELT', $end_time);

        $leave_word_count = M("leave_word")->where($leave_word_data)->count();
        $page = new \Think\Page($leave_word_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        if (IS_AJAX) {
            # code...
            $this->assign("leave_word_list", $leave_word_list);
            $this->assign("page", $page_show);
            $this->assign('current_url', $current_url);
            $shtml = $this->fetch("Assis/leave_word_list_mast");
            $this->ajaxReturn($shtml);
        }


        $this->assign("leave_word_list", $leave_word_list);
        $this->assign("page", $page_show);
        $this->assign('current_url', $current_url);
        $this->display('Admin/leave_word_manage');
    }

    //网站信息页面跳转
    public function sites() {
        A("AdminUser")->checkLogin();
        $this->assign('sites', A('Sites')->getSitesList(1));
        $this->display('Admin/sites');
    }

    //网站后台首页
    public function main() {
        A("AdminUser")->checkLogin();
        $this->assign('server', $_SERVER);
        $this->display("Admin/main");
    }

    //问答管理列表
    public function questManage() {
        # code...
        # code...
        A("AdminUser")->checkLogin();
        //查看文章列表
        $current_url = $_SERVER['REQUEST_URI'];
        //获取到网站文章的列表
        $page_up = I("get.p", 1, 'int');
        $nav_id = trim(I("post.nav_id"));
        $name = trim(I("post.name"));
        $start_time = strtotime(trim(I("post.start_time")));
        $end_time = strtotime(trim(I("post.end_time")));


        $page_num = 10;

        $quest_list = A("Quest")->getQuestList($page_up, $page_num, $nav_id, $name, $start_time, $end_time);


        //显示页数
        $nav_id && $quest_data["n_id"] = $nav_id;
        $name && $quest_data["send_name"] = array('like', "%$name%");
        $start_time && $end_time && $quest_data["send_datetime"] = array('between', array($start_time, $end_time));
        !isset($quest_data["send_datetime"]) && $start_time && $quest_data["send_datetime"] = array('EGT', $start_time);
        !isset($quest_data["send_datetime"]) && $end_time && $quest_data["send_datetime"] = array('ELT', $end_time);

        $quest_count = M("quest")->where($quest_data)->count();
        $page = new \Think\Page($quest_count, $page_num);
        $page_show = $page->show();
        $quest_nav = array(1 => '家长问答', 2 => '北服问答', 3 => '考学问答');

        //ajax返回
        if (IS_AJAX) {
            # code...
            $this->assign("quest_list", $quest_list);
            $this->assign("page", $page_show);
            $this->assign('current_url', $current_url);
            $this->assign('quest_nav', $quest_nav);
            $shtml = $this->fetch("Assis/quest_list_mast");
            $this->ajaxReturn($shtml);
        }
        $this->assign('quest_nav', $quest_nav);
        $quest_nav_list = array(array('id' => 1, 'nav_name' => '家长问答'), array('id' => 2, 'nav_name' => '北服问答'), array('id' => 3, 'nav_name' => '考学问答'));
        $this->assign('quest_nav_list', $quest_nav_list);

        $this->assign("quest_list", $quest_list);
        $this->assign("page", $page_show);
        $this->assign('current_url', $current_url);
        $this->display('Admin/quest_manage');
    }

    //获取验证码
    public function getVerify() {

        $Verify = new \Think\Verify();
        $Verify->entry();
    }

    public function adminUserManage() {
        //查看管理员用户
        A("AdminUser")->checkLogin();
        //获取到管理员用户的列表
        $page_up = I("get.p", 1, 'int');
        $user_id = trim(I("post.user_id"));
        $user = trim(I("post.user"));

        $page_num = 10;

        $admin_user_list = A("AdminUser")->getAdminUserList($page_up, $page_num, $user_id, $user);

        //显示页数
        $user_id && $admin_user_data["id"] = $user_id;
        $user && $admin_user_data["user"] = array('like', "%$user%");

        $admin_user_count = M("admin_user")->where($admin_user_data)->count();
        $page = new \Think\Page($admin_user_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        if (IS_AJAX) {
            # code...
            $this->assign("admin_user_list", $admin_user_list);
            $this->assign("page", $page_show);
            $shtml = $this->fetch("Assis/admin_user_list_mast");
            $this->ajaxReturn($shtml);
        }

        $this->assign("admin_user_list", $admin_user_list);
        $this->assign("page", $page_show);

        $this->display('Admin:admin_user_manage');
    }

    public function adminUserAdd() {
        //添加管理员用户
        $this->display('User:admin_user_add');
    }

    public function adminUserExaJuris() {
        //管理管理员用户权限
        $admin_user_id = trim(I('get.id'));
        // print_r(A('AdminUser')->getAdminUserExaJuris($admin_user_id));die;
        $this->assign('admin_user_info', A('AdminUser')->getAdminUserExaJuris($admin_user_id));
        $this->assign('admin_menu', A('Menu')->adminMenus());
        $this->assign('id', $admin_user_id);
        $this->display('User:admin_user_exa_juris');
    }

    public function AdminUserInfo() {
        //管理员的个人资料填写
        $this->assign('admin_user_info', A('AdminUser')->getAdminUserInfo($_SESSION['AdminUserInfo']['id']));
        $this->display('Setting:admin_user_info');
    }

    public function cs() {
        # code...
        print_r(A("IndexUser")->getIndexUserList(1, 10));
    }

    /* 高考单栏目 */

    public function collegeManage() {
        //高考信息管理
        $this->display("College:college_manage");
    }

    public function collegeSchoolAdd() {
        //添加学校
        $this->assign("area", A('College')->getArea());
        $this->display("College:college_school_add");
    }

    public function collegeSchoolEdit() {
        //编辑学校
        $school_id = trim(I('get.id'));
        $this->assign('school', A('College')->getSchoolFind($school_id));
        $this->display("College:college_school_edit");
    }

    public function collegeMajorAdd() {
        //添加专业
        $this->assign('level', A('College')->getLevel());
        $this->assign("area", A('College')->getArea());
        $this->display("College:college_major_add");
    }

    public function collegeMajorEdit() {
        //编辑专业
        $major_id = trim(I('get.id'));
        $this->assign('major', A('College')->getMajorFind($major_id));
        $this->assign('level', A('College')->getLevel());
        $this->display("College:college_major_edit");
    }

    public function collegeGradeAdd() {
        //添加分数
        $this->assign('level', A('College')->getLevel());
        $this->assign("area", A('College')->getArea());
        $this->assign('year', array(array('name' => '2015'), array('name' => '2016'), array('name' => '2017'),));
        $this->display("College:college_grade_add");
    }

    public function collegeGradeEdit() {
        //编辑分数
        $grade_id = trim(I('get.id'));
        $this->assign('grade', A('College')->getGradeFind($grade_id));
        $this->assign('level', A('College')->getLevel());
        $this->display("College:college_grade_edit");
    }

    public function collegeLevelAdd() {
        //添加层次
        $this->display("College:college_level_add");
    }

    public function schoolManage() {
        //学校管理
        //获取到学校列表
        $page_up = I("get.p", 1, 'int');
        $area_id = trim(I("post.aid"));
        $name = trim(I("post.name"));


        $page_num = 10;

        $school_list = A("College")->getSchoolList($page_up, $page_num, $area_id, $name);


        //显示页数
        $area_id && $school_data["aid"] = $area_id;
        $name && $school_data["name"] = array('like', "%$name%");

        $school_count = M("college_school")->where($school_data)->count();
        $page = new \Think\Page($school_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        if (IS_AJAX) {
            # code...
            $this->assign("college_list", $school_list);
            $this->assign("page", $page_show);
            $shtml = $this->fetch("College:Assis/school_list_mast");
            $this->ajaxReturn($shtml);
        }
        $this->assign("area", A('College')->getArea());
        $this->assign("college_list", $school_list);
        $this->assign("page", $page_show);
        $this->display('College:college_school_manage');
    }

    public function majorManage() {
        //专业管理
        $page_up = I("get.p", 1, 'int');
        $school_id = trim(I('post.sid'));
        $level_id = trim(I('post.lid'));
        $name = trim(I('post.name'));
        $page_num = 10;
        $major_list = A('College')->getMajorList($page_up, $page_num, $school_id, $level_id, $name);
        //显示页数
        $school_id && $major_data['sid'] = $school_id;
        $level_id && $major_data['lid'] = $level_id;
        $name && $major_data['name'] = $name;
        $major_count = M('college_major')->where($major_data)->count();
        $page = new \Think\Page($major_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        if (IS_AJAX) {
            $this->assign('college_list', $major_list);
            $this->assign('page', $page_show);
            $shtml = $this->fetch('College:Assis/major_list_mast');
            $this->ajaxReturn($shtml);
        }

        $this->assign('level', A('College')->getLevel());
        $this->assign("area", A('College')->getArea());

        $this->assign('college_list', $major_list);
        $this->assign('page', $page_show);


        $this->display('College:college_major_manage');
    }

    public function gradeManage() {
        //分数管理
        $page_up = I("get.p", 1, 'int');
        $major_id = trim(I('post.mid'));
        $year = trim(I('post.year'));
        $page_num = 10;
        $grade_list = A('College')->getGradeList($page_up, $page_num, $major_id, $year);
        //显示页数
        $major_id && $grade_data['mid'] = $major_id;
        $year && $grade_data['year'] = $year;
        $code && $grade_data['code'] = $code;
        $grade_count = M('college_grade')->where($grade_data)->count();
        $page = new \Think\Page($grade_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        if (IS_AJAX) {
            $this->assign('college_list', $grade_list);
            $this->assign('page', $page_show);
            $shtml = $this->fetch('College:Assis/grade_list_mast');
            $this->ajaxReturn($shtml);
        }

        $this->assign('level', A('College')->getLevel());
        $this->assign("area", A('College')->getArea());
        $this->assign('year', array(array('name' => '2015'), array('name' => '2016'), array('name' => '2017'),));
        $this->assign('college_list', $grade_list);
        $this->assign('page', $page_show);


        $this->display('College:college_grade_manage');
    }

    /* 高考单栏目 */






    /* 张宁公司项目 */

    public function trainStudentManage() {
        //学生管理
        $page_up = I("get.p", 1, 'int');


        $page_num = 10;
        $data_list = A('Train')->getStudentList($page_up, $page_num);
        //显示页数
        $data_count = M('train_student')->count();
        $page = new \Think\Page($data_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        $this->assign('student_status', array(0 => '已退学', 1 => '正在上课'));
        if (IS_AJAX) {
            $this->assign('data_list', $data_list);
            $this->assign('page', $page_show);
            $shtml = $this->fetch('Train:Assis/student_list_mast');
            $this->ajaxReturn($shtml);
        }

        $this->assign('data_list', $data_list);
        $this->assign('page', $page_show);

        $this->display('Train:student_manage');
    }

    public function trainStudentAdd() {
        //添加学员
        $this->assign('begins', A('Train')->getBeginsData());
        $this->display('Train:student_add');
    }

    public function trainCourseManage() {
        //课程管理
        $page_up = I("get.p", 1, 'int');


        $page_num = 10;
        $data_list = A('Train')->getCourseList($page_up, $page_num);
        //显示页数
        $data_count = M('train_course')->count();
        $page = new \Think\Page($data_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        if (IS_AJAX) {
            $this->assign('data_list', $data_list);
            $this->assign('page', $page_show);
            $shtml = $this->fetch('Train:Assis/course_list_mast');
            $this->ajaxReturn($shtml);
        }

        $this->assign('data_list', $data_list);
        $this->assign('page', $page_show);

        $this->display('train:course_manage');
    }

    public function trainCourseAdd() {
        //添加课程
        $this->display('Train:course_add');
    }

    public function trainTeaManage() {
        //教师管理
        $page_up = I("get.p", 1, 'int');


        $page_num = 10;
        $data_list = A('Train')->getTeaList($page_up, $page_num);
        //显示页数
        $data_count = M('train_tea')->count();
        $page = new \Think\Page($data_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        if (IS_AJAX) {
            $this->assign('data_list', $data_list);
            $this->assign('page', $page_show);
            $shtml = $this->fetch('Train:Assis/tea_list_mast');
            $this->ajaxReturn($shtml);
        }

        $this->assign('data_list', $data_list);
        $this->assign('page', $page_show);

        $this->display('train:tea_manage');
    }

    public function trainTeaAdd() {
        //添加教师 
        $this->display('Train:tea_add');
    }

    public function trainRoomManage() {
        //教室信息
        $page_up = I("get.p", 1, 'int');


        $page_num = 10;
        $data_list = A('Train')->getRoomList($page_up, $page_num);
        //显示页数
        $data_count = M('train_room')->count();
        $page = new \Think\Page($data_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        if (IS_AJAX) {
            $this->assign('data_list', $data_list);
            $this->assign('page', $page_show);
            $shtml = $this->fetch('Train:Assis/room_list_mast');
            $this->ajaxReturn($shtml);
        }

        $this->assign('data_list', $data_list);
        $this->assign('page', $page_show);

        $this->display('train:room_manage');
    }

    public function trainRoomAdd() {
        //添加教室
        $this->display('train:room_add');
    }

    public function trainBeginsManage() {
        //上课信息
        $page_up = I("get.p", 1, 'int');


        $page_num = 10;
        $data_list = A('Train')->getBeginsList($page_up, $page_num);
        //显示页数
        $data_count = M('train_begins')->count();
        $page = new \Think\Page($data_count, $page_num);
        $page_show = $page->show();
        //ajax返回
        if (IS_AJAX) {
            $this->assign('data_list', $data_list);
            $this->assign('page', $page_show);
            $shtml = $this->fetch('Train:Assis/begins_list_mast');
            $this->ajaxReturn($shtml);
        }

        $this->assign('data_list', $data_list);
        $this->assign('page', $page_show);

        $this->display('train:begins_manage');
    }

    public function trainBeginsAdd() {
        $this->assign('course', A('Train')->getCourseData());
        $this->assign('tea', A('Train')->getTeaData());
        $this->assign('room', A('Train')->getRoomData());
        $this->display('train:begins_add');
    }

    /* 张宁公司项目 */
}
