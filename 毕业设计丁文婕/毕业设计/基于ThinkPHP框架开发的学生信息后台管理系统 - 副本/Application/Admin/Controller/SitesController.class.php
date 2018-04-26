<?php
namespace Admin\Controller;
use Think\Controller;
class SitesController extends Controller {
    public function _initialize()
    {
        A("AdminUser")->checkLogin();
    }
    public function updataSites($sites_id,$data)
    {
    	if (empty($sites_id)) {
    		# code...
    		return false;
    	}
    	return M('sites')->where("id = $sites_id")->save($data);

    }
    public function getSitesList($sites_id)
    {
    	return M('sites')->where("id = $sites_id")->find();
    }

    public function cs()
    {
        # code...
         echo json_encode(I());
    }
    public function ajaxUpdataSites()
    {
    	$sites_id=I('post.option_id');
    	$data=I('post.options');
    	$return=$this->updataSites($sites_id,$data);
    	if (empty($return)) {
    		$return_data["status"]=0;
    	}else{
    		$return_data["status"]=1;
    	}
    	echo json_encode($return_data);
    }


    
}