<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 21/12/2017
 * Time: 11:03 AM
 */
namespace Admin\Controller;
use Think\Controller;

/**
 * Class BasicController
 * 基本管理
 * @package Admin\Controller
 */
class BasicController extends CommonController
{
    //站点信息 显示
    public function index()
    {
        $result = D("Basic")->select();
        $this->assign('vo', $result);
        $this->assign('type',1);
        $this->display();
    }
    //添加站点 信息
    public function add()
    {
        if($_POST) {
            if(!$_POST['title']) {
                return show(0, '站点信息不能为空');
            }
            if(!$_POST['keywords']) {
                return show(0, '站点关键词');
            }
            if(!$_POST['description']) {
                return show(0, '站点描述');
            }

            D("Basic")->save($_POST);
            return show(1, '配置成功');
        }else {
            return show(0, '没有提交的数据');
        }
    }

    /**
     * 缓存管理
     */
    public function cache()
    {
        $this->assign('type',2);
        $this->display();
    }
}