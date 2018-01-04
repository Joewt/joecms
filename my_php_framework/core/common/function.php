<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 25/11/2017
 * Time: 3:51 PM
 */
use core\lib\config;
function show($status,$message,$data=array()){
    $result=array(
        'status'=>$status,
        'message'=>$message,
        'data'=>$data,
    );
    exit(json_encode($result));
}

function getMd5Password($password){
    $pre = config::get('MD5_PRE','con');
    return md5($password.$pre);
}
