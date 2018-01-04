<?php
/**
 * 文件系统
 */
namespace core\lib\drive\log;
use core\lib\config;

class file
{
    public $path;//日志存储位置
    function __construct()
    {
        $conf = config::get('OPTION','log');
        $this->path = $conf['PATH'];
    }

    public function log($message,$file='log')
    {
        /**
         * 1.确认文件目录是否存在
         * 新建目录
         * 2.写入日志
         */

        if(!is_dir($this->path)){
            mkdir($this->path,'0777',true);
        }
        file_put_contents($this->path.date('YmdH').$file.'.php',date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
    }
}
