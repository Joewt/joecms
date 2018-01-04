<?php

/*
*公用的方法
*/
// 弹出层 的公共方法
function show($status,$message,$data=array()){
    $result=array(
        'status'=>$status,
        'message'=>$message,
        'data'=>$data,
    );
    exit(json_encode($result));
}
//MD5加密
function getMd5Password($password){
    return md5($password.C('MD5_PRE'));
}
//获取菜单类型
function getMenuType($type){
    return $type==1?'后端菜单':"前端导航";
}
//状态的显示
function status($status){
    if($status==0){
        $str='关闭';
    }elseif($status==1){
        $str='正常';
    }elseif($status==-1){
        $str='删除';
    }
    return $str;
}
//获取后台菜单地址
function getAdminMenuUrl($nav){
    $url = '/admin.php?c='.$nav['c'].'&a='.$nav['a'];
    if($nav['f']=='index'){
        $url = '/admin.php?c='.$nav['c'];
    }
    return $url;
}

function getActive($navc){
    $c = strtolower(CONTROLLER_NAME);
    if(strtolower($navc)==$c){
        return 'class="active"';
    }
    return '';
}

function showKind($status,$data){
    header('Content-type:application/json;charset=UTF-8');
    if($status==0){
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>'上传失败')));
}
// 获取登录用户名
function getLoginUsername(){
    return $_SESSION['adminUser']['username']?$_SESSION['adminUser']['username']:'';
}

function getCatName($navs,$id){
    foreach($navs as $nav){
        $navList[$nav['menu_id']]=$nav['name'];
    }
    return isset($navList[$id])?$navList[$id]:'';
}

function getCopyFromById($id){
    $copyFrom = C("COPY_FROM");
    return $copyFrom[$id]?$copyFrom[$id]:'';
}

function isThumb($thumb){
    if($thumb){
        return '<span style="color:red">有</span>';
    }
    return '无';
}