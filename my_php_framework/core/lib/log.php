<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 28/11/2017
 * Time: 2:33 PM
 */
namespace core\lib;
use core\lib\config;
class log
{
    /**
     * 1.确定驱动类型
     *
     * 2.写日志
     */
    static $class;
    static public function init()
    {
        //确定存储方式
        $drive = config::get('DRIVE','log');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }

    static public function log($name,$file='log')
    {
        self::$class->log($name,$file);
    }
}