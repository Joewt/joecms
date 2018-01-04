<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 25/11/2017
 * Time: 3:54 PM
 */
namespace core;
class joe
{
    public static $classMap = array();
    public $assign;
    static public function run()
    {
        \core\lib\log::init();
       // \core\lib\log::log($_SERVER);
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        if(is_file($ctrlfile)) {
            include $ctrlfile;
            $ctrl = new $cltrlClass;
            $ctrl->$action();
            \core\lib\log::log('ctrl:'.$ctrlClass.'     '.'action:'.$action);
        } else {
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
    }

    //自动加载类库
    static public function load($class)
    {
        //自动加载类库
        if(isset($classMap[$class])){
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = JOE .'/'. $class. '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name,$value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
       /* $file = APP.'/views'.$file;

        if(is_file($file)) {
            extract($this->assign);
            include $file;
        }
        */


        $path = APP . '/views/' . $file;
        if (is_file($path)) {
            $loader = new \Twig_Loader_Filesystem(APP . '/views/');
            $twig = new \Twig_Environment($loader, array(
                'cache' => JOE . '/log/twig',
                'debug' => DEBUG,
            ));
            $template = $twig->load($file);
            //echo $twig->render('index.html', array('the' => 'variables', 'go' => 'here'));
            //exit();
            $template->display($this->assign?$this->assign:array());
            //echo $template->render(array('the' => 'variables', 'go' => 'here'));
        }
    }

    /**
     * URL 重定向
     * @param $url
     * @param int $time
     * @param string $msg
     */
    function redirect($url, $time=0, $msg='') {
        //多行URL地址支持
        $url        = str_replace(array("\n", "\r"), '', $url);
        if (empty($msg))
            $msg    = "系统将在{$time}秒之后自动跳转到{$url}！";
        if (!headers_sent()) {
            // redirect
            if (0 === $time) {
                header('Location: ' . $url);
            } else {
                header("refresh:{$time};url={$url}");
                echo($msg);
            }
            exit();
        } else {
            $str    = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
            if ($time != 0)
                $str .= $msg;
            exit($str);
        }
    }

    /**
     * session管理函数 还未实现
     * @param string|array $name session名称 如果为数组则表示进行session设置
     * @param mixed $value session值
     * @return mixed
     */
    /*
    function session($name='',$value='') {
        $prefix   =  '';
        if(is_array($name)) { // session初始化 在session_start 之前调用
            if(isset($name['prefix'])) C('SESSION_PREFIX',$name['prefix']);
            if(C('VAR_SESSION_ID') && isset($_REQUEST[C('VAR_SESSION_ID')])){
                session_id($_REQUEST[C('VAR_SESSION_ID')]);
            }elseif(isset($name['id'])) {
                session_id($name['id']);
            }
            if('common' == APP_MODE){ // 其它模式可能不支持
                ini_set('session.auto_start', 0);
            }
            if(isset($name['name']))            session_name($name['name']);
            if(isset($name['path']))            session_save_path($name['path']);
            if(isset($name['domain']))          ini_set('session.cookie_domain', $name['domain']);
            if(isset($name['expire']))          {
                ini_set('session.gc_maxlifetime',   $name['expire']);
                ini_set('session.cookie_lifetime',  $name['expire']);
            }
            if(isset($name['use_trans_sid']))   ini_set('session.use_trans_sid', $name['use_trans_sid']?1:0);
            if(isset($name['use_cookies']))     ini_set('session.use_cookies', $name['use_cookies']?1:0);
            if(isset($name['cache_limiter']))   session_cache_limiter($name['cache_limiter']);
            if(isset($name['cache_expire']))    session_cache_expire($name['cache_expire']);
            if(isset($name['type']))            C('SESSION_TYPE',$name['type']);
            if(C('SESSION_TYPE')) { // 读取session驱动
                $type   =   C('SESSION_TYPE');
                $class  =   strpos($type,'\\')? $type : 'Think\\Session\\Driver\\'. ucwords(strtolower($type));
                $hander =   new $class();
                session_set_save_handler(
                    array(&$hander,"open"),
                    array(&$hander,"close"),
                    array(&$hander,"read"),
                    array(&$hander,"write"),
                    array(&$hander,"destroy"),
                    array(&$hander,"gc"));
            }
            // 启动session
            if(C('SESSION_AUTO_START'))  session_start();
        }elseif('' === $value){
            if(''===$name){
                // 获取全部的session
                return $prefix ? $_SESSION[$prefix] : $_SESSION;
            }elseif(0===strpos($name,'[')) { // session 操作
                if('[pause]'==$name){ // 暂停session
                    session_write_close();
                }elseif('[start]'==$name){ // 启动session
                    session_start();
                }elseif('[destroy]'==$name){ // 销毁session
                    $_SESSION =  array();
                    session_unset();
                    session_destroy();
                }elseif('[regenerate]'==$name){ // 重新生成id
                    session_regenerate_id();
                }
            }elseif(0===strpos($name,'?')){ // 检查session
                $name   =  substr($name,1);
                if(strpos($name,'.')){ // 支持数组
                    list($name1,$name2) =   explode('.',$name);
                    return $prefix?isset($_SESSION[$prefix][$name1][$name2]):isset($_SESSION[$name1][$name2]);
                }else{
                    return $prefix?isset($_SESSION[$prefix][$name]):isset($_SESSION[$name]);
                }
            }elseif(is_null($name)){ // 清空session
                if($prefix) {
                    unset($_SESSION[$prefix]);
                }else{
                    $_SESSION = array();
                }
            }elseif($prefix){ // 获取session
                if(strpos($name,'.')){
                    list($name1,$name2) =   explode('.',$name);
                    return isset($_SESSION[$prefix][$name1][$name2])?$_SESSION[$prefix][$name1][$name2]:null;
                }else{
                    return isset($_SESSION[$prefix][$name])?$_SESSION[$prefix][$name]:null;
                }
            }else{
                if(strpos($name,'.')){
                    list($name1,$name2) =   explode('.',$name);
                    return isset($_SESSION[$name1][$name2])?$_SESSION[$name1][$name2]:null;
                }else{
                    return isset($_SESSION[$name])?$_SESSION[$name]:null;
                }
            }
        }elseif(is_null($value)){ // 删除session
            if(strpos($name,'.')){
                list($name1,$name2) =   explode('.',$name);
                if($prefix){
                    unset($_SESSION[$prefix][$name1][$name2]);
                }else{
                    unset($_SESSION[$name1][$name2]);
                }
            }else{
                if($prefix){
                    unset($_SESSION[$prefix][$name]);
                }else{
                    unset($_SESSION[$name]);
                }
            }
        }else{ // 设置session
            if(strpos($name,'.')){
                list($name1,$name2) =   explode('.',$name);
                if($prefix){
                    $_SESSION[$prefix][$name1][$name2]   =  $value;
                }else{
                    $_SESSION[$name1][$name2]  =  $value;
                }
            }else{
                if($prefix){
                    $_SESSION[$prefix][$name]   =  $value;
                }else{
                    $_SESSION[$name]  =  $value;
                }
            }
        }
        return null;
    }*/
}