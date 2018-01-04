<?php
/**
 * Created by PhpStorm.
 * User: joe
 * Date: 21/12/2017
 * Time: 6:23 PM
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

/**
 * Class ImageController
 * 图片上传
 * @package Admin\Controller
 */
class ImageController extends CommonController
{
    private $_uploadObj;
    public function __construct()
    {

    }
    //图片上传
    public function ajaxuploadimage()
    {
        $upload = D("UploadImage");
        $res = $upload->imageUpload();
        if($res===false){
            return show(0,'上传失败','');
        }else{
            return show(1,'上传成功',$res);
        }
    }
    //富文本编辑器
    public function kindupload()
    {
        $upload = D("UploadImage");
        $res = $upload->upload();
        if($res===false){
            return showKind(1,'上传失败');
        }
        return showKind(0,$res);
    }
}