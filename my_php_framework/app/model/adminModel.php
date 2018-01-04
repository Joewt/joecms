<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 28/11/2017
 * Time: 4:20 PM
 */
namespace app\model;

use core\lib\model;

class adminModel extends model
{
    public $_db='admin';
    public function getAdminByUsername($username){
        //$ret = $this->_db->where('username="'.$username.'"')->find();
        $ret = $this->get($this->_db,'*',array(
            'username'=>$username
        ));
        return $ret;
    }
}