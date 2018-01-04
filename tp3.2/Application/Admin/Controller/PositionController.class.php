<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 21/12/2017
 * Time: 10:54 AM
 */
namespace Admin\Controller;
use Think\Controller;

/**
 * Class PositionController
 * 推荐位管理
 * @package Admin\Controller
 */
class PositionController extends CommonController
{
    //推荐位显示
    public function index()
    {
        $data['status']=array('neq',-1);
        $position=D('Position')->select($data);
        $this->assign('positions',$position);
        $this->assign('nav','推荐位管理');
        $this->display();
    }
    //增加推荐位
    public function add()
    {
        if(IS_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return show(0, '推荐位名称为空');
            }
            /**
             * 如果提交了id，那么及时编辑模式
             */
            if($_POST['id']) {
                return $this->save($_POST);
            }
            try {

                $id = D("Position")->insert($_POST);
                if($id) {
                    return show(1,'新增成功',$id);
                }
                return show(0,'新增失败',$id);


            }catch(Exception $e) {
                return show(0, $e->getMessage());
            }
            return show(0, '新增失败',$newsId);
        }else {
            $this->display();
        }

    }
    /**
     * 推荐位编辑页面
     */
    public function edit()
    {
        $data = array(
            'status' => array('neq',-1),
        );
        $id = $_GET['id'];
        $position = D("Position")->find($id);
        $this->assign('vo', $position);
        $this->display();

    }
    //保存编辑后的推荐位信息
    public function save($data)
    {
        $id = $data['id'];
        unset($data['id']);
        try {
            $id = D("Position")->updateById($id,$data);
            if($id === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch (Exception $e) {
            return show(0,$e->getMessage());
        }
    }
    /**
     * 设置状态
     * status=1 正常 0关闭 -1删除
     */
    public function setStatus()
    {
        try {
            if ($_POST) {
                $id = $_POST['id'];
                $status = $_POST['status'];
                $res = D("Position")->updateStatusById($id, $status);
                if ($res) {
                    return show(1, '操作成功');
                } else {
                    return show(0, '操作失败');
                }

            }
        }catch (Exception $e) {
            return show(0, $e->getMessage());
        }

        return show(0, '没有提交的内容');
    }
}