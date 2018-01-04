<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 25/11/2017
 * Time: 4:02 PM
 */
namespace core\lib;
use core\lib\config;
class route
{
    public $ctrl;
    public $action;
    /**
     * 1.隐藏index.php
     * 2.获取URL 参数部分
     * 3.返回对应控制器和方法
     */
    public function __construct()
    {


        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/') {
            $path = $_SERVER['REQUEST_URI'];
            $patharr = explode('/',trim($path,'/'));
            if(isset($patharr[0])) {
                $this->ctrl = $patharr[0];
            }
            unset($patharr[0]);
            if(isset($patharr[1])) {
                $this->action = $patharr[1];
                unset($patharr[1]);
            } else {
                $this->action = config::get('ACTION','route');
            }
            //url多余部分 转换成 GET
            $count = count($patharr) + 2;
            $i = 2;
            while($i < $count) {
                if(isset($patharr[$i + 1])){
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                }
                $i = $i + 2;
            }

        } else {
            $this->ctrl = config::get('CTRL','route');
            $this->action = config::get('ACTION','route');

        }
    }
}