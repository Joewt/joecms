<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 03/12/2017
 * Time: 11:19 AM
 */
namespace app\ctrl;
use core\lib\model;
class adminCtrl extends \core\joe
{
    public function index()
    {
        //if(session('adminUser')){
          //  $this->redirect('/admin/index');
        //}
        $this->display('admin/index/index.html');
    }
    public function login()
    {
        $this->display('admin/login/index.html');
    }
    public function check()
    {
        if($_POST==null){
            $this->redirect('/index');
        }
        $model = new \app\model\adminModel();
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(!trim($username)){
            return show(0,'用户名不能为空');
        }
        if(!trim($password)){
            return show(0,'密码不能为空');
        }
        $ret = $model->getAdminByUsername($username);
        if(!$ret){
            return show(0,'该用户不存在');
        }
        if($ret['password']!=getMd5Password($password)){
            return show(0,'密码错误');
        }
        //session('adminUser',$ret);
        return show(1,'登录成功');
    }
    public function sb()
    {
        $ret = getMd5Password('admin');
        dump($ret);
    }
    public function loginout(){

        //session('adminUser',null);
        $this->redirect('/index');
    }
}