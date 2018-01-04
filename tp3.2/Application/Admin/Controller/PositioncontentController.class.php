<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 21/12/2017
 * Time: 11:01 AM
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * Class PositioncontentController
 * 推荐位内容管理
 * @package Admin\Controller
 */
class PositioncontentController extends CommonController
{
    /**
     * 推荐位内容显示
     */
    public function index()
    {
        $positions=D("Position")->getNormalPositions();
        $data['status']=array('neq',-1);
        if($_GET['title']){
            $data['title']=trim($_GET['title']);
            $this->assign('title',$data['title']);
        }
        //$page = $_REQUEST['p']?$_REQUEST['p']:1;
        //$pageSize=5;
        //$count = D("Position")->getPositionCount($conds);
        //$res = new \Think\Page($count,$pageSize);
        //$pageres = $res->show();
        $data['position_id']=$_GET['position_id']?intval($_GET['position_id']):$positions[1]['id'];
        $contents=D("PositionContent")->select($data);
        $this->assign('positions',$positions);
        $this->assign('contents',$contents);
        //$this->assign('pageres',$pageres);
        $this->assign('positionId',$data['position_id']);
        $this->display();
    }

    /**
     * 推荐位内容添加
     */
    public function add()
    {
        if($_POST) {
            if(!isset($_POST['position_id']) || !$_POST['position_id']) {
                return show(0, '推荐位ID不能为空');
            }
            if(!isset($_POST['title']) || !$_POST['title']) {
                return show(0, '推荐位标题不能为空');
            }
            if(!$_POST['url'] && !$_POST['news_id']) {
                return show(0, 'url和news_id不能同时为空');
            }
            if(!isset($_POST['thumb']) || !$_POST['thumb']) {
                if($_POST['news_id']) {
                    $res = D("News")->find($_POST['news_id']);
                    if($res && is_array($res)) {
                        $_POST['thumb'] = $res['thumb'];
                    }
                }else{
                    return show(0,'图片不能为空');
                }

            }
            if($_POST['id']) {
                return $this->save($_POST);
            }
            try{
                $id = D("PositionContent")->insert($_POST);
                //INSERT INTO `cms_position_content` (`title`,`position_id`,`thumb`,`url`,`news_id`,`status`,`create_time`)
                // VALUES ('湖南工学院oj','2','/upload/2017/12/31/5a48a13def9b5.jpg','http://www.hnitoj.cn','0','1','1514709323')
                if($id) {
                    return show(1, '新增成功');
                }
                return show(0, '新增失败');
            }catch(Exception $e) {
                return show(0, $e->getMessage());
            }
        }else {
            $positions = D("Position")->getNormalPositions();
            $this->assign('positions', $positions);
            $this->display();
        }
    }
    /**
     * 推荐位内容编辑操作
     */
    public function edit()
    {
        $id=$_GET['id'];
        $position=D("PositionContent")->find($id);
        $positions=D("Position")->getNormalPositions();
        $this->assign('positions',$positions);
        $this->assign('vo',$position);
        $this->display();
    }

    /**
     * 更新推荐位内容
     * @param $data
     */
    public function save($data)
    {
        $id=$data['id'];
        unset($data['id']);
        try{
            $resId=D("PositionContent")->updateById($id,$data);
            if($resId===false){
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }
    //更改状态 调用父类里的方法
    public function setStatus()
    {
        $data = array(
            'id' => intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        return parent::setStatus($data, 'PositionContent');
    }
    //推荐位排序
    public function listorder()
    {
        return parent::listorder("PositionContent");
    }

}