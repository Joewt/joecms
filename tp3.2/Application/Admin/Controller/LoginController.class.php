<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * Class LoginController
 * 登录功能
 * @package Admin\Controller
 */
class LoginController extends Controller
{

    /**
     * 登录界面的显示
     */
    public function index()
    {
        //判断session  如果有 直接跳转到后台页面
        if(session('adminUser')){
            $this->redirect('/index.php?m=admin&c=index');
        }
        return $this->display();
    }
    //用户名密码验证
    public function check()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        //return show(0,'lalalalal不能为空');exit();
        //验证post 过来的数据
        if(!trim($username)){
            return show(0,'用户名不能为空');
        }
        if(!trim($password)){
            return show(0,'密码不能为空');
        }
        // SELECT * FROM `cms_admin` WHERE ( username="admin" ) LIMIT 1
        $ret = D('Admin')->getAdminByUsername($username);
        // 返回一个array 数组 记录了用户信息
        if(!$ret){
            return show(0,'该用户不存在');
        }
        if($ret['password']!=getMd5Password($password)){
            return show(0,'密码错误');
        
        }
        //最后登录时间
        //  UPDATE `cms_admin` SET `lastlogintime`='1514705830' WHERE ( admin_id=1 )
        D("Admin")->updateByAdminId($ret['admin_id'],array('lastlogintime'=>time()));
        session('adminUser',$ret);
        return show(1,'登录成功');
    }
    /**
     * 退出登录
     */
    public function loginout()
    {
        session('adminUser',null);
        $this->redirect('/admin.php?c=login');
    }
}