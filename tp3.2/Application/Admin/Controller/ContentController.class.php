<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 21/12/2017
 * Time: 10:23 AM
 */
namespace Admin\Controller;
use Think\Controller;

/**
 * Class ContentController
 * 文章管理
 * @package Admin\Controller
 */
class ContentController extends CommonController
{
    /**
     * 文章显示
     */
    public function index()
    {
        $conds = array();
        $title = $_GET['title'];
        if($title){
            $conds['title']=$title;
        }
        if($_GET['catid']){
            $conds['catid']=intval($_GET['catid']);
        }
        $page = $_REQUEST['p']?$_REQUEST['p']:1;
        $pageSize=5;

        $news = D("News")->getNews($conds,$page,$pageSize);
        $count = D("News")->getNewsCount($conds);
        $res = new \Think\Page($count,$pageSize);
        $pageres = $res->show();
        $positions=D("Position")->getNormalPositions();
        $this->assign('pageres',$pageres);
        $this->assign('news',$news);
        $this->assign('positions',$positions);

        $this->assign('webSiteMenu',D("Menu")->getBarMenus());
        $this->display();
    }

    /**
     * 添加文章
     */
    public function add()
    {
        if($_POST){
            if(!isset($_POST['title'])||!$_POST['title']){
                return show(0,'标题不存在');
            }
            if(!isset($_POST['small_title'])||!$_POST['small_title']){
                return show(0,'短标题不存在');
            }
            if(!isset($_POST['catid'])||!$_POST['catid']){
                return show(0,'文章栏目不存在');
            }
            if(!isset($_POST['keywords'])||!$_POST['keywords']){
                return show(0,'关键字不存在');
            }
            if(!isset($_POST['content'])||!$_POST['content']){
                return show(0,'content不存在');
            }

            if($_POST['news_id']){
                return $this->save($_POST);
            }
            //主表的插入
            $newsId=D("News")->insert($_POST);
            //INSERT INTO `cms_news` (`title`,`small_title`,`thumb`,`title_font_color`,`catid`,
            //`copyfrom`,`description`,`keywords`,`create_time`,`username`)
            // VALUES ('这是标题','这是短标题','/upload/2017/12/31/5a48948c2c33b.jpg',
            //'#5674ed','8','1','这是描述','这是关键字','1514706135','admin')

            if($newsId){
                $newsContentData['content']=$_POST['content'];
                $newsContentData['news_id']=$newsId;
                //副表的插入
                $cId=D("NewsContent")->insert($newsContentData);

                /*INSERT INTO `cms_news_content` (`content`,`news_id`,`create_time`) VALUES ('&lt;p&gt;
                这是内容 src=&quot;/upload/2017/12/31/5a4894b28ad4f.jpeg&quot; alt=&quot;&quot; /&gt;
                &lt;/p&gt;','30','1514706135')
                */
                if($cId){
                    return show(1,'新增成功');
                }else{
                    return show(1,'主表插入成功,副表插入失败');
                }

            }else{
                return show(0,'新增失败');
            }
        }else{
            $webSiteMenu=D("Menu")->getBarMenus();
            $titleFontColor=C("TITLE_FONT_COLOR");//颜色
            $copyFrom=C("COPY_FROM");//来源
            $this->assign('webSiteMenu',$webSiteMenu);
            $this->assign('titleFontColor',$titleFontColor);
            $this->assign('copyfrom',$copyFrom);
            $this->display();
        }
    }
    /**
     * 编辑文章
     */
    public function edit()
    {
        $newsId = $_GET['id'];
        if(!$newsId){
            $this->redirect('/admin.php?c=content');
        }
        $news = D("News")->find($newsId);
        if(!$news){
            $this->redirect('/admin.php?c=content');
        }
        $newsContent = D("NewsContent")->find($newsId);

        if($newsContent){
            $news['content']=$newsContent['content'];
        }

        $webSiteMenu = D("Menu")->getBarMenus();
        $this->assign('webSiteMenu',$webSiteMenu);
        $this->assign('titleFontColor',C("TITLE_FONT_COLOR"));
        $this->assign('copyfrom',C("COPY_FROM"));
        $this->assign('news',$news);
        $this->display();
    }
    //更新文章的方法
    public function save($data)
    {
        $newsId=$data['news_id'];
        unset($data['news_id']);
        try{
            $id = D("News")->updateById($newsId,$data);
            $newsContentData['content']=$data['content'];
            $condId = D("NewsContent")->updateNewsById($newsId,$newsContentData);

            if($id===false||$condId===false){
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }
    //更改状态
    public function setStatus()
    {
        try{
            if($_POST){
                $id=$_POST['id'];
                $status=$_POST['status'];
                if(!$id){
                    return show(0,'ID不存在');
                }
                $res = D("News")->updateStatusById($id,$status);
                if($res){
                    return show(1,'操作成功');
                }else{
                    return show(0,'操作失败');
                }
            }
            return show(0,'没有提交的内容');
        }catch(EXception $e){
            return show(0,$e->getMessage());
        }
    }
    // 排序操作
    public function listorder()
    {
        $listorder=$_POST['listorder'];
        $jumpUrl=$_SERVER['HTTP_REFERER'];
        //print_r($jumpUrl);exit;
        $errors=array();
        try{
            if($listorder){
                foreach($listorder as $newsId=>$v){
                    $id = D("News")->updateNewsListorderById($newsId,$v);
                    if($id===false){
                        $errors[]=$newsId;
                    }
                }
                if($errors){
                    return show(0,'排序失败'.implode(',',$errors),array('jump_Url'=>$jumpUrl));
                }
                return show(1,'排序成功',array('jump_Url'=>$jumpUrl));
            }
        }catch(EXception $e){
            return show(0,$e->getMessage());
        }
        return show(0,'排序数据失败',array('jump_Url'=>$jumpUrl));
    }
    //推送相关操作
    public function push()
    {
        $jumpUrl=$_SERVER['HTTP_REFERER'];
        $positionId=intval($_POST['position_id']);
        $newsId=$_POST['push'];
        if(!$newsId||!is_array($newsId)){
            return show(0,'请选择推荐的文章ID进行推荐');
        }
        if(!$positionId){
            return show(0,'没有选择推荐位');
        }
        try{
            $news = D("News")->getNewsByNewsIdIn($newsId);
            if(!$news){
                return show(0,'没有相关内容');
            }
            foreach($news as $new){
                $data=array(
                    'position_id'=>$positionId,
                    'title'=>$new['title'],
                    'thumb'=>$new['thumb'],
                    'news_id'=>$new['news_id'],
                    'status'=>1,
                    'create_time'=>$new['create_time'],
                );
                //推荐位插入
                $position=D("PositionContent")->insert($data);
            }
        }catch(Exception $e){
            return show(0,$e->getMEssage());
        }
        return show(1,'推荐成功',array('jump_Url'=>$jumpUrl));
    }
}