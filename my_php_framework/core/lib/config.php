<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 26/11/2017
 * Time: 12:14 PM
 */
namespace core\lib;
class config
{
    static public $conf = array();
    static public function get($name,$file)
    {
        /**
         * 1.判断配置文件是否存在
         * 2.判断配置是否存在
         * 3.缓存配置
         */
        if(isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        } else {
            $path = JOE . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('没有这个配置项' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

    static public function all($file)
    {
        if(isset(self::$conf[$file])){
            return self::$conf[$file];
        } else {
            $path = JOE . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                self::$conf[$file]=$conf;
                return $conf;

            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }
}