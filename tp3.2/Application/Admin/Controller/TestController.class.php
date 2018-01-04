<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;

//测试 类 无关紧要的东西
class TestController extends CommonController
{

    public function index()
    {
        $news = D('News')->maxcount();
        $newscount = D('News')->getNewsCount(array('status'=>1));
        $positionCount = D('Position')->getCount(array('status'=>1));
        $adminCount = D("Admin")->getLastLoginUsers();

        $this->assign('news', $news);
        $this->assign('newscount', $newscount);
        $this->assign('positioncount', $positionCount);
        $this->assign('admincount', $adminCount);
        $this->display();
    }
}
