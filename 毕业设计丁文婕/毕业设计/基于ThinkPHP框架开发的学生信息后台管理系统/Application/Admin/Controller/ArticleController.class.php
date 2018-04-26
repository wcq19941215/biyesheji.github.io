<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function _initialize()
    {
        A("AdminUser")->checkLogin();
    }
    public function addArticle($menu_id,$data)
    {
        //新增文章
        if (empty($menu_id)) {
            # code...
            return false;
        }
        $data['m_id']=$menu_id;
        $return_addArticle_id=M("article")->add($data);
        return $return_addArticle_id;
    }
    public function editArticle($id,$data)
    {
        //编辑文章
        if (empty($id)) {
            # code...
            return false;
        }
        
        $return_addArticle_num=M("article")->where(array('id'=>$id))->save($data);
        return $return_addArticle_num;
    }
    public function delArticlePhotos($a_id)
    {
        //删除图册
        if (empty($a_id)) {
            return false;
        }
        return M('article_photos')->where(array('a_id'=>$a_id))->delete();
    }
    public function addArticlePhotos($Article_id,$url,$alt)
    {
        //新增图册图片存储
        $Article_id && $data["a_id"]=$Article_id;
        $url && $data["url"]=$url;
        $alt && $data["alt"]=$alt;
        $return_addArticlePhotos_id=M("article_photos")->add($data);
        return $return_addArticlePhotos_id;
    }

    public function getArticleList($page_up,$page_num,$menu_id='',$title='',$start_time='',$end_time='')
    {
        //获取文章列表  通过分页和页数来进行控制
        $menu_id && $data["a.m_id"]=$menu_id;
        $title && $data["a.title"]=array('like',"%$title%");
        $start_time && $end_time && $data["a.datetime"]=array('between',array($start_time,$end_time));
        !isset($data["a.datetime"]) && $start_time && $data["a.datetime"]=array('EGT',$start_time);
        !isset($data["a.datetime"]) && $end_time && $data["a.datetime"]=array('ELT',$end_time);
        $return_articleList=M("article as a")->join(C('DB_PREFIX')."index_menu as im on im.id=a.m_id")->where($data)->order("datetime DESC")->page($page_up,$page_num)->field("a.id,title,author,hits,keywords,datetime,menu_name,status,istop,recommended")->select();
        return $return_articleList;
    }
    /**
     *@param articlePart 通过文章id获取到文章的所有信息
     * article_id  文章id
     * @return return  返回一个数组
     **/
    public function articlePart($article_id)
    {
        $data=array();
        $article_id && $data['id']=$article_id;

        $return=M('article')->where($data)->field('id,m_id,title,author,keywords,source,excerpt,datetime,status,istop,recommended,content,thumb,hits,mast,is_index_banner')->find();
        $return['photos']=M('article_photos')->where("a_id = $article_id")->select();
        return $return;
    }
    public function delArticle($id)
    {
        if (empty($id)) {
            return false;
        }
        M('article_photos')->where("a_id = $id")->delete();
        return M('article')->where("id = $id")->delete();
    }
    //修改文章的单个值
    public function updateArticleOne($key,$val,$id)
    {
       return M('article')->where("id = $id")->save(array($key=>$val));

    }


    //ajax  操作

    public function uploadArticle()
    {
        # code...
         //上传文章
        $term=I("post.term");//栏目

        $article=I('post.post');
        $article['datetime']=strtotime(trim($article["datetime"]));
        $article['content']=trim(I("post.content"));
        
        
        $photos_url=I("post.photos_url");
        $photos_alt=I("post.photos_alt");
        foreach ($term as $key => $menu_id) {
            # code...
            $Article_id=$this->addArticle($menu_id,$article);
            for ($i=0; $i < count($photos_url); $i++) { 
                $ArticlePhotos_id=$this->addArticlePhotos($Article_id,$photos_url[$i],$photos_alt[$i]);
            }

        }
        $return_data["status"] = empty($Article_id) ? 0 : 1;
       
        
        echo json_encode($return_data);
    }
    public function uploadImg()
    {
        # code...
        //上传图片
        // print_r($_FILES);
        $UploadFile=A("UploadFile");
        $fileinfo=$_FILES["myfile"];
        $uploadpath=YXPUBLIC.'common/update_img/';
        $allowext=array('jpeg','jpg','png');
        $return_data=$UploadFile->uploadFile($fileinfo,$uploadpath,false,$allowext);
        $return_data["destination"] && $return_data["status"]=1;
        echo json_encode($return_data);
    }
    public function ajaxDelArticle()
    {
        $id=trim(I('post.id'));
        if (empty($id)) {
            die;
        }
        if ($this->delArticle($id)>0) {
            # code...
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function uploadEditArticle()
    {
        # code...
         //编辑文章editArticle
        // echo json_encode(I());die;
        $article_post_id=trim(I('post.article_id'));
        if (empty($article_post_id)) {
            # code...
            die;
        }
        $term=I("post.term");//栏目

        $article=I('post.post');
        $article['datetime']=strtotime(trim($article["datetime"]));
        $article['content']=trim(I("post.content"));
        
        
        $photos_url=I("post.photos_url");
        $photos_alt=I("post.photos_alt");
            $edit_article_num=$this->editArticle($article_post_id,$article);
            $this->delArticlePhotos($article_post_id);
            for ($i=0; $i < count($photos_url); $i++) { 
                $ArticlePhotos_id=$this->addArticlePhotos($article_post_id,$photos_url[$i],$photos_alt[$i]);
            }
        if ($edit_article_num>0 || $ArticlePhotos_id>0) {
           $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        
        $return_data["data"]=I('post');
        echo json_encode($return_data);
    }
    //*ajax修改文章单个值*/
    public function ajaxUpdateArticleOne()
    {
        
        $key=trim(I('post.key'));
        $id=trim(I('post.id'));
        $val=trim(I('post.val'));
        $update_article_one=$this->updateArticleOne($key,$val,$id);
        if ($update_article_one) {
            $return_data['status']=1;
        }else{
            $return_data['status']=0;
        }
        echo json_encode($return_data);
    }
    public function cs()
    {
       
    }
    
    


    
}