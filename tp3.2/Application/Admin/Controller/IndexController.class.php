<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController
{
    //后台首页显示
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

    public function main()
    {
        $this->display();
    }
}
