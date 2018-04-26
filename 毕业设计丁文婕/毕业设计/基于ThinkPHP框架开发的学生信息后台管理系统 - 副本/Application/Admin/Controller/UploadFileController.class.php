<?php
namespace Admin\Controller;
use Think\Controller;
class UploadFileController extends Controller
{

    public function _initialize()
    {
        A("AdminUser")->checkLogin();
    }
	/**
    *@param $fileinfo 文件数组
    *@param $uploadpath 文件路径
    *@param $flag 文件是否为图片
    *@param $allowext 文件限制类型数组
    *@param $maxsize 文件限制大小,单位B
    *@return $arr 上传的文件信息数组
	*/
	public static function uploadFile($fileinfo,$uploadpath,$flag,$allowext,$maxsize=2097152)
    {
    	# code...
        
        $uploadtime=date("Ymd",time())."/";
        $uploadpath=$uploadpath.$uploadtime;
    	if ($fileinfo["error"]>0) {
    		# code...
    		switch ($fileinfo["error"]) {
    			case 1:
    				# code...
    			$mes = '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
    				break;
    			case 2:
    				# code...
    			$mes = '超过了表单MAX_FILE_SIZE限制的大小';
    				break;
    			case 3:
    				# code...
    			$mes = '文件部分被上传';
    				break;
    			case 4:
    				# code...
    			$mes = '没有选择上传文件';
    				break;
    			case 6:
    				# code...
    			$mes = '没有找到临时目录';
    				break;
    			case 7:
    			case 8:	
    			    $mes = '系统错误';
    			     break;
    		}

    		return $mes;
    	}


    	$ext=pathinfo($fileinfo["name"],PATHINFO_EXTENSION);
    	if (!is_array($allowext)) {
    		# code...
    		exit("系统错误");
    	}

    	if (!in_array($ext,$allowext)) {
    		# code...
    		exit("非法文件类型");
    	}

    	if ($fileinfo["size"]>$maxsize) {
    		# code...
    		exit("文件过大");
    	}

    	if ($flag) {
    		# code...
    		if (!getimagesize($fileinfo["tmp_name"])) {
    			# code...
    			exit("不是有效的图片类型");
    		}
    	}


    	if (!is_uploaded_file($fileinfo["tmp_name"])) {
    		# code...
           exit("文件不是通过http post方式传输");
    	}
        
    	if (!file_exists($uploadpath)) {
    		# code...
    		mkdir($uploadpath,0777,true);
            chmod($uploadpath,0777);
    	}
       
 

    	$uniname=md5(uniqid(microtime(true),true)).".".$ext;
    	//$tination="images/".$uploadpath."/".$uniname;//相对路径
    	$destination=$uploadpath.$uniname;//绝对路径
    	// echo $destination;
    	// echo $fileinfo["tmp_name"];
    	if (!@move_uploaded_file($fileinfo["tmp_name"], $destination)) {
    		# code...
    		exit("文件移动失败");
    	}
        $arr=$fileinfo;
        $arr["destination"]=$destination;
        $arr["uniname"]=$uploadtime.$uniname;
        $arr["size"]=$fileinfo["size"];
    	return $arr;
    }
}


?>