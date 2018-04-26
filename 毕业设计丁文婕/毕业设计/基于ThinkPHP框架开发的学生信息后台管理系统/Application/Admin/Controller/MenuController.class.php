<?php
namespace Admin\Controller;
use Think\Controller;
class MenuController extends Controller {
    public function _initialize()
    {
        A("AdminUser")->checkLogin();
    }
    public function index($exa_juris){
        //后台首页导航菜单
        $admin_menu_list=M("admin_menu")->where("pid=0")->select();
        $i=0;
        $admin_menu_list_count=count($admin_menu_list);
        while ($i<$admin_menu_list_count) {
          if (!in_array($admin_menu_list[$i]['id'], $exa_juris)) {
             unset($admin_menu_list[$i]);
             $i++;
             continue;
          }

            $pid=$admin_menu_list[$i]['id'];
            $admin_menu_list[$i]["one"]=M("admin_menu")->where("pid=$pid")->select();
             $j=0;
             $admin_menu_list_one_count=count($admin_menu_list[$i]["one"]);
             while ($j<$admin_menu_list_one_count) {
               if (!in_array($admin_menu_list[$i]["one"][$j]["id"], $exa_juris)) {
                     unset($admin_menu_list[$i]["one"][$j]);
                     $j++;
                     continue;
                }
             	$pidj=$admin_menu_list[$i]["one"][$j]["id"];
             	$admin_menu_list[$i]["one"][$j]["sec"]=M("admin_menu")->where("pid=$pidj")->select();
                    $o=0;
                    $admin_menu_list_one_sec=count($admin_menu_list[$i]["one"][$j]["sec"]);
                    while ($o<$admin_menu_list_one_sec) {
                        if (!in_array($admin_menu_list[$i]["one"][$j]["sec"][$o]['id'], $exa_juris)) {
                            unset($admin_menu_list[$i]["one"][$j]["sec"][$o]);
                            $o++;
                            continue;
                        }
                        $o++;
                    }
                $admin_menu_list[$i]["one"][$j]["sec"]=array_merge($admin_menu_list[$i]["one"][$j]["sec"]);
             	$j++;
             }
             $admin_menu_list[$i]["one"]=array_merge($admin_menu_list[$i]["one"]);
            $i++;
        }
        $admin_menu_list=array_merge($admin_menu_list);
        return $admin_menu_list;
    }
    public function adminMenus(){
        //后台首页所有导航菜单
        $admin_menu_list=M("admin_menu")->where("pid=0")->select();
        $i=0;
        $admin_menu_list_count=count($admin_menu_list);
        while ($i<$admin_menu_list_count) {
    
            $pid=$admin_menu_list[$i]['id'];
            $admin_menu_list[$i]["one"]=M("admin_menu")->where("pid=$pid")->select();
             $j=0;
             $admin_menu_list_one_count=count($admin_menu_list[$i]["one"]);
             while ($j<$admin_menu_list_one_count) {
                $pidj=$admin_menu_list[$i]["one"][$j]["id"];
                $admin_menu_list[$i]["one"][$j]["sec"]=M("admin_menu")->where("pid=$pidj")->select();
                $j++;
             }
            $i++;
        }
        return $admin_menu_list;
    }
    
    
    public function getMenuList($pid=0,$spac=0,$data_table,$ident,&$result=array())
    {
        //获取首页菜单导航列表
        $spac+=4;
        $data["pid"]=$pid;
        $index_menu_result=M($data_table)->where($data)->select();

        $i=0;

        while ($i<count($index_menu_result)) {
            $index_menu_result[$i]["menu_name"]=str_repeat("&nbsp;",$spac).$ident.$index_menu_result[$i]["menu_name"];
            $result[]=$index_menu_result[$i];

            $this->getMenuList($index_menu_result[$i]["id"],$spac,$data_table,$ident,$result);
            $i++;
        }
        return $result;
    }
    public function getMenuFind($data_table,$id)
    {
        //通过菜单导航id获取一条数据
        $return = M($data_table)->where("id = $id")->find();
        return $return;
    }
    public function deleteMenuList($id,$data_table)
    {
        //删除菜单列表
        if (! $id > 0 || empty($id)) {
            # code...
            return 0;
        }
        $del_menu_result=M($data_table)->delete($id);
        return $del_menu_result;
    }
    public function addMenuList($pid,$menu_name,$url,$data_table)
    {
        //增加菜单列表
        $data=array();
        isset($pid) && $data["pid"]=$pid;
        $menu_name && $data["menu_name"]=$menu_name;
        $url && $data["url"]=$url;
        $add_menu_result=M($data_table)->add($data);
        return $add_menu_result;

    }
    public function editMenuList($menu_id,$pid,$menu_name,$url,$data_table)
    {
        //修改菜单列表
        if (empty($menu_id)) {
            return false;
        }
        $data=array();
        isset($pid) && $data["pid"]=$pid;
        $menu_name && $data["menu_name"]=$menu_name;
        $url && $data["url"]=$url;
        $add_menu_result=M($data_table)->where("id = $menu_id")->save($data);
        return $add_menu_result;

    }
    public function cs()
    {
        # code...
        //测试图标
        
        isset($pid) && $data["pid"]=$pid;
        print_r($data);
        // $this->display("Admin:cs");
    }






    public function deleteIndexMenuList()
    {
        //删除首页菜单列表
         $id=trim(I("post.id"));
         $data_table="index_menu";
         $del_menu_result=$this->deleteMenuList($id,$data_table);
         $return_data=array("status"=>$del_menu_result);
        echo json_encode($return_data);
    }

    public function addIndexMenuList()
    {
        //新增首页菜单列表
         $pid=trim(I("post.parentid"));
         $menu_name=trim(I("post.label"));
         $url=trim(I("post.url"));
         $data_table="index_menu";
         $add_menu_result=$this->addMenuList($pid,$menu_name,$url,$data_table);
         $return_data=array("status"=>$add_menu_result);
        echo json_encode($return_data);
        
    }
    public function editIndexMenuList()
    {
        //新增首页菜单列表

         $menu_id=trim(I('post.menu_id'));
         if (empty($menu_id)) {
             # code...
            die;
         }

         $pid=trim(I("post.parentid"));
         $menu_name=trim(I("post.label"));
         $url=trim(I("post.url"));
         $data_table="index_menu";
         $edit_menu_result=$this->editMenuList($menu_id,$pid,$menu_name,$url,$data_table);
         $return_data=array("status"=>$edit_menu_result);
         echo json_encode($return_data);

        
    }


    
}